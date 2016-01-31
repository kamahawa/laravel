<?php
namespace CTY;

use App\User;
use Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class CustomAuth implements UserProvider
{
    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        return User::query()->where('ID', $identifier)->first();//UserID
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed $identifier
     * @param  string $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        $user = $this->retrieveById($identifier);
        if ($user) {
            $saved_token = $this->getUserRememberToken($user);
            if ($saved_token === $token) {
                return $user;
            }
        }

        return null;
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  string $token
     * @return void
     */
    public function updateRememberToken(UserContract $user, $token)
    {
        $this->setUserRememberToken($user, $token);
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.

        $model = new User();
        $query = $model->newQuery();
        foreach ($credentials as $key => $value) {
            if (!Str::contains($key, ['password', 'isDeleted'])) {
                $query->where($key, $value);
            }
        }


        return $query->first();
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        return md5($credentials['password']) === $user->UserEncryptedPassword;
    }


    /**
     * @param Model|UserContract $user
     * @return string
     */
    public function createUserRememberTokenCacheKey(Model $user)
    {
        return 'user:' . $user->ID . ':remember_token';//UserID
    }

    /**
     * @param Model|UserContract $user
     */
    public function getUserRememberToken($user)
    {

        return Cache::store('file')->get($this->createUserRememberTokenCacheKey($user), false);
    }

    /**
     * @param Model|UserContract $user
     * @param string $token
     */
    public function setUserRememberToken($user, $token)
    {
        if (!empty($token)) {
            Cache::store('file')->forever($this->createUserRememberTokenCacheKey($user), $token);
        } else {
            Cache::store('file')->pull($this->createUserRememberTokenCacheKey($user));
        }

    }
}
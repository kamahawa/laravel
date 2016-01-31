<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'act_users';
    public $timestamps = false;
    public $primaryKey = 'ID';


}

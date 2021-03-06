<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');
Route::get('/details/productId/{id}', 'HomeController@details');
Route::get('/lamdeptunhien', 'ManageProductController@lamdeptunhien');
Route::get('/mypham', 'ManageProductController@mypham');
Route::get('/taphoa', 'ManageProductController@taphoa');

Route::group(['middleware' => ['web']], function () {
    //

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/quanly', 'ManageController@index');

    //User
    Route::get('/user', 'UserController@homePage');
    Route::post('/user/insert', 'UserController@insertData');
    Route::get('/user/update/{id}', 'UserController@showUpdatePage');
    Route::post('/user/update', 'UserController@updateData');
    Route::get('/user/delete/{id}', 'UserController@deleteData');

    Route::get('/api/RestWebservice/get_bus_id/username/{user}/password/{pass}','RestWebservice@get_bus_id');

});

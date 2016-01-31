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

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::get('/home', 'HomeController@index');

    //Vehicle
    Route::get('/vehicle', 'VehicleController@homePage');
    Route::post('/vehicle/insert', 'VehicleController@insertData');
    Route::get('/vehicle/update/{id}', 'VehicleController@showUpdatePage');
    Route::post('/vehicle/update', 'VehicleController@updateData');
    Route::get('/vehicle/delete/{id}', 'VehicleController@deleteData');

    //User
    Route::get('/user', 'UserController@homePage');
    Route::post('/user/insert', 'UserController@insertData');
    Route::get('/user/update/{id}', 'UserController@showUpdatePage');
    Route::post('/user/update', 'UserController@updateData');
    Route::get('/user/delete/{id}', 'UserController@deleteData');

    //Student
    Route::get('/student', 'StudentController@homePage');
    Route::post('/student/insert', 'StudentController@insertData');
    Route::get('/student/update/{id}', 'StudentController@showUpdatePage');
    Route::post('/student/update', 'StudentController@updateData');
    Route::get('/student/delete/{id}', 'StudentController@deleteData');
    Route::get('/student/delete/{id}', 'StudentController@deleteData');

    //Group
    Route::get('/group', 'GroupController@homePage');
    Route::post('/group/insert', 'GroupController@insertData');
    Route::get('/group/update/{id}', 'GroupController@showUpdatePage');
    Route::post('/group/update', 'GroupController@updateData');
    Route::get('/group/delete/{id}', 'GroupController@deleteData');

    //Point
    Route::get('/point', 'PointController@homePage');
    Route::post('/point/insert', 'PointController@insertData');
    Route::get('/point/update/{id}', 'PointController@showUpdatePage');
    Route::post('/point/update', 'PointController@updateData');
    Route::get('/point/delete/{id}', 'PointController@deleteData');

    //Route
    Route::get('/route', 'RouteController@homePage');
    Route::post('/route/insert', 'RouteController@insertData');
    Route::get('/route/update/{id}', 'RouteController@showUpdatePage');
    Route::post('/route/update', 'RouteController@updateData');
    Route::get('/route/delete/{id}', 'RouteController@deleteData');

    //Location
    Route::get('/location', 'LocationController@homePage');
    Route::post('/location', 'LocationController@showStudentByRoute');
    Route::post('/location/viewmap','LocationController@viewMap');

    //PickUp
    Route::get('/pickup', 'PickupController@homePage');
    Route::post('/pickup', 'PickupController@insertConfirmPickup');
    Route::get('/pickup/ViewPickUp', 'PickupController@viewMapPickUp');
    Route::get('/pickup/ViewTakeHome', 'PickupController@viewMapTakeHome');

    //Api
    Route::get('/api/RestWebservice/login/username/{user}/password/{pass}','RestWebservice@login');
    Route::post('/api/RestWebservice/login/username/{user}/password/{pass}','RestWebservice@login');

    Route::get('/api/RestWebservice/get_bus_id/username/{user}/password/{pass}','RestWebservice@get_bus_id');

    Route::resource('test.us','testController@show11');
});

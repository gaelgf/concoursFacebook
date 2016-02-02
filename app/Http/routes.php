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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/connexion', function () {
    return view('connexion');
});
Route::get('/validation_connexion', function () {
    return view('validation_connexion');
});


Route::get('/choix_type_photo', function () {
    return view('choix_type_photo');
});
Route::get('/choix_photo_facebook', function () {
    return view('choix_photo_facebook');
});




Route::get('/vote', function () {
    return view('vote');
});



//Route admin
Route::get('/admin/admin', function () {
    return view('admin');
});

Route::get('/admin/adminCreerConcours', function () {
    return view('adminCreerConcours');
});

Route::get('/admin/adminModifConcours', function () {
    return view('adminModifConcours');
});

Route::get('/admin/adminVisuConcours', function () {
    return view('adminVisuConcours');
});




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

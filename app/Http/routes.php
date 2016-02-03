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
Route::get('/choix_telechargement_photo', function () {
    return view('choix_telechargement_photo');
});




Route::get('/vote', function () {
    return view('vote');
});



//route test canvas
Route::post('/test', function () {
    return view('test');
});


//Route admin
Route::post('/admin', function () {
    return view('admin/admin');
});

Route::get('/adminCreerConcours', function () {
    return view('admin/adminCreerConcours');
});

Route::get('/adminModifConcours', function () {
    return view('admin/adminModifConcours');
});

Route::get('/adminVisuConcours', function () {
    return view('admin/adminVisuConcours');
});

Route::resource('campagne', 'CampagneController');

/*Route::get('/create', function () {
    return view('campagne/create');
}); */

/*Route::get('/', 'FriendsController@getAddFriend');
Route::post('/', 'FriendsController@postAddFriend'); */
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

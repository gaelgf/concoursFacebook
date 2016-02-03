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

Route::post('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
});

/*Route::post('/login', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});*/

Route::post('/connexion', function () {
    return view('connexion');
});
Route::get('/connexion', function () {
    return view('connexion');
});

Route::post('/validation_connexion', function () {
    return view('validation_connexion');
});
Route::get('/validation_connexion', function () {
    return view('validation_connexion');
});


Route::post('/choix_type_photo', function () {
    return view('choix_type_photo');
});
Route::get('/choix_type_photo', function () {
    return view('choix_type_photo');
});

Route::post('/choix_photo_facebook', function () {
    return view('choix_photo_facebook');
});
Route::get('/choix_photo_facebook', function () {
    return view('choix_photo_facebook');
});

Route::post('/choix_telechargement_photo', function () {
    return view('choix_telechargement_photo');
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
Route::get('/test', function () {
    return view('test');
});

//Route admin
Route::post('/admin', function () {
    return view('admin/admin');
});
Route::get('/admin', function () {
    return view('admin/admin');
});

Route::post('/adminCreerConcours', function () {
    return view('admin/adminCreerConcours');
});
Route::get('/adminCreerConcours', function () {
    return view('admin/adminCreerConcours');
});

Route::post('/adminModifConcours', function () {
    return view('admin/adminModifConcours');
});
Route::get('/adminModifConcours', function () {
    return view('admin/adminModifConcours');
});

Route::post('/adminVisuConcours', function () {
    return view('admin/adminVisuConcours');
});
Route::get('/adminVisuConcours', function () {
    return view('admin/adminVisuConcours');
});

Route::resource('campagnes', 'CampagneController');

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

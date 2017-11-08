<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function () {
    return view('welcome');
});

 /*
 |------------------------------
 | Upload images from dropzone
 |------------------------------
 |
  */

Route::post('/upload', 'ImageController@upload');

Route::post('/ajax', 'WelcomeController@ajaxRequest');

Route::post('/ajaxMulti', 'WelcomeController@multiHandler');

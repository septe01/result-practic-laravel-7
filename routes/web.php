<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes(); //default after install laravel/ui

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/about', 'PagesController@about');
Route::get('/domain-hosting', 'DomainHostingsController@domainhosting');

Route::get('/book', 'BooksController@index');

Route::get('/', 'GuestsController@index')->name('welcome');
Route::get('/galery/photo/{galeri}', 'GuestsController@show')->name('galery.photo');

Route::get('/home', function () {
    return view('pages.visitor.dashboard');
});

// visitor
Route::get('/user', 'UsersController@index')->name('user');
Route::get('/user/create', 'UsersController@create')->name('user.create');
Route::post('/user', 'UsersController@store')->name('user.store');
Route::get('/user/edit/{id}', 'UsersController@edit')->name('user.edit');
Route::post('/user/update/{id}', 'UsersController@update')->name('user.update');
Route::post('/user/delete/{id}', 'UsersController@destroy')->name('user.delete');

Route::get('/album', 'AlbumsController@index')->name('album');
Route::get('/album/create', 'AlbumsController@create')->name('album.create');
Route::post('/album', 'AlbumsController@store')->name('album.store');
Route::get('/album/edit/{album}', 'AlbumsController@edit')->name('album.edit');
Route::post('/album/update/{albums}', 'AlbumsController@update')->name('album.update');
Route::post('/album/delete/{albums}', 'AlbumsController@destroy')->name('album.delete');

Route::get('/galeri', 'GaleriesController@index')->name('galeri');
Route::get('/galeri/create', 'GaleriesController@create')->name('galeri.create');
Route::post('/galeri', 'GaleriesController@store')->name('galeri.store');
Route::get('/galeri/edit/{galeries}', 'GaleriesController@edit')->name('galeri.edit');
Route::post('/galeri/update/{galeries}', 'GaleriesController@update')->name('galeri.update');
Route::post('/galeri/delete/{galeries}', 'GaleriesController@destroy')->name('galeri.delete');


// admin page AdminsController
Route::get('/dashboard/admin', 'AdminsController@index');


// theme adminlte
Route::get('/dashboard/themeadminlte', function () {
    return view('template.admin.xample');
});

Route::get('/home', 'HomeController@index')->name('home');

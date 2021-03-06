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
    return view('proxy');
});

Route::resource(
    '/dic',
    'DictionaryController',
    ['names' => [
        'index' => 'list',
        'show' => 'detail',
        'create' => 'create',
        'store' => 'save',
        'edit' => 'edit',
        'update' => 'update',
        'destroy' => 'delete',
    ]]
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

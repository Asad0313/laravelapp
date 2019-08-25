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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/admin',function (){
//   return view('admin.index');
//
//});

Route::group(['middleware' => 'admin'], function (){
    Route::resource('admin/users','AdminUsersController');


});




Route::get('/admin/users/{$id}/edit', [ 'as' => 'admin.users.edit', 'uses' => 'AdminUsersController@edit']);

Route::get('admin/users',['as' => 'admin.users.index', 'uses' => 'AdminUsersController@index']);

Route::get('admin/users/create',['as' => 'admin.users.create', 'uses' => 'AdminUsersController@create']);




//Route::get('test', function() {
//    Mail::send('Email.test', [], function ($message) {
//        $message->to('asadaliwaliani@gmail.com', 'HisName')->subject('Welcome!');
//    });
//});
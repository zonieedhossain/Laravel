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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//department route
Route::get('departments','DepartmentController@index');
Route::get('department/create','DepartmentController@create');
Route::post('department/save','DepartmentController@save');
Route::get('department/edit/{id}','DepartmentController@edit');
Route::post('department/update/{id}','DepartmentController@update');
Route::delete('department/delete/{id}','DepartmentController@delete');
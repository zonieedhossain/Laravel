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

Route::group(['middleware' => 'auth'], function () {
    //Department section
Route::get('departments', 'DepartmentController@index');
Route::get('department/create', 'DepartmentController@create');
Route::get('department/search', 'DepartmentController@search');
Route::post('department/save', 'DepartmentController@save');
Route::get('department/edit/{id}', 'DepartmentController@edit');
Route::post('department/update/{id}', 'DepartmentController@update');
Route::delete('department/delete/{id}', 'DepartmentController@delete');

//Class Scadule section
Route::get('classes', 'ClassesController@index');
Route::get('class/create', 'ClassesController@create');
Route::get('Class/search', 'ClassesController@search');
Route::post('class/save', 'ClassesController@save');
Route::get('class/edit/{id}', 'ClassesController@edit');
Route::post('class/update/{id}', 'ClassesController@update');
Route::delete('class/delete/{id}', 'ClassesController@delete');

// Student section 
Route::get('students', 'StudentsController@index');
Route::get('student/create', 'StudentsController@create');
Route::get('student/search', 'StudentsController@search');
Route::post('student/save', 'StudentsController@save');
Route::get('student/edit/{id}', 'StudentsController@edit');
Route::post('student/update/{id}', 'StudentsController@update');
Route::delete('student/delete/{id}', 'StudentsController@delete');

// Teacher section 
Route::get('teachers', 'TeacherController@index');
Route::get('teacher/create', 'TeacherController@create');
Route::get('teacher/search', 'TeacherController@search');
Route::post('teacher/save', 'TeacherController@save');
Route::get('teacher/edit/{id}', 'TeacherController@edit');
Route::post('teacher/update/{id}', 'TeacherController@update');
Route::delete('teacher/delete/{id}', 'TeacherController@delete');
});

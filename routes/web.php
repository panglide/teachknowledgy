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

Route::get('/', 'PagesController@welcome');

Auth::routes();


Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::get('/classrooms', 'ClassroomController@index');

Route::get('/classrooms/{classroom}', 'ClassroomController@show');

Route::get('/classrooms.create', 'ClassroomController@create');

Route::post('/classrooms', 'ClassroomController@store');

Route::get('/classrooms/{classroom}/delete', 'ClassroomController@destroy')->name('classrooms.delete');

Route::post('/lessons', 'LessonController@store');

Route::get('/lessons.create', 'LessonController@create');

Route::get('/lessons/{lesson}', 'LessonController@show')->name('lessons.show');



Route::get('/standards', 'StandardController@create');

Route::get('/standads/{standard}', 'StandardController@show')->name('standards.show');




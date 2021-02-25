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


Auth::routes();

Route::view('/', 'welcome');

Route::view('/demo', 'DemoController@index');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/classrooms', 'ClassroomController@index');

Route::get('/classrooms/{classroom}', 'ClassroomController@show');

Route::get('/standards', 'StandardController@index');

Route::get('/lessons/{lesson}', 'LessonController@show')->name('lessons.show');

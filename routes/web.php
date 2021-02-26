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

<<<<<<< HEAD
Route::get('/', 'PagesController@welcome');

Auth::routes();

// Route::get('/resources', function (){
//   return view('resources.demo');
// });

// Route::get('/remediation_lesson', function(){
//   return view('lessons/remediation_lessons/demo');
// });

// Route::get('/extension_lesson', function(){
//   return view('lessons/extension_lessons/demo');
// });

// Route::get('/centers', function(){
//   return view('centers/demo');
// });
=======

Auth::routes();


Route::view('/', 'welcome');

Route::view('/demo', 'DemoController@index');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
>>>>>>> staging

Route::get('/classrooms', 'ClassroomController@index');

Route::get('/classrooms/{classroom}', 'ClassroomController@show');

Route::get('/standards', 'StandardController@index');

<<<<<<< HEAD
Route::get('/demo', 'DemoController@index');

Route::get('/assessments/1', 'AssessmentController@show');

// Route::get('/guided_exercise', function(){
//   return view('exercises/guided_exercises/demo');
// });

// Route::get('/independent_exercise', function(){
//   return view('/exercises/independent_exercises/demo');
// });
=======
Route::get('/lessons/{lesson}', 'LessonController@show')->name('lessons.show');
>>>>>>> staging

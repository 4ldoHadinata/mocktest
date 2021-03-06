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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'SubjectController@index')->name('home');
Route::resource('subject', 'SubjectController');
Route::resource('question', 'QuestionController');
Route::get('/test', 'QuestionController@test')->name('test');
Route::get('/answer', 'QuestionController@answer')->name('answer');
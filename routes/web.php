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

Route::get('/', 'HomeCtrl@index')->name('home.index');

Route::get('/profile', 'HomeCtrl@profile')->name('profile.index');
Route::get('/program/{q}', 'HomeCtrl@program')->name('program.index');
Route::get('/ekskul', 'HomeCtrl@ekskul')->name('ekskul.index');
Route::get('/pendaftaran', 'HomeCtrl@pendaftaran')->name('pendaftaran.index');

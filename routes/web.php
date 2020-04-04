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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/admin/login', 'AdminCtrl@login')->name('admin.login');
    Route::post('/admin/login-proses', 'AdminCtrl@login_proses')->name('admin.login.proses');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', 'AdminCtrl@index')->name('admin.dashboard');
    Route::get('/admin/program', 'AdminCtrl@program')->name('admin.program');

    // Setting
    Route::get('/admin/setting', 'AdminCtrl@setting')->name('admin.setting');
    Route::post('/admin/upload-banner', 'AdminCtrl@upload_banner')->name('admin.upload.banner');
    Route::get('/admin/hapus-banner/{key}', 'AdminCtrl@hapus_banner')->name('admin.hapus.banner');
    Route::post('/admin/update-kepsek', 'AdminCtrl@update_kepsek')->name('admin.update.kepsek');
    
    Route::get('/admin/logout', 'AdminCtrl@logout')->name('admin.logout');
});

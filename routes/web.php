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

// //make a push notification.
// Route::get('/push','PushController@push')->name('push');
// //store a push subscriber.
// Route::post('/push-store','PushController@store');

Route::get('/', 'HomeCtrl@index')->name('home.index');

Route::get('/profile', 'HomeCtrl@profile')->name('profile.index');
Route::get('/program/{q}', 'HomeCtrl@program')->name('program.index');
Route::get('/ekskul', 'HomeCtrl@ekskul')->name('ekskul.index');
Route::get('/pendaftaran', 'HomeCtrl@pendaftaran')->name('pendaftaran.index');
Route::post('/pendaftaran-proses', 'HomeCtrl@pendaftaran_proses')->name('pendaftaran.proses');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/admin/login', 'AdminCtrl@login')->name('admin.login');
    Route::post('/admin/login-proses', 'AdminCtrl@login_proses')->name('admin.login.proses');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', 'AdminCtrl@index')->name('admin.dashboard');


    Route::get('/admin/teacher', 'AdminCtrl@teacher')->name('admin.teacher');
    Route::get('/admin/teacher-add', 'AdminCtrl@teacher_add')->name('admin.teacher.add');
    Route::post('/admin/teacher-add-proses', 'AdminCtrl@teacher_add_proses')->name('admin.teacher.add.proses');

    Route::get('/admin/extrakurikuler', 'AdminCtrl@ekskul')->name('admin.ekskul');
    Route::get('/admin/extrakurikuler-add', 'AdminCtrl@ekskul_add')->name('admin.ekskul.add');
    Route::post('/admin/extrakurikuler-add-proses', 'AdminCtrl@ekskul_add_proses')->name('admin.ekskul.add.proses');

    Route::get('/admin/program', 'AdminCtrl@program')->name('admin.program');
    Route::get('/admin/program-add', 'AdminCtrl@program_add')->name('admin.program.add');
    Route::post('/admin/program-add-proses', 'AdminCtrl@program_add_proses')->name('admin.program.add.proses');
    Route::get('/admin/program-delete/{id}', 'AdminCtrl@program_delete')->name('admin.program.delete');

    // Setting
    Route::get('/admin/setting', 'AdminCtrl@setting')->name('admin.setting');
    Route::post('/admin/upload-banner', 'AdminCtrl@upload_banner')->name('admin.upload.banner');
    Route::get('/admin/hapus-banner/{key}', 'AdminCtrl@hapus_banner')->name('admin.hapus.banner');
    Route::post('/admin/update-kepsek', 'AdminCtrl@update_kepsek')->name('admin.update.kepsek');
    Route::post('/admin/program_upload', 'AdminCtrl@program_upload')->name('admin.program.upload');
    
    Route::get('/admin/logout', 'AdminCtrl@logout')->name('admin.logout');
});

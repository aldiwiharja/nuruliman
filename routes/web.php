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

Route::post('/masuk', 'HomeCtrl@siswa_masuk')->name('siswa.masuk');
Route::get('/user_guide', 'HomeCtrl@user_guide')->name('user.guide');


Route::group(['middleware' => ['siswa']], function () {
    Route::get('/', 'HomeCtrl@index')->name('home.index');
    
    Route::get('/keluar', 'HomeCtrl@siswa_keluar')->name('siswa.keluar');
    
    Route::get('/profile', 'HomeCtrl@profile')->name('profile.index');
    Route::get('/program/{q}', 'HomeCtrl@program')->name('program.index');
    Route::get('/ekskul', 'HomeCtrl@ekskul')->name('ekskul.index');
    Route::get('/pendaftaran', 'HomeCtrl@pendaftaran')->name('pendaftaran.index');
    Route::post('/pendaftaran-proses', 'HomeCtrl@pendaftaran_proses')->name('pendaftaran.proses');
    Route::get('/persyaratan', 'HomeCtrl@persyaratan')->name('persyaratan.index');
    Route::get('/rincian-biaya', 'HomeCtrl@rincian_biaya')->name('rincian.biaya.index');
    Route::get('/generate-rincian-biaya', 'HomeCtrl@generate_rincian_biaya')->name('generate.rincian.biaya');
    Route::get('/generate-persyaratan', 'HomeCtrl@generate_persyaratan')->name('generate.persyaratan');
});

Route::group(['middleware' => ['auth', 'siswa']], function () {
    Route::get('/sukses-pendaftaran', 'HomeCtrl@sukses_pendaftaran')->name('sukses.pendaftaran');
    Route::get('/generate-formulir', 'HomeCtrl@generate_formulir')->name('generate.formulir');
    Route::get('/generate-pdf', 'HomeCtrl@generate_pdf')->name('generate.pdf');
    Route::get('/sukses-pembayaran', 'HomeCtrl@sukses_pembayaran')->name('sukses.pembayaran');
    Route::post('/konfirmasi-pembayaran', 'HomeCtrl@konfirmasi_pembayaran')->name('konfirmasi.pembayaran');
    Route::get('/pembayaran', 'HomeCtrl@pembayaran')->name('pembayaran');

    Route::post('/upload-ktp', 'HomeCtrl@upload_ktp')->name('upload.ktp');
    Route::post('/upload-kk', 'HomeCtrl@upload_kk')->name('upload.kk');
    Route::post('/upload-ijazah', 'HomeCtrl@upload_ijazah')->name('upload.ijazah');
    Route::post('/upload-sk', 'HomeCtrl@upload_sk')->name('upload.sk');
    Route::get('/existing-docs', 'HomeCtrl@existing_docs')->name('existing.docs');
    Route::get('/document-modal', 'HomeCtrl@document_modal')->name('document.modal');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/admin/login', 'AdminCtrl@login')->name('admin.login');
    Route::post('/admin/login-proses', 'AdminCtrl@login_proses')->name('admin.login.proses');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/dashboard', 'AdminCtrl@index')->name('admin.dashboard');

    Route::get('/mark-as-read/{id}', 'AdminCtrl@mark_as_read')->name('mark.as.read');

    Route::post('/store-device-token', 'AdminCtrl@store_device_token')->name('store.device.token');
    Route::get('/admin/siswa','AdminCtrl@siswa')->name('admin.siswa');
    Route::get('/admin/siswa-edit/{id}','AdminCtrl@siswa_edit')->name('admin.siswa.edit');
    Route::get('admin/generate-pdf/{id}', 'AdminCtrl@admin_generate_pdf')->name('admin.generate.pdf');
    Route::get('/admin/siswa-detail/{id}','AdminCtrl@siswa_detail')->name('admin.siswa.detail');
    Route::get('/admin/siswa-delete/{id}','AdminCtrl@siswa_delete')->name('admin.siswa.delete');
    Route::post('/admin/siswa-edit-proses','AdminCtrl@siswa_edit_proses')->name('admin.siswa.edit.proses');
    Route::get('/admin/siswa-document/{id}','AdminCtrl@siswa_document')->name('admin.siswa.document');


    // payment
    Route::get('/admin/payment','AdminCtrl@payment')->name('admin.payment');
    Route::get('/admin/payment-approve/{id}','AdminCtrl@payment_approve')->name('admin.payment.approve');
    Route::get('/admin/payment-invoice/{id}','AdminCtrl@payment_invoice')->name('admin.payment.invoice');

    // guru
    Route::get('/admin/teacher', 'AdminCtrl@teacher')->name('admin.teacher');
    Route::get('/admin/teacher-add', 'AdminCtrl@teacher_add')->name('admin.teacher.add');
    Route::post('/admin/teacher-add-proses', 'AdminCtrl@teacher_add_proses')->name('admin.teacher.add.proses');
    Route::get('/admin/teacher-edit/{id}', 'AdminCtrl@teacher_edit')->name('admin.teacher.edit');
    Route::post('/admin/teacher-edit-proses', 'AdminCtrl@teacher_edit_proses')->name('admin.teacher.edit.proses');
    Route::get('/admin/teacher-delete/{id}', 'AdminCtrl@teacher_delete')->name('admin.teacher.delete');

    // ekskul
    Route::get('/admin/extrakurikuler', 'AdminCtrl@ekskul')->name('admin.ekskul');
    Route::get('/admin/extrakurikuler-add', 'AdminCtrl@ekskul_add')->name('admin.ekskul.add');
    Route::post('/admin/extrakurikuler-add-proses', 'AdminCtrl@ekskul_add_proses')->name('admin.ekskul.add.proses');

    Route::get('/admin/extrakurikuler-detail/{id}', 'AdminCtrl@ekskul_detail')->name('admin.ekskul.detail');
    Route::get('/admin/extrakurikuler-delete/{id}', 'AdminCtrl@ekskul_delete')->name('admin.ekskul.delete');

    // program
    Route::get('/admin/program', 'AdminCtrl@program')->name('admin.program');
    Route::get('/admin/program-add', 'AdminCtrl@program_add')->name('admin.program.add');
    Route::post('/admin/program-add-proses', 'AdminCtrl@program_add_proses')->name('admin.program.add.proses');
    Route::get('/admin/program-edit/{id}', 'AdminCtrl@program_edit')->name('admin.program.edit');
    Route::post('/admin/program-edit-proses', 'AdminCtrl@program_edit_proses')->name('admin.program.edit.proses');
    Route::get('/admin/program-delete/{id}', 'AdminCtrl@program_delete')->name('admin.program.delete');

    // Setting
    Route::get('/admin/setting', 'AdminCtrl@setting')->name('admin.setting');
    Route::post('/admin/upload-banner', 'AdminCtrl@upload_banner')->name('admin.upload.banner');
    Route::get('/admin/hapus-banner/{key}', 'AdminCtrl@hapus_banner')->name('admin.hapus.banner');
    Route::post('/admin/update-kepsek', 'AdminCtrl@update_kepsek')->name('admin.update.kepsek');
    Route::post('/admin/program_upload', 'AdminCtrl@program_upload')->name('admin.program.upload');
    Route::post('/admin/profile-update', 'AdminCtrl@profile_update')->name('admin.profile.update');

    // biaya
    Route::get('admin/biaya', 'AdminCtrl@biaya')->name('admin.biaya');
    Route::get('admin/biaya-add', 'AdminCtrl@biaya_add')->name('admin.biaya.add');
    Route::post('admin/biaya-add-proses', 'AdminCtrl@biaya_add_proses')->name('admin.biaya.add.proses');
    Route::get('admin/biaya-edit/{id}', 'AdminCtrl@biaya_edit')->name('admin.biaya.edit');
    Route::post('admin/biaya-edit-proses', 'AdminCtrl@biaya_edit_proses')->name('admin.biaya.edit.proses');
    Route::get('admin/biaya-hapus/{id}', 'AdminCtrl@biaya_hapus')->name('admin.biaya.hapus');

    // Biaya bulanan
    Route::get('admin/biaya-bulanan', 'AdminCtrl@biaya_bulanan')->name('admin.biaya.bulanan');
    Route::post('admin/admi-biaya-bulanan-attr', 'AdminCtrl@biaya_bulanan_attr')->name('admin.biaya.bulanan.attr');
    Route::get('admin/admi-biaya-bulanan-hapus-attr/{attr}', 'AdminCtrl@biaya_bulanan_hapus_attr')->name('admin.biaya.bulanan.hapus.attr');

    Route::post('admin/update-price', 'AdminCtrl@admin_update_price')->name('admin.update.price');

    // Berita
    Route::get('admin/berita', 'AdminCtrl@berita')->name('admin.berita');
    Route::post('admin/berita-add', 'AdminCtrl@berita_add')->name('admin.berita.add');
    Route::get('admin/berita-delete/{id}', 'AdminCtrl@berita_delete')->name('admin.berita.delete');

    // Whatsapp
    Route::get('admin/whatsapp', 'AdminCtrl@whatsapp')->name('admin.whatsapp');
    Route::post('admin/whatsapp-update', 'AdminCtrl@whatsapp_update')->name('admin.whatsapp.update');
    
    Route::get('/admin/logout', 'AdminCtrl@logout')->name('admin.logout');

    
});

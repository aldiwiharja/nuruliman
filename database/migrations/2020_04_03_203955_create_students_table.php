<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tgl_masuk');
            $table->string('program');
            $table->string('nama_siswa');
            $table->string('nisn_siswa');
            $table->string('tmpt_lahir_siswa');
            $table->string('tgl_lahir_siswa');
            $table->string('agama');
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->string('no_ijazah');
            $table->string('no_skhun');
            $table->string('no_hp');
            $table->string('asal_sekolah');
            $table->string('niss');
            $table->string('kampung_sekolah');
            $table->string('desa_sekolah');
            $table->string('kec_sekolah');
            $table->string('kota_sekolah');
            $table->string('prov_sekolah');
            $table->string('nama_ayah');
            $table->string('tmpt_lahir_ayah');
            $table->string('tgl_lahir_ayah');
            $table->string('no_hp_ayah');
            $table->string('nama_ibu');
            $table->string('tmpt_lahir_ibu');
            $table->string('tgl_lahir_ibu');
            $table->string('no_hp_ibu');
            $table->string('no_kk');
            $table->string('kampung_org_tua');
            $table->string('rt_rw_org_tua');
            $table->string('desa_org_tua');
            $table->string('kec_org_tua');
            $table->string('kota_org_tua');
            $table->string('prov_org_tua');
            $table->string('nama_sdr');
            $table->string('status_sdr');
            $table->string('no_hp_sdr');
            $table->string('alamat_sdr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

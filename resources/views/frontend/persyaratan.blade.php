@extends('frontend.layouts.app')

@section('content')
    <style>
        #line {
            height: 1px;
            position: relative;
            background: #333;
        }
    </style>
    <section>   
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('pdf/persyaratan.pdf') }}" class="btn btn-info mb-2" download>
                        <i class="fa fa-file-pdf-o"></i> Download Persyaratan
                    </a>
                    <div class="card">
                        <div class="card-header text-white" id="card-head">
                            <h4>PERSYARATAN</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <b>PERSYARATAN DATA YANG HARUS DI BAWA <i class="fa fa-check"></i></b>
                                    <hr id="line">
                                    <ol>
                                        <li>Potocopy Ijazah SD/SMP</li>
                                        <li>Potocopy SKHUN</li>
                                        <li>Potocopy Kartu Keluarga (KK)</li>
                                        <li>Potocopy KTP (Orang Tua)</li>
                                        <li>Pas Photo 2x3 (6 Lembar)</li>
                                        <li>Pas Photo 3x4 (6 Lembar)</li>
                                        <li>Photocopy Akte</li>
                                        <li>Surat Pindah</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <b>PERALATAN YANG HARUS DIBAWA (LAKI - LAKI) <i class="fa fa-check"></i></b>
                                    <hr id="line">
                                    <ol>
                                        <li>Alat Tulis</li>
                                        <li>Alat Mandi</li>
                                        <li>Alat Makan</li>
                                        <li>Koko Hitam & Putih</li>
                                        <li>Sarung</li>
                                        <li>Al-Qur’an</li>
                                        <li>Selimut</li>
                                        <li>Baju Sehari Hari</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <b>PERALATAN YANG HARUS DIBAWA (PEREMPUAN) <i class="fa fa-check"></i></b>
                                    <hr id="line">
                                    <ol>
                                        <li>Alat Tulis</li>
                                        <li>Alat Mandi</li>
                                        <li>Alat Makan</li>
                                        <li>Mukena Putih (2 Pasang)</li>
                                        <li>Gamis Putih & Hitam</li>
                                        <li>Sarung</li>
                                        <li>Al-Qur’an</li>
                                        <li>Kerudung Putih & Hitam</li>
                                        <li>Selimut</li>
                                        <li>Baju Sehari Hari</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

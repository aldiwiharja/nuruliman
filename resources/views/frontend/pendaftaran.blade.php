@extends('frontend.layouts.app')

@section('content')
    <style>
        .modal-body{
            height: 450px;
            overflow-y: auto;
        }
    </style>
    <section>
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <button class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">
                        <i class="fa fa-money"></i> Lihat Rincian Biaya
                    </button>
                </div>
            </div>
            <form action="{{ route('pendaftaran.proses') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-success p-5">
                                <h3 class="text-center text-white">FORMULIR SANTRI/PESERTA DIDIK BARU</h3>
                            </div>
                            <div class="card-body">
                                @php
                                    $day = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
                                    $month = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                                @endphp
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Tanggal Masuk</label>
                                        <input type="text" class="form-control" name="tgl_masuk" id="tanggalMasuk" autocomplete="off">
                                    </div>
                                    <div class="col-md-7">
                                        <label>Pilih Program</label><br>
                                        <div class="d-sm-block d-md-inline">
                                            @foreach ($programs as $key => $p)
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadio{{ $key }}" name="program" value="{{ $p->name }}" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio{{ $key }}">{{ $p->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2">
                                        <label>Pindah Ke Kelas</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="pindah-kelas" id="yaPindah">
                                            <label class="form-check-label" for="yaPindah">Ya</label>
                                        </div>
                                        <div class="input-group input-group-sm" id="pindah-kelas">
                                            <input type="number"  placeholder="Tingkat" class="form-control">
                                            <input type="text"  placeholder="Program" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h3>1. IDENTITAS CALON SANTRI/PESERTA DIDIK</h3>
                                        <table class="table">
                                            <tr>
                                                <td>a. Nama Lengkap</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="nama_siswa">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>b. Jenis Kelamin</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="laki-laki" name="jenis_kelamin" value="laki-laki" class="custom-control-input">
                                                        <label class="custom-control-label" for="laki-laki">Laki-Laki</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" class="custom-control-input">
                                                        <label class="custom-control-label" for="perempuan">Perempuan</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>c. NISN</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="nisn_siswa">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>d. Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="tmpt_lahir_siswa">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="tgl_lahir_siswa" id="tglLahirSiswa">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>e. Agama</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="agama">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>f. Tinggi / Berat Badan</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <input type="text" class="form-control" name="tinggi_badan">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <span>/</span>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" class="form-control" name="berat_badan">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>g. No Ijazah Sebelumnya</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="no_ijazah">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>h. No SKHUN Sebelumnya</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="no_skhun">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>i. No Handphone</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="no_hp">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h3>2. ASAL SEKOLAH</h3>
                                        <table class="table">
                                            <tr>
                                                <td>a. Nama Sekolah</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="asal_sekolah">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>b. NISS / NPSS</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="niss">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>c. Alamat Sekolah</td>
                                                <td></td>
                                                <td>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Kampung</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="kampung_sekolah">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Desa</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="desa_sekolah">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="kec_sekolah">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="kota_sekolah">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="prov_sekolah">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h3>3. IDENTITAS ORANG TUA</h3>
                                        <table class="table">
                                            <tr>
                                                <td>1. Nama Ayah</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="nama_ayah">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="tmpt_lahir_ayah">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="tgl_lahir_ayah" id="tglLahirAyah">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="no_hp_ayah">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2. Nama Ibu</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="nama_ibu">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="tmpt_lahir_ibu">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="tgl_lahir_ibu" id="tglLahirIbu">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="no_hp_ibu">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; No KK</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="no_kk">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3. Alamat Tempat Tinggal</td>
                                                <td></td>
                                                <td>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Kampung</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="kampung_org_tua">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; RT / RW</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="rt_rw_org_tua">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Desa / Kelurahan</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="desa_org_tua">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="kec_org_tua">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="kota_org_tua">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="prov_org_tua">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4. Saudara Yang Bisa Di Hubungi</td>
                                                <td></td>
                                                <td>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Nama</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="nama_sdr">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Status Hubungan</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="status_sdr">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="no_hp_sdr">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Alamat</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" class="form-control" name="alamat_sdr">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-lg btn-success btn-block">PROSES PENDAFATARAN</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Rincian Biaya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @php
                  $data_atas = [
                      [
                          "name" => "PENDAFTARAN",
                          "nominal" => 700000
                      ],
                      [
                          "name" => "INFAK BANGUNAN",
                          "nominal" => 1250000
                      ],
                      [
                          "name" => "KEORGANISASIAN",
                          "nominal" => 250000
                      ],
                      [
                          "name" => "KITAB",
                          "nominal" => 700000
                      ],
                      [
                          "name" => "BAJU (SERAGAM) KOTAK-KOTAK",
                          "nominal" => 80000
                      ],
                      [
                          "name" => "BAJU PUTIH (SERAGAM SEKOLAH)",
                          "nominal" => 250000
                      ],
                      [
                          "name" => "BAJU OLAH RAGA",
                          "nominal" => 85000
                      ],
                      [
                          "name" => "KASUR BANTAL",
                          "nominal" => 300000
                      ],
                      [
                          "name" => "LEMARI",
                          "nominal" => 300000
                      ],
                      [
                          "name" => "PAPAN NAMA",
                          "nominal" => 25000
                      ],
                      [
                          "name" => "KARTU SANTRI",
                          "nominal" => 25000
                      ],
                      [
                          "name" => "TEST PSIKOLOGI",
                          "nominal" => 200000
                      ],
                      [
                          "name" => "KERUDUNG",
                          "nominal" => 60000
                      ],
                      [
                          "name" => "NASI",
                          "nominal" => 330000
                      ],
                  ];
              @endphp
              <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            <h4>
                                ANGGARAN BIAYA PENDAFATARAN SANTRI BARU <br>
                                PONDOK PESANTREN SALAFI MODERN <br>
                                NURUL IMAN AL-HASANAH TAHUN 2020/2021
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>DAFTAR PEMBIAYAAN</th>
                                    <th>NOMINAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($data_atas as $key => $da)
                                    @php
                                        $total += $da['nominal'];
                                    @endphp
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $da['name'] }}</td>
                                        <td align="right">{{ number_format($da['nominal']) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" align="center">
                                        <b>TOTAL</b>
                                    </td>
                                    <td align="right"><b>{{ number_format($total) }}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="5" align="center">
                                        <b>ANGGARAN PERBULAN</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>NO</td>
                                    <td colspan="2" align="center">SMK/MA</td>
                                    <td colspan="2" align="center">SMP/MTS</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>NASI</td>
                                    <td align="right">200,000</td>
                                    <td>NASI</td>
                                    <td align="right">200,000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>LISTRIK</td>
                                    <td align="right">30,000</td>
                                    <td>LISTRIK</td>
                                    <td align="right">30,000</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>AIR MINUM</td>
                                    <td align="right">30,000</td>
                                    <td>AIR MINUM</td>
                                    <td align="right">30,000</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>KEBERSIHAN</td>
                                    <td align="right">25,000</td>
                                    <td>KEBERSIHAN</td>
                                    <td align="right">25,000</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>LAB KOMPUTER</td>
                                    <td align="right">25,000</td>
                                    <td>LAB KOMPUTER</td>
                                    <td align="right">25,000</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>EXTRAKURIKULER</td>
                                    <td align="right">20,000</td>
                                    <td>EXTRAKURIKULER</td>
                                    <td align="right">20,000</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>SPP</td>
                                    <td align="right">50,000</td>
                                    <td>SPP</td>
                                    <td align="right">25,000</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>LAUNDRY</td>
                                    <td align="right">70,000</td>
                                    <td>LAUNDRY</td>
                                    <td align="right">70,000</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>KAS</td>
                                    <td align="right">5,000</td>
                                    <td>KAS</td>
                                    <td align="right">5,000</td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td><b>TOTAL</b></td>
                                    <td align="right">455,000</td>
                                    <td><b>TOTAL</b></td>
                                    <td align="right">430,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $('#tglLahirSiswa').datepicker({
            calendarWeeks: true,
            format: 'dd mmm yyyy', 
            uiLibrary: 'bootstrap4'
        });

        $('#tglLahirAyah').datepicker({
            calendarWeeks: true,
            format: 'dd mmm yyyy', 
            uiLibrary: 'bootstrap4'
        });

        $('#tglLahirIbu').datepicker({
            calendarWeeks: true,
            format: 'dd mmm yyyy', 
            uiLibrary: 'bootstrap4'
        });

        $('#tanggalMasuk').datepicker({
            calendarWeeks: true,
            format: 'dd mmm yyyy', 
            uiLibrary: 'bootstrap4'
        });

        $('#pindah-kelas').hide();
        $("#yaPindah").click(function () {
            if ($(this).is(":checked")) {
                $('#pindah-kelas').show();
            }else{
                $('#pindah-kelas').hide();
            }
        });
    </script>
@endsection
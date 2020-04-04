@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-success">
                            <h3 class="text-center text-white">FORMULIR SANTRI/PESERTA DIDIK BARU</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Tanggal Masuk</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="">TGL/BLN/THN</span>
                                        </div>
                                        <select class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                        <select class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <input type="text" class="form-control" value="2021" readonly>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <label>Pilih Program</label><br>
                                    <div class="d-sm-block d-md-inline">
                                        @foreach ($programs as $key => $p)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio{{ $key }}" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio{{ $key }}">{{ $p->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">

                                </div>
                                <div class="col-md-2">
                                    <label>Pindah Ke Kelas</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="">A</span>
                                        </div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">

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
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>b. Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="laki-laki" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="laki-laki">Laki-Laki</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="perempuan" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="perempuan">Perempuan</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>c. NISN</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>d. Tempat Tanggal Lahir</td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text" id="">Bogor</span>
                                                    </div>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>e. Agama</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>f. Tinggi / Berat Badan</td>
                                            <td>:</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <span>/</span>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>g. No Ijazah Sebelumnya</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>h. No SKHUN Sebelumnya</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>i. No Handphone</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
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
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>b. NISS / NPSS</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>c. Alamat Sekolah</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Kampung</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Desa</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
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
                                            <td><b>1. Nama Ayah</b></td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Tempat Tanggal Lahir</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>2. Nama Ibu</b></td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Tempat Tanggal Lahir</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; No KK</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>3. Alamat Tempat Tinggal</b></td>
                                            <td></td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Kampung</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; RT / RW</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Desa / Kelurahan</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>4. Saudara Yang Bisa Di Hubungi</b></td>
                                            <td></td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Nama</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Status</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp; Alamat</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
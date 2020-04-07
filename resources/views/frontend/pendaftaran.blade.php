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
            @if (Auth::check())
                @if (Auth::user()->role !== "admin")
                    @php
                        $student_id = explode('-',Auth::user()->name)[0];
                        $payment = \App\Payment::where('student_id', $student_id)->first();
                    @endphp
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-info text-center">
                                <h1>Terimakasih anda sudah melakukan pendaftaran.</h1>
                                <hr>

                                @if ($payment->status == 0)
                                    <div class="mb-2" style="border: dashed; padding: 20px; width: 50%; margin: 0 auto;">
                                        <h3 class="text-danger">Status: Belum Bayar</h3>
                                    </div>
                                    <h2>Silahkan lakukan pembayaran !</h2>
                                    <div class="p-3">
                                        <a href="{{ route('pembayaran') }}" class="btn btn-danger">
                                            BAYAR SEKARANG
                                        </a>
                                    </div>
                                @elseif ($payment->status == 1)
                                    <div class="mb-2" style="border: dashed; padding: 20px; width: 50%; margin: 0 auto;">
                                        <h3 class="text-danger">Status: Sudah Bayar</h3>
                                    </div>
                                    <h2>Pembayaran anda sudah kami terima</h2>
                                    <b>Untuk informasi selanjutnya silahkan hubungi admin melalui 
                                        @php
                                            $wa = json_decode(\App\Setting::where('key', 'whatsapp_setting')->first()->value);
                                            $url = "https://api.whatsapp.com/send?phone=".$wa[0]."&text=saya%20sudah%20bayar%20mohon%20informasi%20selanjutnya.";
                                        @endphp
                                        <a href="{{ $url }}" target="_blank">whatsapp</a>
                                    </b>
                                @elseif ($payment->status == 2)
                                    <div class="mb-2" style="border: dashed; padding: 20px; width: 50%; margin: 0 auto;">
                                        <h3 class="text-danger">Status: Sudah Bayar</h3>
                                    </div>
                                    <h2>Pemabayaran anda sedang kami proses</h2>
                                    <div class="p-3">
                                        <a href="{{ route('sukses.pembayaran') }}" class="btn btn-success">
                                            LIHAT PEMBAYARAN
                                        </a>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <form action="{{ route('pendaftaran.proses') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="bg-success">
                                    <div class="row">
                                        <div class="col">
                                            <div class="text-center">
                                                <img src="{{ url('uploads/admin/logo/head_form.jpg') }}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Tanggal Daftar</label>
                                            <input type="text" class="form-control" value="{{ old('tgl_masuk') }}" name="tgl_masuk" id="tanggalMasuk" autocomplete="off">
                                            @error('tgl_masuk')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-7">
                                            <label>Pilih Program</label><br>
                                            <div class="d-sm-block d-md-inline">
                                                @foreach ($programs as $key => $p)
                                                    @if ($p->kategori == "sekolah")
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="customRadio{{ $key }}" name="program" value="{{ $p->name }}" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio{{ $key }}">{{ $p->name }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <br>
                                            @error('program')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <label>Anda siswa pindahan ? <span class="badge badge-warning">Klik ya</span></label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"  name="pindah_status" id="yaPindah">
                                                <label class="form-check-label" for="yaPindah">Ya</label>
                                            </div>
                                            <div class="input-group input-group-sm" id="pindah-kelas">
                                                <input type="number" name="pindah_tingkat" value="{{ old('pindah_tingkat') }}" placeholder="Tingkat" class="form-control" >
                                                <select name="pindah_program" class="form-control" id="">
                                                    <option value="">--Pilih Program--</option>
                                                    @foreach ($programs as $key => $p)
                                                        @if ($p->kategori == "sekolah")
                                                            <option value="{{ $p->name }}">{{ $p->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <h3>1. IDENTITAS CALON SANTRI/PESERTA DIDIK</h3>
                                            <table class="table">
                                                <tr>
                                                    <td width="300">a. Nama Lengkap</td>
                                                    <td width="20">:</td>
                                                    <td>
                                                        <input type="text" class="form-control" value="{{ old('nama_siswa') }}" name="nama_siswa">
                                                        @error('nama_siswa')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>b. Jenis Kelamin</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="laki-laki"  name="jenis_kelamin" value="laki-laki" class="custom-control-input" >
                                                            <label class="custom-control-label" for="laki-laki">Laki-Laki</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" class="custom-control-input" >
                                                            <label class="custom-control-label" for="perempuan">Perempuan</label>
                                                        </div>
                                                        @error('jenis_kelamin')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>c. NISN</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="nisn_siswa" value="{{ old('nisn_siswa') }}" placeholder="Lewati jika tidak ada">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>d. Tempat Tanggal Lahir</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="text" value="{{ old('tmpt_lahir_siswa') }}" class="form-control" name="tmpt_lahir_siswa" placeholder="Contoh: Bogor" >
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group input-group">
                                                                    <select name="hari_lahir_siswa" id="hari_lahir_siswa" class="form-control">
                                                                        <option value="" disabled selected>--Pilih Hari--</option>
                                                                    </select>
                                                                    <select name="bulan_lahir_siswa" id="bulan_lahir_siswa" class="form-control">
                                                                        <option value="" disabled selected>--Pilih Bulan--</option>
                                                                    </select>
                                                                    <select name="tahun_lahir_siswa" id="tahun_lahir_siswa" class="form-control">
                                                                        <option value="" disabled selected>--Pilih Tahun--</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('tmpt_lahir_siswa')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        @error('hari_lahir_siswa')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        @error('bulan_lahir_siswa')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                        @error('tahun_lahir_siswa')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>e. Agama</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="agama" value="{{ old('agama') }}">
                                                        @error('agama')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>f. Tinggi / Berat Badan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <input type="number" class="form-control" name="tinggi_badan" value="{{ old('tinggi_badan') }}">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <span>/</span>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="number" class="form-control" name="berat_badan" value="{{ old('berat_badan') }}">
                                                            </div>
                                                        </div>
                                                        <small class="text-info">Lewati jika tidak tahu</small>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>g. No Ijazah Sebelumnya</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="no_ijazah" placeholder="Lewati jika tidak ada" value="{{ old('no_ijazah') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>h. No SKHUN Sebelumnya</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="no_skhun" placeholder="Lewati jika tidak ada" value="{{ old('no_skhun') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>i. No Handphone</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="no_hp" value="{{ old('no_hp') }}">
                                                        @error('no_hp')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
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
                                                    <td width="300">a. Nama Sekolah</td>
                                                    <td width="20">:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="asal_sekolah" value="{{ old('asal_sekolah') }}">
                                                        @error('asal_sekolah')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>b. NISS / NPSS</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Lewati jika tidak ada" name="niss" value="{{ old('niss') }}">
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
                                                        <textarea name="kampung_sekolah" id="" class="form-control" cols="6" rows="3" placeholder="Alamat lengkap">{{ old('kampung_sekolah') }}</textarea>
                                                        @error('kampung_sekolah')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="prov_sekolah" onchange="getKota(this.value)" id="prov_sekolah" class="form-control">
                                                            <option value="">--Pilih Provinsi--</option>
                                                        </select>
                                                        @error('prov_sekolah')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="kota_sekolah" onchange="getKecamatan(this.value)" id="kota_sekolah" class="form-control">
                                                            <option value="">--Pilih Kota--</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="kec_sekolah" onchange="getDesa(this.value)" id="kec_sekolah" class="form-control">
                                                            <option value="">--Pilih Kecamatan--</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Desa / Kelurahan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="desa_sekolah" id="desa_sekolah" class="form-control">
                                                            <option value="">--Pilih Desa--</option>
                                                        </select>
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
                                                    <td width="300">1. Nama Ayah</td>
                                                    <td width="20">:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="nama_ayah" value="{{ old('nama_ayah') }}">
                                                            @error('nama_ayah')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Tempat Tanggal Lahir</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="text" placeholder="Contoh: Bogor" class="form-control" name="tmpt_lahir_ayah" value="{{ old('tmpt_lahir_ayah') }}">
                                                                @error('tmpt_lahir_ayah')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group input-group">
                                                                    <select name="hari_lahir_ayah" id="hari_lahir_ayah" class="form-control">
                                                                        <option value="" disabled selected>--Pilih Hari--</option>
                                                                    </select>
                                                                    <select name="bulan_lahir_ayah" id="bulan_lahir_ayah" class="form-control">
                                                                        <option value="" disabled selected>--Pilih Bulan--</option>
                                                                    </select>
                                                                    <select name="tahun_lahir_ayah" id="tahun_lahir_ayah" class="form-control">
                                                                        <option value="" disabled selected>--Pilih Tahun--</option>
                                                                    </select>
                                                                </div>
                                                                @error('tmpt_lahir_ayah')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                                @error('hari_lahir_ayah')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                                @error('bulan_lahir_ayah')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                                @error('tahun_lahir_ayah')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="no_hp_ayah" value="{{ old('no_hp_ayah') }}">
                                                        @error('no_hp_ayah')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2. Nama Ibu</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="nama_ibu" value="{{ old('nama_ibu') }}">
                                                        @error('nama_ibu')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Tempat Tanggal Lahir</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="text" placeholder="Contoh: Bogor" class="form-control" name="tmpt_lahir_ibu" value="{{ old('tmpt_lahir_ibu') }}">
                                                                @error('tmpt_lahir_ibu')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="input-group input-group">
                                                                    <select name="hari_lahir_ibu" id="hari_lahir_ibu" class="form-control">
                                                                        <option value="" disabled selected>--Pilih Hari--</option>
                                                                    </select>
                                                                    <select name="bulan_lahir_ibu" id="bulan_lahir_ibu" class="form-control">
                                                                        <option value="" disabled selected>--Pilih Bulan--</option>
                                                                    </select>
                                                                    <select name="tahun_lahir_ibu" id="tahun_lahir_ibu" class="form-control">
                                                                        <option value="" disabled selected>--Pilih Tahun--</option>
                                                                    </select>
                                                                </div>
                                                                @error('tmpt_lahir_ibu')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                                @error('hari_lahir_ibu')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                                @error('bulan_lahir_ibu')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                                @error('tahun_lahir_ibu')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="no_hp_ibu" value="{{ old('no_hp_ibu') }}">
                                                        @error('no_hp_ibu')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; No KK</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="no_kk" value="{{ old('no_kk') }}">
                                                        @error('no_kk')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
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
                                                        <textarea name="kampung_org_tua" id="" class="form-control" cols="6" rows="3" placeholder="Alamat lengkap">{{ old('kampung_org_tua') }}</textarea>
                                                        @error('kampung_org_tua')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; RT / RW</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Contoh: RT001 / RW001" name="rt_rw_org_tua" value="{{ old('rt_rw_org_tua') }}">
                                                        @error('rt_rw_org_tua')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="prov_org_tua" onchange="getKotaOrg(this.value)" id="prov_org_tua" class="form-control">
                                                            <option value="">--Pilih Provinsi--</option>
                                                        </select>
                                                        @error('prov_org_tua')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="kota_org_tua" onchange="getKecOrg(this.value)" id="kota_org_tua" class="form-control">
                                                            <option value="">--Pilih Kota--</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="kec_org_tua" onchange="getDesaOrg(this.value)" id="kec_org_tua" class="form-control">
                                                            <option value="">--Pilih Kecamatan--</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Desa / Kelurahan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="desa_org_tua" id="desa_org_tua" class="form-control">
                                                            <option value="">--Pilih Desa--</option>
                                                        </select>
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
                                                        <input type="text" class="form-control" name="nama_sdr" value="{{ old('nama_sdr') }}">
                                                        @error('nama_sdr')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Status Hubungan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="status_sdr" value="{{ old('status_sdr') }}">
                                                        @error('status_sdr')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="no_hp_sdr" value="{{ old('no_hp_sdr') }}">
                                                        @error('no_hp_sdr')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp; Alamat</td>
                                                    <td>:</td>
                                                    <td>
                                                        <textarea name="alamat_sdr" class="form-control" cols="6" rows="3">{{ old('alamat_sdr') }}</textarea>
                                                        @error('alamat_sdr')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
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
            @endif
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
                            <h4>BIAYA AWAL</h4>
                            <hr id="line">
                            <div class="table-responsive">
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
                                        @foreach ($costs as $key => $co)
                                            @php
                                                $total += $co->price;
                                            @endphp
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $co->name }}</td>
                                                <td align="right">{{ number_format($co->price) }}</td>
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
                    </div>
                    <div class="row p-4">
                        <div class="col">
                            <h4>BIAYA PERBULAN</h4>
                            <hr id="line">
                            <div class="table-responsive">
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
                                        @php
                                            $type0 = [];
                                            $type1 = [];
                                            foreach ($monthly_fees as $key => $mf) {
                                                if ($mf->type == 0) {
                                                    array_push($type0, ['attr'=>$mf->attribute, 'price'=>$mf->price]);
                                                }
                                                if ($mf->type == 1) {
                                                    array_push($type1, ['attr'=>$mf->attribute, 'price'=>$mf->price]);
                                                }
                                            }
                                            $totalT0 = 0;
                                            foreach ($type0 as $key => $tt0) {
                                                $totalT0 += $tt0['price'];
                                            }
                                            $totalT1 = 0;
                                            foreach ($type1 as $key => $tt1) {
                                                $totalT1 += $tt1['price'];
                                            }
                                        @endphp


                                        @foreach ($type0 as $key => $t0)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $type0[$key]['attr'] }}</td>
                                                <td align="right">{{ number_format($type0[$key]['price']) }}</td>
                                                <td>{{ $type1[$key]['attr'] }}</td>
                                                <td align="right">{{ number_format($type1[$key]['price']) }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td>
                                            </td>
                                            <td><b>TOTAL</b></td>
                                            <td align="right">Rp. {{ number_format($totalT0) }}</td>
                                            <td><b>TOTAL</b></td>
                                            <td align="right">Rp. {{ number_format($totalT1) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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

    
        function getToken() {
            var result = "";
            $.ajax({
                url : "https://x.rajaapi.com/poe",
                type: "GET",
                dataType: "JSON",
                async: false,
                success: function(res){
                    result = res.token;
                }
            });
            return result;
        }

        var token = getToken();
        
        function getAllProvinsi(token) {
            $.ajax({
                url: "https://x.rajaapi.com/MeP7c5ne"+token+"/m/wilayah/provinsi",
                type: "GET",
                dataType: "JSON",
                success: function(result){
                    $.each(result.data, function(i, provinsi){
                        $('#prov_sekolah').append(`<option value="`+provinsi.id+'-'+provinsi.name+`">`+provinsi.name+`</option>`);
                        $('#prov_org_tua').append(`<option value="`+provinsi.id+'-'+provinsi.name+`">`+provinsi.name+`</option>`);
                    });
                }
            });
        }

        function getAllKotaByProvId(token, prov_id, attribute) {
            $.ajax({
                url: "https://x.rajaapi.com/MeP7c5ne"+token+"/m/wilayah/kabupaten?idpropinsi="+prov_id,
                type: "GET",
                dataType: "JSON",
                success: function(result){
                    $(attribute).empty();
                    $.each(result.data, function(i, kota){
                        $(attribute).append(`<option value="`+kota.id+'-'+kota.name+`">`+kota.name+`</option>`);
                        if (i == 0) {
                            if (attribute == "#kota_sekolah") {
                                getAllKecByKotaId(token, kota.id, "#kec_sekolah");
                            }
                            if (attribute == "#kota_org_tua") {
                                getAllKecByKotaId(token, kota.id, "#kec_org_tua");
                            }
                        }
                    });
                }
            });
        }

        function getAllKecByKotaId(token, kota_id, attribute) {
            $.ajax({
                url: "https://x.rajaapi.com/MeP7c5ne"+token+"/m/wilayah/kecamatan?idkabupaten="+kota_id,
                type: "GET",
                dataType: "JSON",
                success: function(result){
                    $(attribute).empty();
                    $.each(result.data, function(i, kecamatan){
                        $(attribute).append(`<option value="`+kecamatan.id+'-'+kecamatan.name+`">`+kecamatan.name+`</option>`);
                        if (i == 0) {
                            if (attribute == "#kec_sekolah") {
                                getAllDesaByKecId(token, kecamatan.id, "#desa_sekolah");
                            }
                            if (attribute == "#kec_org_tua") {
                                getAllDesaByKecId(token, kecamatan.id, "#desa_org_tua");
                            }
                        }
                    });
                }
            });
        }

        function getAllDesaByKecId(token, kec_id, attribute) {
            $.ajax({
                url: "https://x.rajaapi.com/MeP7c5ne"+token+"/m/wilayah/kelurahan?idkecamatan="+kec_id,
                type: "GET",
                dataType: "JSON",
                success: function(result){
                    $(attribute).empty();
                    $.each(result.data, function(i, desa){
                        $(attribute).append(`<option value="`+desa.id+'-'+desa.name+`">`+desa.name+`</option>`);
                    });
                }
            });
        }

        getAllProvinsi(token);

        // Event Change
        function getKota(value){
            let real_value = value.split('-')[0];
            getAllKotaByProvId(token, real_value, "#kota_sekolah");
            $('#kec_sekolah').html(`<option value="">--Pilih Kecamatan--</option>`);
            $('#desa_sekolah').html(`<option value="">--Pilih Desa--</option>`);
        }

        function getKecamatan(value){
            let real_value = value.split('-')[0];
            getAllKecByKotaId(token, real_value, "#kec_sekolah");
            $('#desa_sekolah').html(`<option value="">--Pilih Desa--</option>`);
        }

        function getDesa(value){
            let real_value = value.split('-')[0];
            getAllDesaByKecId(token, real_value, "#desa_sekolah");
        }

        function getKotaOrg(value){
            let real_value = value.split('-')[0];
            getAllKotaByProvId(token, real_value, "#kota_org_tua");
            $('#kec_org_tua').html(`<option value="">--Pilih Kecamatan--</option>`);
            $('#desa_org_tua').html(`<option value="">--Pilih Desa--</option>`);
        }

        function getKecOrg(value){
            let real_value = value.split('-')[0];
            getAllKecByKotaId(token, real_value, "#kec_org_tua");
            $('#desa_org_tua').html(`<option value="">--Pilih Desa--</option>`);
        }

        function getDesaOrg(value){
            let real_value = value.split('-')[0];
            getAllDesaByKecId(token, real_value, "#desa_org_tua")
        }
        
        
        function selectTempatTglLahir(id_hari, id_bulan, id_tahun) {
            // Hari
            for (let i = 1; i < 32; i++) {
                $(id_hari).append(`<option value="`+i+`">`+i+`</option>`);
            }
            // Bulan
            var bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Noverber","Desember"];
            bulan.forEach(b => {
                $(id_bulan).append(`<option value="`+b+`">`+b+`</option>`);
            });
            // Tahun
            var tahun_mulai = 1960;
            var data_tahun = [];
            for (let a = 0; a < 60; a++) {
                tahun_mulai++;
                data_tahun.push(tahun_mulai);
            }
            data_tahun.reverse();
            data_tahun.forEach(dt => {
                $(id_tahun).append(`<option value="`+dt+`">`+dt+`</option>`);
            });
        }

        selectTempatTglLahir("#hari_lahir_siswa","#bulan_lahir_siswa","#tahun_lahir_siswa");
        selectTempatTglLahir("#hari_lahir_ayah","#bulan_lahir_ayah","#tahun_lahir_ayah");
        selectTempatTglLahir("#hari_lahir_ibu","#bulan_lahir_ibu","#tahun_lahir_ibu");

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
@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Siswa</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.siswa') }}" class="btn btn-sm btn-primary mb-2">Kembali</a>
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('admin.siswa.edit.proses') }}" method="POST">
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
                                            <input type="hidden" name="id_siswa" value="{{ $student->id }}">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label>Tanggal Daftar</label>
                                                        <input type="text" class="form-control" value="{{ $student->tgl_masuk }}" name="tgl_masuk" id="tanggalMasuk" autocomplete="off" readonly>
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
                                                                        <input type="radio" id="customRadio{{ $key }}" name="program" value="{{ $p->name }}" @if ($p->name == $student->program) checked @endif class="custom-control-input">
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
                                                        @if ($student->pindah_status == 1)
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"  name="pindah_status" id="yaPindah">
                                                                <label class="form-check-label" for="yaPindah">Ya</label>
                                                            </div>
                                                            <div class="input-group input-group-sm" id="pindah-kelas">
                                                                <input type="number" name="pindah_tingkat" value="{{ $student->pindah_tingkat }}" placeholder="Tingkat" class="form-control" >
                                                                <select name="pindah_program" class="form-control" id="">
                                                                    <option value="">--Pilih Program--</option>
                                                                    @foreach ($programs as $key => $p)
                                                                        @if ($p->kategori == "sekolah")
                                                                            <option value="{{ $p->name }}" @if ($p->name == $student->pindah_program) selected @endif>{{ $p->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @else 
                                                            <b>Tidak</b>
                                                        @endif
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
                                                                    <input type="text" class="form-control" value="{{ $student->nama_siswa }}" name="nama_siswa">
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
                                                                        <input type="radio" id="laki-laki"  name="jenis_kelamin" @if ($student->jenis_kelamin == "laki-laki") checked @endif value="laki-laki" class="custom-control-input" >
                                                                        <label class="custom-control-label" for="laki-laki">Laki-Laki</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio custom-control-inline">
                                                                        <input type="radio" id="perempuan" name="jenis_kelamin" @if ($student->jenis_kelamin == "perempuan") checked @endif value="perempuan" class="custom-control-input" >
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
                                                                    <input type="text" class="form-control" name="nisn_siswa" value="{{ $student->nisn_siswa }}" placeholder="Lewati jika tidak ada">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>d. Tempat Tanggal Lahir</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <input type="text" value="{{ $student->tmpt_lahir_siswa }}" class="form-control" name="tmpt_lahir_siswa" placeholder="Contoh: Bogor" >
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{ $student->tgl_lahir_siswa }}" name="tgl_lahir_siswa" placeholder="Contoh: 31 Mei 1996">
                                                                        </div>
                                                                    </div>
                                                                    @error('tmpt_lahir_siswa')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                    @error('tgl_lahir_siswa')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>e. Agama</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="agama" value="{{ $student->agama }}">
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
                                                                            <input type="number" class="form-control" name="tinggi_badan" value="{{ $student->tinggi_badan }}">
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <span>/</span>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <input type="number" class="form-control" name="berat_badan" value="{{ $student->berat_badan }}">
                                                                        </div>
                                                                    </div>
                                                                    <small class="text-info">Lewati jika tidak tahu</small>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>g. No Ijazah Sebelumnya</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="no_ijazah" placeholder="Lewati jika tidak ada" value="{{ $student->no_ijazah }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>h. No SKHUN Sebelumnya</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="no_skhun" placeholder="Lewati jika tidak ada" value="{{ $student->no_skhun }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>i. No Handphone</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="number" class="form-control" name="no_hp" value="{{ $student->no_hp }}">
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
                                                                <td>a. Nama Sekolah</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="asal_sekolah" value="{{ $student->asal_sekolah }}">
                                                                    @error('asal_sekolah')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>b. NISS / NPSS</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="Lewati jika tidak ada" name="niss" value="{{ $student->niss }}">
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
                                                                    <textarea name="kampung_sekolah" id="" class="form-control" cols="6" rows="3" placeholder="Alamat lengkap">{{ $student->kampung_sekolah }}</textarea>
                                                                    @error('kampung_sekolah')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" value="{{ $student->prov_sekolah }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" value="{{ $student->kota_sekolah }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" value="{{ $student->kec_sekolah }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; Desa / Kelurahan</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" value="{{ $student->desa_sekolah }}">
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
                                                                    <input type="text" class="form-control" name="nama_ayah" value="{{ $student->nama_ayah }}">
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
                                                                            <input type="text" placeholder="Contoh: Bogor" class="form-control" name="tmpt_lahir_ayah" value="{{ $student->tmpt_lahir_ayah }}">
                                                                            @error('tmpt_lahir_ayah')
                                                                                <small class="text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="tgl_lahir_ayah" placeholder="Contoh: 31 Mei 1996" value="{{ $student->tgl_lahir_ayah }}" >
                                                                            @error('tgl_lahir_ayah')
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
                                                                    <input type="number" class="form-control" name="no_hp_ayah" value="{{ $student->no_hp_ayah }}">
                                                                    @error('no_hp_ayah')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2. Nama Ibu</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="nama_ibu" value="{{ $student->nama_ibu }}">
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
                                                                            <input type="text" placeholder="Contoh: Bogor" class="form-control" name="tmpt_lahir_ibu" value="{{ $student->tmpt_lahir_ibu }}">
                                                                            @error('tmpt_lahir_ibu')
                                                                                <small class="text-danger">{{ $message }}</small>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="tgl_lahir_ibu" placeholder="Contoh: 31 Mei 1996" value="{{ $student->tgl_lahir_ibu }}">
                                                                            @error('tgl_lahir_ibu')
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
                                                                    <input type="number" class="form-control" name="no_hp_ibu" value="{{ $student->no_hp_ibu }}">
                                                                    @error('no_hp_ibu')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; No KK</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="no_kk" value="{{ $student->no_kk }}">
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
                                                                    <textarea name="kampung_org_tua" id="" class="form-control" cols="6" rows="3" placeholder="Alamat lengkap">{{ $student->kampung_org_tua }}</textarea>
                                                                    @error('kampung_org_tua')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; RT / RW</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="Contoh: RT001 / RW001" name="rt_rw_org_tua" value="{{ $student->rt_rw_org_tua }}">
                                                                    @error('rt_rw_org_tua')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" value="{{ $student->prov_org_tua }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" value="{{ $student->kota_org_tua }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" value="{{ $student->kec_org_tua }}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; Desa / Kelurahan</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" value="{{ $student->desa_org_tua }}">
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
                                                                    <input type="text" class="form-control" name="nama_sdr" value="{{ $student->nama_sdr }}">
                                                                    @error('nama_sdr')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; Status Hubungan</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="text" class="form-control" name="status_sdr" value="{{ $student->status_sdr }}">
                                                                    @error('status_sdr')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <input type="number" class="form-control" name="no_hp_sdr" value="{{ $student->no_hp_sdr }}">
                                                                    @error('no_hp_sdr')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;&nbsp;&nbsp; Alamat</td>
                                                                <td>:</td>
                                                                <td>
                                                                    <textarea name="alamat_sdr" class="form-control" cols="6" rows="3">{{ $student->alamat_sdr }}</textarea>
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
                                    <button type="submit" class="btn btn-lg btn-success btn-block">UBAH DATA</button>
                                </div>
                            </div>
                                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </main>
@endsection
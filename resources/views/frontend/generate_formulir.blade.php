@extends('frontend.layouts.app')

@section('content')
    @php
        $user = Auth::user();
    @endphp
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="{{ route('download.pdf') }}" class="btn btn btn-success mb-2">
                        <i class="fa fa-file-pdf-o"></i> Download Formulir Anda
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    
                    @if ($student !== null)
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
                                        <p><b>{{ date('d M Y', strtotime($student->tgl_masuk)) }}</b></p>
                                    </div>
                                    <div class="col-md-7">
                                        <label>Pilih Program</label>
                                        <p><b>{{ $student->program }}</b></p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>Anda siswa pindahan ?</label>
                                        @if ($student->pindah_status == 1)
                                            <p><b>{{ $student->pindah_tingkat.' | '.$student->pindah_program }}</b></p>
                                        @else 
                                            <p><b>Tidak</b></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h3>1. IDENTITAS CALON SANTRI/PESERTA DIDIK</h3>
                                        <table class="table">
                                            <tr>
                                                <td width="350">a. Nama Lengkap</td>
                                                <td width="30">:</td>
                                                <td>
                                                    <b>{{ $student->nama_siswa }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>b. Jenis Kelamin</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->jenis_kelamin }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>c. NISN</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->nisn_siswa }}</b> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>d. Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->tmpt_lahir_siswa }}, {{ $student->tgl_lahir_siswa }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>e. Agama</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->agama }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>f. Tinggi / Berat Badan</td>
                                                <td>:</td>
                                                <td>
                                                    @if ($student->tinggi_badan !== null)
                                                        <b>TB: {{ $student->tinggi_badan }}, BB: {{ $student->berat_badan }}</b>
                                                    @else 
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>g. No Ijazah Sebelumnya</td>
                                                <td>:</td>
                                                <td>
                                                    @if ($student->no_ijazah !== null)
                                                        <b>{{ $student->no_ijazah }}</b>
                                                    @else 
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>h. No SKHUN Sebelumnya</td>
                                                <td>:</td>
                                                <td>
                                                    @if ($student->no_skhun !== null)
                                                        <b>{{ $student->no_skhun }}</b>
                                                    @else 
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>i. No Handphone</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->no_hp }}</b>
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
                                                <td width="350">a. Nama Sekolah</td>
                                                <td width="30">:</td>
                                                <td>
                                                    <b>{{ $student->asal_sekolah }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>b. NISS / NPSS</td>
                                                <td>:</td>
                                                <td>
                                                    @if ($student->niss !== null)
                                                        <b>{{ $student->niss }}</b>
                                                    @else 
                                                        -
                                                    @endif
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
                                                    <b>{{ $student->kampung_sekolah }}</b>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->prov_sekolah }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->kota_sekolah }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->kec_sekolah }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Desa / Kelurahan</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->desa_sekolah }}</b>
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
                                                <td width="350">1. Nama Ayah</td>
                                                <td width="30">:</td>
                                                <td>
                                                    <b>{{ $student->nama_ayah }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->tmpt_lahir_ayah }}, {{ $student->tgl_lahir_ayah }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->no_hp_ayah }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Pekerjaan Ayah</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->pekerjaan_ayah }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2. Nama Ibu</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->nama_ibu }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->tmpt_lahir_ibu }}, {{ $student->tgl_lahir_ibu }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->no_hp_ibu }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Pekerjaan Ibu</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->pekerjaan_ibu }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Penghasilan Orang Tua</td>
                                                <td>:</td>
                                                <td>
                                                    @if ($student->penghasilan_org_tua == "under1jt")
                                                        <b>Di Bawah 1 Juta</b>
                                                    @elseif ($student->penghasilan_org_tua == "under3jt")
                                                        <b>Di Bawah 3 Juta</b>
                                                    @elseif ($student->penghasilan_org_tua == "under5jt")
                                                        <b>Di Bawah 5 Juta</b>
                                                    @elseif ($student->penghasilan_org_tua == "upper5jt")
                                                        <b>Di Atas 5 Juta</b>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; No KK</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->no_kk }}</b>
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
                                                    <b>{{ $student->kampung_org_tua }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; RT / RW</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->rt_rw_org_tua }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->prov_org_tua }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->kota_org_tua }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->kec_org_tua }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Desa / Kelurahan</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->desa_org_tua }}</b>
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
                                                    <b>{{ $student->nama_sdr }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Status Hubungan</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->status_sdr }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->no_hp_sdr }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp; Alamat</td>
                                                <td>:</td>
                                                <td>
                                                    <b>{{ $student->alamat_sdr }}</b>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row mt-3 ml-3">
                                    <div class="col">
                                        <b>Bogor, {{ date('d M Y', strtotime($student->created_at)) }}</b>
                                        <p>Dengan ini saya bersedia mendaftar di pondok pesantren Nurul Iman Al Hasanah</p>
                                    </div>
                                </div>
                                <div class="row ml-3 mt-2 mr-3">
                                    <div class="col-md-4 text-center">
                                        <p>Siswa</p>
                                        <br>
                                        <br>
                                        ( .................. )
                                    </div>
                                    <div class="col">

                                    </div>
                                    <div class="col-md-4 text-center">
                                        <p>Orang Tua</p>
                                        <br>
                                        <br>
                                        ( .................. )
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-4 col-4">
                                        <small>PERSYARATAN DATA YANG HARUS DI BAWA</small>
                                        <small>
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
                                        </small>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <small>PERALATAN YANG HARUS DIBAWA (LAKI - LAKI)</small>
                                        <small>
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
                                        </small>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <small>PERALATAN YANG HARUS DIBAWA (PEREMPUAN)</small>
                                        <small>
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
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else 
                        <div class="alert alert-info text-center">
                            <h3>Anda belum melakukan pendafataran</h3>
                            <b>Untuk bisa melihat formulir ini anda harus mendaftar terlebih dahulu <i><a href="{{ route('pendaftaran.index') }}">Daftar</a></i></b>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>



    <!-- Modal -->
    <div class="modal fade" id="infoLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" style="width: 350px" role="document">
        <div class="modal-content border-0">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Informasi Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <table class="table">
                            <tr>
                                <td>email</td>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>password</td>
                                <td>:</td>
                                <td>123456</td>
                            </tr>
                        </table>
                        <b>Simpan akun ini untuk login di kemudian hari</b>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection



@section('script')
    @if (Session::has('msg'))
        <script>
            Swal.fire(
                'Terimaksih sudah melakukan pendaftaran',
                'Silahkan lakukan pembayaran',
                'info'
            );
            let dt = "{{ \App\User::where('role', 'admin')->first()->device_token }}";
            $.ajax({
                url: "https://api.pushy.me/push?api_key=61cd005dd4ef70809d7d1f9eb8c98008ad44499e1342b573f2953a4a3601e74b",
                type: "POST",
                dataType: "JSON",
                data: {
                    "to": dt,
                    "data": {
                        "message": "Calon siswa baru telah daftar silahkan cek di menu siswa"
                    }
                }
            });
        </script>
    @endif
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>PDF</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        .main {
            margin: 0 auto;
            width: 80%;
        }
        tr {
            border-bottom: 1pt solid black;
        }
    </style>
</head>

<body>

    <section class="main">
        <table style="margin-top: 5px">
            <tr>
                <td width="100">
                    <img src="{{ public_path('uploads/admin/logo/Nuruliman.png') }}" alt="" width="100">
                </td>
                <td>
                    <h2 style="text-align: center">FORMULIR PENDAFTARAN</h2>
                    <h3 style="text-align: center">SANTRI / PESERTA DIDIK BARU</h3>
                </td>
            </tr>
        </table>
        <hr>
        <table style="margin-top: 15px">
            <tr>
                <td width="200">Tanggal Daftar : {{ date('d M Y', strtotime($student->tgl_masuk)) }}</td>
                <td width="200">Program : {{ $student->program }}</td>
            </tr>
        </table>
        <table style="margin-top: 10px">
            <tr>
                <td>Pindahan : @if ($student->pindah_status == 1) {{ $student->pindah_tingkat.' | '.$student->pindah_program }} @else Tidak @endif</td>
            </tr>
        </table>
        <h5 style="margin-top: 20px">1. IDENTITAS CALON SANTRI/PESERTA DIDIK</h5>
        <table>
            <tr>
                <td width="200">a. Nama Lengkap</td>
                <td width="10">:</td>
                <td>
                    {{ $student->nama_siswa }}
                </td>
            </tr>
            <tr>
                <td>b. Jenis Kelamin</td>
                <td>:</td>
                <td>
                    {{ $student->jenis_kelamin }}
                </td>
            </tr>
            <tr>
                <td>c. NISN</td>
                <td>:</td>
                <td>
                    {{ $student->nisn_siswa }}
                </td>
            </tr>
            <tr>
                <td>d. Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>
                    {{ $student->tmpt_lahir_siswa }}, {{ $student->tgl_lahir_siswa }}
                </td>
            </tr>
            <tr>
                <td>e. Agama</td>
                <td>:</td>
                <td>
                    {{ $student->agama }}
                </td>
            </tr>
            <tr>
                <td>f. Tinggi / Berat Badan</td>
                <td>:</td>
                <td>
                    @if ($student->tinggi_badan !== null) TB: {{ $student->tinggi_badan }}, BB: {{ $student->berat_badan }} @else - @endif
                </td>
            </tr>
            <tr>
                <td>g. No Ijazah Sebelumnya</td>
                <td>:</td>
                <td>
                    @if ($student->no_ijazah !== null) {{ $student->no_ijazah }} @else - @endif
                </td>
            </tr>
            <tr>
                <td>h. No SKHUN Sebelumnya</td>
                <td>:</td>
                <td>
                    @if ($student->no_skhun !== null) {{ $student->no_skhun }} @else - @endif
                </td>
            </tr>
            <tr>
                <td>i. No Handphone</td>
                <td>:</td>
                <td>
                    {{ $student->no_hp }}
                </td>
            </tr>
        </table>
    
        <h5>2. ASAL SEKOLAH</h5>
        <table>
            <tr>
                <td width="200">a. Nama Sekolah</td>
                <td width="10">:</td>
                <td>
                    {{ $student->asal_sekolah }}
                </td>
            </tr>
            <tr>
                <td>b. NISS / NPSS</td>
                <td>:</td>
                <td>
                    @if ($student->niss !== null) {{ $student->niss }} @else - @endif
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
                    {{ $student->kampung_sekolah }}
                </td>
            </tr>
    
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                <td>:</td>
                <td>
                    {{ $student->prov_sekolah }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                <td>:</td>
                <td>
                    {{ $student->kota_sekolah }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                <td>:</td>
                <td>
                    {{ $student->kec_sekolah }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Desa / Kelurahan</td>
                <td>:</td>
                <td>
                    {{ $student->desa_sekolah }}
                </td>
            </tr>
    
        </table>
    
        <h5>3. IDENTITAS ORANG TUA</h5>
        <table>
            <tr>
                <td width="200">1. Nama Ayah</td>
                <td width="10">:</td>
                <td>
                    {{ $student->nama_ayah }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>
                    {{ $student->tmpt_lahir_ayah }}, {{ $student->tgl_lahir_ayah }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                <td>:</td>
                <td>
                    {{ $student->no_hp_ayah }}
                </td>
            </tr>
            <tr>
                <td>2. Nama Ibu</td>
                <td>:</td>
                <td>
                    {{ $student->nama_ibu }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>
                    {{ $student->tmpt_lahir_ibu }}, {{ $student->tgl_lahir_ibu }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                <td>:</td>
                <td>
                    {{ $student->no_hp_ibu }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; No KK</td>
                <td>:</td>
                <td>
                    {{ $student->no_kk }}
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
                    {{ $student->kampung_org_tua }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; RT / RW</td>
                <td>:</td>
                <td>
                    {{ $student->rt_rw_org_tua }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Provinsi</td>
                <td>:</td>
                <td>
                    {{ $student->prov_org_tua }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Kab / Kota</td>
                <td>:</td>
                <td>
                    {{ $student->kota_org_tua }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Kecamatan</td>
                <td>:</td>
                <td>
                    {{ $student->kec_org_tua }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Desa / Kelurahan</td>
                <td>:</td>
                <td>
                    {{ $student->desa_org_tua }}
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
                    {{ $student->nama_sdr }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Status Hubungan</td>
                <td>:</td>
                <td>
                    {{ $student->status_sdr }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; No Handphone</td>
                <td>:</td>
                <td>
                    {{ $student->no_hp_sdr }}
                </td>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp; Alamat</td>
                <td>:</td>
                <td>
                    {{ $student->alamat_sdr }}
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>
                    Bogor, {{ date('d M Y', strtotime($student->created_at)) }}
                </td>
            </tr>
            <tr>
                <td>Dengan ini saya bersedia mendaftar di pondok pesantren Nurul Iman Al Hasanah</td>
            </tr>
        </table>
        <table style="margin-top: 60px">
            <tr>
                <td align="center" width="240">
                    Siswa
                    <br>
                    <br>
                    <br>
                    ( ......... ) 
                </td>
                <td align="center" width="240">
                    Orang Tua
                    <br>
                    <br>
                    <br>
                    ( ......... ) 
                </td>
            </tr>
        </table>
    </section>


</body>

</html>
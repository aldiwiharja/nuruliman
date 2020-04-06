@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Siswa</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal daftar</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Program yang dipilih</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $key => $s)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $s->tgl_masuk }}</td>
                                        <td>{{ $s->nama_siswa }}</td>
                                        <td>{{ $s->jenis_kelamin }}</td>
                                        <td>{{ $s->program }}</td>
                                        <td>{{ $s->tgl_lahir_siswa }}</td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Lihat
                                            </a>
                                            <a href="" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </main>
@endsection
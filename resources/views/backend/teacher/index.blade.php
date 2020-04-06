@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Tenaga Pendidik</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pb-2">
                <a href="{{ route('admin.teacher.add') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Tenaga Pendidik
                </a>
            </div>
        <div class="tile">
            <div class="tile-body">
                <div class="col-lg-12">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Nama</th>
                                <th>Mengajar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $key => $t)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img src="{{ url($t->avatar) }}" alt="" class="img-fluid" width="150">
                                    </td>
                                    <td>{{ $t->name }}</td>
                                    <td>{{ $t->matpel }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('admin.teacher.delete', $t->id) }}" class="btn btn-danger btn-sm">
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
    </main>
@endsection
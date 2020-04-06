@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Program</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="pb-2">
            <a href="{{ route('admin.program.add') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Program
            </a>
        </div>
        <div class="tile">
            <div class="tile-body">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Program</th>
                            <th>Kategori Program</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $key => $p)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->kategori }}</td>
                                <td>{{ $p->description }}</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i> Lihat
                                    </a>
                                    <a href="#" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('admin.program.delete', $p->id) }}" class="btn btn-danger btn-sm">
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
    </main>
@endsection
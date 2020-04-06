@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>DAFTAR BIAYA</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="pb-2">
            <a href="{{ route('admin.biaya.add') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Biaya
            </a>
        </div>
        <div class="tile">
            <div class="tile-body">
                @if(Session::has('msg'))
                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                @endif
                <div class="row">
                    <div class="col">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($costs as $key => $c)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $c->name }}</td>
                                        <td>Rp. {{ number_format($c->price) }}</td>
                                        <td>
                                            <a href="{{ route('admin.biaya.edit', encrypt($c->id)) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('admin.biaya.hapus', encrypt($c->id)) }}" class="btn btn-danger btn-sm">
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
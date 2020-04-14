@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>DAFTAR BIAYA</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="pb-2">
            <a href="{{ route('admin.biaya.add') }}" class="btn nav-item btn-primary">
                <i class="fa fa-plus"></i> Tambah Biaya
            </a>
        </div>
        <div class="tile">
            <div class="tile-body">
                @if(Session::has('msg'))
                    @section('script')
                        {!! Session::get('msg') !!}
                    @endsection
                @endif
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
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
                                                <a href="" data-toggle="modal" data-target="#hapusBiaya{{ $c->id }}" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="hapusBiaya{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" style="width: 350px" role="document">
                                            <div class="modal-content border-0">
                                                <div class="modal-header" style="background: #009688">
                                                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Hapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row justify-content-center">
                                                        <div class="col-11">
                                                            <h5>Apakah anda yakin ingin menghapus ini ?</h5>
                                                            <a href="{{ route('admin.biaya.hapus', encrypt($c->id)) }}" class="btn btn-block nav-item btn-danger">Ya Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </main>
@endsection
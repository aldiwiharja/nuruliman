@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Program</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="pb-2">
            <a href="{{ route('admin.program.add') }}" class="btn btn-primary nav-item">
                <i class="fa fa-plus"></i> Tambah Program
            </a>
        </div>
        @if(Session::has('msg'))
            @section('script')
                {!! Session::get('msg') !!}
            @endsection
        @endif
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
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
                                    <td>{!! $p->description !!}</td>
                                    <td>
                                        <a href="{{ route('admin.program.edit', encrypt($p->id)) }}" class="btn btn-primary nav-item btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a href="" data-toggle="modal" data-target="#hapusProgram{{ $p->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="hapusProgram{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                    <a href="{{ route('admin.program.delete', $p->id) }}" class="btn nav-item btn-block btn-danger">Ya Hapus</a>
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
    </main>
@endsection
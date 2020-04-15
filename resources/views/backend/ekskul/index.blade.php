@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Ekskul</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="pb-2">
            <a href="{{ route('admin.ekskul.add') }}" class="btn nav-item btn-primary">
                <i class="fa fa-plus"></i> Tambah Ekskul
            </a>
        </div>
        <div class="tile">
            <div class="tile-title">
                <h3 class="text-center">EKTRA KURIKULER</h3>
            </div>
            <div class="tile-body">
                <div class="row">
                    @if(Session::has('msg'))
                        @section('script')
                            {!! Session::get('msg') !!}
                        @endsection
                    @endif
                    @foreach ($ekskuls as $key => $e)
                        @php
                            $bg = json_decode($e->galeri);
                        @endphp
                        <div class="col-md-4 mt-2">
                            <div class="card border-0" @if (count($bg) > 0) style="background-size: cover; height: 30vh;background-image: url({{ url($bg[0]) }})" @else style="background-size: cover; height: 30vh;background:#333;" @endif >
                                <div class="card-body">
                                    <h2 class="card-title text-center p-1 text-white" style="text-shadow: 2px 1px #009688; background: rgba(0, 0, 0, 0.4)">{{ $e->name }}</h2>
                                    <div class="text-center mt-5 p-2" style="background: rgba(0, 0, 0, 0.4)">
                                        <a href="{{ route('admin.ekskul.detail', encrypt($e->id)) }}" class="btn nav-item btn-sm btn-outline-light">
                                            <i class="fa fa-photo"></i> Galeri
                                        </a>
                                        <a href="{{ route('admin.ekskul.edit', encrypt($e->id)) }}" class="btn nav-item btn-sm btn-outline-light">
                                            <i class="fa fa-plus"></i> Tambah Foto
                                        </a>
                                        <a href="" data-toggle="modal" data-target="#hapusEks{{ $e->id }}" class="btn btn-sm btn-outline-light">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="hapusEks{{ $e->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                            <a href="{{ route('admin.ekskul.delete', encrypt($e->id)) }}" class="btn nav-item btn-block btn-danger">Ya Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </div>
    </main>
@endsection
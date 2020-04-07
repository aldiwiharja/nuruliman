@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>DRAFT BIAYA BULANAN</h2>
    </div>
    <div class="row">
        <div class="col">
            @if(Session::has('msg'))
                @section('script')
                    {!! Session::get('msg') !!}
                @endsection
            @endif
            <button data-toggle="modal" data-target="#addAttr" class="btn mb-2 btn-lg btn-block btn-primary">
                <i class="fa fa-plus"></i> Tambah Attribute
            </button>
            <div class="modal fade" id="addAttr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="width: 350px" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="exampleModalLongTitle">Tambah Attribute</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-11">
                                <form action="{{ route('admin.biaya.bulanan.attr') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Attribute</label>
                                        <input type="text" name="attr" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('admin.update.price') }}" method="POST">
                        @csrf
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>BIAYA BULANAN SMK/MA</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Attribute</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($monthly_fees as $key => $mf)
                                                    @if ($mf->type == 0)
                                                        <tr>
                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#hapusAttr{{$mf->id}}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                            <td>{{ $mf->attribute }}</td>
                                                            <td>
                                                                <input class="form-control" name="type0[]" type="number" value="{{ $mf->price }}">
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade" id="hapusAttr{{ $mf->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" style="width: 350px" role="document">
                                                            <div class="modal-content border-0">
                                                                <div class="modal-header" style="background: #009688">
                                                                    <h5 class="modal-title text-white" id="exampleModalLongTitle">Hapus attribute {{ $mf->attribute }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-11">
                                                                            <h5>Apakah anda yakin ingin menghapus ini ?</h5>
                                                                            <a href="{{ route('admin.biaya.bulanan.hapus.attr', $mf->attribute) }}" class="btn btn-block btn-danger">Ya Hapus</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>BIAYA BULANAN SMP/MTS</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Attribute</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($monthly_fees as $key => $mf)
                                                    @if ($mf->type == 1)
                                                        <tr>
                                                            <td>{{ $mf->attribute }}</td>
                                                            <td>
                                                                <input class="form-control" name="type1[]" type="number" value="{{ $mf->price }}">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2 justify-content-center">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">
                                    <i class="fa fa-refresh"></i> UPDATE HARGA
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
    
@endsection

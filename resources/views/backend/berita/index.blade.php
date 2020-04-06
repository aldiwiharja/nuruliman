@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>BERITA</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        
        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col">
                        @if(Session::has('msg'))
                            <div class="alert alert-success">{{ Session::get('msg') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header text-white bg-primary">
                                <h5>Tambah Berita</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.berita.add') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="desc" class="form-control" cols="6" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header text-white bg-primary">
                                <h5>Daftar Berita</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach ($news as $key => $n)
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="{{ url($n->image) }}" alt="" class="img-fluid" width="100">
                                                </div>
                                                <div class="col-md-8">
                                                    <h4>{{ $n->title }}</h4>
                                                    <p>{{ $n->desc }}</p>
                                                    <small>Dibuat: <br> {{ date('d M Y H:i:s', strtotime($n->created_at)) }}</small>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ route('admin.berita.delete', encrypt($n->id)) }}"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </main>
@endsection
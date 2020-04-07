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
                            @section('script')
                                {!! Session::get('msg') !!}
                            @endsection
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
                                                    <a href="" data-toggle="modal" data-target="#hapusBerita{{ $n->id }}"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <div class="modal fade" id="hapusBerita{{ $n->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                            <a href="{{ route('admin.berita.delete', encrypt($n->id)) }}" class="btn btn-block btn-danger">Ya Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
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

@section('script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('desc');
</script>
@endsection
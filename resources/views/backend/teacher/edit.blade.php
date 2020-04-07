@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Ubah Tenaga Pendidik</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-header">
                    <h2>Tenaga Pendidik</h2>
                </div>
                <div class="tile-body">
                    <form action="{{ route('admin.teacher.edit.proses') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <input type="text" name="nama_teacher" value="{{ $teacher->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control">
                            <img src="{{ url($teacher->avatar) }}" alt="" width="150" class="img-fluid">
                        </div>
                        <div class="form-group">
                            <label>Nama Pelajaran</label>
                            <input type="text" name="matpel" class="form-control" value="{{ $teacher->matpel }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection
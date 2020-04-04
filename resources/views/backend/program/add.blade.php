@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Tambah Program</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-header">
                    <h2>Program</h2>
                </div>
                <div class="tile-body">
                    <form action="{{ route('admin.program.add.proses') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Program</label>
                            <input type="text" name="nama_program" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Program</label>
                            <textarea name="desc_program" id="" cols="10" rows="5" class="form-control"></textarea>
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
@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Tambah Program</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{ route('admin.program') }}" class="btn btn-sm mb-2 btn-primary nav-item">Kembali</a>
            <div class="tile">
                <div class="tile-header">
                    <h2>Program</h2>
                </div>
                <div class="tile-body">
                    <form action="{{ route('admin.program.add.proses') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Program</label>
                            <input type="text" name="nama_program" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori Program</label>
                            <select name="kategori_program" class="form-control">
                                <option value="">--Pilih Category--</option>
                                <option value="sekolah">Sekolah</option>
                                <option value="pesantren">Pesantren</option>
                            </select>
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
@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Edit Program</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-header">
                    <h2>Program</h2>
                </div>
                <div class="tile-body">
                    <form action="{{ route('admin.program.edit.proses') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $program->id }}">
                        <div class="form-group">
                            <label>Nama Program</label>
                            <input type="text" name="nama_program" value="{{ $program->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kategori Program</label>
                            <select name="kategori_program" class="form-control">
                                <option value="">--Pilih Category--</option>
                                <option value="sekolah" @if ($program->kategori == "sekolah") selected @endif>Sekolah</option>
                                <option value="pesantren"  @if ($program->kategori == "pesantren") selected @endif>Pesantren</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Program</label>
                            <textarea name="desc_program" id="" cols="10" rows="5" class="form-control">{{ $program->description }}</textarea>
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
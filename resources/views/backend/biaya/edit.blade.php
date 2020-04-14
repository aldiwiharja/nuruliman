@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Edit Biaya</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('admin.biaya.edit.proses') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_biaya" value="{{ $cost->id }}">
                        <div class="form-group">
                            <label>Nama Biaya</label>
                            <input type="text" name="nama_biaya" value="{{ $cost->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga_biaya" value="{{ $cost->price }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn nav-item btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection
@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Ekskul</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <a href="{{ route('admin.ekskul') }}" class="btn btn-primary btn-sm mb-2">Kembali</a>
        <div class="tile">
            <div class="tile-title">
                <h3 class="text-center">GALERI {{ \Str::upper($ekskul->name) }}</h3>
            </div>
            <div class="tile-body">
                <div class="row">
                    @foreach (json_decode($ekskul->galeri) as $key => $g)
                        <div class="col-md-3">
                            <div class="card">
                                <img src="{{ url($g) }}" class="card-img-top">
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
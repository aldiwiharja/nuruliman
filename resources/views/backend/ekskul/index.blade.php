@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Ekskul</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="pb-2">
            <a href="{{ route('admin.ekskul.add') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Ekskul
            </a>
        </div>
        <div class="tile">
            <div class="tile-title">
                <h3 class="text-center">EKTRA KURIKULER</h3>
            </div>
            <div class="tile-body">
                <div class="row">
                    @foreach ($ekskuls as $key => $e)
                        @php
                            $bg = json_decode($e->galeri);
                        @endphp
                        <div class="col-md-4 mt-2">
                            <div class="card" style="background-size: cover; height: 30vh;background-image: url({{ url($bg[0]) }})">
                                <div class="card-body">
                                    <h2 class="card-title text-white" style="text-shadow: 2px 1px #009688">{{ $e->name }}</h2>
                                    <a href="#" class="btn btn-primary">Detail</a>
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
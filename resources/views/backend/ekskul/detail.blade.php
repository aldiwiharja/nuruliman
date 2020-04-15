@extends('backend.layouts.app')

@section('content')
    <main class="app-content">
    <div class="app-title">
        <h2>Ekskul</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
        <a href="{{ route('admin.ekskul') }}" class="btn btn-primary nav-item btn-sm mb-2">Kembali</a>
        <div class="tile">
            <div class="tile-title">
                <h3 class="text-center">DETAIL {{ \Str::upper($ekskul->name) }}</h3>
            </div>
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $ekskul->name }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td>{{ $ekskul->description }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <hr>
                    </div>
                </div>
                <div class="row baguetteBoxOne">
                    @foreach (json_decode($ekskul->galeri) as $key => $g)
                        <div class="col-md-3 mt-2">
                            <div class="card border-0">
                                <a class="lightbox" href="{{ url($g) }}">
                                    <img src="{{ url($g) }}" class="card-img-top">
                                </a>
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

@section('script')
    <script>
        baguetteBox.run('.baguetteBoxOne');
    </script>
@endsection
@extends('frontend.layouts.app')

@section('content')
    @php
        $title = \Str::upper($query);
        $program = \App\Program::where('name', $title)->first();
        $banner = $program->banner;
    @endphp
    <section id="header-program" @if ($banner !== null) style="background-image: url({{ url($banner) }})" @else style="background:#333;  @endif">
        <div class="title">
            <h1>{{ $title }}</h1>
        </div>
    </section>
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card register-now">
                    <div class="text-center mt-3">
                        <h3>PENERIMAAN SISWA BARU</h3>
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="card border-0" style="height: 60vh; background-color: rgba(255, 255, 255, 0.7)">
                                    <div class="card-body">
                                        <h5>{{ $title }}</h5>
                                        <small>Lama belajar 3 tahun</small>
                                        <hr>
                                        <div class="group-text">
                                            <ol>
                                                <li>Belajar</li>
                                                <li>Mengaji</li>
                                                <li>Belajar lagi</li>
                                                <li>Mengaji lagi</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card border-0" style="height: 60vh; background-color: rgba(255, 255, 255, 0.7)">
                                    <div class="p-3">
                                        <div class="alert alert-success">
                                            <h4 class="text-center">Klik link berikut ini untuk mengisi formulir pendaftaran siswa baru</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h5 class="card-title">TAHUN PELAJARAN</h5>
                                            <h2>2020-2021</h2>
                                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-block btn-success text-white mt-4">FORMULIR PENDAFTARAN</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Us Section -->

@endsection
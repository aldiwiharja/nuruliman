@extends('frontend.layouts.app') 

@section('content')

<!-- ======= Hero Section ======= -->
@php
    $banner_setting = json_decode($banner_setting->value);
@endphp
@if (count($banner_setting) > 0)
    <section id="hero">
        <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banner_setting as $key => $bs)
                    @if ($key === 0)
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ url($bs) }}" alt="{{ $key }}">
                        </div>
                    @else 
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url($bs) }}" alt="{{ $key }}">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="hero-container">
            <div class="row">
                <div class="col-md-12">
                    <h1>PENDAFATARAN SISWA BARU</h1>
                    <h2>NURUL IMAN AL HASANAH</h2>
                    <a href="{{ route('pendaftaran.index') }}" class="btn nav-load btn-lg btn-success">DAFTAR SEKARANG</a>
                </div>
            </div>
        </div>
    </section>
@else 
    <section id="hero-0">
        <div id="content-hero-0" class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h1 class="text-white">PENDAFATARAN SISWA BARU</h1>
                <h2 class="text-white">NURUL IMAN AL HASANAH</h2>
                <a href="{{ route('pendaftaran.index') }}" class="btn btn-lg btn-success">DAFTAR SEKARANG</a>
            </div>
        </div>
    </section>
@endif
<!-- End Hero -->
<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            @php
                $kepsek_setting = json_decode($kepsek_setting->value);
            @endphp
            <section class="p-4" id="box-kepsek">
                <div class="row">
                    <div class="col-md-2 col-2">
                        <div class="member-img">
                            <img src="{{ url($kepsek_setting->photo) }}" class="img-fluid img-responsive" width="150">
                        </div>
                    </div>
                    <div class="col-md-10 col-10">
                        <h5>Sambutan</h5>
                        <hr id="line-hr">
                        <b>{{ $kepsek_setting->nama }}</b>
                        <p id="text-sambutan">{{ $kepsek_setting->sambutan }}</p>
                    </div>
                </div>
            </section>
            

            <div class="row mt-3">
                <div class="col-md-12">
                    <h1>Berita Terbaru</h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                @foreach ($berita as $key => $b)
                    <div class="col-md-6">
                        <div class="card mt-2">
                            <div class="card-body border-0 p-2" style="border-radius: 0%">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <div class="member-img">
                                            <img src="{{ url($b->image) }}" width="100" height="100">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <b>{{ $b->title }}</b><br>
                                        <small class="text-justify">{!! $b->desc !!}</small>
                                        <small>Dibuat: <br> {{ date('d M Y H:i:s', strtotime($b->created_at)) }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card register-now" style="border-radius: 6px">
                        <div class="card-body">
                            <div class="row py-5">
                                <div class="col-md-12">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            <div class="card border-0">
                                                <div class="p-3">
                                                    <div class="alert alert-success text-center">
                                                        <h4>PENERIMAAN SISWA BARU</h4>
                                                        <h2>DAFTAR SEKARANG</h2>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h3 class="card-title">TAHUN PELAJARAN</h3>
                                                        <h1>2020-2021</h1>
                                                        <a href="{{ route('pendaftaran.index') }}" class="text-white nav-load btn btn-block btn-success">FORMULIR PENDAFTARAN</a><br>
                                                        <a href="{{ route('user.guide') }}" target="_blank" class="text-white btn btn-block btn-primary">CARA PENDAFTARAN</a>
                                                    </div>
                                                </div>
                                            </div>
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

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="zoom-in">
                <h1>Extra Kulikuler</h1>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($ekskul_setting as $key => $es)
                            <li data-filter=".{{ \Str::lower($es->name) }}">{{ $es->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

                @foreach ($ekskul_setting as $key => $es)
                    @php
                        $galeri = json_decode($es->galeri);
                        $count = 3;
                    @endphp
                    @foreach ($galeri as $key => $g)
                        @if ((int)$key == $count)
                            @php
                                break;
                            @endphp
                        @else 
                            <div class="col-lg-3 col-6 portfolio-item {{ \Str::lower($es->name) }}">
                                <img src="{{ url($g) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $es->name }}</h4>
                                </div>
                            </div>                
                        @endif
                    @endforeach
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container">

            <div class="section-title" data-aos="zoom-in">
                <h1>Tenaga Pendidik</h1>
            </div>

            <div class="row autoplay">

                @foreach ($tenaga_pendidik as $key => $tp)    
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="{{ url($tp->avatar) }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <b>{{ $tp->name }}</b><br>
                                <small>
                                    @if ($tp->matpel !== null)
                                        {{ $tp->matpel }}
                                    @else 
                                        Nothing
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Team Section -->
</main>
@endsection
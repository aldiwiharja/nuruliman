@php
    $uri = Request::segment(1);
@endphp

<style>
    #loginModal {
        z-index: 99999;
    }
</style>
<!-- ======= Header ======= -->
<header id="header">
<div class="container d-flex">

    <div class="logo mr-auto">
        <h1 class="text-light">
            <a href="{{ route('home.index') }}">
                <img src="{{ url('frontend/assets/img/logo.png') }}" id="logo-bang" alt="Logo Nurul Iman">
            </a>
        </h1>
    </div>

    <nav class="nav-menu d-none d-lg-block">
    <ul>
        <li @if ($uri == null) class="active" @endif><a href="{{ route('home.index') }}">Beranda</a></li>
        <li @if ($uri == "profile") class="active" @endif><a href="{{ route('profile.index') }}">Profile</a></li>
        <li @if ($uri == "program") class="active drop-down" @endif class="drop-down"><a href="">Program</a>
            <ul>
                <li class="drop-down"><a href="">Sekolah</a>
                    <ul>
                        @foreach (\App\Program::all() as $program)
                            @if ($program->kategori == "sekolah")
                                <li><a href="{{ route('program.index',\Str::lower($program->name)) }}">{{ $program->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li class="drop-down"><a href="">Pesantren</a>
                    <ul>
                        @foreach (\App\Program::all() as $program)
                            @if ($program->kategori == "pesantren")
                                <li><a href="{{ route('program.index',\Str::lower($program->name)) }}">{{ $program->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>
        </li>
        {{-- <li @if ($uri == "ekskul") class="active" @endif><a href="{{ route('ekskul.index') }}">Extra Kulikuler</a></li> --}}
        <li class="drop-down"><a href="">Informasi</a>
            <ul>
                <li><a href="{{ route('persyaratan.index') }}">Persayatan</a></li>
                <li><a href="{{ route('rincian.biaya.index') }}">Rincian Biaya</a></li>
                
                @if (Auth::check())
                    <li><a href="{{ route('generate.formulir') }}">Formulir</a></li>
                @endif
            </ul>
        </li>
        <li @if ($uri == "pendaftaran") class="active" @endif><a href="{{ route('pendaftaran.index') }}">Pendaftaran</a></li>
        @if (Auth::check())
            @php
                $user = Auth::user();
            @endphp
            @if ($user->role === "siswa")
                <li><a href="{{ route('siswa.keluar') }}" class="text-succes">Keluar</a></li>
            @endif
        @else 
            <li><a href="" data-toggle="modal" data-target="#loginModal" class="text-success">Masuk</a></li>
        @endif

    </ul>
    </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
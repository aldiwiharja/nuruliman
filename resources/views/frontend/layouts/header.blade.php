@php
    $uri = Request::segment(1);
@endphp

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
                @foreach (\App\Program::all() as $program)
                    <li><a href="{{ route('program.index',\Str::lower($program->name)) }}">{{ $program->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li @if ($uri == "ekskul") class="active" @endif><a href="{{ route('ekskul.index') }}">Extra Kulikuler</a></li>
        <li @if ($uri == "pendaftaran") class="active" @endif><a href="{{ route('pendaftaran.index') }}">Pendaftaran</a></li>

    </ul>
    </nav><!-- .nav-menu -->

</div>
</header><!-- End Header -->

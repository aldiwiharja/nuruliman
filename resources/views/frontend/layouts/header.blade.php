

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
        <li class="active"><a href="{{ route('home.index') }}">Beranda</a></li>
        <li><a href="#about">Profile</a></li>
        <li class="drop-down"><a href="">Program</a>
        <ul>
            <li><a href="{{ route('program','smp') }}">SMP</a></li>
            <li><a href="{{ route('program','mts') }}">MTS</a></li>
            <li><a href="{{ route('program','smk') }}">SMK</a></li>
            <li><a href="{{ route('program','ma') }}">MA</a></li>
            <li><a href="{{ route('program','tahfiz') }}">TAHFIZ</a></li>
            <li><a href="{{ route('program','kitab_kuning') }}">KITAB KUNING</a></li>
            <li><a href="{{ route('program','multimedia') }}">MULTIMEDIA</a></li>
        </ul>
        </li>
        <li><a href="#portfolio">Extra Kulikuler</a></li>
        <li><a href="#why-us">Pendaftaran</a></li>

    </ul>
    </nav><!-- .nav-menu -->

</div>
</header><!-- End Header -->
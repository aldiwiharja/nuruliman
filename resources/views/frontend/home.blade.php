@extends('frontend.layouts.app') 

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="carousel slide" data-ride="carousel">
        @php
            $banner_setting = json_decode($banner_setting->value);
        @endphp
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
                <h2>PENDAFATARAN SANTRI BARU</h2>
                <h1>NURUL IMAN</h1>
                <h1>AL HASANAH</h1>
                <a href="" class="btn-get-started">DAFTAR</a>
            </div>
        </div>
    </div>
</section>
<!-- End Hero -->
<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            @php
                $kepsek_setting = json_decode($kepsek_setting->value);
            @endphp
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up">
                        <div class="member-img">
                            <img src="{{ url($kepsek_setting->photo) }}" class="img-fluid img-responsive">
                        </div>
                        <div class="member-info text-center">
                            <h4>{{ $kepsek_setting->nama }}</h4>
                            <span>{{ $kepsek_setting->jabatan }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h2>Sambutan</h2>
                    <p>{{ $kepsek_setting->sambutan }}</p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <h1>Berita Terbaru</h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://pngimage.net/wp-content/uploads/2018/06/sekolah-png-3.png" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title">Hallo</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://pngimage.net/wp-content/uploads/2018/06/sekolah-png-3.png" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title">Hallo</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://pngimage.net/wp-content/uploads/2018/06/sekolah-png-3.png" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title">Hallo</h3>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card register-now">
                        <div class="card-body">
                            <div class="row py-5">
                                <div class="col-md-12">
                                    <h4 class="text-center">PENERIMAAN SISWA BARU</h4>
                                    <h1 class="text-center">DAFTAR SEKARANG !</h1>
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <div class="card border-0">
                                                <div class="p-3">
                                                    <div class="alert alert-success text-center">Klik link berikut ini untuk mengisi formulir pendaftaran siswa baru</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <h3 class="card-title">TAHUN PELAJARAN</h3>
                                                        <h1>2021-2022</h1>
                                                        <a href="{{ route('pendaftaran.index') }}" class="text-white btn btn-block btn-success">FORMULIR PENDAFTARAN</a>
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
                    @endphp
                    @foreach ($galeri as $key => $g)
                        <div class="col-lg-4 col-md-6 portfolio-item {{ \Str::lower($es->name) }}">
                            <img src="{{ url($g) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $es->name }}</h4>
                            </div>
                        </div>                
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

            <div class="row">

                @foreach ($tenaga_pendidik as $key => $tp)    
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="{{ url($tp->avatar) }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="icofont-twitter"></i></a>
                                    <a href=""><i class="icofont-facebook"></i></a>
                                    <a href=""><i class="icofont-instagram"></i></a>
                                    <a href=""><i class="icofont-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $tp->name }}</h4>
                                <span>{{ $tp->matpel }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="zoom-in">
                <h1>Temukan kami</h2>
            </div>

            <div>
                <iframe style="border:0; width: 100%; height: 270px;" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=-6.597545,106.642116&amp;q=Salafi%20Modern%20Pondok%20Pesantren%20Nurul%20Iman%20Al%20Hasanah+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=18&amp;iwloc=B&amp;output=embed"
                    frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="row mt-5">

                <div class="col-lg-4" data-aos="fade-right">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Section -->
</main>
@endsection
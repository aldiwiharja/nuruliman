<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }}</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ url('frontend') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ url('frontend') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Vendor CSS Files -->
    <link href="{{ url('frontend') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('frontend') }}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="{{ url('frontend') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ url('frontend') }}/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="{{ url('frontend') }}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ url('frontend') }}/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('frontend') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Remember - v2.0.0
  * Template URL: https://bootstrapmade.com/remember-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('frontend.layouts.header') 
    
    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">

            <div class="container">
                <div class="section-title" data-aos="zoom-in">
                    <h1>Temukan kami</h2>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h3>Nurul Iman Al Hasanah</h3>
                        <p>Alamat: Jl.Leuwiliang Km. 3, Kampung Sawah Kulon, Leuwiliang, Barengkok, Kec. Leuwiliang, Bogor, Jawa Barat 16640</p>
                    </div>
                </div>
    
                <div class="row mt-3">
                    <div class="col">
                        <iframe style="border:0; width: 100%; height: 300px;" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=-6.597545,106.642116&amp;q=Salafi%20Modern%20Pondok%20Pesantren%20Nurul%20Iman%20Al%20Hasanah+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=18&amp;iwloc=B&amp;output=embed"
                            frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="row footer-newsletter justify-content-center">
                    <div class="col-lg-6">
                        <form action="#" method="post">
                            <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>

                <div class="social-links">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>

            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        &copy; 2020 Copyright <strong><span>Nurul Iman Al Hasanah</span></strong>. All Rights Reserved <br>
                        Dev @ Deodex Team
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('frontend') }}/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/venobox/venobox.min.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/counterup/counterup.min.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/aos/aos.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    {{-- <script>
        var vapidkey = '{{ config('app.vapid') }}';
    </script>

    <script src="{{ asset('js/enable-push.js') }}" defer></script> --}}
    

    <!-- Template Main JS File -->
    <script src="{{ url('frontend') }}/assets/js/main.js"></script>

    @yield('script')



</body>

</html>
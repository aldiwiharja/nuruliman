<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }}</title>
    {{-- Seo --}}
    <meta name="author" content="Deodex Team">
    <meta name="description" content="Pondok pesantren nurul iman al hasanah">
    <meta name="keywords" content="Nuruliman, Nurul Iman, Nurul Iman Al Hasanah, Ponpes, Pendaftaran Nurul Iman, Pondok Pesantran">
    <meta name="image" content="{{ url('frontend') }}/assets/img/logo.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ url('uploads/admin/favicon/favicon.ico') }}" rel="icon">

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
    <link href="{{ url('frontend') }}/assets/vendor/slick-master/slick/slick.css" rel="stylesheet">
    <link href="{{ url('frontend') }}/assets/vendor/slick-master/slick/slick-theme.css" rel="stylesheet">

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
    <div id="loadoverlay" class="loading sembunyi">Loading&#8230;</div>
    @include('frontend.layouts.header') 
    @yield('content')

    @if(Session::has('harusadmin'))
        @section('script')
            <script>
                Swal.fire(
                    'Mohon maaf anda bukan admin',
                    'Anda adalah siswa',
                    'error'
                );
            </script>
        @endsection
    @endif

    @if(Session::has('keluar'))
        @section('script')
            <script>
                Swal.fire(
                    'Anda telah keluar sesi',
                    'Jika anda ingin melihat formulir harus login lagi',
                    'success'
                );
            </script>
        @endsection
    @endif

    @if(Session::has('masuk'))
        @section('script')
            <script>
                Swal.fire(
                    'Berhasil',
                    'Anda berhasil masuk',
                    'success'
                );
            </script>
        @endsection
    @endif

    @if(Session::has('anda_tdk_berhak'))
        @section('script')
            <script>
                Swal.fire(
                    'Error',
                    'Anda bukan siswa!',
                    'error'
                );
            </script>
        @endsection
    @endif

    @if(Session::has('pass_salah'))
        @section('script')
            <script>
                Swal.fire(
                    'Error',
                    'Password anda salah!',
                    'error'
                );
            </script>
        @endsection
    @endif

    @if(Session::has('user_tdk_ada'))
        @section('script')
            <script>
                Swal.fire(
                    'Error',
                    'User belum terdaftar!',
                    'error'
                );
            </script>
        @endsection
    @endif
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
                        <form action="#">
                            <input type="email" name="email" placeholder="Enter your Email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>

                <div class="social-links">
                    <a target="_blank" href="https://www.facebook.com/Nurul-iman-Al-hasanah-asyukriah-1707286829493719/" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a target="_blank" href="https://www.instagram.com/nurulimanasyukriah/" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a target="_blank" href="https://www.youtube.com/channel/UCuHlYUsi8ClJALsgbqiWjmw" class="youtube"><i class="bx bxl-youtube"></i></a>
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

    {{-- <a href="https://api.whatsapp.com/send?phone=628568029330&text=Assalamualaikum%0ASaya%20mau%20daftar%20di%20ponpes%20nurul%20iman" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a> --}}

    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 350px" role="document">
        <div class="modal-content border-0">
            <div class="modal-header" id="card-head">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <form action="{{ route('siswa.masuk') }}" method="POST">
                            @csrf
                            <h5 class="text-center">Masuk sebagi siswa</h5>
                            <hr>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email_siswa">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="pass_siswa">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">MASUK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    @if (Auth::check())
        <a href="#" onclick="showDocument()" class="dataAnda">
            <i class="fa fa-file my-float"></i>
        </a>
    @endif

    <a href="#" id="openBoxWa" class="float">
        <i class="fa fa-whatsapp my-float"></i>
    </a>


    <div id="boxWa">
        <p class="text-right mr-2" style="cursor: pointer" onclick="closeWa()">x</p>
        @php
            $wa = json_decode(\App\Setting::where('key', 'whatsapp_setting')->first()->value);
        @endphp
        <ul class="list-group p-2" id="wa-list">
            @foreach ($wa as $key => $wa)
                @php
                    $url = "https://api.whatsapp.com/send?phone=".$wa."&text=Assalamualaikum%0ASaya%20mau%20daftar%20di%20ponpes%20nurul%20iman"
                @endphp
                <li class="list-group-item mt-3 border-0" style="border-radius: 5px">
                    <a href="{{ $url }}" target="_blank">Admin / CS {{ $key+1 }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="modal fade" id="showDocs" tabindex="-1" role="dialog" aria-labelledby="showDocsLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="row" id="loader">
                <div class="col">
                    <h1 class="text-center">
                        <i class="fa fa-spin fa-spinner"></i>
                    </h1>
                </div>
            </div>
            <div id="showDocs-body">

            </div>
        </div>
    </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ url('frontend') }}/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('frontend') }}/assets/vendor/slick-master/slick/slick.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="{{ url('frontend/assets/vendor/smart/css/smart_wizard.css') }}" rel="stylesheet"></link>
    <script src="{{ url('frontend/assets/vendor/smart/js/jquery.smartWizard.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/docs/js/plugins/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/docs/js/plugins/bootstrap-notify.min.js') }}"></script>

    <script>

        $('.nav-load').on('click', function(){
            $('#loadoverlay').removeClass('sembunyi');
        });
        $('#openBoxWa').on('click', function(){
            $('#boxWa').fadeToggle();
        });

        function closeWa(){
            $('#boxWa').hide();
        }

        function showDocument() {
            $('#showDocs-body').html(null);
            $('#showDocs').modal();
            $('#loader').show();
            $.get("{{ route('document.modal') }}", function(data) {
                $('#loader').hide();
                $('#showDocs-body').html(data);
            })
        }
        $('.autoplay').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll:3,
            responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                    }
                ]
        });


    </script>

    

    @auth
        @php
            $student_id = Auth::user()->student_id;
            $document = \App\Document::where('student_id', $student_id)->first();
        @endphp
        @if ($document !== null)
            @php
                $docs['ktp'] = $document->ktp_orang_tua;
                $docs['kk'] = $document->kk;
                $docs['ijazah'] = $document->ijazah;
                $docs['sk'] = $document->surat_kelulusan;
                // $docs['skhun'] = $document->skhun;
                $alert = false;
                foreach ($docs as $key => $d) {
                    if ($d == null) {
                        $alert = true;
                    }
                }
            @endphp
            @if ($alert !== false)
                <a href="#" class="tap">
                    <img src="{{ url('frontend/assets/img/tap.png') }}">
                </a>
                <div class="notice">
                    <i class="fa fa-warning"></i> Lengkapi Data Anda !
                </div>
            @endif
        @endif
        
    @endauth



    <!-- Template Main JS File -->
    <script src="{{ url('frontend') }}/assets/js/main.js"></script>

    @yield('script')



</body>

</html>
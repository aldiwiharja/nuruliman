<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name') }}</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons --> 
  <link href="{{ url('frontend') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ url('frontend') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html">Remember</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{ url('frontend') }}/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#team">Team</a></li>
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact Us</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>Welcome to Remember</h1>
      <h2>We are team of talanted designers making websites with Bootstrap</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-md-3">
            <img src="data:image/jpeg;base64,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" alt="">
          </div>
          <div class="col-md-8">
            <h2>Kepala Sekolah</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni officia nostrum quod impedit ab iure, nisi commodi aut nobis perspiciatis labore corrupti quas eum! Quae eligendi animi optio iste consectetur!</p>
          </div>
        </div>
        <div class="row">

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title" data-aos="zoom-in">
          <h2>Why Us</h2>
          <h3>Why you shoud <span>choose us</span>?</h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="fade-up">
              <span>01</span>
              <h4>Lorem Ipsum</h4>
              <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
              <span>02</span>
              <h4>Repellat Nihil</h4>
              <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <span>03</span>
              <h4> Ad ad velit qui</h4>
              <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">232</span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">521</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,463</span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">15</span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Call To Action</h3>
          <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a class="cta-btn" href="#">Call To Action</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="zoom-in">
          <h2>Services</h2>
          <h3>Our Awesome <span>Services</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box" data-aos="zoom-in">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Dele cardo</a></h4>
              <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Divera don</a></h4>
              <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="zoom-in">
          <h2>Portfolio</h2>
          <h3>Check our <span>Portfolio</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ url('frontend') }}/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="{{ url('frontend') }}/assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{ url('frontend') }}/assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="{{ url('frontend') }}/assets/img/portfolio/portfolio-2.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ url('frontend') }}/assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <a href="{{ url('frontend') }}/assets/img/portfolio/portfolio-3.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{ url('frontend') }}/assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <a href="{{ url('frontend') }}/assets/img/portfolio/portfolio-4.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{ url('frontend') }}/assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <a href="{{ url('frontend') }}/assets/img/portfolio/portfolio-5.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="{{ url('frontend') }}/assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <a href="{{ url('frontend') }}/assets/img/portfolio/portfolio-6.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{ url('frontend') }}/assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <a href="{{ url('frontend') }}/assets/img/portfolio/portfolio-7.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{ url('frontend') }}/assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <a href="{{ url('frontend') }}/assets/img/portfolio/portfolio-8.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{ url('frontend') }}/assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="{{ url('frontend') }}/assets/img/portfolio/portfolio-9.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="zoom-in">
          <h2>Team</h2>
          <h3>Our Hard Working <span>Team</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="{{ url('frontend') }}/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="{{ url('frontend') }}/assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="{{ url('frontend') }}/assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="{{ url('frontend') }}/assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="icofont-twitter"></i></a>
                  <a href=""><i class="icofont-facebook"></i></a>
                  <a href=""><i class="icofont-instagram"></i></a>
                  <a href=""><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="owl-carousel testimonials-carousel" data-aos="zoom-in">

          <div class="testimonial-item">
            <img src="{{ url('frontend') }}/assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ url('frontend') }}/assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ url('frontend') }}/assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ url('frontend') }}/assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ url('frontend') }}/assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title" data-aos="zoom-in">
          <h2>Pricing</h2>
          <h3>Check our <span>Pricing</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box recommended" data-aos="zoom-in" data-aos-delay="100">
              <span class="recommended-badge">Recommended</span>
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="zoom-in">
          <h2>F.A.Q</h2>
          <h3>Frequently Asked <span>Questions</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="zoom-in">
          <h2>Contact</h2>
          <h3>Check our <span>Contact</span> Details</h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
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
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row  justify-content-center">
          <div class="col-lg-6">
            <h3>Remember</h3>
            <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
          </div>
        </div>

        <div class="row footer-newsletter justify-content-center">
          <div class="col-lg-6">
            <form action="" method="post">
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
      <div class="copyright">
        &copy; Copyright <strong><span>Remember</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/remember-free-multipurpose-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

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

  <!-- Template Main JS File -->
  <script src="{{ url('frontend') }}/assets/js/main.js"></script>

</body>

</html>
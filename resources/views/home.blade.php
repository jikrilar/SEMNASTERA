<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Semnastera Politeknik Sukabumi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css"') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-primary text-white d-none d-lg-flex">
        <div class="container py-3">
            <div class="d-flex align-items-center">
                <a href="index.html">
                    <img src="{{ asset('img/logo.png') }}" style="width: 150px" alt="">
                </a>
                <div class="ms-auto d-flex align-items-center">
                    <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i>Jl. Babakan Sirna No.25, Sukabumi</small>
                    <small class="ms-4"><i class="fa fa-envelope me-3"></i>direktorat@polteksmi.ac.id</small>
                    <small class="ms-4"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</small>
                    <div class="ms-3 d-flex">
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
                <a href="index.html" class="navbar-brand d-lg-none">
                    <h1 class="fw-bold m-0">GrowMark</h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">Call for Papers</a>
                        <a href="#topikmakalah" class="nav-item nav-link">Topik Makalah</a>
                        <a href="#speaker" class="nav-item nav-link">Keynote Speakers</a>
                        <a href="#payment" class="nav-item nav-link">Pembayaran</a>
                        <a href="#footer" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="ms-auto d-none d-lg-block">
                        <a href="/dashboard" class="btn btn-primary rounded-pill py-2 px-3">Submit</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" style="height: 100vh" src="{{ asset('img/hero.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7 text-start">
                                    @foreach ($agendas as $agenda)
                                    <p class="fs-4 text-white animated slideInRight"><strong>[{{ $agenda->date }}]</strong></p>
                                    @endforeach
                                    <h1 class="display-3 text-white mb-4 animated slideInRight">Seminar Nasional Teknologi dan Riset Terapan</h1>
                                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInRight">Registrasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" style="height: 100vh" src="{{ asset('img/hero.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-7 text-end">
                                    @foreach ($agendas as $agenda)
                                    <p class="fs-4 text-white animated slideInRight"><strong>[{{ $agenda->date }}]</strong></p>
                                    @endforeach
                                    <h1 class="display-3 text-white mb-5 animated slideInLeft">Seminar Nasional Teknologi dan Riset Terapan</h1>
                                    <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">Registrasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    {{-- About Start --}}
    @foreach ($agendas as $agenda)
    <section id="about">
        <div class="container-xxl">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                        <img style="width: 500px" src="{{ asset('storage/' . $agenda->poster) }}" alt="">
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" >
                        <p style="text-align: justify">
                            SEMNASTERA (Seminar Nasional Teknologi dan Riset Terapan) merupakan suatu forum satu tahunan yang diselenggarakan oleh Politeknik Sukabumi untuk kegiatan deseminasi hasil-hasil penelitian. Forum ini dapat dijadikan ajang bertukar informasi dalam bidang teknologi dan riset terapa. Kami mengundang kepada para akademisi, peneliti, praktisi industri, maupun instansi pemerintahan untuk dapat berpartisipasi baik sebagai pemakalah maupun peserta non-pemakalah. Tahun ini merupakan penyelenggaraan SEMNASTERA kelima yang mengangkat tema “Peluang dan Tantangan Dalam Mempersiapkan SDM Berdaya Saing Pada Era Society 5.0" . Pelaksanaan seminar pada tahun ini diselenggarakan secara virtual (online). Dengan adanya kegiatan seminar ini diharapkan dapat memberikan kontribusi bagi perkembangan ilmu pengetahuan dan teknologi.
                        </p>
                        <p class="mt-5" style="text-align: justify">
                            Seluruh makalah yang dipresentasikan dan dipublikasikan pada Prosiding SEMNASTERA ber-ISSN yang telah terindeks Google Scholar dan Garuda.
                        </p>
                        <p class="mt-5" style="text-align: justify">
                            Prosiding Semnastera sebelumnya :
                        </p>
                        <ol>
                            <li><a href="" class="text-warning">Prosiding Semnastera, Vol. 1, 2019</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    {{-- About End --}}


    <!-- Pemateri Start -->
    <section id="speaker" class="mt-5">
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-5 text-primary">KEYNOTE SPEAKERS</h1>
                </div>
                <div class="row">
                    @foreach ($speakers as $speaker)
                    <div class="col-lg-4 col-md-6 wow fadeInUp mb-3" data-wow-delay="0.1s">
                        <div class="team-item bg-white rounded overflow-hidden pb-4">
                            <img class="img-fluid mb-4" style="width: 350px; height: 400px;" src="{{ asset('storage/' . $speaker->picture) }}" alt="">
                            <h5>{{ $speaker->name }}</h5>
                            <span class="text-primary">{{ $speaker->description }}</span>
                            <ul class="team-social">
                                <li><a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a></li>
                                <li><a class="btn btn-square" href=""><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Pemateri End -->

    <!-- Pembayaran Start -->
    <section id="payment">
        <div class="container-xxl py-5 mt-5">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-5 text-primary">PEMBAYARAN</h1>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Pemakalah</th>
                                        <th class="border-top-0">Biaya</th>
                                        <th class="border-top-0">Early Bird</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($costs as $cost)
                                    <tr>
                                        <td>{{ $cost->category }}</td>
                                        <td>{{ $cost->nominal }}</td>
                                        <td>{{ $cost->earlybird_nominal }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <p class="text-muted">*) Sampai Tanggal 02 Agustus 2023</p>
                        <p class="fs-5">Pembayaran Transfer ke Rekening Mandiri: 182-000-102985-9 a.n. Politeknik Sukabumi-PPPM.
                            Bukti Pembayaran, Diupload Melalui Link Berikut https://bit.ly/buktibayarsemnastera2023</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pembayaran End -->

   {{-- Tanggal Start --}}
   <section id="date" class="p-5" style="background-color: rgb(247, 247, 247)">
    <div class="container-xxl pt-5">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-primary" data-aos="fade-right" data-aos-delay data-aos-duration="1500">TANGGAL PENTING</h1>
                </div>
                <div class="col-6">
                    <ul>
                        @foreach ($dates as $date)
                        <li class="list-unstyled mb-5" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1500">
                            <span class="d-block text-muted text-primary text-bold fw-bold mb-3">{{ $date->date }}</span>
                            <h4 style="text-transform: uppercase">{{ $date->description }}</h4>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
   </section>
   {{-- Tanggal End --}}

    <!-- Submit Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-5">SUBMIT</h1>
            </div>
            <div class="row g-0 feature-row">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-item border h-100 p-5">
                        <h5 class="mb-3 text-center">PANDUAN<br>SUBMIT</h5>
                        <p class="mb-0 text-center">Silakan download panduan lewat tautan di bawah ini</p>
                        <div class="mt-3">
                            <a href="" class="btn btn-success">Download Panduan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature-item border h-100 p-5">
                        <h5 class="mb-3 text-center">TEMPLATE MAKALAH</h5>
                        <p class="mb-0 text-center">Silakan download template lewat tautan di bawah ini</p>
                        <div class="mt-3 ">
                            <a href="" class="btn btn-success">Download Panduan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="feature-item border h-100 p-5">
                        <h5 class="mb-3 text-center">PANDUAN TEKNIS PRESENTASI</h5>
                        <p class="mb-0 text-center">Silakan download panduan teknis lewat tautan di bawah ini</p>
                        <div class="mt-3">
                            <a href="" class="btn btn-success">Download Panduan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                    <div class="feature-item border h-100 p-5">
                        <h5 class="mb-3 text-center">SUBMIT<br>MAKALAH</h5>
                        <p class="mb-0 text-center">Silakan submit makalah anda lewat tautan di bawah ini</p>
                        <div class="mt-3">
                            <a href="" class="btn btn-success">Download Panduan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Submit End -->


<!-- Project Start -->
<div class="container-xxl pt-5">
    <div class="container">
        <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium text-primary">Our Projects</p>
            <h1 class="display-5 mb-5">We've Done Lot's of Awesome Projects</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="img/project-1.jpg" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="img/project-1.jpg" data-lightbox="project"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i class="fa fa-link"></i></a>
                    </div>
                </div>
                <div class="p-4">
                    <a class="d-block h5" href="">Data Analytics & Insights</a>
                    <span>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem</span>
                </div>
            </div>
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="img/project-2.jpg" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="img/project-2.jpg" data-lightbox="project"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i class="fa fa-link"></i></a>
                    </div>
                </div>
                <div class="p-4">
                    <a class="d-block h5" href="">Marketing Content Strategy</a>
                    <span>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem</span>
                </div>
            </div>
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="img/project-3.jpg" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="img/project-3.jpg" data-lightbox="project"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i class="fa fa-link"></i></a>
                    </div>
                </div>
                <div class="p-4">
                    <a class="d-block h5" href="">Business Target Market</a>
                    <span>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem</span>
                </div>
            </div>
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="img/project-4.jpg" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="img/project-4.jpg" data-lightbox="project"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i class="fa fa-link"></i></a>
                    </div>
                </div>
                <div class="p-4">
                    <a class="d-block h5" href="">Social Marketing Strategy</a>
                    <span>Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Project End -->


    <!-- Footer Start -->
    <section id="footer">
        <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <h4 class="text-white mb-4">Our Office</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62266-215417</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>semnastera@polteksmi.ac.id</p>
                        <div class="d-flex pt-3">
                            <a class="btn btn-square btn-light rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-light rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-square btn-light rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-4">Business Hours</h4>
                        <p class="mb-1">Lena Agustin, S.E., M.Ak</p>
                        <h6 class="text-light">Phone: +62 856-5941-6858 (Whatsapp)</h6>
                        <h6 class="text-light">E-mail: lena_agustin@polteksmi.ac.id
                        </h6>
                        <p class="mb-1 mt-3">Widy Muchamad, S.E., M.M..</p>
                        <h6 class="text-light">Phone: +62 812-1937-7033 (Whatsapp)</h6>
                        <h6 class="text-light">E-mail: widymuchamad@polteksmi.ac.id</h6>
                        {{-- <p class="mb-1">Sunday</p>
                        <h6 class="text-light">Closed</h6> --}}
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <h4 class="text-white mb-4">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative w-100">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-light py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium text-light" href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="fw-medium text-light" href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>

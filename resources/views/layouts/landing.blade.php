<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('vendor/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('vendor/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('vendor/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>123 Street, Jakarta, IDN</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>{{date('Y-m-d H:m:s');}}</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+021 555 5555</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square btn-link rounded-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <h2 class="m-0 text-primary">PortalTender</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="http://127.0.0.1:8000/" class="nav-item nav-link active">Beranda</a>
                <a href="{{route('tender')}}" class="nav-item nav-link">Tender</a>
                <a href="{{route('news')}}" class="nav-item nav-link">Berita</a>
                <a href="{{route('activity')}}" class="nav-item nav-link">Kegiatan</a>
                <a href="{{route('contact')}}" class="nav-item nav-link">Tentang Kami</a>
                <a href="{{route('login')}}" class="nav-item nav-link">Sign in</a>
                {{-- <a href="#" class="nav-item nav-link">Project</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="feature.html" class="dropdown-item">Feature</a>
                        <a href="quote.html" class="dropdown-item">Free Quote</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div> --}}
                
            </div>
            <a href="{{route('regis')}}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Sign up<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>

    @yield('content')
    @include('sweetalert::alert')
    <!-- Footer Start -->
    <div class="mb-5 container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, Jakarta, IDN</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+021 555 5555</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>web@tender.co.id</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light btn-social" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">Beranda</a>
                    <a class="btn btn-link" href="{{route('tender')}}">Tender</a>
                    <a class="btn btn-link" href="">Berita</a>
                    <a class="btn btn-link" href="{{route('login')}}">Sign in</a>
                    <a class="btn btn-link" href="{{route('regis')}}">Sign up</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Project Gallery</h5>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid rounded" src="{{asset('vendor/img/gallery-1.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="{{asset('vendor/img/gallery-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="{{asset('vendor/img/gallery-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="{{asset('vendor/img/gallery-4.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="{{asset('vendor/img/gallery-5.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid rounded" src="{{asset('vendor/')}}img/gallery-6.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Info Terbaru</h5>
                    <p>Langganan Berita Terbaru</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Send</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Portal Tender</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="#">Web Tender</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


     <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('vendor/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('vendor/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('vendor/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('vendor/lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('vendor/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendor/lib/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('vendor/lib/lightbox/js/lightbox.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('vendor/js/main.js')}}"></script>
</body>

</html>
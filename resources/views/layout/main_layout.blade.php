<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    @yield('title')
    @include('layout.head')
    @yield('header')
    <style>
        .text-justify {
            text-align: justify;
        }
    </style>
</head>

<body class="p-4" style="background-color: #F3F7EC;">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

    <div class="w-100 bg-white">
        <div class="col-lg-6 col-12 p-3 header-responsive gap-5">
            <img src="{{asset('img/cropped-header-objectpatq.png')}}" width="100" alt="">
            <div class="d-flex flex-column">
                <h2>
                    PPATQ RAUDLATUL FALAH
                </h2>
                <p class="text-secondary"> Pondok Pesantren Anak-anak Tahfidzul Qur'an Raudlatul Falah – Pati </p> 
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
                <li class="nav-item" id="home">
                    <a class="nav-link" href="{{Route('HomePage')}}" name="homePage">Home</a>
                </li>
                <li class="nav-item" id="about">
                    <a class="nav-link" href="{{Route('aboutPage')}}" name="aboutPage">Seputar PPATQ</a>
                </li>
                <li class="nav-item" id="berita">
                    <a class="nav-link" href="{{Route('berita')}}">Berita</a>
                </li>
                <li class="nav-item" id="agenda">
                    <a class="nav-link" href="{{Route('agenda')}}">Agenda</a>
                </li>
                <li class="nav-item" id="galeri-fasilitas">
                    <a class="nav-link" href="{{ Route('galeri-fasilitas') }}">Galeri & Fasilitas</a>
                </li>
                <li class="nav-item" id="pengasuh-staff">
                    <a class="nav-link" href="{{Route('pengasuh-staff')}}">Staff & Pengasuh</a>
                </li>
                <li class="nav-item" id="kesantrian">
                    <a class="nav-link" href="{{Route('kesantrian')}}">Kesantrian</a>
                </li>
                <li class="nav-item" id="prestasi">
                    <a class="nav-link" href="{{Route('prestasi')}}">Prestasi</a>
                </li>
                <li class="nav-item" id="kelas-kamar">
                    <a class="nav-link" href="{{Route('kelas-kamar')}}">Kelas & Kamar</a>
                </li>
                <li class="nav-item" id="layanan">
                    <a class="nav-link" href="{{Route('layanan')}}">Layanan</a>
                </li>
            </ul>
        </div>
    </nav>
   
    <div class="bg-light border">
        @yield('content')
        <!-- Footer Start -->
            <div class="container">
                <div class="row justify-content-end">
                        <div class="d-flex align-items-center justify-content-center p-3 text-center" >
                            <p class="text-secondary">Copyright ©2023-{{ now()->year }} PPATQ RAUDLATUL FALAH</p> 
                        </div>
                </div>
            </div>
    
            <!-- Back to Top -->
            <a href="#top" class="btn btn-lg btn-success btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
        <!-- Footer End -->
    </div>
    
<script>
    function test() {
        var tabsNewAnim = $('#navbarSupportedContent');
        var selectorNewAnim = tabsNewAnim.find('li').length;
        var activeItemNewAnim = tabsNewAnim.find('.active');
        var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
        var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
        var itemPosNewAnimTop = activeItemNewAnim.position().top;
        var itemPosNewAnimLeft = activeItemNewAnim.position().left;
    
        // Update the .hori-selector position
        $(".hori-selector").css({
            "top": itemPosNewAnimTop + "px", 
            "left": itemPosNewAnimLeft + "px",
            "height": activeWidthNewAnimHeight + "px",
            "width": activeWidthNewAnimWidth + "px"
        });
     // Call test() after the navbar is toggled
     $(".navbar-toggler").click(function() {
            $(".navbar-collapse").slideToggle(300);
        });
  
    }
    
 
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    
    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
    @yield('script')
</body>
</html>
@extends('layout.main_layout')
@section('title')
<title>PPATQ - RF</title>
@endsection

@section('content')
<div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($berita as $key => $item)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            @php
                $url = 'https://manajemen.ppatq-rf.id/assets/img/upload/berita/thumbnail/' . $item->thumbnail;
                $headers = get_headers($url);
                $exists = strpos($headers[0], '200');
            @endphp
            @if ($exists !== false)
                <img class="carousel-img" src="{{ $url }}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            @else
                <img class="carousel-img" src="{{ asset('img/auth-cover-login-mask-light.png') }}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            @endif
            <div class="carousel-caption d-flex flex-column justify-content-center">
                <div class="text-start ml-carousel" style="max-width: 900px;">
                    <h1 class="fs-2 text-white text-uppercase mb-3 animated slideInDown">{{ $item->judul }}</h1>
                    <a href="{{ route('berita.detail', ['id_berita' => $item->id]) }}" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    @endforeach
    
    
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <!-- About Start -->
    @include('About.content')
    <!-- About End -->


  

        <!-- Facts Start -->
        <div class="container-fluid facts py-5">
            <div class="container py-5 ">
                <div class="row gx-0">
                    <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                        <div class="bg-green shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                            <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                                <i class="fa fa-users text-green"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-white mb-0">Alumni</h5>
                                <h1 class="text-white mb-0" data-toggle="counter-up">{{$totalAlumni}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                        <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                            <div class="bg-green d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                                <i class="fa fa-check text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-green mb-0">Santri</h5>
                                <h1 class="mb-0" data-toggle="counter-up">{{$totalSantri}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-green shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                            <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                                <i class="fa fa-award text-green"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-white mb-0">Pengajar</h5>
                                <h1 class="text-white mb-0" data-toggle="counter-up">{{$totalPengajar}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts Start -->
    


@include('metode.content')


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 w-100">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-green text-uppercase text-green">Berita Terbaru</h2>
                <small class="mb-0">Berita Terbaru PPATQ RAUDLATUL FALAH</small>
            </div>
            <div class="row g-5">
                @foreach ($berita as $list)
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <div style="max-height: 200px; width:400px;">
                                <img class="img-fluid" src="https://manajemen.ppatq-rf.id/assets/img/upload/berita/thumbnail/{{$list->thumbnail}}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <img class="img-fluid" src="{{asset('img/auth-cover-login-mask-light.png')}}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-2"><i class="far fa-user text-green me-2"></i>
                                    {{ $list->nama_user != '' ? $list->nama_user : 'Annonymous' }}
                                </small>
                                <small class="me-2"><i class="far fa-calendar-alt text-green me-2"></i>{{ \Carbon\Carbon::parse($list->created_at)->translatedFormat('d F Y') }}</small>
                            </div>
                            <h4 class="mb-3">{{$list->judul}}</h4>
                            <a class="text-uppercase text-green" href="{{ route('berita.detail', ['id_berita' => $list->id]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                    
                @endforeach
               
            </div>
        </div>
    </div>
    <!-- Blog Start -->
    



@endsection


@section('script')
<script>
       $(document).ready(function() {
        $('.carousel-item').eq(0).addClass('active');
        var tabsNewAnim = $('#navbarSupportedContent');
        var selectorNewAnim = tabsNewAnim.find('li').length;
        var activeItemNewAnim = tabsNewAnim.find('.active');
        activeItemNewAnim.removeClass('active');
        $('#home').addClass('active');
        setTimeout(function() {
            test();
        }, 100); // Slight delay to ensure elements are rendered
    
        // Call test() when the window is resized
        $(window).on('resize', function() {
            setTimeout(function() {
                test();
            }, 500);
        });
    
    });
</script>
@endsection
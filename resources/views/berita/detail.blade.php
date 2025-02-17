@extends('layout.main_layout')
@section('title')
<title>{{ $berita->judul }} | PPATQ-RF</title>
@endsection


@section('header')
@endsection
@section('content')
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-4">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <h1 class="mb-4">{{$berita->judul}}</h1>
                        @php
                            Carbon\Carbon::setLocale('id');
                            $url = $berita->thumbnail ?? null;
                            if ($url && filter_var($url, FILTER_VALIDATE_URL)) {
                                $headers = @get_headers($url);
                                $exists = $headers && strpos($headers[0], '200') !== false;
                            } else {
                                $exists = false;
                            }
                        @endphp
                        @if ($exists !== false)
                        <img class="img-fluid" src="{{ $url }}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        @else
                        <img class="img-fluid" src="{{asset('img/auth-cover-login-mask-light.png')}}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        @endif
                        <div class="d-flex justify-content-end mt-5">
                        @php
                            $url = 'https://manajemen.ppatq-rf.id/assets/img/upload/berita/foto_isi/' . $berita->gambar_dalam;
                            if ($url && filter_var($url, FILTER_VALIDATE_URL)) {
                                $headers = @get_headers($url);
                                $exists = $headers && strpos($headers[0], '200') !== false;
                            } else {
                                $exists = false;
                            } 
                        @endphp
                        <div class="col col-sm-7">
                            <a target="_blank" class="fs-4" href="https://www.facebook.com/sharer/sharer.php?u={{ route('berita.detail', ['id_berita' => $berita->id]) }}"><i class="bi bi-facebook"></i></a>
                        </div>
                        <div class="col col-sm-5 d-sm-flex">
                            <p>
                                <small class="me-2"><i class="far fa-user text-green me-2"></i>{{ $berita->nama_user != '' ? $berita->nama_user : 'Annonymous' }}</small>
                            </p>
                            <p>
                                <small class="me-2"><i class="far fa-calendar-alt text-green me-2"></i>{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}</small>
                            </p>
                            <p>
                                <small class="me-2"><i class="far fa-list-alt text-green me-2"></i>{{$berita->nama_kategori}}</small>
                            </p>
                        </div>
                        </div>
                        <p>{!! $berita->isi_berita !!}</p>
                    </div>
                    <!-- Blog Detail End -->
                   
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Berita Terbaru</h3>
                        </div>
                        @foreach ($dataList as $row )
                        @if ($berita->id != $row->id)
                            
                        <div class="d-flex rounded overflow-hidden mb-3">
                            @php
                            $url = $row->thumbnail;
                            if ($url && filter_var($url, FILTER_VALIDATE_URL)) {
                                $headers = @get_headers($url);
                                $exists = $headers && strpos($headers[0], '200') !== false;
                            } else {
                                $exists = false;
                            }
                        @endphp
                        @if ($exists !== false)
                        <img class="img-fluid" src="{{$url}}" style="width: 100px; height: 100px; object-fit: cover;" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                        @else
                        <img class="img-fluid" src="{{asset('img/auth-cover-login-mask-light.png')}}" style="width: 100px; height: 100px; object-fit: cover;" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        @endif
                        <div class="d-flex flex-column px-3">
                            <a href="{{ route('berita.detail', ['id_berita' => $row->id]) }}" class="fw-semi-bold d-flex align-items-center bg-light mb-0 text-decoration-none text-dark">{{$row->judul}}</a>
                            <p>{{ Str::limit(strip_tags($row->isi_berita),50) }}</p>
                        </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <!-- Recent Post End -->
    
    
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->

    

@endsection


@section('script')
<script>
    $(document).ready(function() {
     var tabsNewAnim = $('#navbarSupportedContent');
     var selectorNewAnim = tabsNewAnim.find('li').length;
     var activeItemNewAnim = tabsNewAnim.find('.active');
     activeItemNewAnim.removeClass('active');
     $('#berita').addClass('active');
     setTimeout(function() {
         test();
     }, 100); // Slight delay to ensure elements are rendered
 });
</script>
@endsection
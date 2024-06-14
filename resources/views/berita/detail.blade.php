@extends('layout.main_layout')
@section('title')
<title>Detail Berita</title>
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
                            $url = 'https://www.ppatq-rf.sch.id/wp-content/uploads/2024/06/'.$berita->thumbnail;
                        @endphp
                        @if ($url !== false)
                        <img class="img-fluid" src="https://www.ppatq-rf.sch.id/wp-content/uploads/2024/06/{{$berita->thumbnail}}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        @else
                        <img class="img-fluid" src="{{asset('img/auth-cover-login-mask-light.png')}}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        @endif
                        <div class="d-flex justify-content-end mt-5">
                            <small class="me-2"><i class="far fa-user text-green me-2"></i>
                                {{ $berita->nama_user != '' ? $berita->nama_user : 'Annonymous' }}
                            </small>
                            <small class="me-2"><i class="far fa-calendar-alt text-green me-2"></i>{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}</small>
                            <small class="me-2"><i class="far fa-list-alt text-green me-2"></i>{{$berita->nama_kategori}}</small>
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
                            $url = 'https://www.ppatq-rf.sch.id/wp-content/uploads/2024/06/'.$row->thumbnail;
                        @endphp
                        @if ($url !== false)
                        <img class="img-fluid" src="https://www.ppatq-rf.sch.id/wp-content/uploads/2024/06/{{$row->thumbnail}}" style="width: 100px; height: 100px; object-fit: cover;" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                        @else
                        <img class="img-fluid" src="{{asset('img/auth-cover-login-mask-light.png')}}" style="width: 100px; height: 100px; object-fit: cover;" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        @endif
                            <a href="{{ route('berita.detail', ['id_berita' => $row->id]) }}" class="fw-semi-bold d-flex align-items-center bg-light px-3 mb-0 text-decoration-none text-dark">{{$row->judul}}
                            </a>
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
@endsection
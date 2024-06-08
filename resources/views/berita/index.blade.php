@extends('layout.main_layout')
@section('title')
<title>Berita</title>
@endsection
@section('header')
@endsection
@section('content')
    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 w-100">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-green text-uppercase text-green">Berita PPATQ</h2>
                <small class="mb-0">Kumpulan Berita PPATQ RAUDLATUL FALAH</small>
            </div>
            <div class="row">
                @foreach ($data as $berita)
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <div style="max-height: 200px; width:400px;">
                                    @php
                                    $url = 'https://manajemen.ppatq-rf.id/assets/img/upload/berita/thumbnail/' . $berita->thumbnail;
                                    $headers = get_headers($url);
                                    $exists = strpos($headers[0], '200');
                                @endphp
                                @if ($exists !== false)
                                <img class="img-fluid" src="https://manajemen.ppatq-rf.id/assets/img/upload/berita/thumbnail/{{$berita->thumbnail}}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                @else
                                    <img class="img-fluid" src="{{asset('img/auth-cover-login-mask-light.png')}}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                @endif
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-2"><i class="far fa-user text-green me-2"></i>
                                        {{ $berita->nama_user != '' ? $berita->nama_user : 'Annonymous' }}
                                    </small>
                                    <small class="me-2"><i class="far fa-calendar-alt text-green me-2"></i>{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}</small>
                                </div>
                                <h4 class="mb-3">{{$berita->judul}}</h4>
                                <a class="text-uppercase text-green" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-center pagination-container">
            <!-- Pagination -->
            {{ $data->links() }}
        </div>
    </div>

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
    
        // Call test() when the window is resized
        $(window).on('resize', function() {
            setTimeout(function() {
                test();
            }, 500);
        });
    
    });
</script>
@endsection
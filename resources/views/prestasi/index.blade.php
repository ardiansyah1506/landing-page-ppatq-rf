@extends('layout.main_layout')
@section('title')
<title>Berita | PPATQ-RF</title>
@endsection
@section('header')
@endsection
@section('content')
    <!-- Blog Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h2 class="fw-bold text-green text-uppercase text-green">Prestasi PPATQ</h2>
            <small class="mb-0">Kumpulan Prestasi PPATQ RAUDLATUL FALAH</small>
        </div>
        <!-- Service 4 - Bootstrap Brain Component -->
        @foreach ($prestasi as $row)
            <section class="py-3">
                <div class="container overflow-hidden">
                    <div class="row gy-4 gy-xl-0">
                        <div class="col-12 col-sm-4">
                            <div class="border-0 border-bottom border-success shadow-sm">
                                <div class="p-2 p-xxl-3">
                                    @php
                                        $baseUrl = "https://manajemen.ppatq-rf.id/assets/img/upload/foto_fasilitas/";
                                        $foto = $row->foto;
                                        $url = $baseUrl . $foto;
                                        
                                        $headers = @get_headers($url);
                                        
                                        if($headers && strpos($headers[0], '200') !== false) {
                                            $imgUrl = $url;
                                        } else {
                                            $imgUrl = "https://ui-avatars.com/api/?name=" . str_replace(' ', '+', $row->namaSantri);
                                        }
                                    @endphp

                                    <div class="text-center">
                                        <img src="{{ $imgUrl }}" class="img-fluid mb-4" alt="Foto prestasi {{ $row->namaSantri }}">
                                    </div>

                                    <h4 class="mb-3 text-center">{{ $row->prestasi_text }}</h4>
                                    <h6>{{ $row->jenis_text }}</h6>
                                    <h6>{{ $row->tingkat_text }}</h6>
                                    <p>{{ $row->deskripsi }}. Oleh {{ $row->namaSantri }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </div>

@endsection


@section('script')
<script>
       $(document).ready(function() {
        var tabsNewAnim = $('#navbarSupportedContent');
        var selectorNewAnim = tabsNewAnim.find('li').length;
        var activeItemNewAnim = tabsNewAnim.find('.active');
        activeItemNewAnim.removeClass('active');
        $('#prestasi').addClass('active');
        setTimeout(function() {
            test();
        }, 100); // Slight delay to ensure elements are rendered
    });
</script>
@endsection
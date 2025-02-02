@extends('layout.main_layout')
@section('title')
<title>Galeri | PPATQ-RF</title>
@endsection
@section('header')
<style>
    .portfolio-item{
        width:100%;
    }
    .portfolio-item .item{
        /*width:303px;*/
        float:left;
        margin-bottom:10px;
    }

    .card-fasilitas {
        position: relative;
        display: flex;
        flex-direction: column;
        margin: 30px 0 30px 0;
        min-width: 0; // See https://github.com/twbs/bootstrap/pull/22740#issuecomment-305868106
        word-wrap: break-word;
        background-clip: border-box;
    }

    #ads .card-notify-badge {
        position: absolute;
        left: -10px;
        top: -20px;
        text-align: center;
        border-radius: 30px 30px 30px 30px; 
        color: #000;
        padding: 5px 10px;
        font-size: 14px;
    }

    #ads .deskripsi-fasilitas {
        display: block; 
        position: absolute;           /* Pastikan elemen ini menjadi block-level */
        margin-top: 10px;          /* Jarak antara gambar dan deskripsi */
        text-align: center;
        left: 25%;
        transform: translateX(-25%);
        border-radius: 30px;
        color: #000;
        padding: 5px 10px;
        font-size: 14px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
@endsection
@section('content')
    <div class="container py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                    <h2 class="fw-bold text-green text-uppercase text-green">Galeri PPATQ</h2>
                    <small class="mb-0">Kumpulan foto Di PPATQ RAUDLATUL FALAH</small>
                </div>
                <div class="portfolio-item row">
                    @if ($galeri && !$galeri->isEmpty())
                        @foreach ($galeri as $row)
                            <div class="item selfie col-lg-6 col-md-6 col-6 col-sm d-flex align-items-center justify-content-center">
                                <a href="https://manajemen.ppatq-rf.id/assets/img/upload/foto_galeri/{{ $row->foto }}" class="fancylight popup-btn" data-fancybox-group="light"> 
                                    <img class="img-fluid shadow-sm" src="https://manajemen.ppatq-rf.id/assets/img/upload/foto_galeri/{{ $row->foto }}" alt="{{ $row->nama }}">
                                </a>
                            </div>
                        @endforeach
                    @else
                    <div class="text-center">
                        <small class="text-muted  border-bottom">Galeri Kosong</small>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                    <h2 class="fw-bold text-green text-uppercase text-green">Fasilitas PPATQ</h2>
                    <small class="mb-0">Kumpulan Fasilitas Di PPATQ RAUDLATUL FALAH</small>
                </div>
                <div class="portfolio-item row" id="ads">
                    {{-- @if ($fasilitas && !$fasilitas->isEmpty())
                        @foreach ($fasilitas as $row)
                            <div class="item selfie col-lg-6 col-md-4 col-6 col-sm d-flex align-items-center justify-content-center">
                                <a href="https://manajemen.ppatq-rf.id/assets/img/upload/foto_fasilitas/{{ $row->foto }}" class="fancylight popup-btn" data-fancybox-group="light"> 
                                    <img class="img-fluid shadow-sm" src="https://manajemen.ppatq-rf.id/assets/img/upload/foto_fasilitas/{{ $row->foto }}" alt="{{ $row->nama }}">
                                </a>
                            </div>
                        @endforeach
                    @else
                    <div class="text-center">
                        <small class="text-muted  border-bottom">Fasilitas Kosong</small>
                    </div>
                    @endif --}}

                    @if ($fasilitas && !$fasilitas->isEmpty())
                        @foreach ($fasilitas as $row)
                            <div class="item selfie col-lg-6 col-md-4 col-6 col-sm d-flex align-items-center justify-content-center">
                                <div class="card-fasilitas">
                                    <span class="card-notify-badge bg-green text-white">{{ $row->nama }}</span>
                                    <a href="https://manajemen.ppatq-rf.id/assets/img/upload/foto_fasilitas/{{ $row->foto }}" class="fancylight popup-btn" data-fancybox-group="light"> 
                                        <img class="img-fluid shadow-sm" src="https://manajemen.ppatq-rf.id/assets/img/upload/foto_fasilitas/{{ $row->foto }}" alt="{{ $row->nama }}">
                                    </a>
                                    <span class="deskripsi-fasilitas bg-white shadow-sm" style="bottom: {{ strlen($row->deskripsi) > 20 ? '-60px' : '-10px' }};">
                                        {{ $row->deskripsi }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="text-center">
                        <small class="text-muted  border-bottom">Fasilitas Kosong</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script>
       $(document).ready(function() {
            var tabsNewAnim = $('#navbarSupportedContent');
            var selectorNewAnim = tabsNewAnim.find('li').length;
            var activeItemNewAnim = tabsNewAnim.find('.active');
            activeItemNewAnim.removeClass('active');
            
            $('#galeri-fasilitas').addClass('active');
            setTimeout(function() {
                test();
            }, 100);

            var popup_btn = $('.popup-btn');
                popup_btn.magnificPopup({
                    type : 'image',
                    gallery : {
                        enabled : true
                    }
            });
        });
</script>
@endsection
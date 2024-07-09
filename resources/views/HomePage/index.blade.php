@extends('layout.main_layout')
@section('title')
<title>Beranda | PPATQ-RF</title>
@endsection

@section('content')
<div class="div">
    <iframe loading="lazy" title="PONDOK PESANTREN ANAK TAHFIDZUL QURAN RAUDLATUL FALAH | Bermi Gembong Pati Jawa Tengah Indonesia" src="https://www.youtube.com/embed/V_Q4hHxonGg?feature=oembed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen="true" class="h-100 w-100 mt-0" style="min-height:600px;"></iframe>
</div>
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container w-100">
        <div class="row mb-3">
            <div class="col-12 col-sm-9">
                <div class="row">
                    <div class="col-12 py-4 d-flex align-items-center gap-4">
                        <div class="col-sm-2 col">
                            <div class="section-title position-relative" style="max-width: 600px;">
                                <h2 class="fw-bold text-green text-uppercase text-green py-2">Berita</h2>
                            </div>
                        </div>
                        <div class="col">
                            <a href="{{ route('berita') }}" class="fst-italic text-gray text-all-news">|  Semua Berita</a>
                        </div>
                    </div>
                    @foreach ($beritas as $berita)
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <div class="overflow-hidden">
                                        @php
                                        Carbon\Carbon::setLocale('id');
                                        $url = 'https://manajemen.ppatq-rf.id/assets/img/upload/berita/thumbnail/' . $berita->thumbnail;
                                        $headers = get_headers($url);
                                        $exists = strpos($headers[0], '200');
                                    @endphp
                                    @if ($exists !== false)
                                    <a class="text-decoration-none text-dark" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">
                                        <img class="img-fluid rounded" src="{{$url}}"  alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    </a>
                                    @else
                                    <a class="text-decoration-none text-dark" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">
                                        <img class="img-fluid rounded" src="{{asset('img/auth-cover-login-mask-light.png')}}"   alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    </a>
                                    @endif
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-2 fst-italic"><i class="far fa-calendar-alt text-green me-2"></i>{{ \Carbon\Carbon::parse($berita->created_at)->diffForHumans() }}</small>
                                    </div>
                                    <h4 class="mb-3"><a class="text-decoration-none text-dark" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">{{$berita->judul}}</a></h4>
                                    <p class="mb-0">{{ Str::limit(strip_tags($berita->isi_berita),150) }}</p>
                                    <a class="text-green" href="{{ route('berita.detail', ['id_berita' => $berita->id]) }}">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col mt-5 mt-sm-0">
                <div class="col py-4 d-flex align-items-center gap-4">
                    <div class="col">
                        <div class="section-title position-relative" style="max-width: 600px;">
                            <h4 class="fw-bold text-green text-uppercase text-green py-2">Agenda</h4>
                        </div>
                    </div>
                    {{-- <div class="col">
                        <a href="#" class="fst-italic text-gray text-all-news">|  Semua Agenda</a>
                    </div> --}}
                </div>
                
                <div class="col mt-2 px-2">
                    @foreach ($agendas as $agenda)
                    <div class="row mb-4 border-bottom py-2">
                        <div class="col-3 d-flex flex-column align-items-center text-white fw-bold">
                            <span class="text-green px-2">{{ substr($agenda->tanggal_mulai, 8, 2)  }}</span>
                            <span class="text-green px-2">{{ $agenda->bulan  }}</span>
                        </div>
                        <div class="col">
                            <h6 class="mb-0">{{ $agenda->judul }}</h6>
                            <small>{{ Str::limit(strip_tags($agenda->isi),45) }}</small>
                            <p class="fst-italic bg-green text-white px-1 rounded text-center">{{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row wow slideInUp d-flex justify-content-center" data-wow-delay="0.3s">
            <div class="row mb-3">
                <div class="section-title position-relative" style="max-width: 600px;">
                    <h4 class="fw-bold text-green text-uppercase text-green py-2">Sosial Media</h4>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-9">
                    <div class="row d-flex justify-content-center gap-3">
                        <div class="col-1">
                            <a href="https://www.facebook.com/pprtq.r.falah" target="_blank" class="text-decoration-none fs-1"><i class="bi bi-facebook"></i></a>
                        </div>
                        <div class="col-1">
                            <a href="https://www.youtube.com/@PPATQTV" target="_blank" class="text-decoration-none fs-1 text-danger"><i class="bi bi-youtube"></i></a>
                        </div>
                        <div class="col-1">
                            <a href="https://www.instagram.com/ppatq_raudlatulfalah/" target="_blank" class="text-decoration-none fs-1 instagram"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 col-sm-9 px-4">
                            <div class="d-flex flex-column flex-md-row p-4 gap-5 shadow-sm">
                                <img src="https://ppatq-rf.sch.id/wp-content/uploads/2013/04/abah-sohib.png"
                                class="rounded-circle img-fluid mb-4 mb-lg-0 shadow-sm" alt="foto abah" width="100" height="200">
                                <figure>
                                    <blockquote class="blockquote mb-4">
                                        <p>
                                            <i class="fas fa-quote-left fa-lg text-success me-2"></i>
                                            <span class="font-italic">Pantang Boyong Sebelum Glondong</span>
                                        </p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        Ust. Noor Shokhib, AH, M.PD.I
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mt-5 mt-sm-0">
                    <div class="col-12 py-2 bg-green rounded-bottom"></div>
                    <div class="col px-3 py-3 shadow-sm rounded-bottom d-flex flex-column">
                        <div id="santri-random" class="row mb-4 border-bottom py-2 d-flex justify-content-center"></div>
                        <div id="pegawai-random" class="row border-bottom py-2 d-flex justify-content-center"></div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-9 px-4">
                    {{-- <div class="d-flex flex-column flex-md-row p-4 gap-5 shadow-sm">
                        <img src="http://landing-page-ppatq-rf.test/img/abah-sohib.png"
                        class="rounded-circle img-fluid mb-4 mb-lg-0 shadow-sm" alt="foto abah" width="100" height="200">
                        <figure>
                            <blockquote class="blockquote mb-4">
                                <p>
                                    <i class="fas fa-quote-left fa-lg text-success me-2"></i>
                                    <span class="font-italic">Pantang Boyong Sebelum Glondong</span>
                                </p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                Ust. Noor Shokhib, AH, M.PD.I
                            </figcaption>
                        </figure>
                    </div> --}}
                </div>
                <div class="col mt-5 mt-sm-0 px-2">
                    <div class="col-12 py-2 bg-green rounded-bottom"></div>
                    <div class="col px-3 py-3 shadow-sm rounded-bottom d-flex flex-column">
                        <span><i class="bi bi-person-workspace"></i> Guru : {{ $jumlahGuru }}</span>
                        <span><i class="bi bi-person-fill"></i> Murroby : {{ $jumlahMurroby }}</span>
                        <span><i class="bi bi-person-standing"></i> Santri Putra : {{ $jumlahSiswaLaki }}</span>
                        <span><i class="bi bi-person-standing-dress"></i> Santri Putri : {{ $jumlahSiswaPerempuan }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection


@section('script')
<script>

        function fetchDataRandom() {
            $.ajax({
                url: '/santri-random',
                method: 'GET',
                success: function(data) {
                    displaySantriData(data);
                },
                error: function(error) {
                    console.error('Error fetching santri data:', error);
                }
            });

            $.ajax({
                url: '/pegawai-random',
                method: 'GET',
                success: function(data) {
                    displayPegawaiData(data);
                },
                error: function(error) {
                    console.error('Error fetching santri data:', error);
                }
            });
        }

        function displaySantriData(santri) {
            $('#santri-random').html(`
                        <div class="col-6 d-flex flex-column align-items-center text-white">
                            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${ santri.photo }"
                                    class="img-fluid text-dark rounded" alt="foto ${ santri.nama }">
                        </div>
                        <div class="col">
                            <p class="text-uppercase fs-8 fw-bold mb-0">${ santri.nama }</p>
                            <p class="mb-0">Kelas : <span class="text-uppercase">${santri.kelas}</span></p>
                        </div>
            `);
        }   
        function displayPegawaiData(pegawai) {
            $('#pegawai-random').html(`
                <div class="col-5 d-flex flex-column align-items-center text-white">
                    <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${ pegawai.photo }"
                        class="img-fluid text-dark rounded" alt="foto ${ pegawai.nama }">
                </div>
                <div class="col">
                    <p class="text-uppercase fs-8 fw-bold mb-0">${ pegawai.nama }</p>
                    <p class="mb-0">Sebagai : ${pegawai.jabatan}</p>
                </div>
            `);
        }   
    
       $(document).ready(function() {
        fetchDataRandom();
        setInterval(fetchDataRandom, 60000);

        $('.carousel-item').eq(0).addClass('active');
        var tabsNewAnim = $('#navbarSupportedContent');
        var selectorNewAnim = tabsNewAnim.find('li').length;
        var activeItemNewAnim = tabsNewAnim.find('.active');
        activeItemNewAnim.removeClass('active');
        $('#home').addClass('active');
        setTimeout(function() {
            test();
        }, 100); // Slight delay to ensure elements are rendered

    });
</script>
@endsection
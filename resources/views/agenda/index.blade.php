@extends('layout.main_layout')
@section('title')
<title>Agenda | PPATQ-RF</title>
@endsection
@section('header')
@endsection
@section('content')
    <!-- Blog Start -->
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container w-100">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-green text-uppercase text-green">Agenda PPATQ</h2>
                <small class="mb-0">Kumpulan Agenda PPATQ RAUDLATUL FALAH</small>
            </div>
            <div class="row">
                @if ($agenda && !$agenda->isEmpty())
                @foreach ($agenda as $row)
                    <div class="col-12 p-2 wow slideInUp" data-wow-delay="0.3s">
                        <div class="blog-item d-flex flex-row bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <div class="overflow-hidden">
                                    @php
                                        Carbon\Carbon::setLocale('id');
                                        $url = "https://manajemen.ppatq-rf.id/assets/img/upload/foto_agenda/" . $row->gambar;

                                        $cek = $row->gambar;
                                        if (!empty($cek)) {
                                            // Dapatkan headers dari URL
                                            $headers = @get_headers($url);
                                            
                                            // Periksa apakah headers berhasil didapatkan
                                            if ($headers !== false) {
                                                // Cek apakah respons HTTP adalah 200 OK
                                                $exists = strpos($headers[0], '200') !== false;
                                            } else {
                                                $exists = false; // Tidak dapat mendapatkan headers
                                            }
                                        } else {
                                            $exists = false; // URL kosong  
                                        }

                                    @endphp
                                    @if ($exists !== false)
                                        <img class="img-fluid rounded" src="{{$url}}"  alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    @else
                                        <img class="img-fluid rounded" src="https://ui-avatars.com/api/?name={{$row->judul}}" alt="Gambar Berita" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    @endif
                                </div>
                            </div>
                            <div class="p-4">
                                <h4 class="mb-3"><a class="text-decoration-none text-dark">{{$row->judul}}</a></h4>
                                <div class="d-flex mb-3 align-items-center">
                                    <small class="me-2 fst-italic">
                                        <i class="bi bi-calendar2-event"></i>
                                        {{ \Carbon\Carbon::parse($row->tanggal_mulai)->format('d M Y') }}
                                    </small>
                                    <small class="me-2 fst-italic">
                                        <i class="bi bi-calendar2-check"></i>
                                        {{ \Carbon\Carbon::parse($row->tanggal_selesai)->format('d M Y') }}
                                    </small>
                                </div>
                                <p class="mb-0">{!! $row->isi_paragraph == "<p><br></p>"? "tidak ada deskripsi agenda" : $row->isi_paragraph !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="text-center">
                    <small class="text-muted  border-bottom">Berita Kosong</small>
                </div>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-center pagination-container">
            <!-- Pagination -->
            {{ $agenda->links() }}
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
        $('#agenda').addClass('active');
        setTimeout(function() {
            test();
        }, 100); // Slight delay to ensure elements are rendered
    });
</script>
@endsection
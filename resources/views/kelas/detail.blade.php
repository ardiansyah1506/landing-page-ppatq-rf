<!-- resources/views/santri/index.blade.php -->

@extends('layout.main_layout')
@section('title')
    <title>Kamar {{ $kelasData->nama_kelas }} | PPATQ-RF</title>
@endsection
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container-fluid py-5">
        <a href="{{ url()->previous() }}" class="text-decoration-none text-white bg-green p-2 rounded">
            <i class="bi bi-backspace-fill"></i> Kembali
        </a>
        <div class="row" id="kelas-container">
            <h3 class="text-center text-green mb-4 text-uppercase">Wali Kelas</h3>
            <!-- Data santri akan ditambahkan melalui JavaScript -->
            <div class="d-flex justify-content-center mb-4 align-items-center">
                <div class="col-md-7 col-lg-3 wow fadeIn mb-4 d-flex flex-column align-items-center">
                    <div class="col-11 border border-success">
                    </div>
                    <div class="card border-0 shadow-sm p-4 rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            @if ($kelasData->wali_kelas_photo)
                                <img class="w-50 img-thumbnail" 
                                    src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $kelasData->wali_kelas_photo }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#imageModal"
                                    alt="foto profil" onerror="this.onerror=null; this.src='{{ asset('img/auth-cover-login-mask-light.png') }}';">
                            @else
                                <img class="w-50 img-thumbnail" 
                                     src="{{ asset('img/auth-cover-login-mask-light.png') }}"
                                     alt="foto profil">
                            @endif
                        </div>
                        
                        <div class="p-1 d-flex flex-column gap-5">
                            <h5 class="fs-6 mb-0 text-center text-uppercase">{{ $kelasData->wali_kelas_nama }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Santri Container -->
        <div class="row d-flex justify-content-center align-items-center" id="santri-container">
            <div class="text-center mb-4">
                <h3 class="text-green ">Santri Kamar {{ $kelasData->nama_kelas }}</h3>
                <p class="fst-italic">Jumlah Santri : {{ $jumlahIsi }}</p>
            </div>
            @foreach ($query as $santri)
                <div class="col-md-7 col-lg-4 wow fadeIn mb-4">
                    <div class="card border-0 shadow-sm p-2 rounded d-flex flex-row">
                        <div class="col-5 d-flex justify-content-center align-items-center p-2 rounded">
                            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $santri->photo }}"
                                class="img-fluid rounded shadow-sm p-1" alt="foto profil {{ $santri->nama }}"
                                data-bs-toggle="modal"
                                data-bs-target="#imageModal"
                                data-src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $santri->photo }}">
                        </div>
                        <div class="d-flex flex-column gap-3 col py-2">
                            <div class="col-11 border border-success">
                            </div>
                            <h5 class="fs-6 mb-0 text-uppercase text-center">{{ $santri->nama }}</h5>
                            <ul class="list-unstyled w-100">
                                <div class="col">
                                    <div class="col">
                                        <p class="lh-1 text-sm mb-1">
                                            Kamar : {{ $santri->guru_murroby ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="lh-1 text-sm mb-1">
                                            {{ $santri->kelasTahfidz ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="lh-1 text-sm mb-1">
                                            Hafalan : {{ $santri->hafalan ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="lh-1 text-sm">
                                            Tempat Asal : {{ $santri->kecamatan ?? '-' }}
                                        </p>
                                    </div>
                                </div>

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Modal Foto --}}
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <!-- Gambar akan dimuat secara dinamis di sini -->
                    <img id="modalImage" class="img-fluid rounded shadow-sm" alt="Gambar besar">
                </div>
            </div>
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
        $('#kelas').addClass('active');
        setTimeout(function() {
            test();
        }, 100);

        $('#imageModal').on('show.bs.modal', function (event) {
            const triggerImage = $(event.relatedTarget); // Elemen yang memicu modal
            const src = triggerImage.data('src'); // Ambil data-src
            const alt = triggerImage.attr('alt'); // Ambil atribut alt

            // Set src dan alt untuk gambar di modal
            $('#modalImage').attr('src', src);
            $('#modalImage').attr('alt', alt);
        });
    });
</script>
@endsection

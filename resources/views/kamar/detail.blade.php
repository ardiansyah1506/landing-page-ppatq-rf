<!-- resources/views/santri/index.blade.php -->

@extends('layout.main_layout')
@section('title')
    <title>Kamar {{ $dataKamar->nama_kamar }} | PPATQ-RF</title>
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
            <h3 class="text-center text-green mb-4 text-uppercase">Murroby</h3>
            <!-- Data santri akan ditambahkan melalui JavaScript -->
            <div class="d-flex justify-content-center mb-4 align-items-center">
                <div class="col-md-7 col-lg-3 wow fadeIn mb-4">
                    <div class="card border-0 shadow-sm p-4 rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            @if ($dataKamar->foto_murroby)
                                <img class="w-50 img-thumbnail" 
                                     src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $dataKamar->foto_murroby }}"
                                     alt="foto profil" onerror="this.onerror=null; this.src='{{ asset('img/auth-cover-login-mask-light.png') }}';">
                            @else
                                <img class="w-50 img-thumbnail" 
                                     src="{{ asset('img/auth-cover-login-mask-light.png') }}"
                                     alt="foto profil">
                            @endif
                        </div>
                        
                        <div class="p-1 d-flex flex-column gap-5">
                            <h5 class="fs-6 mb-0 text-center text-uppercase">{{ $dataKamar->nama_murroby }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Santri Container -->
        <div class="row" id="santri-container">
            <div class="text-center mb-4">
                <h3 class="text-green ">Santri Kamar {{ $dataKamar->nama_kamar }}</h3>
                <p class="fst-italic">Jumlah Santri : {{ $jumlahIsi }}</p>
            </div>
            <!-- Data santri akan ditambahkan melalui JavaScript -->
            @foreach ($query as $santri)
                <div class="col-md-7 col-lg-3 wow fadeIn mb-4">
                    <div class="card border-0 shadow-sm p-4 rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $santri->photo }}"
                                class="w-50 img-thumbnail" alt="foto profil {{ $santri->nama }}">
                        </div>
                        <div class="p-1 d-flex flex-column gap-5">
                            <h5 class="fs-6 mb-0 text-center text-uppercase">{{ $santri->nama }}</h5>
                            <ul class="list-unstyled w-100 mb-4">
                                <div class="col text-center">
                                    <div class="col shadow-sm mb-4">
                                        <p class="text-white bg-green rounded-bottom mb-0">
                                            Kelas
                                        </p>
                                        <h6 class="p-3 text-uppercase">
                                            {{ $santri->kelas ?? '-' }}
                                        </h6>
                                    </div>
                                    <div class="col shadow-sm">
                                        <p class="bg-green text-white rounded-bottom mb-0">
                                            Kecamatan
                                        </p>
                                        <h6 class="text-uppercase p-3">
                                            {{ $santri->kecamatan ?? '-' }}
                                        </h6>
                                    </div>
                                </div>

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
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
     $('#kamar').addClass('active');
     setTimeout(function() {
         test();
     }, 100); // Slight delay to ensure elements are rendered
 
 });
</script>
@endsection

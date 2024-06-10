<!-- resources/views/santri/index.blade.php -->

@extends('layout.main_layout')
@section('title')
    <title>Kelas {{$kelasData->kode_kelas}}</title>
@endsection
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container-fluid py-5">
        <div class="row" id="kelas-container">
            <h3 class="text-center text-green mb-4"> Wali Kelas</h3>
            <!-- Data santri akan ditambahkan melalui JavaScript -->
            <div class="d-flex justify-content-center mb-4 align-items-center">
                <div class="col-md-7 col-lg-3 wow fadeIn mb-4">
                    <div class="card border-0 shadow-sm p-4 rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            @if ($kelasData->wali_kelas_photo)
                                <img class="w-50 img-thumbnail" 
                                     src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $kelasData->wali_kelas_photo }}"
                                     alt="foto profil"
                                     onerror="this.onerror=null; this.src='{{ asset('img/auth-cover-login-mask-light.png') }}';">
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
        <div class="row" id="santri-container">
            <h3 class="text-center text-green mb-4">Daftar Santri</h3>
            <!-- Data santri akan ditambahkan melalui JavaScript -->
            @foreach ($query as $santri)
                <div class="col-md-7 col-lg-3 wow fadeIn mb-4">
                    <div class="card border-0 shadow-sm p-4 rounded">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $santri->photo }}"
                                class="w-50 img-thumbnail" alt="foto profil">
                        </div>
                        <div class="p-1 d-flex flex-column gap-5">
                            <h5 class="fs-6 mb-0 text-center text-uppercase">{{ $santri->nama }}</h5>
                            <ul class="list-unstyled w-100 mb-4">
                                <div class="col text-center">
                                    <div class="col shadow-sm  mb-4">
                                        <p class="text-white bg-green rounded-bottom">
                                            Guru Murobby
                                        </p>
                                        <h6 class="">
                                            {{ $santri->guru_murroby ?? '-' }}
                                        </h6>
                                    </div>
                                    <div class="col shadow-sm">
                                        <p class="bg-green text-white rounded-bottom">
                                            Kota
                                        </p>
                                        <h6 class="text-uppercase">
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

        <!-- Pagination -->
        <div class="d-flex justify-content-center pagination-container mt-5">
            <!-- Pagination -->
            {{ $query->links() }}
        </div>
    </div>
@endsection

@section('script')
@endsection

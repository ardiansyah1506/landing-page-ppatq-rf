<!-- resources/views/santri/index.blade.php -->

@extends('layout.main_layout')
@section('title')
    <title>Santri / Alumni | PPATQ-RF</title>
@endsection
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <style>
        /* Ketika tombol di-hover */
        .nav-pills .nav-link:hover {
            color: rgb(0, 0, 0) !important;
        }

        /* Ketika tombol active */
        .nav-pills .nav-link.active {
            color: rgb(255, 255, 255) !important;
            background-color: #2dcc70;
        }

        /* Ketika tombol tidak active */
        /* .nav-pills .nav-link:not(.active) {
            color: rgb(255, 255, 255) !important;
            background-color: transparent;
        } */
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4 wow fadeInUp" data-wow-delay="0.1s">
        <ul class="nav nav-pills mb-3 gap-1 d-flex align-items-center justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active fw-bold text-uppercase text-green" id="pills-santri-tab" data-bs-toggle="pill" data-bs-target="#pills-santri" type="button" role="tab" aria-controls="pills-santri" aria-selected="true">Santri</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link fw-bold text-uppercase text-green" id="pills-alumni-tab" data-bs-toggle="pill" data-bs-target="#pills-alumni" type="button" role="tab" aria-controls="pills-alumni" aria-selected="false">Alumni</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-santri" role="tabpanel" aria-labelledby="pills-santri-tab">
                <div class="row">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                            <h2 class="fw-bold text-green text-uppercase text-green">Daftar Santri</h2>
                            <small class="mb-0">Daftar Santri PPATQ RAUDLATUL FALAH</small>
                    </div>
                </div>
                <!-- Search Input -->
                <div class="row mb-5">
                        <div class="d-flex justify-content-center">
                            <label class="d-flex-justify-content-end">
                                <span class="icon fs-5">
                                    <i class="fas fa-search"></i>
                                </span>
                            <input type="text" class="input border-0 p-2 rounded shadow-sm py-1" id="searchInput" placeholder="Cari Santri" autocomplete="off" autofocus/>
                        </label>
                    </div>
                </div>
        
                <!-- Santri Container -->
                <div class="row d-flex justify-content-center" id="santri-container">
                    <!-- Data santri akan ditambahkan melalui JavaScript -->
                    @foreach ($data as $santri)
                        <div class="col-md-7 col-lg-4 wow fadeIn mb-4">
                            <div class="p-2 border-0 shadow-sm rounded d-flex flex-row">
                                <div class="col-5 d-flex justify-content-center align-items-center">
                                    <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $santri->photo }}"
                                        class="rounded img-fluid p-2"
                                        alt="foto profil {{ $santri->nama }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#imageModal"
                                        style="height: 200px; width: 150px; ">
                                </div>
                                <div class="p-1 d-flex flex-column gap-3 col py-2">
                                    <div class="col-11 border border-success">
                                    </div>
                                    <h5 class="fs-6 mb-0 text-center text-uppercase">{{ $santri->nama }}</h5>
                                    <ul class="list-unstyled w-100">
                                        <div class="col">
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1 text-uppercase">
                                                    Kelas : {{ $santri->kelas ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Murroby : {{ $santri->guru_murroby ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm">
                                                    Wali Kelas : {{ $santri->wali_kelas ?? '-' }}
                                                </p>
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
                    {{ $data->links() }}
                </div>
            </div>
            <div class="tab-pane fade" id="pills-alumni" role="tabpanel" aria-labelledby="pills-alumni-tab">
                <div class="row">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                            <h2 class="fw-bold text-green text-uppercase text-green">Daftar Alumni</h2>
                            <small class="mb-0">Daftar Alumni PPATQ RAUDLATUL FALAH</small>
                    </div>
                </div>
                <!-- Search Input -->
                <div class="row mb-5">
                        <div class="d-flex justify-content-center">
                            <label class="d-flex-justify-content-end">
                                <span class="icon fs-5">
                                    <i class="fas fa-search"></i>
                                </span>
                            <input type="text" class="input border-0 p-2 rounded shadow-sm py-1" id="searchInputAlumni" placeholder="Cari Alumni" autocomplete="off" autofocus/>
                        </label>
                    </div>
                    </div>
            
                    <!-- Alumni Container -->
                    <div class="row d-flex justify-content-center" id="alumni-container">
                        <!-- Data alumni akan ditambahkan melalui JavaScript -->
                        @foreach ($alumni as $index => $row)
                        @if ($index >= 4)
                            @break
                        @endif
                        <div class="col-md-6 col-12 wow fadeIn mb-4">
                            <div class="p-2 border-0 shadow-sm rounded d-flex flex-row">
                                <div class="col-5 d-flex justify-content-center align-items-center">
                                    <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $row->photo }}"
                                        class="rounded img-fluid p-2"
                                        alt="foto profil {{ $row->nama }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#imageModal"
                                        style="height: 200px; width: 150px;">
                                </div>
                                <div class="p-1 d-flex flex-column gap-3 col py-2">
                                    <div class="col-11 border border-success"></div>
                                    <h5 class="fs-6 mb-0 text-center text-uppercase">{{ $row->nama }}</h5>
                                    <ul class="list-unstyled w-100">
                                        <div class="col">
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Tahun Angkatan : {{ $row->angkatan ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Tahun Lulus : {{ $row->tahun_lulus ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Tingkat Masuk MI : {{ $row->tahun_msk_mi ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Nama Pondok MI : {{ $row->nama_pondok_mi ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Tahun Masuk Pondok MI : {{ $row->tahun_msk_pondok_mi ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Tahun Masuk Sekolah Menengah Pertama : {{ $row->thn_msk_menengah ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Nama Sekolah Menengah Pertama : {{ $row->nama_sekolah_menengah_pertama ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Nama Pondok Menengah Pertama : {{ $row->nama_pondok_menengah_pertama ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Tahun Masuk Menengah Atas : {{ $row->tahun_msk_menengah_atas ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Nama Sekolah Menengah Atas : {{ $row->nama_menengah_atas ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Nama Pondok Menengah Atas : {{ $row->nama_pondok_menengah_atas ?? '-' }}
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm">
                                                    No HP : {{ $row->no_hp ?? '-' }}
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
            $('#santri').addClass('active');
            setTimeout(function() {
                test();
            }, 100); // Slight delay to ensure elements are rendered

            function fetchSantri(query) {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('get_santri') }}",
                    method: "POST",
                    data: {
                        search: query, // Ubah search menjadi query
                        _token: _token
                    },
                    success: function(data) {
                        $('#santri-container').empty(); // Kosongkan tabel sebelum menambahkan data baru
                        // Iterasi setiap santri dan tambahkan ke tabel
                        $.each(data.data, function(index, santri) {
                            $('#santri-container').append(`
                            <div class="col-md-7 col-lg-4 wow fadeIn mb-4">
                            <div class="p-2 border-0 shadow-sm rounded d-flex flex-row">
                                <div class="col-5 d-flex justify-content-center align-items-center">
                                    <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${ santri.photo }"
                                        class="rounded img-fluid p-2"
                                        alt="foto profil ${ santri.nama }"
                                        data-bs-toggle="modal"
                                        data-bs-target="#imageModal"
                                        style="height: 200px; width: 150px; ">
                                </div>
                                <div class="p-1 d-flex flex-column gap-3 col py-2">
                                    <div class="col-11 border border-success">
                                    </div>
                                    <h5 class="fs-6 mb-0 text-center text-uppercase">${ santri.nama }</h5>
                                    <ul class="list-unstyled w-100">
                                        <div class="col">
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1 text-uppercase">
                                                    Kelas : ${ santri.kelas ?? '-' }
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm mb-1">
                                                    Murroby : ${ santri.guru_murroby ?? '-' }
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="lh-1 text-sm">
                                                    Wali Kelas : ${ santri.wali_kelas ?? '-' }
                                                </p>
                                            </div>
                                        </div>
        
                                    </ul>
                                </div>
                            </div>
                        </div>    
                            `);
                        });
                        // Menambahkan pagination
                        $('.pagination-container').html(data.links);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
            function fetchAlumni(query) {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('get_alumni') }}",
                    method: "POST",
                    data: {
                        search: query, // Ubah search menjadi query
                        _token: _token
                    },
                    success: function(data) {
                        $('#alumni-container').empty();
                        $.each(data.data, function(index, alumni) {
                            $('#alumni-container').append(`
                            <div class="col-md-6 col-12 wow fadeIn mb-4">
                                <div class="p-2 border-0 shadow-sm rounded d-flex flex-row">
                                    <div class="col-5 d-flex justify-content-center align-items-center">
                                        <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${ alumni.photo }"
                                            class="rounded img-fluid p-2"
                                            alt="foto profil ${ alumni.nama }"
                                            data-bs-toggle="modal"
                                            data-bs-target="#imageModal"
                                            style="height: 200px; width: 150px;">
                                    </div>
                                    <div class="p-1 d-flex flex-column gap-3 col py-2">
                                        <div class="col-11 border border-success"></div>
                                        <h5 class="fs-6 mb-0 text-center text-uppercase">${ alumni.nama }}</h5>
                                        <ul class="list-unstyled w-100">
                                            <div class="col">
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tahun Angkatan : ${ alumni.angkatan ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tahun Lulus : ${ alumni.tahun_lulus ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tingkat Masuk MI : ${ alumni.tahun_msk_mi ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Nama Pondok MI : ${ alumni.nama_pondok_mi ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tahun Masuk Pondok MI : ${ alumni.tahun_msk_pondok_mi ?? '-' }}
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tahun Masuk Sekolah Menengah Pertama : ${ alumni.thn_msk_menengah ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Nama Sekolah Menengah Pertama : ${ alumni.nama_sekolah_menengah_pertama ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Nama Pondok Menengah Pertama : ${ alumni.nama_pondok_menengah_pertama ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Tahun Masuk Menengah Atas : ${ alumni.tahun_msk_menengah_atas ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Nama Sekolah Menengah Atas : ${ alumni.nama_menengah_atas ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm mb-1">
                                                        Nama Pondok Menengah Atas : ${ alumni.nama_pondok_menengah_atas ?? '-' }
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="lh-1 text-sm">
                                                        No HP : ${ alumni.no_hp ?? '-' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                            `);
                        });
                        // Menambahkan pagination
                        $('.pagination-container-alumni').html(data.links);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Listen for keyup event on #searchInput
            $('#searchInput').keyup(function(e) {
                var query = $(this).val();
                if (query !== '') {
                    fetchSantri(query);
                } else {
                    fetchSantri('');
                }
            });

            $('#searchInputAlumni').keyup(function(e) {
                var query = $(this).val();
                if (query !== '') {
                    fetchAlumni(query);
                } else {
                    fetchAlumni('');
                }
            });
        });
    </script>
@endsection

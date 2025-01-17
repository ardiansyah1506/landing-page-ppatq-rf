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
                        <div class="col-md-7 col-10 col-lg-3 wow fadeIn mb-4 position-relative">
                            <div class="p-2 border-0 shadow-sm rounded d-flex flex-column align-items-center">
                                <div class="col-11 border border-success mt-1">
                                </div>
                                <div class="p-3">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $santri->photo }}"
                                            class="w-50 img-thumbnail" alt="foto profil {{ $santri->nama }}">
                                    </div>
                                    <div class="p-1 d-flex flex-column gap-5">
                                        <h5 class="fs-6 mb-0 text-center text-uppercase">{{ $santri->nama ?? '-'}}</h5>
                                        <table class="table" style="font-size: 14px">
                                            <tr>
                                                <th scope="row"><i class="bi bi-house-door-fill"></i> Kelas :</th>
                                                <td class="text-uppercase">{{ $santri->kelas ?? " - "}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="width: 126px"><i class="bi bi-file-person-fill"></i> Murroby :</th>
                                                <td class="text-uppercase">{{ $santri->guru_murroby ?? " - "}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="width: 126px"><i class="bi bi-person-workspace"></i> Wali Kelas :</th>
                                                <td class="text-uppercase">{{ $santri->wali_kelas ?? " - "}}</td>
                                            </tr>
                                        </table>
                                    </div>
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
                        @foreach ($alumni as $row)
                            <div class="col-md-7 col-10 col-lg-3 wow fadeIn mb-4 position-relative">
                                <div class="p-2 border-0 shadow-sm rounded d-flex flex-column align-items-center">
                                    <div class="col-11 border border-success mt-1">
                                    </div>
                                    <div class="p-3">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/{{ $row->photo }}"
                                                class="w-50 img-thumbnail" alt="foto profil {{ $row->nama }}">
                                        </div>
                                        <div class="p-1 d-flex flex-column gap-5">
                                            <h5 class="fs-6 mb-0 text-center text-uppercase">{{ $row->nama ?? '-'}}</h5>
                                            <table class="table" style="font-size: 14px">
                                                <tr>
                                                    <th scope="row"><i class="bi bi-house-door-fill"></i> Tahun Angkatan :</th>
                                                    <td class="text-uppercase">{{ $row->angkatan ?? " - "}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-file-person-fill"></i> Tahun Lulus :</th>
                                                    <td class="text-uppercase">{{ $row->thnLulus ?? " - "}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-person-workspace"></i> Tingkat Menengah :</th>
                                                    <td class="text-uppercase">{{ $row->tgktMenengah ?? " - "}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-person-workspace"></i> Tingkat Atas :</th>
                                                    <td class="text-uppercase">{{ $row->tgktAtas ?? " - "}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-person-workspace"></i> Tingkat Tinggi :</th>
                                                    <td class="text-uppercase">{{ $row->tgktTinggi ?? " - "}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-person-workspace"></i> Berkarir di :</th>
                                                    <td class="text-uppercase">{{ $row->bkrjaDi ?? " - "}}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-phone"></i> No. HP :</th>
                                                    <td class="text-uppercase">{{ $row->no_hp ?? " - "}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center pagination-container-alumni mt-5">
                        <!-- Pagination -->
                        {{ $alumni->links() }}
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
                            <div class="col-md-7 col-10 col-lg-3 wow fadeIn mb-4 position-relative">
                                <div class="p-2 border-0 shadow-sm rounded d-flex flex-column align-items-center">
                                    <div class="col-11 border border-success mt-1">
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${santri.photo }"
                                                class="w-50 img-thumbnail" alt="foto profil ${santri.nama }">
                                        </div>
                                        <div class="p-1 d-flex flex-column gap-5">
                                            <h5 class="fs-6 mb-0 text-center text-uppercase">${ santri.nama ?? '-'}</h5>
                                            <table class="table" style="font-size: 14px">
                                                <tr>
                                                    <th scope="row">Kelas :</th>
                                                    <td class="text-uppercase">${ santri.kelas ?? " - "}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px">Murroby :</th>
                                                    <td class="text-uppercase">${ santri.guru_murroby ?? " - "}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px">Wali Kelas :</th>
                                                    <td class="text-uppercase">${ santri.wali_kelas ?? " - "}</td>
                                                </tr>
                                            </table>
                                        </div>
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
                            <div class="col-md-7 col-10 col-lg-3 wow fadeIn mb-4 position-relative">
                                <div class="p-2 border-0 shadow-sm rounded d-flex flex-column align-items-center">
                                    <div class="col-11 border border-success mt-1">
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${alumni.photo }"
                                                class="w-50 img-thumbnail" alt="foto profil ${alumni.nama }">
                                        </div>
                                        <div class="p-1 d-flex flex-column gap-5">
                                            <h5 class="fs-6 mb-0 text-center text-uppercase">${ alumni.nama ?? '-'}</h5>
                                            <table class="table" style="font-size: 14px">
                                                <tr>
                                                    <th scope="row"><i class="bi bi-house-door-fill"></i> Tahun Angkatan :</th>
                                                    <td class="text-uppercase">${ alumni.angkatan ?? " - "}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-file-person-fill"></i> Tahun Lulus :</th>
                                                    <td class="text-uppercase">${ alumni.thnLulus ?? " - "}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-person-workspace"></i> Tingkat Menengah :</th>
                                                    <td class="text-uppercase">${ alumni.tgktMenengah ?? " - "}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-person-workspace"></i> Tingkat Atas :</th>
                                                    <td class="text-uppercase">${ alumni.tgktAtas ?? " - "}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-person-workspace"></i> Tingkat Tinggi :</th>
                                                    <td class="text-uppercase">${ alumni.tgktTinggi ?? " - "}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-person-workspace"></i> Berkarir di :</th>
                                                    <td class="text-uppercase">${ alumni.bkrjaDi ?? " - "}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" style="width: 126px"><i class="bi bi-phone"></i> No. HP :</th>
                                                    <td class="text-uppercase">${ alumni.no_hp ?? " - "}</td>
                                                </tr>
                                            </table>
                                        </div>
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

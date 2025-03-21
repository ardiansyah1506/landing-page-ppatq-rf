<!-- resources/views/santri/index.blade.php -->

@extends('layout.main_layout')
@section('title')
    <title>Pengasuh & Staff | PPATQ-RF</title>
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

    </style>
@endsection

@section('content')
    <div class="py-4 wow fadeInUp" data-wow-delay="0.1s">

        <div class="mt-5 px-2">
            <!-- Ustad -->
            <div class="row">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h2 class="fw-bold text-green text-uppercase text-green">Ustad/Ustadzah</h2>
                        <small class="mb-0">Daftar Ustad/Ustadzah PPATQ RAUDLATUL FALAH</small>
                </div>
            </div>
            <!-- Search Input Ustad -->
            <div class="row mb-5">
                    <div class="d-flex justify-content-center">
                        <label class="d-flex-justify-content-end">
                            <span class="icon fs-5">
                                <i class="fas fa-search"></i>
                            </span>
                        <input type="text" class="input border-0 p-2 rounded shadow-sm py-1" id="searchInputUstad" placeholder="Cari Ustad" autocomplete="off" autofocus/>
                    </label>
                </div>
            </div>
            <!-- Ustad Container -->
            <div class="row d-flex justify-content-center" id="ustad-container">
                <!-- Data Ustad akan ditambahkan melalui JavaScript -->
            </div>
            <div class="text-center mt-3 mb-4">
                <button id="load-more-ustad" class="btn btn-sm btn-success d-none">Muat Ustad Lagi</button>
            </div>

            <!-- Murroby -->
            <div class="row">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h2 class="fw-bold text-green text-uppercase text-green">Murroby</h2>
                        <small class="mb-0">Daftar Murroby PPATQ RAUDLATUL FALAH</small>
                </div>
            </div>
            <!-- Search Input Murroby -->
            <div class="row mb-5 mt-5">
                    <div class="d-flex justify-content-center">
                        <label class="d-flex-justify-content-end">
                            <span class="icon fs-5">
                                <i class="fas fa-search"></i>
                            </span>
                        <input type="text" class="input border-0 p-2 rounded shadow-sm py-1" id="searchInputMurroby" placeholder="Cari Murroby" autocomplete="off" autofocus/>
                    </label>
                </div>
            </div>
            <!-- Murroby Container -->
            <div class="row d-flex justify-content-center" id="murroby-container">
                <!-- Data Murroby akan ditambahkan melalui JavaScript -->
            </div>
            <div class="text-center mt-3 mb-4">
                <button id="load-more-murroby" class="btn btn-sm btn-success d-none">Muat Murroby Lagi</button>
            </div>

            <!-- Staff -->
            <div class="row">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h2 class="fw-bold text-green text-uppercase text-green">Staff</h2>
                        <small class="mb-0">Daftar Staff PPATQ RAUDLATUL FALAH</small>
                </div>
            </div>
            <!-- Search Input Staff -->
            <div class="row mb-5 mt-5">
                    <div class="d-flex justify-content-center">
                        <label class="d-flex-justify-content-end">
                            <span class="icon fs-5">
                                <i class="fas fa-search"></i>
                            </span>
                        <input type="text" class="input border-0 p-2 rounded shadow-sm py-1" id="searchInputStaff" placeholder="Cari Staff" autocomplete="off" autofocus/>
                    </label>
                </div>
            </div>
            <!-- Staff Container -->
            <div class="row d-flex justify-content-center" id="staff-container">
                <!-- Data Staff akan ditambahkan melalui JavaScript -->
            </div>
            <div class="text-center mt-3 mb-4">
                <button id="load-more-staff" class="btn btn-sm btn-success d-none">Muat Staff Lagi</button>
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
            $('#pengasuh-staff').addClass('active');
            setTimeout(function() {
                test();
            }, 100); // Slight delay to ensure elements are rendered

            var ustadData = []; // Menyimpan data ustad
            var currentUstadIndex = 0; // Index awal data yang ditampilkan
            var perUstadPage = 4; // Jumlah data per klik "More"

            function fetchUstad(query) {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('get_ustad') }}",
                    method: "POST",
                    data: {
                        search: query, 
                        _token: _token
                    },
                    success: function(data) {
                        ustadData = data; // Simpan data ke variabel global
                        currentUstadIndex = 0; // Reset index
                        $('#ustad-container').empty(); // Kosongkan container
                        renderUstad(); // Tampilkan 4 data pertama
                        if (ustadData.length > perUstadPage) {
                            $('#load-more-ustad').removeClass('d-none'); // Tampilkan tombol jika data lebih dari 4
                        } else {
                            $('#load-more-ustad').addClass('d-none'); // Sembunyikan tombol jika data kurang dari atau sama dengan 4
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function renderUstad() {
                var limit = currentUstadIndex + perUstadPage;
                for (var i = currentUstadIndex; i < limit && i < ustadData.length; i++) {
                    var ustad = ustadData[i];
                    $('#ustad-container').append(`
                        <div class="col-md-3 col-12 wow fadeIn mb-4">
                            <div class="p-2 border-0 shadow-sm rounded text-center d-flex flex-column justify-content-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="${ ustad.photo 
                                        ? 'https://manajemen.ppatq-rf.id/assets/img/upload/photo/' + ustad.photo 
                                        : 'https://ui-avatars.com/api/?name=' + ustad.nama.replace(/ /g, '+') }"
                                    class="rounded img-fluid p-2"
                                    style="height: 200px; width: 150px;">
                                </div>
                                <div class="p-1 d-flex flex-column gap-3 py-2">
                                    <h5 class="fs-6 mb-0 text-uppercase">${ ustad.nama } ${ ustad.alhafidz == 1 ? "<sup>AH</sup>" : "" }</h5>
                                    <ul class="list-unstyled w-100">
                                        <li class="text-sm mb-1">
                                            Jenis Kelamin : ${ ustad.jenis_kelamin ?? '-' }
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `);
                }
                currentUstadIndex = limit; // Update index setelah render

                // Sembunyikan tombol jika semua data sudah ditampilkan
                if (currentUstadIndex >= ustadData.length) {
                    $('#load-more-ustad').addClass('d-none');
                }
            }

            // Event listener untuk tombol "Load More"
            $('#load-more-ustad').on('click', function() {
                renderUstad();
            });


            $('#searchInputUstad').keyup(function(e) {
                var query = $(this).val();
                if (query !== '') {
                    fetchUstad(query);
                } else {
                    fetchUstad('');
                }
            });

            var murrobyData = []; // Menyimpan data murroby
            var currentMurrobyIndex = 0; // Index awal data yang ditampilkan
            var perMurrobyPage = 4; // Jumlah data yang ditampilkan per klik "More"

            function fetchMurroby(query) {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('get_murroby') }}",
                    method: "POST",
                    data: {
                        search: query, 
                        _token: _token
                    },
                    success: function(data) {
                        murrobyData = data; // Simpan data ke variabel global
                        currentMurrobyIndex = 0; // Reset index
                        $('#murroby-container').empty(); // Kosongkan container
                        renderMurroby(); // Tampilkan 4 data pertama
                        if (murrobyData.length > perMurrobyPage) {
                            $('#load-more-murroby').removeClass('d-none'); // Tampilkan tombol jika data lebih dari 4
                        } else {
                            $('#load-more-murroby').addClass('d-none'); // Sembunyikan tombol jika data kurang dari atau sama dengan 4
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function renderMurroby() {
                var limit = currentMurrobyIndex + perMurrobyPage;
                for (var i = currentMurrobyIndex; i < limit && i < murrobyData.length; i++) {
                    var murroby = murrobyData[i];
                    $('#murroby-container').append(`
                        <div class="col-md-3 col-12 wow fadeIn mb-4">
                            <div class="p-2 border-0 shadow-sm rounded text-center d-flex flex-column justify-content-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="${ murroby.photo 
                                        ? 'https://manajemen.ppatq-rf.id/assets/img/upload/photo/' + murroby.photo 
                                        : 'https://ui-avatars.com/api/?name=' + murroby.nama.replace(/ /g, '+') }"
                                    class="rounded img-fluid p-2"
                                    style="height: 200px; width: 150px;">
                                </div>
                                <div class="p-1 d-flex flex-column gap-3 py-2">
                                    <h5 class="fs-6 mb-0 text-uppercase">${ murroby.nama } ${ murroby.alhafidz == 1 ? "<sup>AH</sup>" : "" }</h5>
                                    <ul class="list-unstyled w-100">
                                        <li class="text-sm mb-1">
                                            Jenis Kelamin : ${ murroby.jenis_kelamin ?? '-' }
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `);
                }
                currentMurrobyIndex = limit; // Update index setelah render

                // Sembunyikan tombol jika semua data sudah ditampilkan
                if (currentMurrobyIndex >= murrobyData.length) {
                    $('#load-more-murroby').addClass('d-none');
                }
            }

            // Event listener untuk tombol "Load More"
            $('#load-more-murroby').on('click', function() {
                renderMurroby();
            });

            $('#searchInputMurroby').keyup(function(e) {
                var query = $(this).val();
                if (query !== '') {
                    fetchMurroby(query);
                } else {
                    fetchMurroby('');
                }
            });

            var staffData = []; // Menyimpan data staff
            var currentIndexStaff = 0; // Index awal data yang ditampilkan
            var perPageStaff = 4; // Jumlah data yang ditampilkan per klik "More"

            function fetchStaff(query) {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('get_staff') }}",
                    method: "POST",
                    data: {
                        search: query, // Ubah search menjadi query
                        _token: _token
                    },
                    success: function(data) {
                        staffData = data; // Simpan data ke variabel global
                        currentIndexStaff = 0; // Reset index
                        $('#staff-container').empty(); // Kosongkan container
                        renderStaff(); // Tampilkan 4 data pertama
                        if (staffData.length > perPageStaff) {
                            $('#load-more-staff').removeClass('d-none'); // Tampilkan tombol jika data lebih dari 4
                        } else {
                            $('#load-more-staff').addClass('d-none'); // Sembunyikan tombol jika data kurang dari atau sama dengan 4
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function renderStaff() {
                var limit = currentIndexStaff + perPageStaff;
                for (var i = currentIndexStaff; i < limit && i < staffData.length; i++) {
                    var staff = staffData[i];
                    $('#staff-container').append(`
                        <div class="col-md-3 col-12 wow fadeIn mb-4">
                            <div class="p-2 border-0 shadow-sm rounded text-center d-flex flex-column justify-content-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="${ staff.photo 
                                        ? 'https://manajemen.ppatq-rf.id/assets/img/upload/photo/' + staff.photo 
                                        : 'https://ui-avatars.com/api/?name=' + staff.nama.replace(/ /g, '+') }"
                                    class="rounded img-fluid p-2"
                                    style="height: 200px; width: 150px;">
                                </div>
                                <div class="p-1 d-flex flex-column gap-3 py-2">
                                    <h5 class="fs-6 mb-0 text-uppercase">${ staff.nama } ${ staff.alhafidz == 1 ? "<sup>AH</sup>" : "" }</h5>
                                    <ul class="list-unstyled w-100">
                                        <li class="text-sm mb-1">
                                            Jenis Kelamin : ${ staff.jenis_kelamin ?? '-' }
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    `);
                }
                currentIndexStaff = limit; // Update index setelah render

                // Sembunyikan tombol jika semua data sudah ditampilkan
                if (currentIndexStaff >= staffData.length) {
                    $('#load-more-staff').addClass('d-none');
                }
            }

            // Event listener untuk tombol "Load More"
            $('#load-more-staff').on('click', function() {
                renderStaff();
            });


            $('#searchInputStaff').keyup(function(e) {
                var query = $(this).val();
                if (query !== '') {
                    fetchStaff(query);
                } else {
                    fetchStaff('');
                }
            });

            fetchUstad('');
            fetchMurroby('');
            fetchStaff('');
        });
    </script>
@endsection

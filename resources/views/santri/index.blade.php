<!-- resources/views/santri/index.blade.php -->

@extends('layout.main_layout')
@section('title')
    <title>Santri | PPATQ-RF</title>
@endsection
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
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
                    <div class="card border-0 shadow-sm rounded d-flex align-items-center">
                        <div class="col-11 border border-success mt-1">
                        </div>
                        <div class="p-4">
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
                                <div class="card border-0 shadow-sm rounded d-flex align-items-center">
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

            // Listen for keyup event on #searchInput
            $('#searchInput').keyup(function(e) {
                var query = $(this).val();
                if (query !== '') {
                    fetchSantri(query);
                } else {
                    fetchSantri(''); // Panggil fetchSantri dengan parameter kosong jika query kosong
                }
            });
        });
    </script>
@endsection

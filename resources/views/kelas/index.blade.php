<!-- resources/views/santri/index.blade.php -->

@extends('layout.main_layout')
@section('title')
    <title>Kelas | PPATQ-RF</title>
@endsection
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row">
                <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                    <h2 class="fw-bold text-green text-uppercase text-green">Kelas Santri</h2>
                <small class="mb-0">Kelas Santri PPATQ RAUDLATUL FALAH</small>
            </div>
        </div>
        <div class="row d-flex justify-content-center gap-2">
        @foreach ($data as $kelas)
                <a href="/kelas/{{ $kelas->id_kelas}}" class="px-3 col-2 text-center mb-2 bg-green p-3 text-decoration-none text-white">{{ $kelas->name }}</a>
        @endforeach
        </div>
        @yield('indexKelas')
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

            // Call test() when the window is resized
            $(window).on('resize', function() {
                setTimeout(function() {
                    test();
                }, 500);
            });


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
                            <div class="col-md-7 col-lg-3 mb-3 wow fadeIn">
            <div class="card border-0 shadow p-4">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="https://manajemen.ppatq-rf.id/assets/img/upload/photo/${santri.photo}"
                         class="w-50">
                </div>
                <div class="card-body d-flex flex-column gap-5">
                    <h5 class="fs-5 mb-0 text-center">${santri.nama}</h5>
                    <ul class="list-unstyled w-100 mb-4">
                        <div class="d-flex justify-content-between">
                            <li class="mb-3">
                                <div class="d-flex flex-column align-items-center">
                                    <small>Kelas</small>
                                    <h6>${santri.kelas ?? '-'}</h6>
                                </div>
                            </li>
                            <li class="mb-3">
                                <div class="d-flex flex-column align-items-center">
                                    <small>Kota</small>
                                    <h6>${santri.kecamatan ?? '-'}</h6>
                                </div>
                            </li>
                        </div>
                        <li class="mb-3">
                            <div class="d-flex flex-column align-items-center">
                                <p>Wali Kelas</p>
                                <p>${santri.wali_kelas ?? '-'}</p>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex flex-column align-items-center">
                                <p>Guru Murroby</p>
                                <p>${santri.guru_murroby ?? '-'}</p>
                            </div>
                        </li>
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

            // Listen for keyup event on #searchInput
            $('#searchInput').keyup(function(e) {
                var query = $(this).val();
                if (query !== '') {
                    fetchSantri(query);
                } else {
                    fetchSantri(
                        ''); // Panggil fetchSantri dengan parameter kosong jika query kosong
                }
            });
        });
    </script>
@endsection

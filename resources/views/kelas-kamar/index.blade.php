<!-- resources/views/santri/index.blade.php -->

@extends('layout.main_layout')
@section('title')
    <title>Kelas & kamar | PPATQ-RF</title>
@endsection
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 py-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h2 class="fw-bold text-green text-uppercase text-green">Kelas Santri</h2>
                    <small class="mb-0">Kelas Santri PPATQ RAUDLATUL FALAH</small>
                </div>
            </div>
            <div class="row d-flex justify-content-center gap-2">
                @if ($dataKelas && !$dataKelas->isEmpty())
                    @foreach ($dataKelas as $kelas)
                        <div class="px-3 col-6 col-sm-4 text-center mb-2 bg-green p-3 rounded d-flex flex-column">
                            <i class="bi bi-house fs-2 text-white"></i>
                            <a href="/kelas/{{ $kelas->id_kelas}}" class="text-decoration-none text-white fw-bold">{{ $kelas->name }}</a>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        <small class="text-muted  border-bottom">Kelas Kosong</small>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-12 col-md-6 py-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row  d-flex justify-content-center" id="kamar-container">
                <div class="col-12">
                        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                            <h2 class="fw-bold text-green text-uppercase text-green">Kamar Santri</h2>
                            <small class="mb-0">Kamar Santri PPATQ RAUDLATUL FALAH</small>
                        </div>
                </div>
                <div class="row d-flex justify-content-center gap-2">
                    @if($dataKamar && !$dataKamar->isEmpty())
                    @foreach ($dataKamar as $kamar)
                        <div class="px-3 col-4 col-sm-4 rounded text-center mb-2 bg-green p-3">
                            <i class="bi bi-people fs-2 text-white"></i>
                            <a href="/kamar/{{ $kamar->id}}" class="text-decoration-none text-white fw-bold">{{ $kamar->guru_murroby }}</a>
                        </div>
                    @endforeach
                    @else
                    <div class="text-center">
                        <small class="text-muted  border-bottom">Kamar Kosong</small>
                    </div>
                    @endif
                    </div>
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
            $('#kelas-kamar').addClass('active');
            setTimeout(function() {
                test();
            }, 100); // Slight delay to ensure elements are rendered
        });
    </script>
@endsection

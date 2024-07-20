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
        <div class="row  d-flex justify-content-center" id="kamar-container">
            <div class="col-12">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h2 class="fw-bold text-green text-uppercase text-green">Kamar Santri</h2>
                        <small class="mb-0">Kamar Santri PPATQ RAUDLATUL FALAH</small>
                    </div>
            </div>
            <div class="row  d-flex justify-content-center  gap-2">
                @if($data && !$data->isEmpty())
                @foreach ($data as $kamar)
                        <a href="/kamar/{{ $kamar->id}}" class="px-3 col-4 col-sm-2 text-center mb-2 bg-green p-3 text-decoration-none text-white">Kamar {{ $kamar->name }}</a>
                @endforeach
                @else
                <div class="text-center">
                    <small class="text-muted  border-bottom">Kamar Kosong</small>
                </div>
                @endif
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
            $('#kamar').addClass('active');
            setTimeout(function() {
                test();
            }, 100); // Slight delay to ensure elements are rendered
        });
    </script>
@endsection

@extends('layout.main_layout')
@section('title')
    <title>Kelas & kamar | PPATQ-RF</title>
@endsection
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .tile-seamless {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding: 24px 12px;
            border-radius: 24px;
            background: transparent;
            color: #1a5632;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            transition: transform 0.3s ease;
        }
        .tile-seamless:hover {
            color: #1a5632;
            transform: translateY(-4px);
        }
        .tile-seamless .tile-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            margin-bottom: 12px;
            border-radius: 16px;
            background: linear-gradient(135deg, #f8fcf9 0%, #e8f5ed 100%);
            color: #198754;
            font-size: 1.6rem;
            transition: background 0.3s ease, color 0.3s ease;
        }
        .tile-seamless:hover .tile-icon {
            background: linear-gradient(135deg, #198754, #20c997);
            color: #fff;
        }
        .tile-seamless .tile-label {
            word-break: break-word;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 py-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-green text-uppercase text-green">Kelas Santri</h2>
                <small class="mb-0">Kelas Santri PPATQ RAUDLATUL FALAH</small>
            </div>
            @php
                // Kelompokkan per tingkat (angka pada nama kelas): 1A & 1B satu baris, dst.
                $kelasPerTingkat = collect($dataKelas ?? [])
                    ->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)
                    ->groupBy(fn ($kelas) => preg_match('/\d+/', $kelas->name, $m) ? (int) $m[0] : $kelas->name);
            @endphp
            @forelse ($kelasPerTingkat as $daftarKelas)
                <div class="row g-3 flex-nowrap mb-3">
                    @foreach ($daftarKelas as $kelas)
                        <div class="col">
                            <a href="{{ route('show-kelas', $kelas->id_kelas) }}" class="tile-seamless">
                                <span class="tile-icon"><i class="bi bi-house"></i></span>
                                <span class="tile-label">{{ $kelas->name }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            @empty
                <div class="text-center">
                    <small class="text-muted border-bottom">Kelas Kosong</small>
                </div>
            @endforelse
        </div>
        <div class="col-12 col-md-6 py-4 wow fadeInUp" data-wow-delay="0.1s" id="kamar-container">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h2 class="fw-bold text-green text-uppercase text-green">Kamar Santri</h2>
                <small class="mb-0">Kamar Santri PPATQ RAUDLATUL FALAH</small>
            </div>
            <div class="row g-3">
                @forelse ($dataKamar ?? [] as $kamar)
                    <div class="col-6 col-sm-4">
                        <a href="{{ route('show-kamar', $kamar->id) }}" class="tile-seamless">
                            <span class="tile-icon"><i class="bi bi-people"></i></span>
                            <span class="tile-label">{{ $kamar->guru_murroby }}</span>
                        </a>
                    </div>
                @empty
                    <div class="text-center">
                        <small class="text-muted border-bottom">Kamar Kosong</small>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.dashboard')

@section('title', 'Daftar Kucing')

@section('content')
    <div class="text-center mb-4">
        <h1 class="cat-title">
            <span class="paw">🐾</span> Daftar Kucing Peliharaan <span class="paw">🐾</span>
        </h1>
        <p class="cat-subtitle">Klik nama kucing untuk melihat detailnya</p>
    </div>

    <div class="row justify-content-center">
        <!--1. Buat perulangan foreach untuk menampung informasi setiap kucing-->
        @foreach ($kucing as $item)
            <div class="col-md-4 mb-3">
                <div class="cat-card text-center">
                    <h4>
                        {{ $item->nama_kucing }}
                    </h4>
                    <p class="text-muted">
                        {{ $item->ras }}
                    </p>
                    <a href="{{ route('kucing.show', $item->id) }}" class="btn btn-custom btn-sm">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

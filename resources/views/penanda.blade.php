@extends('layout.main')

@section('body')
    <br>
    <br>
    <br>
    <div class="py-5"> {{-- Padding vertikal agar lebih lega --}}
        <div class="container">
            <h2 class="mb-4">Daftar Postingan yang Ditandai</h2>

            @forelse ($penanda as $item)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->postingan->JudulKegiatan }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($item->postingan->Deskripsi, 150) }}</p>
                        <a href="{{ route('lombaterbaru', $item->postingan->id) }}" class="btn btn-primary btn-sm">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    Belum ada postingan yang ditandai.
                </div>
            @endforelse
        </div>
    </div>
@endsection
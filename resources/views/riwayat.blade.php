@extends('layout.main')

@section('body')
<div class="container py-5">
    <h2 class="mb-4 text-center">Riwayat Postingan Kamu</h2>

    @if ($postingan->isEmpty())
        <div class="alert alert-info text-center">
            Kamu belum pernah membuat postingan. Yuk mulai sekarang! 💡
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($postingan as $post)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        @if ($post->Poster)
                            <img src="{{ asset('storage/' . $post->Poster) }}" class="card-img-top" alt="Poster" style="max-height: 200px; object-fit: cover;">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $post->JudulKegiatan }}</h5>
                            <p class="card-text">
                                <strong>Kategori:</strong> {{ $post->Kategori }}<br>
                                <strong>Tanggal:</strong> {{ $post->TanggalKegiatan ?? '-' }}<br>
                                <strong>Lokasi:</strong> {{ $post->Lokasi }}
                            </p>

                            @if ($post->status == 'approved')
                                <span class="badge bg-success">Disetujui</span>
                            @elseif ($post->status == 'pending')
                                <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
                            @elseif ($post->status == 'rejected')
                                <span class="badge bg-danger">Ditolak</span>
                            @endif

                            @if ($post->status == 'rejected' && $post->rejection_note)
                                <div class="mt-2 text-danger">
                                    <small><strong>Alasan penolakan:</strong><br>{{ $post->rejection_note }}</small>
                                </div>
                            @elseif ($post->status == 'pending')
                                <div class="mt-2 text-muted">
                                    <small>Sedang diperiksa oleh tim admin.</small>
                                </div>
                            @endif
                        </div>

                       <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                        @if ($post->status === 'approved')
                            <a href="{{ route('pembayaran.form', $post->id) }}" class="btn btn-success btn-sm">Lanjutkan pembayaran</a>
                        @elseif ($post->status === 'pending')
                            <a href="{{ route('posting.preview', $post->id) }}" class="btn btn-outline-secondary btn-sm">Lihat Detail</a>
                        @elseif ($post->status === 'rejected')
                            {{-- Tidak ada tombol --}}
                        @endif
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

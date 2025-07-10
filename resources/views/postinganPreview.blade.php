@extends('layout.main')

@section('body')
<div class="container py-5" style="background-color: white; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="border-radius: 20px;">
                <div class="card-header text-center text-white" style="background-color: #283B8A; border-radius: 20px 20px 0 0;">
                    <h3 class="pt-3">Preview Postingan</h3>
                    <p class="mb-3">Periksa kembali informasi sebelum verifikasi</p>
                </div>
                <div class="card-body p-4 text-dark">
                    <p><strong>Judul Kegiatan:</strong> {{ $postingan->JudulKegiatan }}</p>
                    <p><strong>Deskripsi:</strong> {{ $postingan->Deskripsi }}</p>
                    <p><strong>Jenis Kegiatan:</strong> {{ $postingan->JenisKegiatan }}</p>
                    <p><strong>Kategori:</strong> {{ $postingan->Kategori }}</p>
                    <p><strong>Tanggal:</strong> {{ $postingan->TanggalKegiatan }}</p>
                    <p><strong>Peserta:</strong> {{ $postingan->Peserta }}</p>
                    <p><strong>Lokasi:</strong> {{ $postingan->Lokasi }}</p>
                    <p><strong>Harga:</strong> Rp{{ number_format($postingan->Harga, 0, ',', '.') }}</p>
                    <p><strong>Tautan Pendaftaran:</strong> <a href="{{ $postingan->TautanPendaftaran }}">{{ $postingan->TautanPendaftaran }}</a></p>
                    <p><strong>Instagram:</strong> {{ $postingan->KontakInstagram }}</p>
                    <p><strong>Website:</strong> {{ $postingan->KontakWebsite ?? '-' }}</p>
                    <p><strong>Youtube:</strong> {{ $postingan->KontakYoutube ?? '-' }}</p>

                    @if ($postingan->Poster)
                        <div class="text-center mt-3">
                            <img src="{{ asset('storage/' . $postingan->Poster) }}" class="img-fluid rounded" alt="Poster" style="max-height: 300px;">
                        </div>
                    @endif

                    <form method="POST" action="{{ route('posting.verifikasi', $postingan->id) }}">
                        @csrf
                    
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success">Verifikasi dan Kirim</button>
                        </div>
                    </form>

                    <div class="d-grid mt-2">
                        <a href="{{ url('/') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

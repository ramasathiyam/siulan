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

                    
                </div>
                 <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection




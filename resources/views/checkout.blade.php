@extends('layout.main')

@section('body')
<div class="container py-5" style="background-color: white; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="border-radius: 20px;">
                <div class="card-header text-center text-white" style="background-color: #283B8A; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                    <h3 class="pt-3">Halaman Checkout</h3>
                    <p class="mb-3">Periksa kembali informasi pendaftaran Anda</p>
                </div>

                <div class="card-body p-4 text-dark">
                    <p><strong>Nama:</strong> {{ $data['nama'] }}</p>
                    <p><strong>Email:</strong> {{ $data['email'] }}</p>
                    <p><strong>Telepon:</strong> {{ $data['telepon'] }}</p>
                    <p><strong>Kategori:</strong> {{ $data['kategori'] }}</p>
                    <p><strong>Institusi:</strong> {{ $data['institusi'] }}</p>
                    <p><strong>Keterangan:</strong> {{ $data['keterangan'] ?? '-' }}</p>
                </div>

                <div class="card-header text-center text-white" style="background-color: #283B8A;">
                    <h5 class="text-center">Informasi Kegiatan yang Didaftarkan</h5>
                </div>

                <div class="bg-light p-4 rounded shadow-sm">
                    <p><strong>Judul Kegiatan:</strong> {{ $postingan->JudulKegiatan ?? '-' }}</p>
                    <p><strong>Jenis Kegiatan:</strong> {{ $postingan->JenisKegiatan ?? '-' }}</p>
                    <p><strong>Kategori:</strong> {{ $postingan->Kategori ?? '-' }}</p>
                    <p><strong>Lokasi:</strong> {{ $postingan->Lokasi ?? '-' }}</p>
                    <p><strong>Tanggal Kegiatan:</strong>
                        {{ $postingan->TanggalKegiatan ? \Carbon\Carbon::parse($postingan->TanggalKegiatan)->translatedFormat('d F Y') : '-' }}
                    </p>
                    <p><strong>Harga:</strong> Rp{{ number_format($postingan->Harga ?? 0, 0, ',', '.') }}</p>
                    <p><strong>Instagram:</strong> {{ $postingan->KontakInstagram ?? '-' }}</p>
                    <p><strong>Website:</strong> {{ $postingan->KontakWebsite ?? '-' }}</p>
                    <p><strong>Youtube:</strong> {{ $postingan->KontakYoutube ?? '-' }}</p>
                    <p><strong>Link Pendaftaran:</strong>
                        <a href="{{ $postingan->TautanPendaftaran }}" target="_blank">
                            {{ $postingan->TautanPendaftaran }}
                        </a>
                    </p>

                    @if ($postingan->Poster)
                        <div class="text-center mt-3">
                            <img src="{{ asset($postingan->Poster) }}" class="img-fluid rounded" alt="Poster Kegiatan" style="max-height: 300px;">
                        </div>
                    @endif

                    <form action="{{ route('checkout.final') }}" method="POST">
                        @csrf
                        @foreach ($data as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn text-white" style="background-color: #F4A949; border-radius: 10px;">
                                Checkout
                            </button>
                        </div>
                    </form>

                    <br>
                    <div class="text-center mt-3">
                        <a href="{{ url()->previous() }}" style="color: #283B8A; text-decoration:none">Kembali ke Form</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

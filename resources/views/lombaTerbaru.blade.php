@extends('layout.main')

@section('body')
<div class="py-5" style="background-color: #283B8A;">
    <div class="container">
        <h2 class="text-white text-center pt-4 mb-4">Detail Lomba</h2>

        <div class="card shadow-lg rounded-4 overflow-hidden">
            <div class="row g-0 flex-column flex-md-row">
                <!-- Gambar -->
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $postingan->Poster) }}" class="card-img-top" alt="Poster" style="max-height: 200px; object-fit: cover;">
                </div>

                <!-- Informasi Lomba -->
                <div class="col-md-6 p-4">
                    <h4 class="fw-bold text-center">{{ $postingan->JudulKegiatan }}</h4>
                    <hr>

                    <div class="d-flex flex-wrap gap-2 justify-content-center mb-3">
                        <span class="badge bg-primary px-3 py-2 rounded-pill">Sains</span>
                        <span class="badge bg-secondary px-3 py-2 rounded-pill">Lomba</span>
                    </div>

                    <p><strong>Peserta:</strong> {{ $postingan->Peserta }}</p>
                    <p><strong>Tanggal:</strong> {{ $postingan->TanggalKegiatan }}</p>
                    <p><strong>Lokasi:</strong> {{ $postingan->Lokasi }}</p>
                    <p><strong>Biaya:</strong> 💰 Rp {{ $postingan->Harga }}</p>

                    <div class="text-center">
                        <a href="{{ route('daftarlomba', ['id' => $postingan->id]) }}" class="btn btn-primary btn-lg rounded-pill w-100 mt-2">Daftar Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Lomba -->
            <div class="p-4 border-top bg-light">
                <h5 class="fw-bold mb-3">Deskripsi</h5>
                <p>
                    {{ $postingan->Deskripsi}}<br>
                    
                </p>
                <ul>
                    
                    <li>{{ $postingan->Kategori }}</li>
                   
                </ul>
                <p>
                    💡 Saatnya kamu bersinar, belajar, dan berkompetisi!<br>
                    📌 Info lengkap: {{ $postingan->KontakWebsite}}<br><br>
                    💸 HTM: {{ $postingan->Harga}}<br>
                    📱 IG: {{ $postingan->KontakInstagram}}<br>
                    📱 Youtube: {{ $postingan->KontakYoutube}}<br>
                    
                </p>
            </div>

            <!-- Informasi Penyelenggara -->
            <div class="p-4 border-top">
                <h6 class="fw-bold">Diselenggarakan oleh</h6>
                <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                    <img src="{{ asset('img/image 15.png') }}" alt="Logo" width="100">
                    <div>
                        <p class="mb-1">{{ $postingan->Penyelenggara}}</p>
                        
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="p-4 border-top d-flex flex-wrap gap-2 justify-content-center">
                @php
                $sudahDitandai = \App\Models\Penanda::where('user_id', Auth::id())->where('postingan_id', $postingan->id)->exists();
                @endphp

                @if ($sudahDitandai)
                <button class="btn btn-secondary" disabled>Sudah Ditandai</button>
                @else
                <form action="{{ route('postingan.tandai', $postingan->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Tandai</button>
                </form>
                @endif
                <button class="btn btn-danger shadow">Laporkan</button>
                <button class="btn btn-info shadow">Bagikan</button>
            </div>
        </div>
    </div>
</div>
@endsection

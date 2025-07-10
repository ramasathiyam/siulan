@extends('layout.main')

@section('body')
<div class="py-5" style="background-color: #283B8A;">
    <div class="container">
        <h2 class="text-white text-center pt-4 mb-4">Detail Lomba</h2>

        <div class="card shadow-lg rounded-4 overflow-hidden">
            <div class="row g-0 flex-column flex-md-row">
                <!-- Gambar -->
                <div class="col-md-6">
                    <img src="{{ asset('img/Group 26086203.png') }}" class="img-fluid w-100 h-100 object-fit-cover" alt="Banner Lomba">
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
                <h5 class="fw-bold mb-3">Deskripsi Lomba</h5>
                <p>
                    INOVASI SAINS 2021 (INVASI)<br>
                    Transformasi Inovasi Masa Kini melalui Pendekatan Sains dan Teknologi Guna Mendukung SDGs 2030.
                </p>
                <ul>
                    <li>Sains dan Teknologi</li>
                    <li>Energi Terbarukan</li>
                    <li>Kesehatan</li>
                    <li>Pendidikan</li>
                </ul>
                <p>
                    💡 Saatnya kamu bersinar, belajar, dan berkompetisi!<br>
                    📌 Info lengkap: <a href="#" class="link-primary">bit.ly/linklomba</a><br>
                    💸 HTM: Rp 35.000/tim<br>
                    📱 CP: 0899-0000-8888<br>
                    IG: @fmipaudayana
                </p>
            </div>

            <!-- Informasi Penyelenggara -->
            <div class="p-4 border-top">
                <h6 class="fw-bold">Diselenggarakan oleh</h6>
                <div class="d-flex flex-column flex-md-row align-items-center gap-3">
                    <img src="{{ asset('img/image 15.png') }}" alt="Logo" width="100">
                    <div>
                        <p class="mb-1">Himpunan Mahasiswa Fakultas MIPA Universitas Udayana</p>
                        <p class="mb-0">
                            Jl. Kampus Bukit Jimbaran, Badung<br>
                            Email: info@unud.ac.id<br>
                            Tlp/Fax: +62 (361) 701812 / 701907
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="p-4 border-top d-flex flex-wrap gap-2 justify-content-center">
                <button class="btn btn-warning shadow">Bookmark</button>
                <button class="btn btn-danger shadow">Laporkan</button>
                <button class="btn btn-info shadow">Bagikan</button>
            </div>
        </div>
    </div>
</div>
@endsection

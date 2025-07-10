@extends('layout.main')
@section('body')

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Form -->
<form action="{{ route('posting') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container  mt-5 mb-5">
    <div class="form-container p-5 shadow">
        
        {{-- Paket Postingan --}}
        <div class="row mb-3">
            <div class="col">
                <h5><label for="kategori" class="form-label">Paket Postingan</label> </h5>
                @error('PaketPostingan') <small class="text-danger">{{ $message }}</small>@enderror
                <select class="form-select" id="PaketPostingan" name="PaketPostingan">
                    <option selected>--Pilih Paket--</option>
                    <option value="Basic" {{ old('PaketPostingan') == 'Basic' ? 'selected' : '' }}>Paket Basic</option>
                    <option value="Medium" {{ old('PaketPostingan') == 'Medium' ? 'selected' : '' }}>Paket Medium</option>
                    <option value="Premium" {{ old('PaketPostingan') == 'Premium' ? 'selected' : '' }}>Paket Premium</option>
                </select>
            </div>
        </div>

        {{-- Judul --}}
        <h5 class="mb-3">Judul Kegiatan</h5>
        @error('JudulKegiatan') <small class="text-danger">{{ $message }}</small>@enderror
        <input type="text" name="JudulKegiatan" class="form-control mb-3" placeholder="Ketik Judul Kegiatan disini..." value="{{ old('JudulKegiatan') }}">

        {{-- Deskripsi --}}
        <h5 class="mb-3">Deskripsi</h5>
        @error('Deskripsi') <small class="text-danger">{{ $message }}</small>@enderror
        <textarea name="Deskripsi" class="form-control mb-3" rows="4" placeholder="Ketik Deskripsi disini...">{{ old('Deskripsi') }}</textarea>

        {{-- Jenis Kegiatan --}}
        <h5 class="mb-2">Jenis Kegiatan</h5>
        @error('JenisKegiatan') <small class="text-danger">{{ $message }}</small>@enderror<br>
        @foreach (['Lomba', 'Seminar', 'Webinar'] as $jenis)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="JenisKegiatan" id="{{ $jenis }}" value="{{ $jenis }}" {{ old('JenisKegiatan') == $jenis ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $jenis }}">{{ $jenis }}</label>
                </div>
        @endforeach

        {{-- Kategori --}}
        <div class="row mt-3 mb-3">
            <div class="col">
                <h5><label for="kategori" class="form-label">Kategori</label></h5>
                @error('Kategori') <small class="text-danger">{{ $message }}</small>@enderror
                <select class="form-select" id="kategori" name="Kategori" required>
                    <option selected disabled>--Pilih Kategori--</option>
                    <option value="Teknologi & IT">Teknologi & IT</option>
                    <option value="Bisnis & Kewirausahaan">Bisnis & Kewirausahaan</option>
                    <option value="Desain & Kreatif">Desain & Kreatif</option>
                    <option value="Marketing & Komunikasi">Marketing & Komunikasi</option>
                    <option value="Pengembangan Diri">Pengembangan Diri</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Kesehatan & Kebugaran">Kesehatan & Kebugaran</option>
                    <option value="Seni & Budaya">Seni & Budaya</option>
                    <option value="Musik & Hiburan">Musik & Hiburan</option>
                    <option value="Olahraga">Olahraga</option>
                    <option value="Lingkungan">Lingkungan</option>
                    <option value="Sosial & Komunitas">Sosial & Komunitas</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>

        {{-- Tambahan --}}
        {{-- Tanggal Kegiatan --}}
        <h5 class="mb-3">Tanggal Kegiatan</h5>
        @error('TanggalKegiatan') <small class="text-danger">{{ $message }}</small>@enderror
        <input type="date" name="TanggalKegiatan" class="form-control mb-3" value="{{ old('TanggalKegiatan') }}">

        {{-- Umum/Mahasiswa --}}
        <h5 class="mb-3">Peserta</h5>
        @error('Peserta') <small class="text-danger">{{ $message }}</small>@enderror
        <select class="form-select mb-3" name="Peserta">
            <option selected disabled>-- Pilih Peserta --</option>
            <option value="Umum" {{ old('Peserta') == 'Umum' ? 'selected' : '' }}>Umum</option>
            <option value="Mahasiswa" {{ old('Peserta') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
        </select>

        {{-- Link Grup --}}
        <h5 class="mb-3">Link Grup (WhatsApp/Telegram)</h5>
        @error('LinkGrup') <small class="text-danger">{{ $message }}</small>@enderror
        <input type="url" name="LinkGrup" class="form-control mb-3" placeholder="Masukkan tautan grup..." value="{{ old('LinkGrup') }}">

        {{-- Harga --}}
        <h5 class="mb-3">Harga</h5>
        @error('Harga') <small class="text-danger">{{ $message }}</small>@enderror
        <textarea name="Harga" class="form-control mb-3" rows="3" placeholder="Contoh: 35000">{{ old('Harga') }}</textarea>
        {{-- End Tambahan --}}

        {{-- Lokasi --}}
        <h5 class="mb-3">Lokasi</h5>
        @error('Lokasi') <small class="text-danger">{{ $message }}</small>@enderror
        <input type="text" name="Lokasi" class="form-control mb-3" placeholder="Lokasi Kegiatan disini..." value="{{ old('Lokasi') }}">

        {{-- Tautan Pendaftaran --}}
        <h5 class="mb-3">Tautan Pendaftaran</h5>
        @error('TautanPendaftaran') <small class="text-danger">{{ $message }}</small>@enderror
        <input type="text" name="TautanPendaftaran" class="form-control mb-3" placeholder="Tautan Pendaftaran..." value="{{ old('TautanPendaftaran') }}">

        {{-- Kontak --}}
        <h5 class="mb-3">Kontak Penyelenggara</h5>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="KontakInstagram" class="form-control" placeholder="Masukkan Instagram..." value="{{ old('KontakInstagram') }}">
                @error('KontakInstagram') <small class="text-danger">{{ $message }}</small>@enderror
            </div>
            <div class="col">
                <input type="text" name="KontakWebsite" class="form-control" placeholder="Masukkan Website..." value="{{ old('KontakWebsite') }}">
            </div>
            <div class="col">
                <input type="text" name="KontakYoutube" class="form-control" placeholder="Masukkan Youtube..." value="{{ old('KontakYoutube') }}">
            </div>
        </div>

        {{-- Poster --}}
        <div class="mb-3">
            <h5><label for="Poster" class="form-label">Poster</label></h5>
            @error('Poster') <small class="text-danger">{{ $message }}</small>@enderror
            <input type="file" name="Poster" class="form-control">
            <small class="text-muted">Ukuran harus A3</small>
        </div>

        <button class="btn btn-primary w-100">Kirim</button>
    </div>
    </div>
</form>

<!-- SweetAlert2 Alert on Validation Error -->
@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'error',
                title: 'PERINGATAN',
                html: `
                    <ul style="text-align: left;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                confirmButtonColor: '#d33',
            });
        });
    </script>
@endif

@endsection

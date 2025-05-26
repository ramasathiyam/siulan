@extends('layout.main')
@section('body')

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Form -->
<form action="{{ route('posting') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container  mt-5 mb-5">
    <div class="form-container p-5 shadow">
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

        <h5 class="mb-3">Judul Kegiatan</h5>
        @error('JudulKegiatan') <small class="text-danger">{{ $message }}</small>@enderror
        <input type="text" name="JudulKegiatan" class="form-control mb-3" placeholder="Ketik Judul Kegiatan disini..." value="{{ old('JudulKegiatan') }}">

        <h5 class="mb-3">Deskripsi</h5>
        @error('Deskripsi') <small class="text-danger">{{ $message }}</small>@enderror
        <textarea name="Deskripsi" class="form-control mb-3" rows="4" placeholder="Ketik Deskripsi disini...">{{ old('Deskripsi') }}</textarea>

        <h5 class="mb-2">Jenis Kegiatan</h5>
        @error('JenisKegiatan') <small class="text-danger">{{ $message }}</small>@enderror<br>
        @foreach (['Lomba', 'Seminar', 'Webinar'] as $jenis)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="JenisKegiatan" id="{{ $jenis }}" value="{{ $jenis }}" {{ old('JenisKegiatan') == $jenis ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $jenis }}">{{ $jenis }}</label>
                </div>
        @endforeach

        <div class="row mt-3 mb-3">
            <div class="col">
                <h5><label for="kategori" class="form-label">Kategori</label></h5>
                @error('Kategori') <small class="text-danger">{{ $message }}</small>@enderror
                <select class="form-select" id="kategori" name="Kategori" required>
                    <option selected>--Pilih Kategori--</option>
                    <option value="Teknologi">Teknologi</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Olahraga">Olahraga</option>
                </select>
            </div>
        </div>

        <h5 class="mb-3">Lokasi</h5>
        @error('Lokasi') <small class="text-danger">{{ $message }}</small>@enderror
        <input type="text" name="Lokasi" class="form-control mb-3" placeholder="Lokasi Kegiatan disini..." value="{{ old('Lokasi') }}">
        <h5 class="mb-3">Tautan Pendaftaran</h5>
        @error('TautanPendaftaran') <small class="text-danger">{{ $message }}</small>@enderror
        <input type="text" name="TautanPendaftaran" class="form-control mb-3" placeholder="Tautan Pendaftaran..." value="{{ old('TautanPendaftaran') }}">
        
        <h5 class="mb-3">Kontak Penyelenggara</h5>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="KontakInstagram" class="form-control" placeholder="Masukkan Instagram..." value="{{ old('KontakInstagram') }}">
                @error('KontakInstagram') <small class="text-danger">{{ $message }}</small>@enderror
            </div>
            <div class="col">
                <input type="text" name="KontakWebsite" class="form-control" placeholder="Masukkan Website..." value="{{ old('KontakWebsite') }}">
                {{-- @error('KontakWebsite') <small class="text-danger">{{ $message }}</small>@enderror --}}
            </div>
            <div class="col">
                <input type="text" name="KontakYoutube" class="form-control" placeholder="Masukkan Youtube..." value="{{ old('KontakYoutube') }}">
                {{-- @error('KontakYoutube') <small class="text-danger">{{ $message }}</small>@enderror --}}
            </div>
        </div>

        <div class="mb-3">
            <h5><label for="Poster" class="form-label">Poster</label></h5>
            @error('Poster') <small class="text-danger">{{ $message }}</small>@enderror
            <input type="file" name="Poster" class="form-control">
            <small class="text-muted">Ukuran harus A3</small>
        </div>

        <button class="btn btn-primary w-100">Bayar</button>
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
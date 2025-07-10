@extends('layout.main')

@section('body')
<div class="container py-5" style="background-color: #283B8A; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="border-radius: 20px;">
                <div class="card-header text-center text-white" style="background-color: #283B8A; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                    <h3 class="pt-3">Formulir Pendaftaran</h3>
                    <p class="mb-3">Lengkapi data di bawah ini untuk mengikuti lomba/seminar/webinar</p>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('checkout.preview')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                       

                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="telepon" name="telepon" required>
                        </div>

                        <div class="mb-3">
                            <label for="institusi" class="form-label">Asal Institusi</label>
                            <input type="text" class="form-control" id="institusi" name="institusi" required>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan Tambahan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Opsional..."></textarea>
                        </div>
                         <input type="hidden" name="id_postingan" value="{{ $postingan->id }}">

                        <div class="d-grid">
                            <button type="submit" class="btn text-white" style="background-color: #F4A949; border-radius: 10px;">Daftar Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4 text-white">
                <a href="{{ url('/') }}" class="text-light">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>
@endsection
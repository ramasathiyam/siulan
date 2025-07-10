@extends('layout.main')

@section('body')
{{-- Form tersembunyi ini tetap diperlukan untuk mengirim data ke controller --}}
<form id="real-checkout-form" action="{{ route('checkout.final') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="nama" value="{{ $data['nama'] }}">
    <input type="hidden" name="email" value="{{ $data['email'] }}">
    <input type="hidden" name="telepon" value="{{ $data['telepon'] }}">
    <input type="hidden" name="kategori" value="{{ $data['kategori'] }}">
    <input type="hidden" name="institusi" value="{{ $data['institusi'] }}">
    <input type="hidden" name="keterangan" value="{{ $data['keterangan'] ?? '' }}">
    <input type="hidden" name="id_postingan" value="{{ $postingan->id }}">
</form>


<div class="container py-5" style="background-color: white; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="border-radius: 20px;">
                <div class="card-header text-center text-white" style="background-color: #283B8A; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                    <h3 class="pt-3">Halaman Checkout</h3>
                    <p class="mb-3">Periksa kembali informasi pendaftaran Anda</p>
                </div>

                {{-- Menampilkan data pendaftar --}}
                <div class="card-body p-4 text-dark">
                    <p><strong>Nama:</strong> {{ $data['nama'] }}</p>
                    <p><strong>Email:</strong> {{ $data['email'] }}</p>
                    <p><strong>Telepon:</strong> {{ $data['telepon'] }}</p>
                    <p><strong>Institusi:</strong> {{ $data['institusi'] }}</p>
                    <p><strong>Keterangan:</strong> {{ $data['keterangan'] ?? '-' }}</p>

                </div>

                <div class="card-header text-center text-white" style="background-color: #283B8A;">
                    <h5 class="text-center">Informasi Kegiatan</h5>
                </div>

                {{-- Menampilkan data postingan --}}
                <div class="bg-light p-4 rounded shadow-sm">
                    <p><strong>Judul Kegiatan:</strong> {{ $postingan->JudulKegiatan ?? '-' }}</p>
                    <p><strong>Jenis Kegiatan:</strong> {{ $postingan->JenisKegiatan ?? '-' }}</p>
                    <p><strong>Lokasi:</strong> {{ $postingan->Lokasi ?? '-' }}</p>
                    <p><strong>Tanggal Kegiatan:</strong>
                        {{ $postingan->TanggalKegiatan ? \Carbon\Carbon::parse($postingan->TanggalKegiatan)->translatedFormat('d F Y') : '-' }}
                    </p>
                    <p><strong>Harga:</strong> Rp{{ number_format($postingan->Harga ?? 0, 0, ',', '.') }}</p>

                    @if ($postingan->Poster)
                        <div class="text-center mt-3">
                            <img src="{{ asset('storage/' . $postingan->Poster) }}" class="img-fluid rounded" alt="Poster Kegiatan" style="max-height: 300px;">
                        </div>
                    @endif

                    <div class="mt-4">
                        <div class="d-grid">
                            <button id="pay-button" class="btn text-white" style="background-color: #F4A949; border-radius: 10px; padding: 12px;">
                                Bayar Sekarang - Rp{{ number_format($postingan->Harga ?? 0, 0, ',', '.') }}
                            </button>
                        </div>
                    </div>

                    <br>
                    <div class="text-center mt-3">
                        <a href="javascript:history.back()" style="color: #283B8A; text-decoration:none">Kembali ke Form</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
            
                console.log('Payment success:', result);
                alert('Pembayaran berhasil! Menyimpan data dan mengarahkan ke halaman utama.');

            
                const form = document.getElementById('real-checkout-form');
                const formData = new FormData(form);

               
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                })
                .then(response => {
                   
                    console.log('Data pendaftaran berhasil dikirim ke server.');
                    window.location.href = '/home'; // <-- Langsung ke /home
                })
                .catch(error => {
                    console.error('Gagal mengirim data ke server:', error);
                    alert('Terjadi kesalahan saat menyimpan data Anda, namun pembayaran berhasil.');
                    window.location.href = '/home'; // <-- Tetap ke /home jika ada error
                });
            },
            onPending: function(result) {
                console.log('Payment pending:', result);
                alert('Pembayaran Anda pending. Silakan selesaikan pembayaran.');
            },
            onError: function(result) {
                console.log('Payment error:', result);
                alert('Terjadi kesalahan dalam pembayaran.');
            }
        });
    });
</script>
@endsection
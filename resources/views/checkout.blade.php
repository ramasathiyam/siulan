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

                    <!-- Midtrans Payment Section -->
                    <div class="mt-4">
                        <h5 class="text-center mb-3" style="color: #283B8A;">Pembayaran</h5>
                        
                        <!-- Button untuk trigger pembayaran -->
                        <div class="d-grid">
                            <button id="pay-button" class="btn text-white" style="background-color: #F4A949; border-radius: 10px; padding: 12px;">
                                Bayar Sekarang - Rp{{ number_format($postingan->Harga ?? 0, 0, ',', '.') }}
                            </button>
                        </div>
                        
                        <!-- Container untuk embed Midtrans -->
                        <div id="snap-container" class="mt-3"></div>
                    </div>

                    <br>
                    <div class="text-center mt-3">
                        <a href="{{ url()->previous() }}" style="color: #283B8A; text-decoration:none">Kembali ke Form</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Midtrans Snap.js -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<!-- Untuk production gunakan: https://app.midtrans.com/snap/snap.js -->

<!-- Tambahkan PHP untuk handle payment success -->
@if(request()->has('payment_success'))
    <?php
    try {
        // Simpan data ke database sesuai struktur tabel
        DB::table('pendaftar')->insert([
            'id_postingan' => $postingan->id,
            'nama' => $data['nama'],
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'kategori' => $data['kategori'],
            'institusi' => $data['institusi'],
            'keterangan' => $data['keterangan'] ?? 'NULL',
            'snap_token' => $snapToken,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        // Redirect ke halaman sukses
        echo "<script>
            alert('Pembayaran berhasil dan data telah disimpan!');
            window.location.href = '/home';
        </script>";
    } catch (Exception $e) {
        echo "<script>
            alert('Pembayaran berhasil tapi gagal menyimpan data: " . $e->getMessage() . "');
            console.error('Error:', '" . $e->getMessage() . "');
        </script>";
    }
    ?>
@endif

<script type="text/javascript">
    // Trigger pembayaran ketika button diklik
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        // Trigger snap popup/embed dengan token dari database
        window.snap.embed('{{ $snapToken }}', {
            embedId: 'snap-container',
            onSuccess: function(result) {
                // Callback ketika pembayaran berhasil
                console.log('Payment success:', result);
                
                // Langsung simpan data menggunakan AJAX
                fetch('{{ url()->current() }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        payment_success: '1',
                        transaction_id: result.transaction_id,
                        payment_type: result.payment_type,
                        order_id: result.order_id,
                        // Data pendaftar
                        nama: '{{ $data["nama"] }}',
                        email: '{{ $data["email"] }}',
                        telepon: '{{ $data["telepon"] }}',
                        kategori: '{{ $data["kategori"] }}',
                        institusi: '{{ $data["institusi"] }}',
                        keterangan: '{{ $data["keterangan"] ?? "" }}',
                        id_postingan: '{{ $postingan->id }}',
                        snap_token: '{{ $snapToken }}'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Pembayaran berhasil dan data telah disimpan!');
                        window.location.href = '/home';
                    } else {
                        alert('Pembayaran berhasil tapi gagal menyimpan data: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Pembayaran berhasil tapi terjadi kesalahan sistem. Silakan hubungi admin.');
                    // Tetap redirect ke home meskipun ada error
                    window.location.href = '/home';
                });
            },
            onPending: function(result) {
                // Callback ketika pembayaran pending
                console.log('Payment pending:', result);
                alert('Pembayaran pending, silakan selesaikan pembayaran.');
            },
            onError: function(result) {
                // Callback ketika terjadi error
                console.log('Payment error:', result);
                alert('Terjadi kesalahan dalam pembayaran.');
            },
            onClose: function() {
                // Callback ketika popup ditutup
                console.log('Payment popup closed');
            }
        });
    });
</script>
@endsection
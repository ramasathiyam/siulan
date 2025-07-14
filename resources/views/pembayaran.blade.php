@extends('layout.main')

@section('body')
<div class="container mt-5">
    <h3>Bayar Postingan: {{ $post->JudulKegiatan }}</h3>
    
    {{-- Tampilkan harga upload sebenarnya --}}
    <p>Total yang harus dibayar: 
        <strong>
            Rp{{ number_format($hargaFinal ?? $paket->harga, 0, ',', '.') }}
        </strong>
    </p>

    {{-- Display success/error messages --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($snapToken)
        {{-- Jika token sudah ada --}}
        <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
    @else
        {{-- Jika token belum ada --}}
        <p>Klik tombol di bawah untuk memproses pembayaran dan mendapatkan opsi pembayaran.</p>
        <form action="{{ route('pembayaran.bayar', $post->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
        </form>
    @endif
</div>

{{-- Midtrans Snap JS --}}
@if ($snapToken)
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script type="text/javascript">
        document.getElementById('pay-button').addEventListener('click', function () {
      
            if (typeof window.snap !== 'undefined' && window.snap) {
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function (result) {
        
                        alert('Pembayaran berhasil!');
                        window.location.href = '{{ url("/") }}';
                    },
                    onPending: function (result) {
         
                        alert('Pembayaran Anda masih tertunda.');
          
                    },
                    onError: function (result) {
         
        
                        alert('Terjadi kesalahan saat pembayaran.');
         
                    },
                    onClose: function () {
                        alert('Anda menutup popup pembayaran.');
                    }
                });
            } else {
                alert('Midtrans Snap belum dimuat. Silakan coba lagi.');
            }
        });
    </script>
@endif
@endsection

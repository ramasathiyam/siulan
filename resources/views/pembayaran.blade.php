@extends('layout.main')

@section('body')
<div class="container mt-5">
    <h3>Bayar Postingan: {{ $post->JudulKegiatan }}</h3>
    <p>Total yang harus dibayar: <strong>Rp{{ number_format($paket->harga, 0, ',', '.') }}</strong></p>

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
        {{-- If snapToken exists, display the "Bayar Sekarang" button --}}
        <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
    @else
        {{-- If snapToken does not exist (initial load), provide a button to generate it --}}
        <p>Klik tombol di bawah untuk memproses pembayaran dan mendapatkan opsi pembayaran.</p>
        <form action="{{ route('pembayaran.bayar', $post->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
        </form>
    @endif
</div>

{{-- Midtrans Snap Script (only include if snapToken is present to avoid errors on initial load) --}}
@if ($snapToken)
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script type="text/javascript">
        document.getElementById('pay-button').addEventListener('click', function () {
            // Check if window.snap exists before calling pay
            if (typeof window.snap !== 'undefined' && window.snap) {
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function (result) {
                        console.log('Payment success:', result);
                        alert('Pembayaran berhasil!');
                        window.location.href = '{{ url("/home") }}';
                    },
                    onPending: function (result) {
                        console.log('Payment pending:', result);
                        alert('Pembayaran Anda masih tertunda.');
                        // Optionally update UI or redirect to a pending status page
                    },
                    onError: function (result) {
                        console.log('Payment error:', result);
                        alert('Terjadi kesalahan saat pembayaran.');
                        // Optionally update UI or redirect to an error status page
                    },
                    onClose: function () {
                        alert('Anda menutup popup pembayaran tanpa menyelesaikan transaksi.');
                    }
                });
            } else {
                alert('Midtrans Snap script not loaded properly. Please try again.');
                console.error('Midtrans Snap script is not available.');
            }
        });
    </script>
@endif
@endsection
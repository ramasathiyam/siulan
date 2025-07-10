@extends('layout.main')

@section('body')
<div class="container mt-5">
    <h3>Bayar Postingan: {{ $post->JudulKegiatan }}</h3>
    <p>Total yang harus dibayar: <strong>Rp{{ number_format($post->Harga, 0, ',', '.') }}</strong></p>

    <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
</div>

{{-- <!-- Midtrans Script -->
<script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script type="text/javascript">
  document.getElementById('pay-button').addEventListener('click', function () {
    window.snap.pay('{{ $snapToken }}');
  });
</script> --}}
@endsection

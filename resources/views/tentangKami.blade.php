@extends('layout.main')
@section('body')
<div class="more-item">
    <img src="img/Logo (2).png" class="img-fluid" alt="Gambar" />
  </div>

  <!-- Contact Us Section -->
  <div class="container">
    <div class="row align-items-center my-5">

      <!-- Kolom Kiri: Teks -->
      <div class="col-md-6">
        <h1 style="line-height: 1.5;">
          <h1 class="fw-bold">Siapa Kami dan </h1>
          <h1 class="fw-bold">Apa yang Kami Lakukan?</h1>
          <p style=" text-align: justify ; line-height: 1.5;">
            Kami adalah platform berbasis kampus yang didedikasikan untuk memudahkan mahasiswa menemukan dan mengikuti
            berbagai
            kegiatan non-akademik dan semi-akademik seperti kompetisi, seminar, dan webinar yang diselenggarakan di
            dalam universitas.
          </p>
          <button type="button" class="btn btn-warning text-white"> Coba Dulu </button>
      </div>

      <!-- Kolom Kanan: Gambar -->
      <div class="col-md-6 text-center mt-4 ">
        <img src="img/Rectangle 12376.png" class="img-fluid rounded" alt="Cinque Terre">
      </div>
    </div>

    <div class="container-fluid p-5 text-center" style="color: #283B8A;">
      <h1 class="fw-bold">Satu Platform, Banyak Kegiatan</h1>
    </div>
  </div>

  <div class="container">
    <div class="d-flex justify-content-around gap-4 my-5"> >
      <div>
        <div class="shadow p-4"
          style="background-color: #54B185; padding: 20px; border-radius: 10px; color: antiquewhite;">
          <h3>Lomba</h3>
          <p>Kompetisi Terbaru, Kesempatan Terbaik!<br>Yuk, cek lomba yang sedang berlangsung dan daftar
            sekarang juga!</p>
        </div>
      </div>
      <div>
        <div class="shadow p-4"
          style="background-color: #6E4CC4; padding: 20px; border-radius: 10px; color: antiquewhite;">
          <h3>Lomba</h3>
          <p>Kompetisi Terbaru, Kesempatan Terbaik!<br>Yuk, cek lomba yang sedang berlangsung dan daftar
            sekarang juga!</p>
        </div>
      </div>
      <div>
        <div class="shadow p-4"
          style="background-color: #3577E8; padding: 20px; border-radius: 10px; color: antiquewhite;">
          <h3>Lomba</h3>
          <p>Kompetisi Terbaru, Kesempatan Terbaik!<br>Yuk, cek lomba yang sedang berlangsung dan daftar
            sekarang juga!</p>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center p-5 my-5" style="background-color: #283B8A; color: aliceblue;">
    <h1>Kenali Kami Lebih Dekat</h1>
  </div>
  <div class="container my-4">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="shadow p-4 bg-body rounded h-100 d-flex flex-column justify-content-between">
          <h3> <i class="bi bi-telephone-plus-fill"> </i> (0361) 98372252</h3>
          <p>Untuk informasi lebih lanjut atau keperluan komunikasi,<br> Anda dapat menghubungi kami
            melalui <br> kontak yang tersedia di sistem ini.</p>
        </div>
      </div>
      <div class="col">
        <div class="shadow p-4 bg-body rounded h-100 d-flex flex-column justify-content-between">
          <h3><i class="bi bi-geo-alt-fill"> </i>Bali, Indonesia</h3>
          <p>Gedung Rektorat Universitas Udayana<br>Jl. Raya Kampus Unud, Bukit Jimbaran,<br> Kuta
            Selatan, Badung, Bali 80361, Indonesia</p>
        </div>
      </div>
      <div class="col">
        <div class="shadow p-4 bg-body rounded h-100 d-flex flex-column justify-content-between">
          <h3><i class="bi bi-envelope-fill"> </i>Siulan@gmail.com</h3>
          <p>Untuk pertanyaan lebih lanjut,<br> silakan kirim email kepada kami melalui <br>alamat yang
            tertera pada halaman kontak.</p>
        </div>
      </div>
      <div class="col">
        <div class="shadow p-4 bg-body rounded h-100 d-flex flex-column justify-content-between">
          <h3><i class="bi bi-linkedin"></i> SiulanUdayana</h3>
          <p>Anda dapat terhubung dengan saya melalui <br> LinkedIn untuk keperluan profesional <br> atau
            kerja sama lebih lanjut.</p>
        </div>
      </div>
    </div>
  </div>
@endsection
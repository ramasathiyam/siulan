@extends('layout.main')
@section('body')

<style>
    /* Menambahkan efek transisi halus untuk hover */
    .feature-card, .contact-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    /* Efek hover untuk kartu, membuatnya sedikit terangkat */
    .feature-card:hover, .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
    }
</style>

<section id="hero" class="container my-5 py-5">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-12">
            <h1 class="display-4 fw-bold mb-3" style="line-height: 1.3;">
                Siapa Kami &<br>Apa yang Kami Lakukan?
            </h1>
            <p class="lead text-muted" style="text-align: justify;">
                Kami adalah platform berbasis kampus yang didedikasikan untuk memudahkan mahasiswa menemukan berbagai kegiatan non-akademik seperti kompetisi, seminar, dan webinar yang diselenggarakan di dalam universitas.
            </p>
        </div>

        <div class="col-lg-6 col-md-12 text-center mt-4 mt-lg-0">
            <img src="img/Rectangle 12376.png" class="img-fluid rounded shadow-lg" alt="Ilustrasi Kegiatan Kampus">
        </div>
    </div>
</section>

<hr>

<section id="fitur" class="container my-5 py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color: #283B8A;">Satu Platform, Banyak Kegiatan</h1>
        <p class="lead text-muted">Temukan peluang terbaik untuk mengembangkan dirimu.</p>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="shadow-sm p-4 h-100 feature-card" style="background-color: #54B185; border-radius: 15px; color: white;">
                <h3 class="fw-bold">Lomba</h3>
                <p>Kompetisi terbaru, kesempatan terbaik! Yuk, cek lomba yang sedang berlangsung dan daftar sekarang juga!</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="shadow-sm p-4 h-100 feature-card" style="background-color: #6E4CC4; border-radius: 15px; color: white;">
                <h3 class="fw-bold">Seminar</h3>
                <p>Perluas wawasanmu dengan mengikuti seminar dari para ahli di bidangnya. Ilmu baru menantimu!</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="shadow-sm p-4 h-100 feature-card" style="background-color: #3577E8; border-radius: 15px; color: white;">
                <h3 class="fw-bold">Webinar</h3>
                <p>Ikuti diskusi interaktif dari mana saja. Dapatkan sertifikat dan tingkatkan portofoliomu dengan mudah.</p>
            </div>
        </div>
    </div>
</section>

<hr>

<section class="text-center p-5 my-5" style="background-color: #283B8A; color: aliceblue;">
    <div class="container">
        <h1 class="display-5 fw-bold">Kenali Kami Lebih Dekat</h1>
        <p class="lead">Kami siap membantu dan terhubung dengan Anda.</p>
    </div>
</section>

<section id="kontak" class="container my-5 py-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-4">
        <div class="col">
            <div class="shadow-sm p-4 bg-body rounded h-100 contact-card">
                <h3 class="d-flex align-items-center gap-3 fw-bold"><i class="bi bi-geo-alt-fill text-primary"></i> Alamat</h3>
                <p class="text-muted mt-3">
                    Gedung Rektorat Universitas Udayana<br>
                    Jl. Raya Kampus Unud, Bukit Jimbaran,<br>
                    Kuta Selatan, Badung, Bali 80361, Indonesia
                </p>
            </div>
        </div>
        <div class="col">
            <div class="shadow-sm p-4 bg-body rounded h-100 contact-card">
                <h3 class="d-flex align-items-center gap-3 fw-bold"><i class="bi bi-envelope-fill text-primary"></i> Email</h3>
                <p class="text-muted mt-3">
                    Untuk pertanyaan lebih lanjut, silakan kirim email kepada kami melalui alamat <a href="mailto:Siulan@gmail.com">Siulan@gmail.com</a>.
                </p>
            </div>
        </div>
        <div class="col">
            <div class="shadow-sm p-4 bg-body rounded h-100 contact-card">
                 <h3 class="d-flex align-items-center gap-3 fw-bold"><i class="bi bi-telephone-plus-fill text-primary"></i> Telepon</h3>
                 <p class="text-muted mt-3">
                    Hubungi kami untuk informasi cepat atau keperluan komunikasi di nomor <strong>(0361) 98372252</strong>.
                </p>
            </div>
        </div>
        <div class="col">
            <div class="shadow-sm p-4 bg-body rounded h-100 contact-card">
                <h3 class="d-flex align-items-center gap-3 fw-bold"><i class="bi bi-linkedin text-primary"></i> LinkedIn</h3>
                <p class="text-muted mt-3">
                    Anda dapat terhubung dengan kami melalui LinkedIn untuk keperluan profesional atau kerja sama di <a href="#">SiulanUdayana</a>.
                </p>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
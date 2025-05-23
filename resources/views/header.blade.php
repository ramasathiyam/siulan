<!-- Navbar -->
<section>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #283B8A">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="img/Logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> SIULAN
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item ">
              <a class="nav-link active" href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('tentangkami') }}">Tentang kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('penanda') }}">Penanda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('riwayat') }}">Riwayat</a>
            </li>
            <li class="nav-item">
              <a class="btn custom-button ms-3" href="{{ route('posting') }}">Unggah</a>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!-- Akhir Navbar -->
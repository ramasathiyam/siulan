@extends('layout.main')

@section('body')
        @if (!request()->has('search') && !request()->has('kategori') && !request()->has('jenis_kegiatan'))
        </section>
            <section class="py-3"  style="background-color: #283B8A;">
              <div class="container pt-5" >
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                  <div class="w-100 w-lg-50 mb-4 mb-lg-0 mt-0">
                    <h1 class="text-justify text-lg-start color-wht">Satu Tempat, Prestasi Tanpa Batas di Udayana</h1>
                    <p style="text-align:justify;" class="color-wht mt-3">SIULAN (Seputar Informasi Lomba dan Seminar) adalah platform yang memudahkan mahasiswa Universitas Udayana dalam mencari dan membagikan informasi lomba serta seminar, baik akademik maupun non-akademik. </p>
                    <a href="{{ route('login') }}">
                      <button type="button" class="btn btn-sm border-0 px-5 py-2 mt-3 custom-button">
                        Telusuri
                      </button>
                    </a>
                  </div>
                  <div class="w-100 w-lg-50 mt-5 d-flex justify-content-center pt-">
                    <img src="img/amico.png" alt="Ilustrasi" class="img-fluid w-75">
                  </div>
                </div>
              </div>
            </section>
        @endif

        @if (isset($popupPost))
          <!-- Modal pop-up -->
          <div class="modal fade" id="popupPremium" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{ $popupPost->JudulKegiatan }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  @if ($popupPost->Poster)
                    <img src="{{ asset('storage/' . $popupPost->Poster) }}" class="card-img-top" alt="Poster" style="max-height: 200px; object-fit: cover;">
                  @endif
                  <p>{{ $popupPost->Deskripsi }}</p>
                  <p><strong>Lokasi:</strong> {{ $popupPost->Lokasi }}</p>
                </div>
                <div class="modal-footer">
                  <a href="{{ route('lombaterbaru', ['id' => $popupPost->id]) }}" class="btn btn-primary">Lihat Detail</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Script show modal saat halaman dimuat -->
          <script>
            window.addEventListener('DOMContentLoaded', () => {
              if (!localStorage.getItem('popupShown')) {
                var popup = new bootstrap.Modal(document.getElementById('popupPremium'));
                popup.show();
                localStorage.setItem('popupShown', 'true');
              }
            });
          </script>
        @endif

        <!-- seacrching -->
        <section class="py-5 mt-5 bg-light">
          <div class="container">
            <form action="{{ route('search') }}" method="GET" class="row g-3 align-items-center">
              <div class="col-md-5">
                <input type="text" name="search" class="form-control shadow-sm" placeholder="Cari judul atau deskripsi..." value="{{ request('search') }}">
              </div>

              <div class="col-md-3">
              <select class="form-select" name="jenis_kegiatan">
                  <option value="">Semua Jenis Kegiatan</option>
                  <option value="Lomba" {{ request('jenis_kegiatan') == 'Lomba' ? 'selected' : '' }}>Lomba</option>
                  <option value="Seminar" {{ request('jenis_kegiatan') == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                  <option value="Webinar" {{ request('jenis_kegiatan') == 'Webinar' ? 'selected' : '' }}>Webinar</option>
              </select>
              </div>

              <div class="col-md-2">
                <select class="form-select shadow-sm" name="kategori">
                  <option value="">Semua Kategori</option>
                  <option selected disabled>--Pilih Kategori--</option>
                  <option value="Teknologi & IT" {{ request('kategori') == 'Teknologi & IT' ? 'selected' : '' }}>Teknologi & IT</option>
                  <option value="Bisnis & Kewirausahaan" {{ request('kategori') == 'Bisnis & Kewirausahaan' ? 'selected' : '' }}>Bisnis & Kewirausahaan</option>
                  <option value="Desain & Kreatif" {{ request('kategori') == 'Desain & Kreatif' ? 'selected' : '' }}>Desain & Kreatif</option>
                  <option value="Marketing & Komunikasi" {{ request('kategori') == 'Marketing & Komunikasi' ? 'selected' : '' }}>Marketing & Komunikasi</option>
                  <option value="Pengembangan Diri" {{ request('kategori') == 'Pengembangan Diri' ? 'selected' : '' }}>Pengembangan Diri</option>
                  <option value="Pendidikan" {{ request('kategori') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                  <option value="Kesehatan & Kebugaran" {{ request('kategori') == 'Kesehatan & Kebugaran' ? 'selected' : '' }}>Kesehatan & Kebugaran</option>
                  <option value="Seni & Budaya" {{ request('kategori') == 'Seni & Budaya' ? 'selected' : '' }}>Seni & Budaya</option>
                  <option value="Musik & Hiburan" {{ request('kategori') == 'Musik & Hiburan' ? 'selected' : '' }}>Musik & Hiburan</option>
                  <option value="Olahraga" {{ request('kategori') == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                  <option value="Lingkungan" {{ request('kategori') == 'Lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                  <option value="Sosial & Komunitas" {{ request('kategori') == 'Sosial & Komunitas' ? 'selected' : '' }}>Sosial & Komunitas</option>

                </select>
              </div>

              <div class="col-md-2 text-end">
                <button type="submit" class="btn btn-primary w-100 custom-button">Cari</button>
              </div>
            </form>
          </div>
        </section>

        @if (!request()->has('search') && !request()->has('kategori') && !request()->has('jenis_kegiatan'))
          <section style="background-color: #283B8A;" class="p-5">
            <h1 class="mx-1  text-center fw-bold" style="color: aliceblue">Lomba Terbaru</h1>
            
            <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
              <div class="carousel-inner text-center">

                @foreach ($postingan as $posting ) 
                  @if (!empty($posting->snap_token))
                    <div class="carousel-item ">
                      <div class="card ">
                        @if ($posting->Poster)
                          <img src="{{ asset('storage/' . $posting->Poster) }}" class="card-img-top" alt="Poster" style="max-height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                          <h5 class="mt-3">{{ $posting->JudulKegiatan }}</h5>
                          <p class="card-text">{{ $posting->Lokasi}}</p>
                          <a href="{{ route('lombaterbaru', ['id' => $posting->id]) }}" class="btn custom-button">Baca Selengkapnya</a>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          </section>
        @endif

        <section class="container">
          <h1 class="text-center mt-4 fw-bold">Hasil Penelusuran</h1>
          <div class="row row-cols-1 row-cols-md-3 g-4 m-1 mb-5 text-center">
            @forelse($postingan as $posting)
              @if (!empty($posting->snap_token))
                <div class="col">
                  <div class="card h-100 p-3">
                    @if ($posting->Poster)
                      <img src="{{ asset('storage/' . $posting->Poster) }}" class="card-img-top" alt="Poster" style="max-height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                      <a href="{{ route('lombaterbaru', ['id' => $posting->id]) }}" class="btn btn-primary btn-lg custom-button border-0 mt-3">Baca Selengkapnya</a>
                      <h5 class="mt-3">{{ $posting->JudulKegiatan }}</h5>
                      <h6>{{ $posting->Lokasi }}</h6>
                      <h6>{{ \Carbon\Carbon::parse($posting->TanggalKegiatan)->format('d F Y') }}</h6>
                    </div>
                  </div>
                </div>
              @endif
            @empty
              <div class="col">
                <p class="text-center mt-5">Tidak ada hasil yang ditemukan.</p>
              </div>
            @endforelse
          </div>
        </section>


        <section>
          <div style="background-color:aliceblue; height:100px"></div>
        </section>
@endsection
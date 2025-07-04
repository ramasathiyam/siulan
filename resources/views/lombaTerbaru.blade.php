@extends('layout.main')

@section('body')
<div class="py-5" style="background-color: #283B8A;">
    <div class="container">
        <h2 class="text-white text-center pt-4 mb-4">Lomba Terbaru</h2>
        
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-interval="3000">
            <div class="carousel-inner">
              <div class="carousel-item active overflow-auto gap-3 pb-2">
              <!-- <div class="carousel-item active d-flex overflow-auto gap-3 pb-2"> -->
                <img src="img/Group 26086203.png" class="d-block w-10" alt="...">
                <!-- <img src="img/Group 26086203.png" class="d-block w-10" alt="...">
                <img src="img/Group 26086203.png" class="d-block w-10" alt="..."> -->
              </div>
              <div class="carousel-item gap-3 pb-2">
              <!-- <div class="carousel-item d-flex gap-3 pb-2"> -->
                <img src="img/Group 26086203 (1).png" class="d-block w-10" alt="...">
                <!-- <img src="img/Group 26086203 (1).png" class="d-block w-10" alt="...">
                <img src="img/Group 26086203 (1).png" class="d-block w-10" alt="..."> -->
              </div>
              <div class="carousel-item gap-3 pb-2">
              <!-- <div class="carousel-item d-flex gap-3 pb-2"> -->
                <img src="img/Group 26086203.png" class="d-block w-10" alt="...">
                <!-- <img src="img/Group 26086203.png" class="d-block w-10" alt="...">
                <img src="img/Group 26086203.png" class="d-block w-10" alt="..."> -->
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
</div>    

<div class="d-flex gap-3 ps-5 pt-4 pb-2">
    <h5 class="text-blue">Urut Berdasarkan :</h5>
    <div class="dropdown">

        <button class="btn btn-info dropdown-toggle droper " style="border: 0;" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Default</button>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <li><button class="dropdown-item" type="button">Action</button></li>
        <li><button class="dropdown-item" type="button">Another action</button></li>
        <li><button class="dropdown-item" type="button">Something else here</button></li>
        </ul>
    </div>
</div>


<div class="container d-flex gap-5 pb-5">    
    <div class="d-grid pt-4 gap-3">
        <div class="card pb-2" style="width: 18rem; border-radius: 30px;">
            <img src="img/Group 26086203.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Inovasi Sains Udayana 2025</h5>
                <p class="card-text">1 April - 21 Mei 2025 <br>
                    Online | 💰 Rp 35.000 <br>
                    Peserta: Mahasiswa</p>

                <a href="#" class="btn  droper" style="border: 0;">Kunjungi</a>

            </div>
        </div>
        <div class="card" style="width: 18rem; border-radius: 30px;">
            <img src="img/Group 26086203.png" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Inovasi Sains Udayana 2025</h5>
            <p class="card-text">1 April - 21 Mei 2025 <br>
                Online | 💰 Rp 35.000 <br>
                Peserta: Mahasiswa</p>

            <a href="#" class="btn droper" style="border: 0;">Kunjungi</a>

            </div>
        </div>
        <div class="card" style="width: 18rem;border-radius: 30px;">
            <img src="img/Group 26086203.png" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Inovasi Sains Udayana 2025</h5>
            <p class="card-text">1 April - 21 Mei 2025 <br>
                Online | 💰 Rp 35.000 <br>
                Peserta: Mahasiswa</p>

            <a href="#" class="btn droper" style="border: 0;">Kunjungi</a>

            </div>
        </div>
    </div>

    
    {{-- @php dd($lomba); @endphp --}}
    <div class="card">
        <div class="row g-0 d-flex" style="border-radius: 30px;">
            <div class="col-md-7">
                <img src="img/Group 26086203.png" class="img-fluid rounded-start " style="width: 500px; height: auto;" alt="...">
            </div>

            <div class="col-md-5 pe-4 ps-5">

                <h5 class="card-title fw-bold pt-3 pb-1" style="text-align: center;">{{ $postingan->JudulKegiatan }}</h5>
                <hr>
                <div class="container pb-3">
                    <div class="row">

                      <div class="col text-white  border d-flex justify-content-center align-items-center ms-3 droper" style="border-radius: 30px; width: 60; height: 40px;">Sains</div>

                      <div class="col bg-light border d-flex justify-content-center align-items-center p-3" style="border-radius: 30px; width: 60; height: 40px;">Lomba</div>
                    </div>
                </div>
            <p class="card-text">{{ $postingan->Peserta}}<br>{{ $postingan->TanggalKegiatan}}<br>{{ $postingan->Lokasi}}| 💰 Rp {{ $postingan->Harga}}</p>
                <hr>
                <h5>detail kalimat lain</h5>
                <div class="d-grid gap-2 col-10 mx-auto pt-2">

                    {{-- <button class="text-white border shadow droper" style="border:0; border-radius: 7px; height: 40px;" type="button">Daftar Sekarang >></button> --}}
                     <a href="{{ route('daftarlomba', ['id' => $postingan->id]) }}" class="btn custom-button">Daftar Sekarang</a>
                </div>
                <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
            </div>
        </div>
        <br>
        <div class="p-5 ms-4 me-4 mt-1 fw-bold img-thumbnail shadow">
            <h5>Halo seluruh civitas udayana</h5>
            <p>INOVASI SAINS 2021 (INVASI)<br>Transformasi Inovasi Masa Kini melalui Pendekatan Sains dan Teknologi Guna Mendukung Sustainable Development Goals (SDG's) 2030
                Kompetisi ini merupakan ajang poster ilmiah untuk mahasiswa aktif (D3, D4, S1) secara individu maupun tim (maksimal 2 orang), yang mengusung lima subtema utama: <br>
                <br> 1. Sains dan Teknologi <br>
                2. Energi Terbarukan <br>
                3. Kesehatan <br>
                4. Pendidikan <br><br>
                💡 Saatnya kamu bersinar, belajar, dan berkompetisi bareng tim terbaik dari seluruh Indonesia! <br>
                📌 Timeline lengkap, link pendaftaran, dan informasi lainnya bisa kamu akses di: <br> <br>
                <a href="#" class="link-success">📎bit.ly/linklomba</a> <br>
                💸HTM:35.000/tim <br>
                📱 CP: 0899-0000-8888 <br>
                 IG: @fmipaudayana
            </p>
        </div>
        
        <div class="ps-5 pe-5 pt-4 m-4 img-thumbnail shadow">
            <h6>Universitas Udayana</h6> <br>
            <img src="img/image 15.png" alt="...">
            <p class="text-align: center"><br>Himpunan Mahasiswa Fakultas MIPA Universitas Udayana</p>
            <p>Alamat : Jalan. Kampus Bukit Jimbaran, Badung <br>
               Email     : info@unud.ac.id <br>
               Tlp / Fax: +62 (361) 701812 / +62 (361) 701907
            </p>

        </div>

        <div class="gap-3 d-flex justify-content-center align-items-center ">
            <button type="button" class="btn btn-warning shadow">Bookmark</button>
            <button type="button" class="btn btn-danger shadow">Laporkan</button>
            <button type="button" class="btn btn-success shadow">Panduan Lomba</button>
            <button type="button" class="btn btn-info shadow">Bagikan</button>

        </div>

     </div>
     
</div>


@endsection
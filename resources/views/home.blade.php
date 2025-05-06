@extends('layout.main')

@section('body')
     </section>
        <section class="py-3"  style="background-color: #283B8A;">
          <div class="container pt-5" >
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
              <div class="w-100 w-lg-50 mb-4 mb-lg-0 mt-0">
                <h1 class="text-justify text-lg-start color-wht">Satu Tempat, Prestasi Tanpa Batas di Udayana</h1>
                <p style="text-align:justify;" class="color-wht mt-3">SIULAN (Seputar Informasi Lomba dan Seminar) adalah platform yang memudahkan mahasiswa Universitas Udayana dalam mencari dan membagikan informasi lomba serta seminar, baik akademik maupun non-akademik. </p>
                <!-- <button class="px-4 py-1 rounded" style="background-color:#E8A652 ; border-color : #E8A652;">Log in</button> -->
                <a href="login.html">
                  <button type="button" class="btn btn-sm border-0 px-5 py-2 mt-3 custom-button">
                    Telusuri
                  </button>
                </a>
              </div>
              <!-- <div class="w-100 w-lg-">
                <img src="public/img/amico.png" alt="Ilustrasi" class="img-fluid w-100 d-flex justify-content-center">
              </div> -->
              <div class="w-100 w-lg-50 mt-5 d-flex justify-content-center pt-">
                <img src="img/amico.png" alt="Ilustrasi" class="img-fluid w-75">
              </div>
            </div>
          </div>
        </section>

        <!-- seacrching -->
      <section class="container">
      <div class="d-flex p-5">
          <div class="container">
            <div class="row ">
              <div class="col-md-6">
                <div class="search-container">

                  <input type="text" class="form-control search-input droper" placeholder="Cari Diini...">
                  <i class="fas fa-search search-icon"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-around w-100">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle droper" type="button" id="dropdownMenuBidang" data-bs-toggle="dropdown" aria-expanded="false" >
              Semua Bidang
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuBidang">
              <li><a class="dropdown-item" href="#">Teknologi</a></li>
              <li><a class="dropdown-item" href="#">Bisnis</a></li>
              <li><a class="dropdown-item" href="#">KTI</a></li>
              <li><a class="dropdown-item" href="#">Seni</a></li>
              <li><a class="dropdown-item" href="#">Kesehatan</a></li>
            </ul>
          </div>

          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle droper" type="button" id="dropdownMenuKategori" data-bs-toggle="dropdown" aria-expanded="false">
              Semua Kategori
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuKategori">
              <li><a class="dropdown-item" href="#">Lomba</a></li>
              <li><a class="dropdown-item" href="#">Seminar</a></li>
              <li><a class="dropdown-item" href="#">Webinar</a></li>
              <li><a class="dropdown-item" href="#">UMKM</a></li>
            </ul>
          </div>
        </div>
      </div>
      </section>
     
    <!-- slider -->




      <section style="background-color: #283B8A;" class="p-5">
    
        <h1 class="mx-1  text-center fw-bold" style="color: aliceblue">Lomba Terbaru</h1>
        
        <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
          <div class="carousel-inner text-center">
            <div class="carousel-item ">
              <div class="card ">
                <img src="img/Group 26086203.png" alt="...">
                <div class="card-body">
                  <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn custom-button"  onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card" >
                <img src="img/Group 26086203.png"  alt="...">
                <div class="card-body">
                  <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn custom-button"  onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card" >
                <img src="img/Group 26086203.png"  alt="...">
                <div class="card-body">
                  <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn custom-button"  onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card" >
                <img src="img/Group 26086203.png" alt="...">
                <div class="card-body">
                  <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn custom-button"  onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card" >
                <img src="img/Group 26086203.png"  alt="...">
                <div class="card-body">
                  <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn custom-button"  onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card" >
                <img src="img/Group 26086203.png"  alt="...">
                <div class="card-body">
                  <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn custom-button"  onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card" >
                <img src="img/Group 26086203.png" alt="...">
                <div class="card-body">
                  <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn custom-button"  onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card" >
                <img src="img/Group 26086203.png"  alt="...">
                <div class="card-body">
                  <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn custom-button"  onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card" >
                <img src="img/Group 26086203.png"  alt="...">
                <div class="card-body">
                  <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn custom-button"  onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card" >
                <img src="img/Group 26086203.png"  alt="...">
                <div class="card-body">
                  <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn custom-button"  onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
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

     

      <section class="container">
        <h1 class="text-center mt-4 fw-bold">Hasil Penelusuran</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 m-1 mb-5 text-center">
          <div class="col">
            <div class="card h-100 p-3">
              <img src="img/Group 26086203.png" class="card-img-top" alt="...">
              <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg custom-button border-0 mt-3 " onclick= "window.location.href='lombaterbaru.blade.php'">Baca Selengkapnya</button>
                <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
              <h6>Online</h6>
              <h6>1 April - 22 April</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 p-3">
              <img src="img/Group 26086203.png" class="card-img-top" alt="...">
              <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg custom-button border-0 mt-3" onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</button>
                <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                <h6>Online</h6>
                <h6>1 April - 22 April</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 p-3">
              <img src="img/Group 26086203.png" class="card-img-top" alt="...">
              <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg custom-button border-0 mt-3" onclick= "window.location.href='lombaterbaru.html'">Baca Selengkapnya</button>
                <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                <h6>Online</h6>
                <h6>1 April - 22 April</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 p-3">
              <img src="img/[App Design] Smart Wallet App with Financial Management - Huy Tu (Louz).jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg custom-button border-0 mt-3">Baca Selengkapnya</button>
                <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                <h6>Online</h6>
                <h6>1 April - 22 April</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 p-3">
              <img src="img/[App Design] Smart Wallet App with Financial Management - Huy Tu (Louz).jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg custom-button border-0 mt-3">Baca Selengkapnya</button>
                <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                <h6>Online</h6>
                <h6>1 April - 22 April</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 p-3">
              <img src="img/[App Design] Smart Wallet App with Financial Management - Huy Tu (Louz).jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg custom-button border-0 mt-3">Baca Selengkapnya</button> 
    
                <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                <h6>Online</h6>
                <h6>1 April - 22 April</h6>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100 p-3">
              <img src="img/Group 26086203.png" class="card-img-top" alt="...">
              <div class="card-body">
                <button type="button" class="btn btn-primary btn-lg custom-button border-0 mt-3">Baca Selengkapnya</button>
                <h5 class="mt-3">Inovasi Sains Udayana 2025</h5>
                <h6>Online</h6>
                <h6>1 April - 22 April</h6>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div style="background-color:aliceblue; height:100px"></div>
      </section>
@endsection
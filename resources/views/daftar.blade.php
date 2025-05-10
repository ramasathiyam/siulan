@extends('layout.main')
@section('body')
<div class="container-fluid vh-100">
    <div class="row h-100 g-0">
      <!-- bagian kiri -->
      <div
        class="col-md-6 d-flex flex-colum justify-content-center align-items-center bg-white text-dark p-4"
      >
        <div class="text-center">
          <h3 class="fw-bold" href="login.html">Buat Akun</h3>
          <!-- icon -->
          <div
            class="mb-3 d-flex justify-content-center gap-3 fs-4"
            style="color: #283b8a"
          >
            <i class="bi bi-google"></i>
            <i class="bi bi-github"></i>
            <i class="bi bi-linkedin"></i>
          </div>
          <p>Gunakan email kamu untuk membuat akun.</p>

          <form method="POST" action="{{ route('daftar') }}">
            @csrf
            <div class="mb-3">
              <input
                type="text"
                class="form-control"
                placeholder="Nama Pengguna"
                id="username"
                name="username"
              />
            </div>
            <div class="mb-3">
              <input
                type="password"
                class="form-control"
                placeholder="Kata Sandi"
                id="password"
                name="password"
              />
            </div>
            <div class="mb-3">
              <input
                type="password"
                class="form-control"
                placeholder="Masukan Kata Sandi"
                id="password_confirmation"
                name="password_confirmation"
              />
            </div>
            <div class="d-grid">
              <button
              class="btn btn-primary"
              type="submit"
              style="background-color: #283b8a"
              >
              Buat
            </button>
          </form>
          </div>
        </div>
      </div>

      <!-- bagian kanan -->
      <div
        class="col-md-6 d-flex flex-column justify-content-center align-items-center text-white p-4 text-center"
        style="background-color: #283b8a"
      >
        <div>
          <h3 class="fw-bold">Selamat Datang!</h3>
          <p>
            Untuk tetap terhubung dengan kami , login dengan akun pribadimu
          </p>
          <div class="d-grid">
            <a
              class="btn btn-outline-light mt-3"
              type="button"
              href="{{ route('login') }}"
            >
              Masuk
            </a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
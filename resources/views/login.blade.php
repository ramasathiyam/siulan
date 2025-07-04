<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    
    <!-- Bootstrap Icons (optional) -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
</head>
<body>
    <div class="container-fluid vh-100">
        <div class="row h-100 g-0">
            <!-- bagian kiri -->
            <div
                class="col-md-6 d-flex flex-column justify-content-center align-items-center text-white p-4 text-center"
                style="background-color: #283b8a"
            >
                <div>
                    <h3 class="fw-bold">Halo, Teman!</h3>
                    <p>Jika belum memiliki akun, buat akun untuk pengalaman lebih lanjut</p>
                    <div class="d-grid">
                        <a class="btn btn-outline-light mt-3" href="{{ route('daftar') }}">
                            Buat
                        </a>
                    </div>
                </div>
            </div>

            <!-- bagian kanan -->
            <div
                class="col-md-6 d-flex flex-column justify-content-center align-items-center bg-white text-dark p-4"
            >
                <div class="text-center">
                    <h3 class="fw-bold">Masuk</h3>

                    <!-- icon sosial -->
                    <div
                        class="mb-3 d-flex justify-content-center gap-3 fs-4"
                        style="color: #283b8a"
                    >
                        <i class="bi bi-google"></i>
                        <i class="bi bi-github"></i>
                        <i class="bi bi-linkedin"></i>
                    </div>

                    <p>Gunakan email kamu untuk membuat akun.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
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
                        <div class="d-grid gap-2">
                            <button
                                class="btn btn-primary"
                                type="submit"
                                style="background-color: #283b8a"
                            >
                                Masuk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opsional, untuk interaktivitas tambahan) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

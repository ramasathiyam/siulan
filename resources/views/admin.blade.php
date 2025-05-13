<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home siulan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <div class="d-flex">

        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100vh">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">SIULAN</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="#Dasboard" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                    Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link active text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                    Kelola Postingan
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('login') }}">Sign out</a></li>
            </ul>
            </div>
        </div>
       
         
            {{-- <div class="col text-black  border d-flex justify-content-center align-items-center ms-3 me-3 mt-4 droper " style= "border-radius: 10px; width: 60px; height: 70px;">
            <h1>Dasboard</h1>
            </div> --}}


        <!-- Konten utama -->
        <div class="container-fluid mt-4">
            <!-- Judul Dashboard -->
            <div class="row">
                <div class="col-12 d-flex justify-content-center ">
                    <div class="text-black border d-flex justify-content-center align-items-center droper" style="border-radius: 10px; width: 100%; height: 70px;">
                        <h2 class="text-white m-0">SIULAN</h2>
                    </div>
                </div>
            </div>

            <!-- Tabel Postingan -->
            <div class="row mt-4">
                <div class="col-12">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            <!-- Contoh baris data -->
                            <tr>
                                <td>1</td>
                                <td><img src="img/Group 26086203.png" width="60" /></td>
                                <td>Inovasi Sains 2021</td>
                                <td>Lomba</td>
                                <td>
                                    <button class="btn btn-success btn-sm">approved</button>
                                    <button class="btn btn-danger btn-sm">not approved</button>
                                </td>
                            </tr>
                            <!-- Tambahkan baris lain sesuai kebutuhan -->
                        </tbody> --}}
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($data as $post)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="{{ asset('storage/' . $post->Poster) }}" width="60" /></td>
                                <td>{{ $post->JudulKegiatan }}</td>
                                <td>{{ $post->Kategori }}</td>
                                <td>{{ ucfirst($post->Status) }}</td>

                                <td>
                                    <form action="{{ route('postingan.approve', $post->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                    <form action="{{ route('postingan.reject', $post->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    {{-- <script src="index.js"></script> --}}
   
</body>
</html>
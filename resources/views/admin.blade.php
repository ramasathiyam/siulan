<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIULAN - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100vh;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">SIULAN Admin</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li><a href="#Dasboard" class="nav-link text-white">Dashboard</a></li>
            <li><a href="#" class="nav-link active text-white">Kelola Postingan</a></li>
        </ul>
        <hr>
        
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger ms-3">Logout</button>
        </form>

    </div>

    <!-- Main Content -->
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-dark">Kelola Postingan Pengguna</h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Poster</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($data as $post)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="{{ asset('storage/' . $post->Poster) }}" width="60" class="rounded"></td>
                                <td>{{ $post->JudulKegiatan }}</td>
                                <td>{{ $post->Kategori }}</td>
                                <td><span class="badge bg-warning text-dark text-capitalize">{{ $post->status }}</span></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <!-- Approve -->
                                        <form action="{{ route('postingan.approve', $post->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                        </form>

                                        <!-- Reject Button Trigger Modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $post->id }}">Reject</button>

                                        <!-- Preview -->
                                        <a href="{{ route('admin.preview', $post->id) }}" class="btn btn-info btn-sm">Preview</a>
                                    </div>

                                    <!-- Modal: Reject Reason -->
                                    <div class="modal fade" id="rejectModal{{ $post->id }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $post->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('postingan.reject', $post->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title" id="rejectModalLabel{{ $post->id }}">Tolak Postingan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="rejection_note" class="form-label">Alasan Penolakan:</label>
                                                            <textarea class="form-control" name="rejection_note" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Kirim Penolakan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </td>
                            </tr>
                        @endforeach
                        @if ($data->isEmpty())
                            <tr>
                                <td colspan="6" class="text-muted">Belum ada postingan yang pending.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

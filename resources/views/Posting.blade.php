@extends('layout.main')
@section('body')
<!-- Form -->
<div class="container pt-5 mt-5 mb-5">
  <div class="form-container p-5 shadow">
      <div class="row mb-3">
          <div class="col">
              <h5><label for="kategori" class="form-label">Paket Postingan</label> </h5>
              <select class="form-select" id="kategori">
                  <option selected>--Pilih Paket--</option>
                  <option>Paket Basic</option>
                  <option>Paket Medium</option>
                  <option>Paket Premium</option>
              </select>
          </div>
      </div>

      <h5 class="mb-3">Judul Kegiatan</h5>
      <input type="text" class="form-control mb-3" placeholder="Ketik Judul Kegiatan disini...">

      <h5 class="mb-3">Deskripsi</h5>
      <textarea class="form-control mb-3" rows="4" placeholder="Ketik Deskripsi disini..."></textarea>

      <h5 class="mb-2">Jenis Kegiatan</h5>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenisKegiatan" id="lomba" value="Lomba">
          <label class="form-check-label" for="lomba">Lomba</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenisKegiatan" id="seminar" value="Seminar">
          <label class="form-check-label" for="seminar">Seminar</label>
      </div>
      <div class="form-check form-check-inline mb-3">
          <input class="form-check-input" type="radio" name="jenisKegiatan" id="webinar" value="Webinar">
          <label class="form-check-label" for="webinar">Webinar</label>
      </div>

      <div class="row mb-3">
          <div class="col">
              <h5><label for="kategori" class="form-label">Kategori</label></h5>
              <select class="form-select" id="kategori">
                  <option selected>--Pilih Kategori--</option>
                  <option>Teknologi</option>
                  <option>Bisnis</option>
                  <option>Olahraga</option>
              </select>
          </div>
      </div>

      <h5 class="mb-3">Lokasi</h5>
      <input type="text" class="form-control mb-3" placeholder="Lokasi Kegiatan disini...">
      <h5 class="mb-3">Tautan Pendaftaran</h5>
      <input type="text" class="form-control mb-3" placeholder="Tautan Pendaftaran...">

      <h5 class="mb-3">Kontak Penyelenggara</h5>
      <div class="row mb-3">
          <div class="col">
              <input type="text" class="form-control" placeholder="Masukkan Instagram...">
          </div>
          <div class="col">
              <input type="text" class="form-control" placeholder="Masukkan Website...">
          </div>
          <div class="col">
              <input type="text" class="form-control" placeholder="Masukkan Youtube...">
          </div>
      </div>

      <div class="mb-3">
          <h5><label class="form-label">Banner</label></h5>
          <input type="file" class="form-control">
          <small class="text-muted">Ukuran harus 1366x445</small>
      </div>

      <div class="mb-3">
          <h5><label class="form-label">Poster</label></h5>
          <input type="file" class="form-control">
          <small class="text-muted">Ukuran harus A3</small>
      </div>

      <button class="btn btn-primary w-100">Bayar</button>
  </div>
</div>

  @endsection
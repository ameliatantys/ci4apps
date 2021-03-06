<!-- Akan menggunakan file template di folder layout -->
<?= $this->extend('layout/template'); ?>

<!-- Untuk mulai mengisi konten yang akan ditampilkan -->
<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-8">
      <h2 class="my-2">Tambah Data Buku</h2>

      <!-- multi-form biar bisa bekerja dengan emthod post get dan file -->
      <form action="/books/save" method="post" enctype="multipart/form-data">
        <!-- biar formnya aman, dan jalan di page ini aja -->
        <?= csrf_field(); ?>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
          <div class="col-sm-10">
            <!-- mengset error dengan operasi ternari -->
            <!-- menambahkan fitur old untuk tinggal mengedit jika ada error tidak perlu ketik ulang -->
            <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" placeholder="Masukan judul" autofocus value="<?= old('judul'); ?>">
            <!-- untuk menampilkan pesan error -->
            <div class="invalid-feedback">
              <?= $validation->getError('judul'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Penulis</label>
          <div class="col-sm-10">
            <!-- mengset error dengan operasi ternari -->
            <!-- menambahkan fitur old untuk tinggal mengedit jika ada error tidak perlu ketik ulang -->
            <input type="text" class="form-control  <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>" id="penulis" name="penulis" placeholder="" value="<?= old('penulis'); ?>">
            <!-- untuk menampilkan pesan error -->
            <div class="invalid-feedback">
              <?= $validation->getError('penulis'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Penerbit</label>
          <div class="col-sm-10">
            <!-- mengset error dengan operasi ternari -->
            <!-- menambahkan fitur old untuk tinggal mengedit jika ada error tidak perlu ketik ulang -->
            <input type="text" class="form-control  <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>" id="penerbit" name="penerbit" placeholder="" value="<?= old('penerbit'); ?>">
            <!-- untuk menampilkan pesan error -->
            <div class=" invalid-feedback">
              <?= $validation->getError('penerbit'); ?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Sampul</label>
          <!-- membuat image preview -->
          <div class="col-sm-2">
            <img src="/img/default.jpg" class="img-thumbnail img-preview">
          </div>
          <div class="col-sm-8">
            <!-- mengset error dengan operasi ternari -->
            <!-- menambahkan fitur old untuk tinggal mengedit jika ada error tidak perlu ketik ulang -->
            <!-- file upload -->
            <div class="custom-file">
              <input type="file" class="costum-file-label" <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
              <label class="custom-file-label" for="sampul">Choose file</label>
              <div class="invalid-feedback">
                <?= $validation->getError('sampul'); ?>
              </div>
            </div>

          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Mengakhiri konten -->
<?= $this->endSection(); ?>
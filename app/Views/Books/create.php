<!-- Akan menggunakan file template di folder layout -->
<?= $this->extend('layout/template'); ?>

<!-- Untuk mulai mengisi konten yang akan ditampilkan -->
<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-8">
      <h2 class="my-2">Tambah Data Buku</h2>


      <form action="/books/save" method="post">
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
          <div class="col-sm-10">
            <!-- mengset error dengan operasi ternari -->
            <!-- menambahkan fitur old untuk tinggal mengedit jika ada error tidak perlu ketik ulang -->
            <input type="text" class="form-control  <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" placeholder="" value="<?= old('sampul'); ?>">
            <!-- untuk menampilkan pesan error -->
            <div class="invalid-feedback">
              <?= $validation->getError('sampul'); ?>
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
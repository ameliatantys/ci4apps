<!-- Akan menggunakan file template di folder layout -->
<?= $this->extend('layout/template'); ?>

<!-- Untuk mulai mengisi konten yang akan ditampilkan -->
<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-8">
      <h2 class="my-2">Tambah Data Buku</h2>

      <form action="/books/save" method="post">
        <!-- biar formnya aman -->
        <?= $csrf_field(); ?>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan judul" autofocus>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Penulis</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Penerbit</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Sampul</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="sampul" name="sampul" placeholder="">
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
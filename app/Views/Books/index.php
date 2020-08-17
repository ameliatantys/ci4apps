<!-- Akan menggunakan file template di folder layout -->
<?= $this->extend('layout/template'); ?>

<!-- Untuk mulai mengisi konten yang akan ditampilkan -->
<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <a href="/books/create" class="btn btn-primary mt-3">Tambah Data Buku</a>
      <h1 class="mt-2">Daftar Buku</h1>
      <?php if (session()->getFlashData('pesan')) : ?>
        <div class="alert alert-success text-center" role="alert">
          <?= session()->getFlashData('pesan'); ?>
        </div>
      <?php endif; ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Sampul</th>
            <th scope="col">Judul</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($books as $b) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><img src="/img/<?= $b['sampul']; ?>" alt="" class="sampul"></td>
              <td><?= $b['judul']; ?></td>
              <td>
                <a href="/books/<?= $b['slug']; ?>" class="btn btn-success">Detail</a>
              </td>
            </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Mengakhiri konten -->
<?= $this->endSection(); ?>
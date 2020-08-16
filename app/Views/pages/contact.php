<!-- Akan menggunakan file template di folder layout -->
<?= $this->extend('layout/template'); ?>

<!-- Untuk mulai mengisi konten yang akan ditampilkan -->
<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h1>Contact Us</h1>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nihil eius autem id natus voluptatibus quis quae numquam consequuntur cum praesentium sed tempora rem ex, vitae nobis excepturi adipisci quos dicta?</p>

    </div>
  </div>
</div>

<!-- Mengakhiri konten -->
<?= $this->endSection(); ?>
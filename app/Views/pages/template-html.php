<!-- Akan menggunakan file template di folder layout -->
<?= $this->extend('layout/template'); ?>

<!-- Untuk mulai mengisi konten yang akan ditampilkan -->
<?= $this->section('content'); ?>

#isi

<!-- Mengakhiri konten -->
<?= $this->endSection(); ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
<div class="d-flex justify-content-center mt-3 mb-2"><h3>Daftar Game</h3></div>
<div class="d-flex justify-content-center m-3">
  <a class="btn btn-outline-primary" href="/games/create" role="button"
    >Tambah Daftar (+)</a
  >
</div>
<?php if (session()->getFlashdata('pesan')): ?>
<div class="alert alert-success" role="alert">
  <?= session()->getFlashdata('pesan'); ?>
</div>
<?php endif; ?>
<?php if (session()->getFlashdata('pesan-hapus')): ?>
<div class="alert alert-danger" role="alert">
  <?= session()->getFlashdata('pesan-hapus'); ?>
</div>
<?php endif; ?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($games as $game) : ?>
      <tr>
        <th scope="row"><?= $i++ ?></th>
        <td><img src="/img/<?= $game['img']; ?>" alt="<?= $game['img']; ?>" class="img"></td>
        <td><?= $game['nama']; ?></td>
        <td><a href="/games/<?= $game['slug']; ?>" class="btn btn-primary">Detail <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square mb-1" viewBox="0 0 16 16">
        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg></a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
<?= $this->endSection(); ?>

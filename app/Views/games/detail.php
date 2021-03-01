<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="d-flex justify-content-center mt-3 mb-1"><h2>Detail Game</h2></div>
      
      <div class="card m-auto" style="width: 25rem;">
        <div class="card-body m-auto">
          <img src="/img/<?= $games['img']; ?>" alt="" class="img-detail">
        </div>
        <div class="card-body text-center">
          <h5 class="card-title"><?= $games['nama']; ?></h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><b>Developer : </b><?= $games['dev']; ?></li>
          <li class="list-group-item"><b>Genre : </b><?= $games['genre']; ?></li>
          <li class="list-group-item"><b>Tanggal dirilis : </b><?= $games['rilis']; ?></li>
          <li class="list-group-item"><b>Versi : </b><?= $games['versi']; ?></li>
        </ul>
        <div class="card-body text-center">
          <div class="row justify-content-center">
              <a href="/games/edit/<?= $games['slug']; ?>" class="btn btn-primary mr-1">Edit <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg></a>
              <form action="/games/<?= $games['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger ml-1" onclick="return confirm('Yakin ingin menghapus dari daftar?');">Delete <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg></button>
              </form>
          </div>
          <div class="row">
            <a href="/games/" class="btn btn-dark btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square mb-1" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg> Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col my-3">
      <legend>Ubah Data Game</legend>
      <form action="/games/update/<?= $games['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?=(old('nama')) ? old('nama') : $games['nama']; ?>">
        <input type="hidden" name="imgLama" value="<?= $games['img']; ?>">
        <div class="form-group">
          <label for="nama">Nama Game : </label>
          <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" placeholder="Masukkan nama game" name="nama"  autofocus autocomplete="off" value="<?= $games['nama']; ?>">
          <div id="validationServer04Feedback" class="invalid-feedback">
            <?= $validation->getError('nama'); ?>
          </div>  
        </div>
        <div class="form-group">
          <label for="genre">Genre : </label>
          <input type="text" class="form-control" id="genre" placeholder="Masukkan genre game" name="genre" autocomplete="off" value="<?= (old('genre')) ? old('genre') : $games['genre']; ?>">
        </div>
        <div class="form-group">
          <label for="dev">Developer : </label>
          <input type="text" class="form-control" id="dev" placeholder="Masukkan developer/pengembang game" name="dev" autocomplete="off" value="<?= (old('dev')) ? old('dev') : $games['dev']; ?>">
        </div>
        <div class="form-group">
          <label for="rilis">Tanggal Rilis : </label>
          <input type="text" class="form-control" id="rilis" placeholder="Masukkan tanggal rilis game" name="rilis" autocomplete="off" value="<?= (old('rilis')) ? old('rilis') : $games['rilis']; ?>">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Versi : </label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukkan versi game saat ini" name="versi" autocomplete="off" value="<?= (old('versi')) ? old('versi') : $games['versi']; ?>">
        </div>
        <!-- <div class="form-group">
          <label for="formGroupExampleInput2">Gambar : </label>
          <input type="text" class="form-control" id="img" placeholder="Masukkan versi game saat ini" name="img" value="<?= (old('img')) ? old('img') : $games['img']; ?>">
        </div> -->
        <div class="form-group">
            <label for="customFile">Gambar : </label>
            <div class="row">
              <div class="col-sm-2">
                <img src="/img/<?= $games['img']; ?>" class="img-thumbnail img-preview">
              </div>
              <div class="col-sm-10">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="img" name="img" onchange="previewImg()">
                  <label class="custom-file-label" for="img"><?= $games['img']; ?></label>
                  <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('img'); ?>
                  </div>  
                </div>
              </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Ubah <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square  mb-1" viewBox="0 0 16 16">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
      </svg></button>
      </form>
      <a class="btn btn-danger btn-block mt-2" href="index.php" role="button">Batal <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square mb-1" viewBox="0 0 16 16">
        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg></a>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
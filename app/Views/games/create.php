<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col my-3">
      <legend>Tambah Daftar Game</legend>
      <form action="/games/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group">
          <label for="nama">Nama Game : </label>
          <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" placeholder="Masukkan nama game" name="nama"  autofocus autocomplete="off" value="<?= old('nama'); ?>">
          <div id="validationServer04Feedback" class="invalid-feedback">
            <?= $validation->getError('nama'); ?>
          </div>  
        </div>
        <div class="form-group">
          <label for="genre">Genre : </label>
          <input type="text" class="form-control" id="genre" placeholder="Masukkan genre game" name="genre" autocomplete="off" value="<?= old('genre'); ?>">
        </div>
        <div class="form-group">
          <label for="dev">Developer : </label>
          <input type="text" class="form-control" id="dev" placeholder="Masukkan developer/pengembang game" name="dev" autocomplete="off" value="<?= old('dev'); ?>">
        </div>
        <div class="form-group">
          <label for="rilis">Tanggal Rilis : </label>
          <input type="text" class="form-control" id="rilis" placeholder="Masukkan tanggal rilis game" name="rilis" autocomplete="off" value="<?= old('rilis'); ?>">
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Versi : </label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukkan versi game saat ini" name="versi" autocomplete="off" value="<?= old('versi'); ?>">
        </div>
        <!-- <div class="form-group">
          <label for="formGroupExampleInput2">Gambar : </label>
          <input type="text" class="form-control" id="img" placeholder="Masukkan versi game saat ini" name="img" value="<?= old('img'); ?>">
        </div> -->
        <div class="form-group">
            <label for="customFile">Gambar : </label>
            <div class="row">
              <div class="col-sm-2">
                <img src="/img/default.jpg" class="img-thumbnail img-preview">
              </div>
              <div class="col-sm-10">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="img" name="img" onchange="previewImg()">
                  <label class="custom-file-label" for="img">Pilih file gambar...</label>
                  <div id="validationServer04Feedback" class="invalid-feedback">
                    <?= $validation->getError('img'); ?>
                  </div>  
                </div>
              </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Tambah <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
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
<br>
<br>
<div class="container">
<div class="card">
  <div class="card-header">
  Kirim Bimbingan
  </div>
  <div class="card-body">
  <div class="row mt-3">
        <div class="col-md-6">
        <?php if( validation_errors() ):?>
            <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
            </div>       
        <?php endif;?>
            <form action="" method="post">
                 <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <input type="text" name="file" class="form-control" id="file">
                </div>
                <div class="mb-3">
                    <label for="komentar" class="form-label">Komentar</label>
                    <input type="text" name="komentar" class="form-control" id="komentar">
                </div>               
                <div class="mb-3">
                    <label for="dosen1" class="form-label">Dosen Pembimbing 1</label>
                    <input type="text" name="dosen1" class="form-control" id="dosen1">
                </div>
                <div class="mb-3">
                    <label for="mahasiswa" class="form-label">Nama Mahasiswa</label>
                    <input type="text" name="mahasiswa" class="form-control" id="mahasiswa">
                </div>
                <button type="submit" name="tambah" class="btn btn-primary float-right">Kirim Bimbingan</button>
            </form>
        </div>
    </div>
  </div>
</div>
   

</div>
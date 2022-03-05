<br>
<br>
<div class="container">
<div class="card">
  <div class="card-header">
  Form Tambah Data Mahasiswa
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
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="ni" class="form-control" id="nim">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password1" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password2" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="nohp" class="form-label">Nomor HP</label>
                    <input type="text" name="nohp" class="form-control" id="nohp">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="text" name="email" class="form-control" id="email">
                </div>
                <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
            </form>
        </div>
    </div>
  </div>
</div>
   

</div>
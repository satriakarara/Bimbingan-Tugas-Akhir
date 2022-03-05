<br>
<br>
<div class="container">
<div class="card">
  <div class="card-header">
  Form Edit Data Mahasiswa
  </div>
  <div class="card-body">
  <div class="row mt-3">
        <div class="col-md-6">
        <?php if( validation_errors() ):?>
            <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
            </div>       
        <?php endif;?>
            <!-- <form action="" method="post"> -->
                <?php echo form_open_multipart(''); ?>
                 <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="ni" class="form-control" id="nim" value="<?= $mahasiswa['ni']?>">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $mahasiswa['nama']?>">
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
                    <input type="text" name="nohp" class="form-control" id="nohp" value="<?= $mahasiswa['nohp']?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $mahasiswa['alamat']?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="text" name="email" class="form-control" id="email" value="<?= $mahasiswa['email']?>">
                </div>
                <div class="mb-3">
                    <label for="profpic" class="form-label">Upload Foto</label>
                    <input type="file" name="foto" class="form-control" id="email">
                </div>
                <button type="submit" name="tambah" class="btn btn-primary float-right">Edit Data</button>
            <!-- </form> -->
            <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>
   

</div>
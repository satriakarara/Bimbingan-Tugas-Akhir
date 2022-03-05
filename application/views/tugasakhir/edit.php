<br>
<br>
<div class="container">
<div class="card">
  <div class="card-header">
  Form Edit Data Tugas Akhir
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
                    <label for="judul" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" id="judul"value="<?= $mahasiswa['nama']?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">NIM</label>
                    <input type="text" name="ni" class="form-control" id="judul" value="<?= $mahasiswa['ni']?>" readonly>
                </div>  
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" id="judul" value="<?= $tugasakhir['ta_judul']?>">
                </div>               
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi TA</label>
                    <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?= $tugasakhir['ta_deksripsi']?>">
                </div>
                <div class="mb-3">
                <label for="dosen1" class="form-label" >Dosen Pembimbing 1</label>
                    <select name="dospem1" class="form-control">
                        <?php foreach ($dosen as $dsn):?>
                        <option value="<?php echo $dsn['id']; ?>"><?php echo $dsn['nama']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                <label for="dosen2" class="form-label" >Dosen Pembimbing 2</label>
                    <select name="dospem2" class="form-control">
                        <?php foreach ($dosen as $dsn):?>
                        <option value="<?php echo $dsn['id']; ?>"><?php echo $dsn['nama']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                <label for="status" class="form-label">Status Tugas Akhir</label>
                    <select name="status" class="form-control">
                        <option value="Belum Seminar Proposal">Belum Seminar Proposal</option>
                        <option value="Sudah Seminar Proposal">Sudah Seminar Proposal</option>
                        <option value="Sudah Seminar Hasil">Sudah Seminar Hasil</option>
                        <option value="Sudah Ujian TA">Sudah Ujian Tugas Akhir</option>
                    </select>
                </div>
            
                <button type="submit" name="tambah" class="btn btn-primary float-right">Edit Data</button>
            </form>
        </div>
    </div>
  </div>
</div>
   

</div>
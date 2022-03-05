
<?php if ($user['id'] == $userId) {
?>  <div class="container">
<?php if ($this->session->flashdata('flash') ) :?>
<div class="row mt-3">
    <div class="col-md-6">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Bimbingan
        <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
</div>

<?php endif; ?>

<?php if (!empty($profil['ta_judul'])):  ?>
    <?php if($profil['ta_accepted'] == 0): ?>
      <div class="parentprof">
        <div class="div1prof"><img style="max-height: 150px;" src="<?php echo base_url('assets/img/profpic/').$mahasiswa['image']; ?>" alt=""> </div>
        <div class="div2prof container-fluid" style="color: black; font-family: -webkit-pictograph;">
            <?php $dosen = $this->db->get_where('user', ['id'=> $profil['id2']])->row_array('nama');?>
            <?php $dosen2 = $this->db->get_where('user', ['id'=> $profil['id3']])->row_array('nama');?>
            Nama Mahasiswa      : <?php echo $mahasiswa['nama'] ?><br>
            NIM Mahasiswa       : <?php echo $mahasiswa['ni'] ?><br>
            Judul Skripsi       : <?php echo $profil['ta_judul']?><br>
            Dosen Pembimbing 1  : <?php echo $dosen['nama'];?><br>
            Dosen Pembimbing 2  : 
                                  <?php if (empty($dosen2['nama'])) {?>
                                    <td>-</td>
                                  <?php } else {?>
                                    <td><?php echo $dosen2['nama']; ?></td>
                                  <?php } ?><br>
            Status Tugas Akhir  : <?php echo $profil['ta_status'] ?> </div>
        </div>
        <div class="row mt-5">                            
            <h5>Judul anda belum disetujui oleh jurusan, mohon menunggu persetujuan dari jurusan</h5>
         </div>
    <?php endif; ?>
    <?php if($profil['ta_accepted'] == 1): ?>
      <div class="parentprof">
        <div class="div1prof"><img style="max-height: 150px;" src="<?php echo base_url('assets/img/profpic/').$mahasiswa['image']; ?>" alt=""> </div>
        <div class="div2prof container-fluid" style="color: black; font-family: -webkit-pictograph;">
            <?php $dosen = $this->db->get_where('user', ['id'=> $profil['id2']])->row_array('nama');?>
            <?php $dosen2 = $this->db->get_where('user', ['id'=> $profil['id3']])->row_array('nama');?>
            Nama Mahasiswa      : <?php echo $mahasiswa['nama'] ?><br>
            NIM Mahasiswa       : <?php echo $mahasiswa['ni'] ?><br>
            Judul Skripsi       : <?php echo $profil['ta_judul']?><br>
            Dosen Pembimbing 1  : <?php echo $dosen['nama'];?><br>
            Dosen Pembimbing 2  : 
                                  <?php if (empty($dosen2['nama'])) {?>
                                    <td>-</td>
                                  <?php } else {?>
                                    <td><?php echo $dosen2['nama']; ?></td>
                                  <?php } ?><br>
            Status Tugas Akhir  : <?php echo $profil['ta_status'] ?> </div>
        </div>
        <div class="row mt-5">                            
            <h5>Judul anda telah disetujui oleh jurusan. Unggah file proposal anda untuk ditinjau oleh dosen pembimbing</h5>
            <button type="button" class="btn btn-primary modal-btn" style="width:30%; font-family: serif; margin-top: 40px; cursor:pointer;" > Upload File
         </div>
         <div class="row mt-3">
            <div class="col-md-6">
                        <table class="table" style="width:1000px; font-family: -webkit-pictograph;">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Revisi</th>
                      <th scope="col">Tujuan Bimbingan</th>
                      <th scope="col">Tanggal Bimbingan</th>
                      <th scope="col">File Mahasiswa</th>
                      <th scope="col">File Dosen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- pengulangan dari database -->
                    <?php for($i=0; $i< count($bimbingan); $i++):?>
                    <tr>
                      <th scope="row"><?php echo $i+1; ?></th>
                      <td><?php echo nl2br($bimbingan[$i]['bimb_komentar']); ?></td>
                      <!-- ngambil nama dosentujuan dari id2 pada bimbingan -->
                      <td><?php $dosentujuan = $this->db->get_where('user', ['id'=> $bimbingan[$i]['id2']])->row_array('nama');
                      echo $dosentujuan['nama'] ?></td>
                      <td><?php echo $bimbingan[$i]['bimb_waktu']; ?></td>
                      <td><a class="nav-link" href="<?php echo base_url('assets/file/bimbingan/').$bimbingan[$i]['bimb_file']?>" download><button type="button" class="btn btn-primary btn-sm" style="font-family: serif;" >Download File</button></a></td>
                      <!-- td untuk tombol file dosen -->
                      <?php if ($bimbingan[$i]['bimb_file2'] == '') {?>
                        <td style="padding-left: 28px;padding-top: 20px;" ><button type="button" class="btn btn-primary btn-sm" style="font-family: serif;"  disabled>Download File</button></a><td>
                      <?php } else { ?>
                          <td><a class="nav-link" href="<?php echo base_url('assets/file/bimbingan/').$bimbingan[$i]['bimb_file2']?>" download><button type="button" class="btn btn-primary btn-sm" style="font-family: serif;" >Download File</button></a><td>
                          
                        <?php } ?>
                      <!-- tutup td untuk tombol file dosen -->
                      <?php endfor; ?>
                    </tr>
                    </tbody>
                    </table>
                  
                    </div>
    <?php endif; ?>
    <?php if($profil['ta_accepted'] == 2): ?>
      <div class="parentprof">
        <div class="div1prof"><img style="max-height: 150px;" src="<?php echo base_url('assets/img/profpic/').$mahasiswa['image']; ?>" alt=""> </div>
        <div class="div2prof container-fluid" style="color: black; font-family: -webkit-pictograph;">
            <?php $dosen = $this->db->get_where('user', ['id'=> $profil['id2']])->row_array('nama');?>
            <?php $dosen2 = $this->db->get_where('user', ['id'=> $profil['id3']])->row_array('nama');?>
            Nama Mahasiswa      : <?php echo $mahasiswa['nama'] ?><br>
            NIM Mahasiswa       : <?php echo $mahasiswa['ni'] ?><br>
            Judul Skripsi       : <?php echo $profil['ta_judul']?><br>
            Dosen Pembimbing 1  : <?php echo $dosen['nama'];?><br>
            Dosen Pembimbing 2  : 
                                  <?php if (empty($dosen2['nama'])) {?>
                                    <td>-</td>
                                  <?php } else {?>
                                    <td><?php echo $dosen2['nama']; ?></td>
                                  <?php } ?><br>
            Status Tugas Akhir  : <?php echo $profil['ta_status'] ?> </div>
        </div>



        <div class="row mt-3">
            <div class="col-md-6">
                        <table class="table" style="width:1000px; font-family: -webkit-pictograph;">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Revisi</th>
                      <th scope="col">Tujuan Bimbingan</th>
                      <th scope="col">Tanggal Bimbingan</th>
                      <th scope="col">File Mahasiswa</th>
                      <th scope="col">File Dosen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- pengulangan dari database -->
                    <?php for($i=0; $i< count($bimbingan); $i++):?>
                    <tr>
                      <th scope="row"><?php echo $i+1; ?></th>
                      <td><?php echo nl2br($bimbingan[$i]['bimb_komentar']); ?></td>
                      <!-- ngambil nama dosentujuan dari id2 pada bimbingan -->
                      <td><?php $dosentujuan = $this->db->get_where('user', ['id'=> $bimbingan[$i]['id2']])->row_array('nama');
                      echo $dosentujuan['nama'] ?></td>
                      <td><?php echo $bimbingan[$i]['bimb_waktu']; ?></td>
                      <td><a class="nav-link" href="<?php echo base_url('assets/file/bimbingan/').$bimbingan[$i]['bimb_file']?>" download><button type="button" class="btn btn-primary btn-sm" style="font-family: serif;" >Download File</button></a></td>
                      <!-- td untuk tombol file dosen -->
                      <?php if ($bimbingan[$i]['bimb_file2'] == '') {?>
                        <td style="padding-left: 28px;padding-top: 20px;" ><button type="button" class="btn btn-primary btn-sm" style="font-family: serif;"  disabled>Download File</button></a><td>
                      <?php } else { ?>
                          <td><a class="nav-link" href="<?php echo base_url('assets/file/bimbingan/').$bimbingan[$i]['bimb_file2']?>" download><button type="button" class="btn btn-primary btn-sm" style="font-family: serif;" >Download File</button></a><td>
                          
                        <?php } ?>
                      <!-- tutup td untuk tombol file dosen -->
                      <?php endfor; ?>
                    </tr>
                    </tbody>
                    </table>
                  
                    </div>
                    <div>
                    <button type="button" class="btn btn-primary modal-btn" style="font-family: serif; margin-top: 40px; cursor:pointer;" > Kirim Bimbingan
                    </div>
    <?php endif; ?>
    <?php else: ?>
      <h3>Anda belum memiliki tugas akhir, silahkan ajukan judul anda
      <a href="<?= base_url();?>tugasakhir/tambah/<?php echo $user['id']?>">disini</a>
      </h3>
<?php endif; ?>

            <div class="modal-bg">
              <div class="modall">
                <div class="x">X</div>
              <br>
              <br>
                <div class="container">
                  <div class="card">
                    <div class="card-header">
                    Form Kirim Bimbingan
                    </div>
                    <div class="card-body">
                    <div class="row mt-3">
                      <div class="col-md-6">
                      <?php if( validation_errors() ):?>
                          <div class="alert alert-danger" role="alert">
                          <?= validation_errors(); ?>
                          </div>       
                      <?php endif;?>
                      <?php echo form_open_multipart(''); ?>
                              <div class="mb-3">
                                  <label for="nim" class="form-label">Dosen Tujuan</label>
                                  <select name="dospem1" class="form-control">
                                    <option value="<?php echo $dosen['id']; ?>"><?php echo $dosen['nama']; ?></option>
                                    <option value="<?php echo $dosen2['id']; ?>"><?php echo $dosen2['nama']; ?></option>
                                   </select>
                              </div>
                              <div class="mb-3">
                                  <label for="file" class="form-label">Upload</label>
                                  <input type="file" name="file" class="form-control" id="nama">
                                  <p>Pastikan file anda memiliki ekstensi docx</p>
                              </div>
                              <button type="submit" name="tambah" class="btn btn-primary float-right">Kirim</button>
                              <?php echo form_close(); ?>
                      </div>
                  </div>
                </div>
              </div>
                

              </div>
              </div>
            </div>
        </div>
<div>
<?php } else {?>
  <h1>Anda Tidak Memiliki Hak Untuk Mengakses Halaman ini</h1>
<?php } ?>


</div>
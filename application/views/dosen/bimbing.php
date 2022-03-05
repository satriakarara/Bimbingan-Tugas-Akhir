<div class="container">
<?php if ($this->session->flashdata('flash') ) :?>
<div class="row mt-3">
    <div class="col-md-6">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Komentar
        <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
</div>

<?php endif; ?>

<div class="parentprof">
<div class="div1prof"><img style="max-height: 150px;" src="<?php echo base_url('assets/img/profpic/').$mahasiswa['image']; ?>" alt=""> </div>
<div class="div2prof container-fluid" style="color: black; font-family: -webkit-pictograph;">
    <?php $dosen = $this->db->get_where('user', ['id'=> $profil['id2']])->row_array('nama');?>
    <?php $dosen2 = $this->db->get_where('user', ['id'=> $profil['id3']])->row_array('nama');?>
  
    Nama Mahasiswa      : <?php echo $mahasiswa['nama'] ?><br>
    NIM Mahasiswa       : <?php echo $mahasiswa['ni'] ?><br>
    Judul Skripsi       : <?php echo $profil['ta_judul']?><br>
    Dosen Pembimbing 1  : <?php echo $dosen['nama'];?><br>
    Dosen Pembimbing 2  : <?php if (empty($dosen2['nama'])) {?>
                            <td>-</td>
                          <?php } else {?>
                            <td><?php echo $dosen2['nama']; ?></td>
                          <?php } ?><br>
    Status Tugas Akhir  : <?php echo $profil['ta_status'] ?> </div>
</div>

<?php if (!empty($profil['ta_judul'])):  ?>
    <?php if($profil['ta_accepted'] == 1): ?>
      <div class="row mt-3">
        <div class="col-md-6">
                    <table class="table" style="width:1000px; font-family: -webkit-pictograph;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Revisi</th>
                  <th scope="col">Tanggal Bimbingan</th>
                  <th scope="col">File Mahasiswa</th>
                  <th scope="col">File Dosen</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- pengulangan dari database -->
                <!-- $user = id yang login -->
                <!-- $bimbingan = data tugas akhir -->
                <?php for($i=0; $i< count($bimbingan); $i++):?>
                <tr>
                  <th scope="row"><?php echo $i+1; ?></th>
                  <td><?php echo nl2br($bimbingan[$i]['bimb_komentar']); ?></td>
                  <td><?php echo $bimbingan[$i]['bimb_waktu']; ?></td>
                  <td>
                    <a class="nav-link" href="<?php echo base_url('assets/file/bimbingan/').$bimbingan[$i]['bimb_file']?>" download><button type="button" class="btn btn-success btn-sm" style="font-family: serif;" >Download File</button></a>
                    <a class="nav-link" href="<?php echo base_url('dosen/kirimkomentar/').$bimbingan[$i]['bimb_id']?>"><button type="button" class="btn btn-primary btn-sm" style="font-family: serif;" >Kirim Komentar</button></a>
                  </td>
                  <!-- td untuk tombol file dosen -->
                  <td>
                  <?php if ($bimbingan[$i]['bimb_file2'] == '') {?>
                    <button type="button" class="btn btn-primary btn-sm" style="font-family: serif;"  disabled>Download File</button></a>
                    
                  <?php } else { ?>
                    <a class="nav-link" href="<?php echo base_url('assets/file/bimbingan/').$bimbingan[$i]['bimb_file2']?>" download><button type="button" class="btn btn-primary btn-sm" style="font-family: serif;" >Download File</button></a>
                    
                      
                    <?php } ?>
                  </td>
                  <!-- tutup td untuk tombol file dosen -->
                  <td>
                    <a href="<?php echo base_url();?>dosen/terima/<?= $bimbingan[$i]['ta_id'] ?>"
                    class="badge badge-primary" onclick="return confirm('Yakin?');">Terima</a>
                    <a href="<?php echo base_url();?>dosen/tolak/<?= $bimbingan[$i]['ta_id'] ?>"
                  class="badge badge-danger" onclick="return confirm('Yakin?');">Tolak</a>
                  </td>
                  <?php endfor; ?>
                </tr>
                </tbody>
                </table>
              
                </div>
                
            </div>
    <?php endif; ?>
    <?php if($profil['ta_accepted'] == 2): ?>
      <div class="row mt-3">
        <div class="col-md-6">
                    <table class="table" style="width:1000px; font-family: -webkit-pictograph;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Revisi</th>
                  <th scope="col">Tanggal Bimbingan</th>
                  <th scope="col">File Mahasiswa</th>
                  <th scope="col">File Dosen</th>
                </tr>
              </thead>
              <tbody>
                <!-- pengulangan dari database -->
                <!-- $user = id yang login -->
                <!-- $bimbingan = data tugas akhir -->
                <?php for($i=0; $i< count($bimbingan); $i++):?>
                <tr>
                  <th scope="row"><?php echo $i+1; ?></th>
                  <td><?php echo nl2br($bimbingan[$i]['bimb_komentar']); ?></td>
                  <td><?php echo $bimbingan[$i]['bimb_waktu']; ?></td>
                  <td>
                    <a class="nav-link" href="<?php echo base_url('assets/file/bimbingan/').$bimbingan[$i]['bimb_file']?>" download><button type="button" class="btn btn-success btn-sm" style="font-family: serif;" >Download File</button></a>
                    <a class="nav-link" href="<?php echo base_url('dosen/kirimkomentar/').$bimbingan[$i]['bimb_id']?>"><button type="button" class="btn btn-primary btn-sm" style="font-family: serif;" >Kirim Komentar</button></a>
                  </td>
                  <!-- td untuk tombol file dosen -->
                  <td>
                  <?php if ($bimbingan[$i]['bimb_file2'] == '') {?>
                    <button type="button" class="btn btn-primary btn-sm" style="font-family: serif;"  disabled>Download File</button></a>
                    
                  <?php } else { ?>
                    <a class="nav-link" href="<?php echo base_url('assets/file/bimbingan/').$bimbingan[$i]['bimb_file2']?>" download><button type="button" class="btn btn-primary btn-sm" style="font-family: serif;" >Download File</button></a>
                    
                      
                    <?php } ?>
                  </td>
                  <!-- tutup td untuk tombol file dosen -->
              
                  <?php endfor; ?>
                </tr>
                </tbody>
                </table>
              
                </div>
                
            </div>
    <?php endif; ?>

<?php endif; ?>





<div class="container">
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


<div class="row mt-3">
    <div class="col-md-6">
        <h3>List Bimbingan</h3>
    
        
                <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Komentar</th>
              <th scope="col">Waktu Bimbingan</th>
              <th scope="col">Mahasiswa</th>
              <th scope="col">Dosen Pembimbing</th>
            </tr>
          </thead>
          <tbody>
            <!-- pengulangan dari database -->
            <?php foreach($bimbingan as $bimb):?>
            <tr>
              <th scope="row"><?php echo $bimb['bimb_id']; ?></th>
              <td><?php echo $bimb['bimb_komentar']; ?></td>
              <td><?php echo $bimb['bimb_waktu']; ?></td>
              <td><?php echo $bimb['mhs_nama']; ?></td>
              <td><?php echo $bimb['dsn_nama']; ?></td>
              <!-- <td style="width:150px;">
                  <a href="<?php base_url();?>mahasiswa/hapus/<?php echo $mhs['mhs_id']?>"
                  class="badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a>

                  <a href="<?php base_url();?>mahasiswa/edit/<?php echo $mhs['mhs_id']?>"
                  class="badge badge-primary">Edit</a>
              </td>
               -->
            </tr>
            <?php endforeach ; ?>
            </tbody>
            </table>
          
            </div>
        </div>
        <a href="<?=base_url();?>bimbingan/kirim" class="btn btn-primary">Kirim Bimbingan</a>
        </div>

<!-- <div>
<input type="text" name="nim"/>
<input type="text" name="nama"/>
</div> -->
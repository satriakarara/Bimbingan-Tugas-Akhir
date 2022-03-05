

<div class="container">
<?php if ($this->session->flashdata('flash') ) :?>
<div class="row mt-3">
    <div class="col-md-6">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Mahasiswa 
        <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
</div>

<?php endif; ?>

<div class="row mt-3">
    <div class="col-md-6">
        <h3>Daftar Mahasiswa</h3>
    
        
                <table class="table" style="width:800px;">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama</th>
              <th scope="col">Nomor HP</th>
              <th scope="col">Alamat</th>              
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- pengulangan dari database -->
            <?php for($i=0; $i< count($mahasiswa); $i++):?>
            <tr>
              <th scope="row"><?php echo $i+1; ?></th>
              <td><?php echo $mahasiswa[$i]['ni']; ?></td>
              <td><?php echo $mahasiswa[$i]['nama']; ?></td>
              <td><?php echo $mahasiswa[$i]['nohp']; ?></td>
              <td><?php echo $mahasiswa[$i]['alamat']; ?></td>
              <?php if (!empty($user)) { ?>
              
             
              <?php
              if($user['userlevel'] == 1){?>
                <td style="width:200px; ">
                
                  <a href="<?php base_url();?>mahasiswa/edit/<?php echo $mahasiswa[$i]['id']?>"
                  class="badge badge-primary">Edit</a>
                  <!-- ngecek ke database apakah id dari mahasiswa ada di tabel tugasakhir -->
                  <?php if (!empty($this->db->get_where('tugasakhir',['id1'=>$mahasiswa[$i]['id']])->row_array())) {
                    ?><a href="<?php base_url();?>tugasakhir/edit/<?php echo $mahasiswa[$i]['id']?>"
                    class="badge badge-warning">Edit Judul</a>
                  <?php } else{ ?>
                  <a href="<?php base_url();?>tugasakhir/tambah/<?php echo $mahasiswa[$i]['id']?>"
                  class="badge badge-warning">Tambah Judul</a>
                  <?php } ?>
                  <a href="<?php base_url();?>mahasiswa/hapus/<?php echo $mahasiswa[$i]['id']?>"
                  class="badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a>

                  

              </td>
              
              <?php }
              ?>
              
            <?php } else{ 
            } ?>
            </tr>
            <?php endfor ; ?>
            </tbody>
            </table>
          
            </div>
        
            <?php if (!empty($user)) { ?>
              
             
              <?php
              if($user['userlevel'] == 1){?>
                </div>
        <a href="<?=base_url();?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
        </div>
              <?php }
              ?>
              
            <?php } else{ 
            } ?>
        


<div class="container" style="display:inline-block;">


<div class="row mt-3">
    <div class="col-md-6">
      
        <h3>Daftar Dosen</h3>
               
        <table class="table" style="width:800px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Nomor HP</th>
      <th scope="col">Alamat</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
   <tbody>
    <!-- pengulangan dari database -->
    <?php for($i=0; $i< count($dosen); $i++):?>
            <tr>
              <th scope="row"><?php echo $i+1; ?></th>
              <td><?php echo $dosen[$i]['ni']; ?></td>
              <td><?php echo $dosen[$i]['nama']; ?></td>
              <td><?php echo $dosen[$i]['nohp']; ?></td>
              <td><?php echo $dosen[$i]['alamat']; ?></td>
              <?php if (!empty($user)) { ?>
              
          
              <?php
              if($user['userlevel'] == 1){?>
                <td style="width:150px;">
                  <a href="<?php base_url();?>dosen/hapus/<?php echo $dosen[$i]['id']?>"
                  class="badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a>

                  <a href="<?php base_url();?>dosen/edit/<?php echo $dosen[$i]['id']?>"
                  class="badge badge-primary">Edit</a>
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
                <a href="<?=base_url();?>dosen/tambah" class="btn btn-primary">Tambah Data Dosen</a>
                </div>
              <?php }
              ?>
              
            <?php } else{ 
            } ?>
    
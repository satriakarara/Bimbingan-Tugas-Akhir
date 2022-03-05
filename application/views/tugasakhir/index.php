<div class="container">
<div class="row mt-3">
    <div class="col-md-6">
      
        <h3>Daftar Judul Tugas Akhir</h3>
                
        <table class="table" style="width:800px;">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col" style="width:150px;">Nama</th>
      <th scope="col">Judul</th>
      <th scope="col">Abstrak</th>
      <th scope="col" style="width:150px;">Dosen Pembimbing 1</th>
      <th scope="col" style="width:150px;">Dosen Pembimbing 2</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
   <tbody>
    <!-- pengulangan dari database -->  
    <?php for($i=0; $i< count($tugasakhir); $i++):?>
    <tr>
    <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $tugasakhir[$i]['nama_mhs']; ?></td>
      <td><?php echo $tugasakhir[$i]['ta_judul']; ?></td>
      <td><?php echo $tugasakhir[$i]['ta_deksripsi']; ?></td>
      <td><?php echo $tugasakhir[$i]['nama_dospem1']; ?></td>
    <?php if (empty($tugasakhir[$i]['nama_dospem2'])) {?>
      <td>Dosen Pembimbing 2 Belum Ditentukan</td>
    <?php } else {?>
      <td><?php echo $tugasakhir[$i]['nama_dospem2']; ?></td>
    <?php } ?>
    
      <td><?php echo $tugasakhir[$i]['ta_status']; ?></td>
    </tr>
    <?php endfor ; ?>
    </tbody>
    </table>
   
    
    </div>

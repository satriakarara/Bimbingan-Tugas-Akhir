<div class="container">
<?php if ($this->session->flashdata('flash') ) :?>
<div class="row mt-3">
    <div class="col-md-6">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Tugas Akhir
        <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
</div>

<?php endif; ?>
<div class="row mt-3">
    <div class="col-md-6">
      
        <h3>Daftar Pengajuan Judul Tugas Akhir</h3>
                
        <table class="table" style="width:800px;">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col" style="width:150px;">Nama</th>
      <th scope="col">Judul</th>
      <th scope="col">Abstrak</th>
      <th scope="col" style="width:150px;">Dosen Pembimbing</th>
      <th scope="col">Aksi</th>
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
      <td>
        <!-- <a class="nav-link" href="<?php echo base_url();?>dosen/setuju/<?php echo $tugasakhir[$i]['ta_id']?>"><button type="button" class="btn btn-primary btn-sm"onclick="return confirm('Apakah Anda Yakin Menyetujui Permintaan Ini?');">Tanggapi</button></a> -->
        
        <a class="nav-link" href="<?php echo base_url('dosen/bimbing/').$tugasakhir[$i]['id1'];?>"><button type="button" class="btn btn-primary btn-sm">Tanggapi</button></a>
      </td>
    </tr>
    <?php endfor ; ?>
    </tbody>
    </table>
   
    
    </div>

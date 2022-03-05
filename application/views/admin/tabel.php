
<?php if($id == 1):?>
<div class="container">
<div class="row mt-3">
    <div class="col-md-6">
      
        <h3>Mahasiswa yang Terdaftar</h3>
                
        <table class="table" style="width:800px;">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col" style="width:150px;">Nama</th>
      <th scope="col">Judul</th>
      <th scope="col">Deskripsi</th>
      <th scope="col" style="width:150px;">Dosen Pembimbing</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
   <tbody>
    <!-- pengulangan dari database -->
    <?php for($i=0; $i< count($tugasakhir); $i++):?>
    <tr>
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $tugasakhir[$i]['nama']; ?></td>
      <td><?php echo $tugasakhir[$i]['ta_judul']; ?></td>
      <td><?php echo $tugasakhir[$i]['ta_deksripsi']; ?></td>
      <td><?php echo $namadosen[$i]['nama']; ?></td>
      <td><?php echo $tugasakhir[$i]['ta_status']; ?></td>
    </tr>
    <?php endfor ; ?>
    </tbody>
    </table>
   
    
    </div>
    <?php endif; ?>

<?php if($id == 2):?>
  <div class="container">
<div class="row mt-3">
    <div class="col-md-6">
      
        <h3>Mahasiswa yang Belum Melaksanakan Seminar Proposal</h3>
                
        <table class="table" style="width:800px;">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col" style="width:150px;">Nama</th>
      <th scope="col">Judul</th>
      <th scope="col">Deskripsi</th>
      <th scope="col" style="width:150px;">Dosen Pembimbing</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
   <tbody>
    <!-- pengulangan dari database -->
    <?php for($i=0; $i< count($belumsempro); $i++):?>
    <tr>
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $belumsempro[$i]['nama']; ?></td>
      <td><?php echo $belumsempro[$i]['ta_judul']; ?></td>
      <td><?php echo $belumsempro[$i]['ta_deksripsi']; ?></td>
      <td><?php echo $belumsemprodosen[$i]['nama']; ?></td>
      <td><?php echo $belumsempro[$i]['ta_status']; ?></td>
    </tr>
    <?php endfor ; ?>
    </tbody>
    </table>
   
    
    </div>
<?php endif; ?>

<?php if($id == 3):?>
  <div class="container">
<div class="row mt-3">
    <div class="col-md-6">
      
        <h3>Mahasiswa Yang Sudah Melaksanakan Seminar Proposal</h3>
                
        <table class="table" style="width:800px;">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col" style="width:150px;">Nama</th>
      <th scope="col">Judul</th>
      <th scope="col">Deskripsi</th>
      <th scope="col" style="width:150px;">Dosen Pembimbing</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
   <tbody>
    <!-- pengulangan dari database -->
    <?php for($i=0; $i< count($sudahsempro); $i++):?>
    <tr>
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $sudahsempro[$i]['nama']; ?></td>
      <td><?php echo $sudahsempro[$i]['ta_judul']; ?></td>
      <td><?php echo $sudahsempro[$i]['ta_deksripsi']; ?></td>
      <td><?php echo $sudahsemprodosen[$i]['nama']; ?></td>
      <td><?php echo $sudahsempro[$i]['ta_status']; ?></td>
    </tr>
    <?php endfor ; ?>
    </tbody>
    </table>
   
    
    </div>
<?php endif; ?>

<?php if($id == 4):?>
  <div class="container">
<div class="row mt-3">
    <div class="col-md-6">
      
        <h3>Mahasiswa Yang Sudah Melaksanakan Seminar Hasil</h3>
                
        <table class="table" style="width:800px;">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col" style="width:150px;">Nama</th>
      <th scope="col">Judul</th>
      <th scope="col">Deskripsi</th>
      <th scope="col" style="width:150px;">Dosen Pembimbing</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
   <tbody>
    <!-- pengulangan dari database -->
    <?php for($i=0; $i< count($sudahsemhas); $i++):?>
    <tr>
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $sudahsemhas[$i]['nama']; ?></td>
      <td><?php echo $sudahsemhas[$i]['ta_judul']; ?></td>
      <td><?php echo $sudahsemhas[$i]['ta_deksripsi']; ?></td>
      <td><?php echo $sudahsemhasdosen[$i]['nama']; ?></td>
      <td><?php echo $sudahsemhas[$i]['ta_status']; ?></td>
    </tr>
    <?php endfor ; ?>
    </tbody>
    </table>
   
    
    </div>
<?php endif; ?>

<?php if($id == 5):?>
  <div class="container">
<div class="row mt-3">
    <div class="col-md-6">
      
        <h3>Mahasiswa Yang Sudah Melaksanakan Ujian Tugas Akhir</h3>
                
        <table class="table" style="width:800px;">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col" style="width:150px;">Nama</th>
      <th scope="col">Judul</th>
      <th scope="col">Deskripsi</th>
      <th scope="col" style="width:150px;">Dosen Pembimbing</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
   <tbody>
    <!-- pengulangan dari database -->
    <?php for($i=0; $i< count($sudahujian); $i++):?>
    <tr>
      <th scope="row"><?php echo $i+1; ?></th>
      <td><?php echo $sudahujian[$i]['nama']; ?></td>
      <td><?php echo $sudahujian[$i]['ta_judul']; ?></td>
      <td><?php echo $sudahujian[$i]['ta_deksripsi']; ?></td>
      <td><?php echo $sudahujiandosen[$i]['nama']; ?></td>
      <td><?php echo $sudahujian[$i]['ta_status']; ?></td>
    </tr>
    <?php endfor ; ?>
    </tbody>
    </table>
   
    
    </div>
<?php endif; ?>
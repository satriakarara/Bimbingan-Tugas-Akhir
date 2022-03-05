<!-- <div>Jumlah Mahasiswa yang memiliki tugas akhir = <?php echo count($mahasiswa) ; ?></div>
<div>Jumlah Mahasiswa yang belum seminar proposal = <?php echo count($belumsempro) ; ?></div>
<div>Jumlah Mahasiswa yang sudah seminar proposal = <?php echo count($sudahsempro) ; ?></div>
<div>Jumlah Mahasiswa yang sudah seminar hasil = <?php echo count($sudahsemhas) ; ?></div>
<div>Jumlah Mahasiswa yang sudah ujian = <?php echo count($sudahujian) ; ?></div> -->

<div class="containercard">
<div class="card">
    <div class="box">
      <div class="content">
        <h3>Jumlah Mahasiswa</h3>
        <p>Jumlah Mahasiswa yang terdaftar pada sistem adalah</p> <p style="font-size: 40px;"> <?php echo count($mahasiswa); ?></p><p> orang</p>
        <a href="<?php echo base_url('admin/tabel/1') ?>">Detail</a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="box">
      <div class="content">
        <h3>Belum Seminar Proposal</h3>
        <p>Jumlah Mahasiswa yang belum melaksanakan seminar proposal adalah</p> <p style="font-size: 40px;"> <?php echo count($belumsempro); ?></p><p> orang</p>
        <a href="<?php echo base_url('admin/tabel/2') ?>">Detail</a>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="box">
      <div class="content">
        <h3>Sudah Seminar Proposal</h3>
        <p>Jumlah Mahasiswa yang sudah melaksanakan seminar proposal adalah</p> <p style="font-size: 40px;"> <?php echo count($sudahsempro); ?></p><p> orang</p>
        <a href="<?php echo base_url('admin/tabel/3') ?>">Detail</a>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="box">
      <div class="content">
        <h3>Sudah Seminar Hasil</h3>
        <p>Jumlah Mahasiswa yang sudah melaksanakan seminar hasil adalah</p> <p style="font-size: 40px;"> <?php echo count($sudahsemhas); ?></p><p> orang</p>
        <a href="<?php echo base_url('admin/tabel/4') ?>">Detail</a>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="box">
      <div class="content">
        <h3>Sudah Ujian Tugas Akhir</h3>
        <p>Jumlah Mahasiswa yang sudah melaksanakan ujian tugas akhir adalah</p> <p style="font-size: 40px;"> <?php echo count($sudahujian); ?></p><p> orang</p>
        <a href="<?php echo base_url('admin/tabel/5') ?>">Detail</a>
      </div>
    </div>
    </div>
    </div>
</div>


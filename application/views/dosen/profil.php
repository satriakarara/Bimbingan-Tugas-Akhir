

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
        <h3>Daftar Mahasiswa Bimbingan</h3>
    
        
                <table class="table" style="width:1000px;">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Judul</th>
              <th scope="col">Seminar Proposal</th>
              <th scope="col">Seminar Hasil</th>
              <th scope="col">Ujian</th>
            </tr>
          </thead>
          <tbody>
            <!-- pengulangan dari database -->
            <?php for($i=0; $i< count($profil); $i++):?>
                <?php $query = $this->db->get_where('user',['id' => $profil[$i]['id1']])->row_array();
                $nama = $query['nama'];
                $nim = $query['ni'];
                $idd = $query['id'];
                 ?>
            <tr onclick="window.location='<?php echo base_url('dosen/bimbing/').$idd; ?>';" style="cursor: pointer;" >
              <th scope="row"><?php echo $i+1; ?></th>
              <td><?php echo $nama; ?></td>
              <td><?php echo $nim; ?></td>
              <td><?php echo $profil[$i]['ta_judul']; ?></td>
              <td><?php if ($profil[$i]['d_sempro'] == "0000-00-00") {
                echo "Belum Seminar Proposal";
              } else {
                $now = new DateTime("now");
              $sempro = $profil[$i]['d_sempro'];
              $tgl = new DateTime($sempro);
              $diff = $now->diff($tgl); 
              if ($diff->y > 0) {
                echo $diff->y;
                echo " tahun ";
                
              } if ($diff->m > 0) {
                echo $diff->m;
              echo " bulan ";
              } if ($diff->d > 0) {
                echo $diff->d;
                echo " hari sejak seminar proposal";
              }
              
              }
               ?>
              </td>
              <td><?php if ($profil[$i]['d_semhas'] == "0000-00-00") {
                echo "Belum Seminar Hasil";
              } else {
                $now = new DateTime("now");
              $sempro = $profil[$i]['d_semhas'];
              $tgl = new DateTime($sempro);
              $diff = $now->diff($tgl);
              if ($diff->y > 0) {
                echo $diff->y;
                echo " tahun ";
                
              } if ($diff->m > 0) {
                echo $diff->m;
              echo " bulan ";
              } if ($diff->d > 0) {
                echo $diff->d;
                echo " hari sejak seminar hasil";
              }
              
              }
               ?>
              </td>
              <td><?php if ($profil[$i]['d_ujian'] == "0000-00-00") {
                echo "Belum Ujian";
              } else {
                $now = new DateTime("now");
                $sempro = $profil[$i]['d_ujian'];
                $tgl = new DateTime($sempro);
                $diff = $now->diff($tgl);
                if ($diff->y > 0) {
                  echo $diff->y;
                  echo " tahun ";
                  
                } if ($diff->m > 0) {
                  echo $diff->m;
                echo " bulan ";
                } if ($diff->d > 0) {
                  echo $diff->d;
                  echo " hari sejak ujian";
                }
              }
               ?>
              </td>
            </tr>
            <?php endfor ; ?>
            </tbody>
            </table>
          
            </div>
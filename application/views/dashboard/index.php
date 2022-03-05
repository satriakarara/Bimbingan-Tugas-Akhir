<div class="container" style="display:inline-block;">

<div>

    <?php 
    // $dospem1 = array_count_values(array_column($dosen, 'id2')); 
    // $dospem2 = array_count_values(array_column($dosen, 'id3')); 
    
    $nama_dosen1 = array_map( function( $a ) { return $a['nama']; }, $dosen1 );
    $jumlah_bimbingan1 = array_map( function( $a ) { return $a['total']; }, $dosen1 );
    $nama_dosen2 = array_map( function( $a ) { return $a['nama']; }, $dosen2 );
    $jumlah_bimbingan2 = array_map( function( $a ) { return $a['total']; }, $dosen2 );
    
    $array_length = count($nama_dosen1);
    $array_lengthj = count($jumlah_bimbingan1);
    $i = 0;
    
    // echo var_dump($dosen1);
    ?>
</div>
<!-- <div class="container-white"> -->
    <div class="rowdashboard">
        <div class="columndashboard">            
            <h4>Penyebaran Dosen Pembimbing 1</h4>
            <canvas id="dospem1" width="400" height="400"></canvas>            
        </div>
        <div class="columndashboard">
            <h4>Penyebaran Dosen Pembimbing 2</h4>
            <canvas id="dospem2" width="400" height="400"></canvas>
        </div>
    </div>
<!-- </div> -->


<script>
// pembuka chart dospem 1
var dospem1 = document.getElementById('dospem1');
var nama_dosen1 = [];
var jumlah_bimbingan1 = [];

<?php foreach ($nama_dosen1 as $nama): ?>
    nama_dosen1.push('<?=$nama  ?>');
<?php endforeach ?>

<?php foreach ($jumlah_bimbingan1 as $jumlah): ?>
    jumlah_bimbingan1.push(<?= $jumlah  ?>);
<?php endforeach ?>
var ds_nama_dosen = {
    datasets:[{
        label: 'Penyebaran Dosen Pembimbing 1',
        data : jumlah_bimbingan1,
        backgroundColor:[
            'rgb(102, 0, 255)',
            'rgb(51, 102, 255)',
            'rgb(255, 0, 0)',
        ]
    }],
    labels: nama_dosen1,
}
    var chart_nama_dosen = new Chart(dospem1,{
        type: 'pie',
        data: ds_nama_dosen
    });
// penutup chart dospem1

// pembuka chart dospem 2
var dospem2 = document.getElementById('dospem2');
var nama_dosen2 = [];
var jumlah_bimbingan2 = [];

<?php foreach ($nama_dosen2 as $nama): ?>
    nama_dosen2.push('<?=$nama  ?>');
<?php endforeach ?>

<?php foreach ($jumlah_bimbingan2 as $jumlah): ?>
    jumlah_bimbingan2.push(<?= $jumlah  ?>);
<?php endforeach ?>
var ds_nama_dosen2 = {
    datasets:[{
        label: 'Penyebaran Dosen Pembimbing 2',
        data : jumlah_bimbingan2,
        backgroundColor:[
            'rgb(102, 0, 255)',
            'rgb(51, 102, 255)',
            'rgb(255, 0, 0)',
        ]
    }],
    labels: nama_dosen2,
}
    var chart_nama_dosen = new Chart(dospem2,{
        type: 'pie',
        data: ds_nama_dosen2
    });
// penutup chart dospem2
</script>
 
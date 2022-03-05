<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <title><?php echo $judul; ?></title>
  </head>
  <body>
    
  
  <div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="index.html" class="logo"><img class="logo-unr" src="<?php echo base_url('images/logo.png'); ?>"/></a></h1>
        <ul class="list-unstyled components mb-5">
        
          <li>
              <a href="<?= base_url();?>mahasiswa"><span class="fa fa-users"></span> Mahasiswa</a>
          </li>
          <li>
            <a href="<?=base_url();?>tugasakhir"><span class="fa fa-book"></span> Tugas Akhir</a>
          </li>
          <li>
            <a href="<?=base_url();?>dosen"><span class="fa fa-user"></span> Dosen</a>
          </li>
          <?php if (!empty($user)): ?>
            <?php if($user['userlevel'] == 1): ?>                
              <li>
                <a href="<?=base_url();?>dashboard"><span class="fa fa-pie-chart"></span> Dashboard</a>
              </li>
              <li>
                <a href="<?=base_url();?>tugasakhir/pengajuan"><span class="fa fa-file"></span> Pengajuan</a>
              </li>
            <?php endif;?>
            <?php if($user['userlevel'] == 2): ?>  
              <li>
                <a href="<?=base_url();?>dosen/pengajuan/<?php echo $user['id']?>"><span class="fa fa-file"></span> Pengajuan</a>
              </li>
            <?php endif;?>
          <?php endif;?>
          <li>
            <a class="footer" href="<?=base_url('auth/logout');?>"><span class="fa fa-sign-out"></span> Logout</a>
          </li>
        </ul>

        <div class="footer">
        
        </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <?php if (!empty($user)) { ?>
              <?php if($user['userlevel'] == 1): ?>
                <a href="<?php echo base_url()?>admin "?> > <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <?php endif;?>
              <?php if($user['userlevel'] == 2): ?>
              <a href="<?php echo base_url()?>dosen/profil/<?php echo $user['id']?>"> <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <?php endif;?>
              <?php if($user['userlevel'] == 3): ?>
              <a href="<?php echo base_url()?>mahasiswa/profil/<?php echo $user['id']?>"> <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <?php endif;?> 
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                <img style="border-radius: 50%;" class="profile-pic" src="<?php echo base_url('assets/img/profpic/').$user['image']; ?>"/>
                </li>
                <li style="margin-left:10px;" class="nav-item active">
                <?php if($user['userlevel'] == 1): ?>
                    <a class="nav-link" href="<?php echo base_url()?>admin"><?= $user['nama'];?></a>
                    <?php endif;?>
                <?php if($user['userlevel'] == 2): ?>
                    <a class="nav-link" href="<?php echo base_url()?>dosen/profil/<?php echo $user['id']?>"><?= $user['nama'];?></a>
                    <?php endif;?>
                <?php if($user['userlevel'] == 3): ?>
                <a class="nav-link" href="<?php echo base_url()?>mahasiswa/profil/<?php echo $user['id']?>"><?= $user['nama'];?></a>
                <?php endif;?>
                  </li>
              </ul>
            </div> </a>
            <?php } else{ ?>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
            
                <li style="margin-left:10px;" class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url('auth') ?>">Login</a>
                </li>
              </ul>
            </div>
            <?php
            } ?>
            
          </div>
          </nav>

<!-- <div class="grid">
  
 <div class="sidebar">helo</div>  -->
<!-- </div> -->
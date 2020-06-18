<?php
$kd_jabatan = $this->session->userdata("kd_jabatan");
	$mts="";
	$kep="";
	$adm="";
	if($kd_jabatan==4){
		$mts='hidden';
	}
	if($kd_jabatan==3){
		$mts='hidden';
	}
	if($kd_jabatan==2){
		$mts='hidden';
	
	} 
	if($kd_jabatan==1){
		$kep='hidden';
	}
	if($kd_jabatan==0){
		$adm='hidden';
	}  

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>SIPS | BPN</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-datepicker.css'?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
	<link rel="stylesheet" href="<?php echo base_url();?>//plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>/dist/css/adminlte.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
			<div class="container">
				<a href="<?php echo base_url();?>main" class="navbar-brand">
					<div class="icon fas fa-thumbs-up"></div>
					<span class="brand-text font-weight-light">SIPS</span>
				</a>

				<button class="navbar-toggler order-1" type="button" data-toggle="collapse"
					data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse order-3" id="navbarCollapse">
					<!-- Left navbar links -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="<?php echo base_url();?>main" class="nav-link">Beranda</a>
						</li>
						
						<li class="nav-item dropdown" <?php echo $mts;echo $kep; ?>>
							<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false" class="nav-link dropdown-toggle">Transaksi Surat</a>
							<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
								
								
								<li><a href="<?php echo base_url();?>main/addsm" class="dropdown-item">Tambah Surat</a></li>
								<li><a href="<?php echo base_url();?>main/listsm" class="dropdown-item">List Surat Masuk </a></li>
							</ul>
						</li>
						
						<li class="nav-item dropdown">
							<a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false" class="nav-link dropdown-toggle" <?php echo $adm;?>>Disposisi</a>
							<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
								<li><a <?php echo $mts;?> href="<?php echo base_url();?>main/adddis" class="dropdown-item">Tambah Disposisi </a></li>
								<li><a <?php echo $mts; ?> href="<?php echo base_url();?>main/listdis" class="dropdown-item">List Disposisi</a></li>
								<li><a <?php echo $kep; ?> href="<?php echo base_url();?>main/userlistdis" class="dropdown-item">Disposisi Masuk</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>main/userprint" <?php echo $adm;?> class="nav-link">Print</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url();?>main/arsip" class="nav-link">Arsip</a>
						</li>
					</ul>

				

					<!-- Right navbar links -->
					<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
						
						<li class="nav-item dropdown">
							<a class="nav-link" data-toggle="dropdown" href="#">
								<i class="far fa-bell"><?php echo " $nama"; ?></i>
								
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
								<?php
									foreach($notif as $a):
									if($a->sts_read==0){
									echo"
									<div class='dropdown-divider'></div>";
									echo"
										
										<a href='";echo base_url();echo "main/userlistdis' class='dropdown-item'>
											<i class='fas fa-envelope mr-2'></i><b>$a->no_surat</b>
										</a>";
									echo"<div class='dropdown-divider'></div>";
									}
									endforeach;
								?>
								<div class="dropdown-divider"></div>
								<!-- copy darisini -->
								<a href="<?php echo base_url();?>login/logout" class="dropdown-item">
									<i class="fas fa-envelope mr-2"></i>Log Out
								</a>
								<div class="dropdown-divider"></div>
								<!-- bisa copy darisini -->
								
							</div>
						</li>
					</ul>
				</div>
		</nav>
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container">
					<div class="row">
						<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12   d-flex justify-content-center">
							<img src="<?php echo base_url();?>/dist/img/Logo_BPN-KemenATR_(2017).png" alt="Logo BPN"
								style="width:90px;high:90px" class="img-circle">
						</div>
						<div class="col-lg-11 col-md-12 col-sm-12 col-xs-12  text-lg-left text-sm-center">
							<h1 class="m-0 text-dark "> Sistem Informasi Pengelolaan Surat</h1>
							<h5 class="m-0 text-dark "> Kantor Wilayah Badan Pertanahan Nasional Provinsi Kalimantan
								Selatan</h5>
							<h7 class="m-0 "> Jl. D.I Panjaitan No.20 Banjarmasin</h7>
						</div>
						<!-- /.col
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div>
         -->

					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->


<?php 
$nama = $this->session->userdata("nama_sub");
$kd_jabatan = $this->session->userdata("kd_jabatan");
$main="";
$amain="";
if ($kd_jabatan==0){
	$amain="<div class='overlay dark'>
	<i class='fas fa-3x fa-sync-alt'></i>
	</div>";
}

else if ($kd_jabatan>1){
	$main="<div class='overlay dark'>
	<i class='fas fa-3x fa-sync-alt'></i>
	</div>";
}else{
	$main="";
}
//var_dump($this->session->userdata("nama"));
if (is_null($nama))
{
	redirect(base_url('login/salah'));
}
else
{
$nama = $this->session->userdata("nama_sub");
$kd_jabatan = $this->session->userdata("kd_jabatan");
include 'v_header.php';
?>
			<!-- Main content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-lg">
											<h1 class="card-title text-dark">Selamat Datang </h1>
											<p class="card-text">
												Anda login sebagai <b><?php echo $nama ?></b> Selamat beraktivitas!!
											</p>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card -->
						</div>
					</div>
					<!-- /.row -->
					<!-- Small Box (Stat card) -->
					<div class="row">
						<?php
							if($kd_jabatan==1){
								?>
								<div class="col-lg-3 col-6">
									<!-- small card -->
									<div class="small-box bg-purple">
										
										<div class="inner">
											<h3><?php echo $dm; ?></h3>

											<p>Disposisi Masuk</p>
										</div>
										<div class="icon">
											<i class="fas fa-envelope-open"></i>
										</div>
										<a href="main/adddis" class="small-box-footer">
											More info <i class="fas fa-arrow-circle-right"></i>
										</a>
									</div>
								</div>
								<?php
							}
						?>
						
						<div class="col-lg-3 col-6">
							<!-- small card -->
							<div class="small-box bg-info">
								<?php echo $main ?>
								<div class="inner">
									<h3><?php echo $sm; ?></h3>

									<p>Total Surat Masuk</p>
								</div>
								<div class="icon">
									<i class="fas fa-envelope-open"></i>
								</div>
								<a href="main/listsm" class="small-box-footer">
									More info <i class="fas fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small card -->
							<div class="small-box bg-success">
								<div class="overlay dark">
									<i class="fas fa-3x fa-sync-alt"></i>
								</div>
								<div class="inner">
									<h3>0</h3>
									<p>Surat Keluar</p>
								</div>
								<div class="icon">
									<i class="fas fa-envelope"></i>
								</div>
								<a href="#" class="small-box-footer">
									More info <i class="fas fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small card -->
							<div class="small-box bg-warning">
							<?php echo $amain ?>
								<div class="inner">
									<h3><?php echo $ds ?></h3>

									<p>Total Disposisi Surat Masuk</p>
								</div>
								<div class="icon">
									<i class="fas fa-share"></i>
								</div>
								<a href="main/userlistdis" class="small-box-footer">
									More info <i class="fas fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small card -->
							<div class="small-box bg-danger">
								<div class="inner">
									<h3><?php echo $ars ?></h3>

									<p>Arsip Surat</p>
								</div>
								<div class="icon">
									<i class="fas fa-archive"></i>
								</div>
								<a href="main/arsip" class="small-box-footer">
									More info <i class="fas fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						
						<!-- ./col -->
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
			<div class="p-3">
				<h5>Title</h5>
				<p>Sidebar content</p>
			</div>
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="float-right d-none d-sm-inline">
				<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a></strong>
			</div>
			<!-- Default to the left -->
			Dikembangkan oleh <a href="https://www.instagram.com/koekenjo/">Kevin Jordan</a>
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	<!-- jQuery -->
	<script src="<?php echo base_url();?>/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url();?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url();?>/dist/js/adminlte.min.js"></script>
</body>

</html>
<?php
}
?>

<?php 
$nama = $this->session->userdata("nama");
$bulan = date('m');
$tahun = date('Y');
// var_dump($surat.length);
// var_dump($surat);
// echo "$bulan";
if ($nama!="")
{

$nama = $this->session->userdata("nama");
$kd_jabatan = $this->session->userdata("kd_jabatan");
include 'v_header.php';
// var_dump($this->session->userdata());exit;
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">



			<!-- Main content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-lg">
											<!-- Page Heading -->
											<div class="row">
												<div class="col-12">
													<?php
														include "surat/arsip.php";
													?>	
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card -->
						</div>
					</div>

					<!-- /.row -->
					<!-- Small Box (Stat card) -->

					<!-- /.row -->

				</div><!-- /.container-fluid -->


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

		
</body>

</html>

<?php
}
else
{
  redirect(base_url());
}
?>

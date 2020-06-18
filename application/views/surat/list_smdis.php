
<br>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SIPS | BPN</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/adminlte.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap-datepicker.css'?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
	<link rel="stylesheet" href="<?php echo base_url();?>/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>/dist/css/adminlte.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

	<div class="card-header" align=center>
		<b>
			<h2> List Data Disposisi</h2>
		</b>
	</div>
	<!-- /.card-header -->
	<div class=container align=center>
		<div class="card-body">
		<div class='table table-responsive'>	
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Disposisi</th>
						<th>No Surat
						</th>
						<th>Ringkasan Surat</th>
						<th>Sifat</th>
						<th>Diteruskan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					// var_dump($surat);
                foreach($surat as $a):
                echo "
                <tr>
                    <td align=center>$a->id_disposisi </td>
                    <td>$a->no_surat</td>
                    <td>$a->isi_disposisi</td>
                    <td>$a->sifat</td>
					<td>";
						$div=$a->kd_div;
						if($div==1){
							echo "Tata Usaha";
						}else if($div==2){
							echo "Infrastruktur Pertanahan";
						}else if($div==3){
							echo "Hubungan Hukum Pertanahan";
						}else if($div==4){
							echo "Penataan Pertanahan";
						}else if($div==5){
							echo "Pengadaan Tanah";
						}else if($div==6){
							echo "Penangann Masalah dan Pengendalian Pertanahan";
						}
					echo "</td>
                    <td align=center>";
                    if($a->sts_read=="1"){
                        echo"<a style='color:blue'>DONE!</a>";
                    }else{
                    echo"
						<a  href='";base_url();echo"editdis?ns=$a->no_surat&id=$a->id_disposisi' style='color:blue' class='fa fa-edit'></a>
						<a class='fa fa-trash' onclick='return checkDelete()'  href='";base_url();echo"../surat/dlt_dis?n=$a->id_disposisi' style='color:red'></a>";
                    }
                echo"
                    </td>
                </tr>
                ";
				
                endforeach;
                ?>
					</tfoot>
			</table>
			</div>
		</div>
	<!-- /.card-body -->
    <!-- Main Footer -->
  
</div>


<script src="<?php echo base_url();?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/dist/js/demo.js"></script>
<!-- page script -->
<script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>



<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
		});
	});
	function checkDelete(){
		return confirm('Are you sure?');
	}

</script>
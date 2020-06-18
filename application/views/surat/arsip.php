
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
			<h2> Arsip Disposisi</h2>
		</b>
	</div>
	<!-- /.card-header -->
	<div class=container align=center>
		<div class="card-body">
		<div class='table table-responsive'>	
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID ARSIP</th>
						<th>No Surat</th>
						<th>Perihal </th>
						<th>Finished By</th>
                        <th>Created Time</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					// var_dump($surat);
                foreach($surat as $a):
                echo "
                <tr>
                    <td align=center>$a->id_arsip</td>
                    <td><a href='";echo base_url('./assets/documents/');echo $a->file;echo"' target='_blank' role='button'> 
							$a->no_surat
						</a>
					</td>
                    <td>$a->isi</td>
                    <td>$a->finished_by</td>
                    <td>$a->created_time</td>";
                    
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

</script>
<?php
// var_dump($surat);
$no_agenda="";$no_surat="";$asal_surat="";$sifat="";$file="";$tgl_terima="";$tgl_surat="";$isi="";$lampiran="";
if($this->input->get('n')){
foreach($surat as $a):
		
		$no_agenda=$a->no_agenda;
		$no_surat=$a->no_surat;
		$asal_surat=$a->asal_surat;
		$sifat=$a->sifat;
		$isi=$a->isi;
		// var_dump($asal_surat);
		$tgl_terima=$a->tgl_terima;
		$lampiran=$a->lampiran;
		$tgl_surat=$a->tgl_surat;
		$file=$a->file;
		
	endforeach;
	// var_dump($surat);
}
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

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

<br>
<div class="container">
	<div class="card">
		<div class="card-header bg-primary text-white">
			<h3>SURAT MASUK</h3>
		</div>
		<div class="card-body ">
		<?php
			if($this->input->get('n')){
				echo"<form class='form-horizontal' id='editsub' action='";echo base_url();echo "surat/edit_surat' method='post' enctype='multipart/form-data' >";
			}else{
				echo "<form class='form-horizontal' id='submit' action='";echo base_url();echo "surat/add_surat' method='post' enctype='multipart/form-data'>";
			}
		?>
        
			<div class="form-group">
					<div class="row">
						<div class="col-sm-2">
							<label for="">No Agenda</label>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="no_agenda" name="no_agenda"
								placeholder='Auto Generate' readonly=true value=<?php echo $no_agenda; ?>>
						</div>


					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-2">
							<label for="">No Surat</label>
						</div>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="no_surat" id="no_surat"
								aria-describedby="helpId" placeholder="No Surat Masuk" 	required value=<?php echo $no_surat ?>>
						</div>
					</div>


				</div>
				<div class="form-group">
					<div class=row>
						<div class="col-sm-2">
							<label for="">Asal Surat</label>

						</div>
						<div class="col-sm-10">
						<textarea class="form-control" name="asal_surat" id="asal_surat" rows="1" required ><?php echo $asal_surat; ?></textarea>
						</div>
					</div>

				</div>
				<div class="form-group">
					<div class=row>
						<div class="col-sm-2">
							<label for="">Tingkat Keamanan</label>

						</div>
						<div class="col-sm-10">
							<select class="form-control" name="sifat" id="sifat" required>
								<option>Biasa</option>
								<option>Rahasia</option>
								<option>Sangat Rahasia</option>
							  </select>
						</div>
					</div>

				</div>
				<div class="form-group"> 
					<div class=row>
						<div class="col-sm-2">
							<label for="">Tanggal Terima</label>

						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="date" class="form-control" name="tgl_terima" required aria-describedby="helpId" value=<?php echo $tgl_terima ?>
									placeholder="" id="tgl_terima">
							</div>
						</div>
						<div class="col-sm-2">
							<label for="">Tanggal Surat</label>

						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="date" class="form-control" name="tgl_surat" id="tgl_surat"
									aria-describedby="helpId" placeholder="" id="tgl_surat" required value=<?php echo $tgl_surat ?>>
							</div>
						</div>
					</div>

				</div>
				<div class="form-group">
					<div class=row>
						<div class="col-sm-2">
							<label for="">Ringkasan Surat</label>

						</div>
						<div class="col-sm-10">
							<div class="form-group">
								<label for=""></label>
								<textarea class="form-control" name="isi" id="isi" rows="3" required ><?php echo $isi; ?></textarea>
							</div>
						</div>

					</div>

				</div>
				<div class="form-group">
					<div class=row>
						<div class="col-sm-2">
							<label for="">Lampiran Surat</label>

						</div>
						<div class="col-sm-10">
						<input type="text" class="form-control" name="lampiran" id="lampiran"
								aria-describedby="helpId" placeholder="Lampiran Surat"  value=<?php echo $lampiran ?>>
						</div>
					</div>

				</div>
				<div class="form-group">
					<div class=row>
						<div class="col-sm-2">
							<label for="">FILE</label>

						</div>
						<div class="col-sm-10">
							<div class="form-group">
							<?php
							if($file!=""){
								
								echo"
								<br><b>File Sebelumnya = <a class='fa fa-file style='color:green;' href='";echo base_url('./assets/documents/');echo $file;echo"'> Found! </a>
								";
							}else{	
								echo "<input type='file' class='form-control' name='file' aria-describedby='helpId'
									placeholder='' required id='file'>";
							}
							?>
							</div>
						</div>
					</div>
				</div>

				<div class "form-group" align=center>
                <button name='batals' id='batals' class="btn btn-danger">Batal</button>
				    
                <button type="submit" name='btn_simpan' id=btn_simpan class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>

	</div>
</div>










<script src="<?php echo base_url();?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		// $('#submit').submit(function(e){
			
		// 	e.preventDefault(); 
		//          $.ajax({
		//              url:'<?php echo base_url();?>surat/add_surat',
		//              type:"post",
		//              data:new FormData(this),
		//              processData:false,
		//              contentType:false,
		//              cache:false,
		//              async:false,
		//               success: function(data){
		//                   alert("Data Berhasil Disimpan!.");
		// 				  location.reload();
		//            }
		//          });
		// 	});
		// $('#editsub').submit(function(e){

		//     // e.preventDefault(); 
		//          $.ajax({
		//              url:'<?php echo base_url();?>surat/edit_surat',
		//              type:"post",
		//              data:new FormData(this),
		//              processData:false,
		//              contentType:false,
		//              cache:false,
		//              async:false,
		//               success: function(data){
		//                 //   alert("Data Berhasil DiUpdate!.");
		// 				//   return data;
						
		//            }
		//          });
		//     });
		

	});
	
</script>
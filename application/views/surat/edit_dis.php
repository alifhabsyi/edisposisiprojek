<?php
$no_agenda="";
$no_surat="";
$asal_surat="";
$sifat="";
$isi="";
$lampiran="";
$tgl_terima="";
$tgl_surat="";
$file="";
// var_dump($surat);
if(isset($surat)){
foreach($surat as $a):
		
	$no_agenda=$a->no_agenda;
	$no_surat=$a->no_surat;
	$asal_surat=$a->asal_surat;
	$sifat=$a->sifat;
	$isi=$a->isi;
	$lampiran=$a->lampiran;
	$tgl_terima=$a->tgl_terima;
	$tgl_surat=$a->tgl_surat;
	$file=$a->file;
	
endforeach;
foreach ($disp as $d):
	$iddis=$d->id_disposisi;
	$nama_subb=$d->nama_sub;
	$isidis=$d->isi_disposisi;
	$cat1=$d->cat1;
	$cat2=$d->cat2;
endforeach;
// var_dump($disp);
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
			<h3>DISPOSISI SURAT</h3>
		</div>
		<div class="card-body ">
			<div class='container'>
				<div class align=center>
					<h4>Kantor Wilayah Badan Pertanahan Nasional
						Provinsi Kalimantan selatan <br>
						Jalan D.I Pandjaitan No.29 Banjarmasin</h4>
				</div>
			</div>
			<hr />

			<div align=center>
				<label><b>
						<h4>LEMBAR DISPOSISI</h4>
					</b></label>
			</div>
			<?php
			if($this->input->get('ns')){
				echo"<form class='form-horizontal' id='editsub' action='";echo base_url();echo "surat/editdis' method='post' >";
			}
			?>
			<div class=form-group>
				<hr />
				<div class="row">
					<div class="col-sm-2">
						<label for="">No Agenda</label>
					</div>
					<div class="col-sm-1">
						<label for="">:</label>
					</div>
					<div class="col-sm-3">
						<div class="form-group">

							<input class="btn" name="no_agenda" id="no_agenda" aria-describedby="helpId" placeholder=""
								value="<?php echo $no_agenda ?>" readonly>

						</div>
					</div>
					<div class="col-sm-2">
						<label for="">Tingkat Keamanan</label>
					</div>
					<div class="col-sm-1">
						<label for="">:</label>
					</div>
					<div class="col-sm-3">
						<div class="form-group">

							<input class="btn" name="sifat" id="sifat" aria-describedby="helpId" placeholder=""
								value="<?php echo $sifat ?>" readonly>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label for="">Tanggal Penerimaan </label>
					</div>
					<div class="col-sm-1">
						<label for="">:</label>
					</div>
					<div class="col-sm-3">
						<div class="form-group">

							<input class="btn" name="tgl_terima" id="tgl_terima" aria-describedby="helpId"
								placeholder="" value="<?php echo $tgl_terima ?>" readonly>

						</div>
					</div>
					<div class="col-sm-2">
						<label for="">Tanggal Penyelesaian</label>
					</div>
					<div class="col-sm-1">
						<label for="">:</label>
					</div>
					<div class="col-sm-3">
						<div class="form-group">

							<input class="btn" name="tgl_selesai" id="tgl_selesai" aria-describedby="helpId"
								placeholder="">

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<label for="">Tgl dan No. Surat </label>
					</div>
					<div class="col-sm-1">
						<label for="">:</label>
					</div>
					<div class="col-sm-7">
						<div class="form-group">

							<input class="btn" name="tgl_surat" id="tgl_surat" aria-describedby="helpId" placeholder=""
								value="<?php echo $tgl_surat ?>" readonly>
							<?php	
								echo"
								<b><a href='";echo base_url('./assets/documents/');echo $a->file;echo"' target='_blank' role='button'> 
									$a->no_surat
								</a></b> ";
							?>
							<input name="no_surat" id="no_surat"  type=hidden
								value="<?php echo $no_surat ?>" >
						</a>

						</div>
					</div>
				</div>
				<?php
					
					if($lampiran!=""){
						echo "<b>*Terdapat lampiran : $lampiran</b>";
					}
				?>
				<hr />
				<div class="row">
					<div class="col-sm-3">

					</div>
					<div class="col-sm-9">

					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-sm-3">
					<input type=text class='form-control' readonly value='<?php echo $nama_subb; ?>'' >
					<br>
					
					
					
					
						<!-- <div class="form-group" required>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="satu" name="satu">
								<label class="form-check-label">Tata Usaha</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox">
								<label class="form-check-label">Infratruktur Pertanahan</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox">
								<label class="form-check-label">Hubungan Hukum
									Pertanahan</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox">
								<label class="form-check-label">Penataan Pertanahan</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox">
								<label class="form-check-label">Pengadaan Tanah</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox">
								<label class="form-check-label">Penangann Masalah dan
									Pengendalian Pertanahan</label>
							</div>
							
						</div> -->
					</div>
                   
					<div class="col-sm-9">
						<div class="form-group">
                        <?php 
                        if($cat1==""){
                                echo "
                                <textarea class='form-control' name='isi_disposisi' id='isi_disposisi' rows='5' required>$isidis</textarea>
                                ";

                        }else if($cat2==""){
                            echo "
                            <b>Catatan Disposisi :</b><br>
                            $isidis
                            <input type=hidden class='btn' name='isi_disposisi' id='isi_disposisi' value='$isidis'><br>
                            ";
                            echo "
                            <textarea class='form-control' name='cat1' id='cat1' rows='4' required>$cat1</textarea>
                            ";

                    	}else if($cat2!=""){
                            echo "
                            <b>Catatan Disposisi :</b><br>
                            $isidis
                            <input type=hidden class='btn' name='isi_disposisi' id='isi_disposisi' value='$isidis'><br>
							";
							echo "
                            <b>Catatan Tambahan :</b><br>
                            $cat1
                            <input type=hidden class='btn' name='isi_disposisi' id='isi_disposisi' value='$isidis'><br>
							";
							echo "
                            <textarea class='form-control' name='cat2' id='cat2' rows='4' required>$cat2</textarea>
                            ";

                    	}else{
                            echo "
                            <b>Catatan Disposisi :</b><br>
                            $isidis
                            <input type=hidden class='btn' name='isi_disposisi' id='isi_disposisi' value='$isidis'><br>
                            ";
                            echo "
                            <b>Catatan Tambahan :</b><br>
                            $cat1
                            <input type=hidden class='btn' name='cat1' id='cat1' value='$cat1'><br>
                            ";
                            echo "
                            <b>Catatan Tambahan :</b><br>
                            $cat1
                            <input type=hidden class='btn' name='cat2' id='cat2' value='$cat2'><br>
                            ";

                    	}
                        ?>
                            
						</div>
					</div>

				</div>
			</div>
			<div class "form-group" align=center>
			<input type=hidden name='iddis' id='iddis' value='<?php echo $iddis ?>'>	
			<a href="javascript:history.back()" class="btn btn-danger">Kembali</a>
			<button  type="submit" class="btn btn-primary">Update</button>
			<?php 
			if($cat2!=""){

			}else{
				// echo"
				// <a class='btn btn-info'  href='";base_url();echo"../surat/appsubdis?n=$iddis' >Selesai</a>";
			}
			?>
			
				
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
		$('#submit').submit(function(e){
			
			e.preventDefault(); 
		         $.ajax({
		             url:'<?php echo base_url();?>surat/add_disp',
		             type:"post",
		             data:new FormData(this),
		             processData:false,
		             contentType:false,
		             cache:false,
		             async:false,
		              success: function(data){
		                  alert("Data Berhasil Disimpan!.");
						  return data;
		           }
		         });
			});
		$('#editsub').submit(function(e){

		    // e.preventDefault(); 
		         $.ajax({
		             url:'<?php echo base_url();?>surat/add_dis',
		             type:"post",
		             data:new FormData(this),
		             processData:false,
		             contentType:false,
		             cache:false,
		             async:false,
		              success: function(data){
		                  alert("Data Berhasil DiUpdate!.");
						  return data;
						
		           }
		         });
			});
			function goBack() {
				window.history.back();
			}
		

	});
	
</script>

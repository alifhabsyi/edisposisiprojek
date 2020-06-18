<?php 
    foreach($surat as $s):
        $no_agenda=$s->no_agenda;
        $no_surat=$s->no_surat;
        $tgl_terima=$s->tgl_terima;
        $tgl_surat=$s->tgl_surat;
        $sifat=$s->sifat;
        $tgl_selesai=date("Y-m-d");
        
    endforeach;
    
    
?>
<!DOCTYPE html>
<html>
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
<body>
<table border="1" width=100% style='border-collapse: collapse;'>
    <tr>
        <td colspan=3  align=center>
        <h3>Kantor Wilayah Badan Pertanahan Nasional
						Provinsi Kalimantan selatan <br>
						Jalan D.I Pandjaitan No.29 Banjarmasin</h3>
        </td>
    </tr>
    <tr>
        <td colspan=3 align=center>
            <h3>LEMBAR DISPOSISI</h3>
        </td>
    </tr>
    <tr>
        <td colspan=3>
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="">No Agenda</label>
                        </div>
                        <div class="col-sm-1">
                            <label for="">:</label>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">

                                <?php echo $no_agenda ?>

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

                            <?php echo $sifat ?>

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

                            <?php echo $tgl_terima ?>

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

                            <?php echo $tgl_selesai ?>

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

                            <?php echo "$tgl_surat &nbsp;&nbsp;&nbsp;&nbsp;"; echo $no_surat ?>


                            </div>
                        </div>
                    </div>
        </td>
    </tr>
    <tr>
        <td width=30% align=center><b> DITERUSKAN </b></td>
        <td align=center><b> ISI DISPOSISI </b></td>
    </tr>
    <tr>
        <td rowspan=20 valign=top>
            <b>  
              HUBUNGAN HUKUM PERTANAHAN
            </b>
        </td>
        <td  height='500px' valign='top'>
                <b>Catatan Disposisi :</b><br>
                
        </td>
    </tr>
</table>
</body>
<script src="<?php echo base_url();?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/dist/js/adminlte.min.js"></script>
<script>
		window.print();
	</script>
</html>
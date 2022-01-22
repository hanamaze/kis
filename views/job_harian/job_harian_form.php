<?php
$id = $this->session->userdata('id');

if($id==1){
    $color = "red";
}elseif($id==2){
    $color = "#ff5b5b";
}elseif($id==3){
    $color = "#b82727";
}elseif($id==4){
    $color = "#8f1616";
}elseif($id==5){
    $color = "blue";
}elseif($id==6){
    $color = "green";
}elseif($id==7){
    $color = "#708a00";
}elseif($id==8){
    $color = "#ff8a00";
}elseif($id==9){
    $color = "blue";
}elseif($id==10){
    $color = "#00ffff";
}elseif($id==11){
    $color = "#db00ff";
}elseif($id==12){
    $color = "#007d91";
}elseif($id==13){
    $color = "#00a619";
}elseif($id==14){
    $color = "#4c2887";
}elseif($id==15){
    $color = "#6277b8";
}
?>
<!doctype html>
<html>
    <head>
        <title>CRUD</title>
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

<link rel="stylesheet" href="<?php echo base_url();?>plugins/timepicker/bootstrap-timepicker.min.css">

<script src="<?php echo base_url();?>plugins/timepicker/bootstrap-timepicker.min.js"></script>



    </head>
    <body>
        <form action="<?php echo $action; ?>" method="post">
	    
            <input type="hidden" class="form-control" name="id_peserta" id="id_peserta" placeholder="Id Peserta" value="<?php echo $id; ?>" />
        
	    <div class="form-group">
            <label for="varchar">Uraian <?php echo form_error('uraian') ?></label>
            <input type="text" class="form-control" name="uraian" id="uraian" placeholder="Uraian" value="<?php echo $uraian; ?>" />
        </div>

		<div class="form-group">
            
            <input type="hidden" name="tanggal" id="tanggal" value="<?php echo date("d-m-Y"); ?>" />
        </div>
        <div class="bootstrap-timepicker">
	    <div class="form-group">
            <label for="varchar">Jam Mulai <?php echo form_error('start') ?></label>
            <input type="text" class="form-control timepicker" name="start" value="<?php echo $start; ?>" />
        </div>
        </div>
        <div class="bootstrap-timepicker">
	    <div class="form-group">
            <label for="varchar">Jam Selesai<?php echo form_error('end') ?></label>
            <input type="text" class="form-control timepicker" name="end" value="<?php echo $end; ?>" />
        </div>
        </div>
	    <div class="form-group">
            <label for="varchar">Detail <?php echo form_error('keterangan') ?></label>
            <textarea type="text" class="form-control" name="keterangan" ><?php echo $keterangan; ?> </textarea>
        </div>

        <input type="hidden" class="form-control" name="color" id="color" value="<?php echo $color; ?>" />
	    <input type="hidden" name="id_job_harian" value="<?php echo $id_job_harian; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('job_harian') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
<script type="text/javascript">
$(function () {
    $('.timepicker').timepicker({
      showInputs: false,
      showMeridian: false 
    })
});
        </script>
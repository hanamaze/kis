<?php
	if($button != "Update"){		
		include "cryptz.php";
	}
?>
<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <!-- jQuery 3-->
		  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();  ?>assets/bootstrap/css/bootstrap.min.css"/>

  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

 
    <body>
        <?php if($button == "Update"){?>
            <div class="box col-md-6">
            <div class="box-header">
              <h3 class="box-title">Pelatihan</h3>
            </div>
            
            <div class="box-body">
            <div class="box-body" style="overflow:scroll;">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kategori <?php echo form_error('id_kategori_pelatihan') ?></label>
			<select name="id_kategori_pelatihan" class="form-control">
			<?php 
				$k = $this->db->get('kategori_pelatihan')->result();
				foreach($k as $ka){
			?>
				<option value="<?php echo $ka->id_kategori_pelatihan; ?>"<?php if($id_kategori_pelatihan==$ka->id_kategori_pelatihan){ echo " selected";} ?>>
				
				<?php 
				echo $ka->nama_kategori; ?></option>
				<?php }?>
			</select>	
        </div>
		<div class="form-group">
            <label for="varchar">Nama Pelatihan <?php echo form_error('nama_pelatihan') ?></label>
            <input type="text" class="form-control" name="nama_pelatihan" id="nama_pelatihan" placeholder="Nama Pelatihan" value="<?php echo md5_decrypt($nama_pelatihan); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat <?php echo form_error('tempat') ?></label>
            <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat" value="<?php echo md5_decrypt($tempat); ?>" />
        </div>
	    
		<div class="form-group">
            <label for="varchar">Tanggal Mulai </label>
            <input type="text" class="form-control tanggal" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai" value="<?php echo $tanggal_mulai; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Tanggal Selesai </label>
            <input type="text" class="form-control tanggal" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $tanggal_selesai; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Kota </label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo md5_decrypt($kota); ?>" />
        </div>
		<div class="form-group">
            <label for="varchar">Keterangan<?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="contoh:12 Januari 2019" value="<?php echo md5_decrypt($keterangan); ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Tanggal Sertifikat Keluar </label>
            <input type="text" class="form-control tanggal" name="keluar_sertifikat" id="keluar_sertifikat" placeholder="Tanggal Sertifikat" value="<?php echo $keluar_sertifikat; ?>" />
        </div>
	    <input type="hidden" name="id_pelatihan" value="<?php echo $id_pelatihan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pelatihan') ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
</div>
</div>
		<?php }else{?>
		
		<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kategori <?php echo form_error('id_kategori_pelatihan') ?></label>
			<select name="id_kategori_pelatihan" class="form-control">
			<?php 
				$k = $this->db->get('kategori_pelatihan')->result();
				foreach($k as $ka){
			?>
				<option value="<?php echo $ka->id_kategori_pelatihan; ?>"<?php if($id_kategori_pelatihan==$ka->id_kategori_pelatihan){ echo " selected";} ?>>
				
				<?php 
				echo $ka->nama_kategori; ?></option>
				<?php }?>
			</select>	
        </div>
		<div class="form-group">
            <label for="varchar">Nama Pelatihan <?php echo form_error('nama_pelatihan') ?></label>
            <input type="text" class="form-control" name="nama_pelatihan" id="nama_pelatihan" placeholder="Nama Pelatihan" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat <?php echo form_error('tempat') ?></label>
            <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat" value="" />
        </div>
        <div class="form-group">
            <label for="varchar">Tanggal Mulai <?php echo form_error('tanggal_mulai') ?></label>
            <input type="text" class="form-control tanggal" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Mulai" value="" />
        </div>
        <div class="form-group">
            <label for="varchar">Tanggal Selesai<?php echo form_error('tanggal_selesai') ?></label>
            <input type="text" class="form-control tanggal" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai"  value="" />
        </div>
        <div class="form-group">
            <label for="varchar">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota"  placeholder="Kota" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="" />
        </div>
	    <input type="hidden" name="id_pelatihan" value="<?php echo $id_pelatihan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pelatihan') ?>" class="btn btn-default">Cancel</a>
	</form>
		<?php } ?>
    </body>
</html>
<script src="<?php echo base_url();  ?>bower_components/jquery/dist/jquery.min.js"></script> 
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();  ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();  ?>dist/js/demo.js"></script>
<script src="<?php echo base_url();  ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
<?php

	if($this->session->userdata('status')!="admin"){
		redirect(base_url()."index.php/restrict");
	}
?>
<!doctype html>
<html>
    <head>
        <title>PT. Kualitas Indonesia Sistem</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>

        <?php echo form_open("surat_masuk_keluar/update_action", array('enctype'=>'multipart/form-data')); ?>
	    <div class="form-group">
            <label for="varchar">No Surat <?php echo form_error('no_surat') ?></label>
            <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $no_surat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="tanggal form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keperluan <?php echo form_error('deskripsi') ?></label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Keperluan" value="<?php echo $deskripsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">File <?php echo form_error('file') ?></label>
			<a href="<?php echo base_url();?>images/<?php echo $file; ?>"><?php echo $file; ?></a>
            <input type="file" class="form-control" name="file" id="file" placeholder="File"  />
        </div>
		<div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <select class="form-control" name="status">
				<option value="masuk">Masuk</option>
				<option value="keluar">Keluar</option>
			</select>
        </div>
            <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?php echo  $this->session->userdata('id'); ?>" />
	    <input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>" /> 
	    <button type="submit" class="btn btn-primary">Edit</button> 
	    
	<?php echo form_close(); ?>
    <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
    </body>
</html>
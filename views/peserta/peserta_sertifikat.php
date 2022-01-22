<!doctype>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>

		<?php $id = $this->input->post('id'); ?>
        <?php echo form_open("peserta/update_sert", array('enctype'=>'multipart/form-data')); ?>
	    <div class="form-group">
            <label for="varchar">UPLOAD SERTIFIKAT KEMENAKER </label>
            <input type="file" class="form-control" name="file"/>
        </div>
	    <input type="hidden" name="id_peserta" value="<?php echo $id; ?>" /> 
	    <input type="submit" class="btn btn-primary" name="submit" value="Upload" /> 
	<?php echo form_close(); ?>
	
    </body>
</html>

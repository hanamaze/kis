<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Setting <?php echo form_error('nama_setting') ?></label>
            <input type="text" class="form-control" name="nama_setting" id="nama_setting" placeholder="Nama Setting" value="<?php echo $nama_setting; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Info <?php echo form_error('info') ?></label>
            <input type="text" class="form-control" name="info" id="info" placeholder="Info" value="<?php echo $info; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <select class="form-control" name="status" id="status" >
				<option value='1' <?php if($status == '1'){ echo " selected";}?> >Buka</option>
				<option value='0' <?php if($status == '0'){ echo " selected";}?> >Tutup</option>
			</select>
			
        </div>
	    <input type="hidden" name="id_setting" value="<?php echo $id_setting; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('setting') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
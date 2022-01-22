<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Coba <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Coba <?php echo form_error('nama_coba') ?></label>
            <input type="text" class="form-control" name="nama_coba" id="nama_coba" placeholder="Nama Coba" value="<?php echo $nama_coba; ?>" />
        </div>
	    <input type="hidden" name="id_coba" value="<?php echo $id_coba; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('coba') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
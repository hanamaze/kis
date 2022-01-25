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
        <h2 style="margin-top:0px">Kategori_iso <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kategori Iso <?php echo form_error('nama_kategori_iso') ?></label>
            <input type="text" class="form-control" name="nama_kategori_iso" id="nama_kategori_iso" placeholder="Nama Kategori Iso" value="<?php echo $nama_kategori_iso; ?>" />
        </div>
	    <div class="form-group">
            <label for="ket">Ket <?php echo form_error('ket') ?></label>
            <textarea class="form-control" rows="3" name="ket" id="ket" placeholder="Ket"><?php echo $ket; ?></textarea>
        </div>
	    <input type="hidden" name="id_kategori_iso" value="<?php echo $id_kategori_iso; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori_iso') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
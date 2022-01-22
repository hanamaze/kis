<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        <h2 style="margin-top:0px">Kategori_pelatihan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kategori <?php echo form_error('nama_kategori') ?></label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Color Chart <?php echo form_error('color_chart') ?></label>
            <input type="text" class="form-control" name="color_chart" id="color_chart" placeholder="Color Chart" value="<?php echo $color_chart; ?>" />
        </div>
	    <input type="hidden" name="id_kategori_pelatihan" value="<?php echo $id_kategori_pelatihan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori_pelatihan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
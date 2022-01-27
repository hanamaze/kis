<!doctype html>
<html>
    <head>
        <title>KONTAK</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 0px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px"><?php $button ?> Kontak</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kontak <?php echo form_error('nama_kontak') ?> </label>
            <input type="text" class="form-control" name="nama_kontak" id="nama_kontak" placeholder="Nama Kontak" value="<?php echo $nama_kontak; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Instansi <?php echo form_error('instansi') ?></label>
            <input type="text" class="form-control" name="instansi" id="instansi" placeholder="Instansi" value="<?php echo $instansi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp *<?php echo form_error('no_hp1') ?></label>
            <input type="text" class="form-control" name="no_hp1" id="no_hp1" placeholder="No Hp1" value="<?php echo $no_hp1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp2 <?php echo form_error('no_hp2') ?></label>
            <input type="text" class="form-control" name="no_hp2" id="no_hp2" placeholder="No Hp2" value="<?php echo $no_hp2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email * <?php echo form_error('email_1') ?></label>
            <input type="text" class="form-control" name="email_1" id="email_1" placeholder="Email 1" value="<?php echo $email_1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email 2 <?php echo form_error('email_2') ?></label>
            <input type="text" class="form-control" name="email_2" id="email_2" placeholder="Email 2" value="<?php echo $email_2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat * <?php echo form_error('alamat_1') ?></label>
            <textarea type="text" class="form-control" id="alamat_1" placeholder="Alamat 1" name="alamat_1" ><?php echo $alamat_1; ?> </textarea>
	    <div class="form-group">
            <label for="varchar">Alamat 2 <?php echo form_error('alamat_2') ?></label>
            <textarea type="text" class="form-control" id="alamat_2" placeholder="Alamat 2" name="alamat_2" ><?php echo $alamat_2; ?> </textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Ket <?php echo form_error('ket') ?></label>
            <textarea type="text" class="form-control" id="ket" placeholder="Keterangan" name="ket" ><?php echo $ket; ?> </textarea>
        </div>
	    <input type="hidden" name="id_kontak" value="<?php echo $id_kontak; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kontak') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
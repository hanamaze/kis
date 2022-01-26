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
        <h2 style="margin-top:0px">Kontak Read</h2>
        <table class="table">
	    <tr><td>Nama Kontak</td><td><?php echo $nama_kontak; ?></td></tr>
	    <tr><td>Instansi</td><td><?php echo $instansi; ?></td></tr>
	    <tr><td>No Hp1</td><td><?php echo $no_hp1; ?></td></tr>
	    <tr><td>No Hp2</td><td><?php echo $no_hp2; ?></td></tr>
	    <tr><td>Email 1</td><td><?php echo $email_1; ?></td></tr>
	    <tr><td>Email 2</td><td><?php echo $email_2; ?></td></tr>
	    <tr><td>Alamat 1</td><td><?php echo $alamat_1; ?></td></tr>
	    <tr><td>Alamat 2</td><td><?php echo $alamat_2; ?></td></tr>
	    <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kontak') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
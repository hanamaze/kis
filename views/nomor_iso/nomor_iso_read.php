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
        <h2 style="margin-top:0px">Nomor_iso Read</h2>
        <table class="table">
	    <tr><td>Tgl Issued</td><td><?php echo $tgl_issued; ?></td></tr>
	    <tr><td>Nama Perusahaan</td><td><?php echo $nama_perusahaan; ?></td></tr>
	    <tr><td>No Audit</td><td><?php echo $no_audit; ?></td></tr>
	    <tr><td>Jenis Iso</td><td><?php echo $jenis_iso; ?></td></tr>
	    <tr><td>Pembawa</td><td><?php echo $pembawa; ?></td></tr>
	    <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
	</table>
        </body>
</html>
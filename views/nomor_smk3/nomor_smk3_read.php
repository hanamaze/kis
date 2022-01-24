<!doctype html>
<html>
    <head>
        <title>SMK3 - READ </title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 0px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Nomor_smk3 Read</h2>
        <table class="table">
	    <tr><td>Nama Perusahaan</td><td><?php echo $nama_perusahaan; ?></td></tr>
	    <tr><td>No Laporan</td><td><?php echo $no_laporan; ?></td></tr>
	    <tr><td>No Aplikasi</td><td><?php echo $no_aplikasi; ?></td></tr>
	    <tr><td>No Ska</td><td><?php echo $no_ska; ?></td></tr>
	    <tr><td>Tgl Audit</td><td><?php echo $tgl_audit; ?></td></tr>
	    <tr><td>Pembawa</td><td><?php echo $pembawa; ?></td></tr>
	    <tr><td>Ket</td><td><?php echo $ket; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('nomor_smk3') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
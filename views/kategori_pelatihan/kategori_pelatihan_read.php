<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        <h2 style="margin-top:0px">Kategori_pelatihan Read</h2>
        <table class="table">
	    <tr><td>Nama Kategori</td><td><?php echo $nama_kategori; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Color Chart</td><td><?php echo $color_chart; ?></td></tr>
	    <tr><td></td><td></td></tr>
	</table>
        </body>
</html>
<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        <table class="table">
	    <tr><td>Nama Setting</td><td><?php echo $nama_setting; ?></td></tr>
        <tr><td>Info</td><td><?php echo $info; ?></td></tr>
	    <tr><td>Status</td>
        <td><strong><?php if($status == '1'){ echo "<span style='color:#00c442;'>Buka</span>"; }else{ echo "<span style='color:#ff5555;'>Tutup</span>";} ?></strong></td></tr>
	</table>
        </body>
</html>
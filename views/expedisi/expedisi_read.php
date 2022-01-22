<?php error_reporting(0);?>
<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        <table class="table">
	    <tr><td>Kepada</td><td><?php echo $kepada; ?></td></tr>
	    <tr><td>Kurir</td><td><?php echo $kurir; ?></td></tr>
	    <tr><td>Resi</td><td><?php echo $resi; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>File</td><td><a href="<?php echo base_url();?>data_expedisi/<?php echo $file; ?>"><?php echo $file; ?></a></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>

		
	    
	</table>
	<img width="350" src="<?php echo base_url(); ?>data_expedisi/<?php echo $file; ?>">
        </body>
</html>
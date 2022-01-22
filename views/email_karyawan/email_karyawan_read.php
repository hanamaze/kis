<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        <h2 style="margin-top:0px">Email_karyawan Read</h2>
        <table class="table">
	    <tr><td>Id Karyawan</td><td><?php echo $id_karyawan; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td></td></tr>
	</table>
        </body>
</html>
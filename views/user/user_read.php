<?php error_reporting(0);
include "cryptz.php";
?>
<!doctype html>
<html>
    <head>
        <title>PT. Kualitas Indonesia Sistem</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        <h2 style="margin-top:0px">User Read Popup</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo md5_decrypt($nama); ?></td></tr>
	    <tr><td>Username</td><td><?php echo md5_decrypt($username); ?></td></tr>
	    <tr><td>Password</td><td><?php echo md5_decrypt($password); ?></td></tr>
	    <tr><td>jabatan</td><td><?php echo md5_decrypt($jabatan); ?></td></tr>
	    <tr><td>Foto</td><td><?php echo md5_decrypt($foto); ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    
	</table>
        </body>
</html>
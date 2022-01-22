<?php error_reporting(0);?>
<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
	    <?php
    function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}?>
    <body>

        <table class="table">
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>No Faktur</td><td><?php echo $no_faktur; ?></td></tr>
		 <tr><td>No Kwitansi</td><td><?php echo $no_kwitansi; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $uraian; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Harga Satuan</td><td><?php echo rupiah($harga_satuan); ?></td></tr>
	    <tr><td>Harga Satuan</td><td><?php echo $satuan; ?></td></tr>
	    <tr><td>Harga Total</td><td><?php echo rupiah($harga_total); ?></td></tr>
	    <tr><td>Total In Char</td><td><?php echo $total_in_char; ?></td></tr>
	    <tr><td>Payment Of</td><td><?php echo $payment_of; ?></td></tr>
	    <tr><td>Dari</td><td><?php echo $dari; ?></td></tr>
		<tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
		<tr><td>Telp</td><td><?php echo $telp; ?></td></tr>
		<tr><td>Npwp</td><td><?php echo $npwp; ?></td></tr>
		<tr><td>Disc</td><td><?php echo rupiah($disc); ?></td></tr>
		<tr><td>Transaksi</td><td><?php echo $transaksi; ?></td></tr>
	    
	</table>
        </body>
</html>
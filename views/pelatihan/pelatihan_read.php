<?php error_reporting(0);
	include "cryptz.php";
?>
<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        <h2 style="margin-top:0px">Detail</h2>
        <table class="table">
	    <tr><td>Kategori</td><td>
		<?php 

			$kk = $this->db->query("SELECT * FROM kategori_pelatihan WHERE id_kategori_pelatihan='$id_kategori_pelatihan'")->row();
			echo "<strong>".$kk->nama_kategori."</strong>";

		?>
		</td></tr>
	    <tr><td>Nama Pelatihan</td><td><?php echo md5_decrypt($nama_pelatihan); ?></td></tr>
	    <tr><td>Tempat</td><td><?php echo md5_decrypt($tempat); ?></td></tr>
	    <tr><td>Tanggal Mulai</td><td><?php echo $tanggal_mulai; ?></td></tr>
	    <tr><td>Tanggal Selesai</td><td><?php echo $tanggal_selesai; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo md5_decrypt($kota); ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo md5_decrypt($keterangan); ?></td></tr>
	    <tr><td>Keluar Sertifikat</td><td><?php echo $keluar_sertifikat; ?></td></tr>
	    <tr><td></td><td></td></tr>
	</table>
        </body>
</html>
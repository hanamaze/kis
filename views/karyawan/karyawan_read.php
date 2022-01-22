<?php error_reporting(0);
include "cryptz.php";
?>
<!doctype html>
<html>
    <head>
        <title>KIS</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>

        <table class="table">
	    <tr><td>Nama Karyawan</td><td><?php echo md5_decrypt($nama_karyawan); ?></td></tr>
	    <tr><td>Nik</td><td><?php echo md5_decrypt($nik); ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Tgl Masuk Kerja</td><td><?php echo md5_decrypt($tgl_masuk_kerja); ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo md5_decrypt($jabatan); ?></td></tr>
	    <tr><td>Tgl Lahir</td><td><?php echo md5_decrypt($tgl_lahir); ?></td></tr>
	    <tr><td>Nama Ibu Kandung</td><td><?php echo md5_decrypt($nama_ibu_kandung); ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Jumlah Anak</td><td><?php echo $jumlah_anak; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo md5_decrypt($alamat); ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo md5_decrypt($no_hp); ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo md5_decrypt($keterangan); ?></td></tr>
		<tr><td>Source</td><td><?php echo "<a href='foto_karyawan/".md5_decrypt($foto)."'>".md5_decrypt($foto)."</a>" ?></td></tr>
	    <tr><td>Foto</td><td>
		<?php
			if($foto != NULL){ 
				echo "<img width='200' src='foto_karyawan/".md5_decrypt($foto)."' />";
			}else{ 
				echo "<img width='200' src='foto_karyawan/kosong.png' />"; 
			} ?>
		
		</td></tr>
	    <tr><td>Status Aktif</td><td><?php echo $status_aktif; ?></td></tr>
	</table>
        </body>
</html>
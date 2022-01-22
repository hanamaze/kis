<?php error_reporting(0);
 include "cryptz.php";

	$id = $this->session->userdata('id');	
	$user = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();
 ?>
<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        <h2 style="margin-top:0px">Detail Peserta</h2>
        <table class="table">
	    <tr><td>Id Pelatihan</td><td><?php echo $id_pelatihan; ?></td></tr>
	    <tr><td>Nama Peserta</td><td><?php echo md5_decrypt($nama_peserta); ?></td></tr>
		<tr><td>NIK Peserta</td><td><?php echo md5_decrypt($nik); ?></td></tr>
	    <tr><td>Tempat Tgl Lahir</td><td><?php echo md5_decrypt($tempat_tgl_lahir); ?></td></tr>
	    <tr><td>Perusahaan</td><td><?php echo md5_decrypt($perusahaan); ?></td></tr>
	    <tr><td>Alamat Perusahaan</td><td><?php echo md5_decrypt($alamat_perusahaan); ?></td></tr>
	    <tr><td>Alamat Rumah</td><td><?php echo md5_decrypt($alamat_rumah); ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo md5_decrypt($no_hp); ?></td></tr>
	    <tr><td>Email</td><td><?php echo md5_decrypt($email); ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo md5_decrypt($keterangan); ?></td></tr>
	    <tr><td>Pendidikan</td><td><?php echo md5_decrypt($pendidikan); ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo md5_decrypt($jabatan); ?></td></tr>
	    <tr><td>Pembayaran</td><td><?php echo $pembayaran; ?></td></tr>
	    <tr><td>Cetak SKL</td><td>
		<a class="btn btn-danger" href="<?php echo base_url("peserta/cetak_peserta/").$id_pelatihan."/".$id_peserta; ?>" >Dengan KOP</a>
		<a class="btn btn-success" href="<?php echo base_url("peserta/cetak_peserta2/").$id_pelatihan."/".$id_peserta; ?>" >Tanpa KOP</a>
		</td></tr>
		<?php if($sertifikat != NULL){?>

		<tr><td>Sertifikat</td><td>
			<?php if($user->id_user==7 OR $user->id_user==12){?>
			<a class="btn btn-danger" href="<?php echo base_url();?>peserta/delete_sertifikat/<?php echo $id_peserta."/".$id_pelatihan; ?>">Hapus Sertifikat</a>
		<?php } ?>
			<img width="450" src="<?php echo base_url(); ?>sertifikat/<?php echo $sertifikat; ?>"></td></tr>
		<?php } ?>
	</table>
        </body>
</html>
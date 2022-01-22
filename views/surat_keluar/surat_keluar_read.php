<?php error_reporting(0);
 include "cryptz.php";?>
<!doctype html>
<html>
    <head>
        <title>PT. Kualitas Indonesia Sistem</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        
        <table class="table">
	    <tr><td>No Surat</td><td><?php echo md5_decrypt($no_surat); ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr>
		<td>Deskripsi</td>
		<?php 
					$cek = strlen($deskripsi);
					$pl = $deskripsi;
					$ps = $keterangan;
					$plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$pl'")->row();
					$pst = $this->db->query("SELECT * FROM peserta WHERE id_peserta='$ps'")->row();
						if($cek <= 5){
							echo "<td>SKL ".md5_decrypt($plt->nama_pelatihan)."</td>";
						}else{
							echo "<td>".md5_decrypt($deskripsi)."</td>"; 
						}
			?>
		
		
		</tr>
	    <tr><td>Keterangan</td>
		<?php
		if($cek <= 5){
							echo "<td>".md5_decrypt($pst->nama_peserta)."</td>";
						}else{
							echo "<td>".md5_decrypt($keterangan)."</td>"; 
						}
			?>
		</tr>
	    <tr><td>File</td><td><a href="<?php echo base_url();?>images/<?php echo md5_decrypt($file); ?>"><?php echo md5_decrypt($file); ?></a></td></tr>
	    <tr><td>Id User</td><td>
		<?php $row = $this->Surat_keluar_model->get_by_id_user($id_user); 
		//foreach ($user as $a){
			echo md5_decrypt($row->nama);
		//}
		?>
		</td></tr>

	</table>
        </body>
</html>
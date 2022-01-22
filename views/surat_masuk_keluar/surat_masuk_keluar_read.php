<?php
	if($this->session->userdata('status')!="admin"){
		redirect(base_url()."index.php/restrict");
	}
	
	
?>
<!doctype html>
<html>
    <head>
        <title>PT. Kualitas Indonesia Sistem</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
	
        
        <table class="table">
	    <tr><td>No Surat</td><td><?php echo $no_surat; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Keperluan</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>File</td><td><a href="<?php echo base_url();?>images/<?php echo $file; ?>"><?php echo $file; ?></a></td></tr>
		<tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Id User</td><td>
		<?php $row = $this->Surat_masuk_keluar_model->get_by_id_user($id_user); 
		//foreach ($user as $a){
			echo $row->nama;
		//}
		?>
		</td></tr>
	    
	</table>
        </body>
</html>
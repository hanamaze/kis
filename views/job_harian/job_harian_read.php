<?php 	$id = $this->session->userdata('id');	 ?>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        <h2 style="margin-top:0px">Job_harian Read</h2>
        <table class="table">
	    <tr><td>Uraian</td><td><?php echo $uraian; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Start</td><td><?php echo $start; ?></td></tr>
	    <tr><td>End</td><td><?php echo $end; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <?php if($id_peserta == $id){ ?>
	    <tr><td>Action</td><td><a class="btn btn-success" href="<?php echo base_url('job_harian/update/'.$id_job_harian)?>">Update</a></td></tr>
	    <tr><td></td><td><a class="btn btn-danger" href="<?php echo base_url('job_harian/delete/'.$id_job_harian)?>">Delete</a></td></tr>
	<?php } ?>
	</table>
        </body>
</html>
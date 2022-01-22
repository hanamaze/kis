<?php 	$id = $this->session->userdata('id');	 ?>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
    	<center>
    	<div class="box box-solid col-md-6">
            <div class="box-header with-border">
              <center><h4 class="box-title">Lihat Job Karyawan </h4></center>
            </div>
            <div class="box-body">
        <h2 style="margin-top:0px">Detail</h2>
        <table class="table">
	    <tr><td>Uraian</td><td><?php echo $uraian; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Start</td><td><?php echo $start; ?></td></tr>
	    <tr><td>End</td><td><?php echo $end; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	</table>
	<h2><a style="margin-top:0px; width:100%;" class="btn btn-primary" href="<?php echo base_url()?>job_harian">Kembali Ke Menu</a></h2>
	</div>
            <!-- /.box-body -->
          </div>
      </center>
        </body>
</html>
<!doctype html>
<html>
    <head>
        <title>Laporan ISO</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
	<!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Laporan ISO</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
<a href="#" class="create-iso btn btn-primary">Tambah</a>
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan ISO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
		<thead>
            <tr>
                <th>No</th>
		<th>No Surat</th>
		<th>Nama PT</th>
		<th>Alamat</th>
		<th>Auditor</th>
		<th>Action</th>
            </tr>
			</thead>
			<tbody>
			<?php
            foreach ($laporan_iso_data as $laporan_iso)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $laporan_iso->no_surat ?></td>
			<td><?php echo $laporan_iso->nama_pt ?></td>
			<td><?php echo $laporan_iso->alamat ?></td>
			<td><?php echo $laporan_iso->auditor ?></td>	
			<td>
			<a href="#" class="detail-iso btn btn-primary" data-id="<?php echo $laporan_iso->id_laporan_iso ?>">Detail</a>
				<?php 
				//echo anchor(site_url('laporan_iso/read/'.$laporan_iso->id_laporan_iso),'Read'); 
				//echo ' | '; 
				echo anchor(site_url('laporan_iso/cetak/'.$laporan_iso->id_laporan_iso),'Download','class="btn btn-default"');
				echo anchor(site_url('laporan_iso/update/'.$laporan_iso->id_laporan_iso),'Edit','class="btn btn-success"'); 
				//echo ' | '; 
				echo anchor(site_url('laporan_iso/delete/'.$laporan_iso->id_laporan_iso),'Hapus','class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
			</tbody>
        </table>
		<div class="row">
         <div class="col-md-6">
                
		<?php //echo anchor(site_url('laporan_iso/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php //echo anchor(site_url('laporan_iso/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                
            </div>
        </div>
		</div>
		</div>
     
    </body>
</html>
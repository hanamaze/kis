<?php
	//if($this->session->userdata('status')!="admin"){
		//redirect(base_url()."index.php/restrict");
	//}
?>

<!doctype html>
<html>
    <head>
        <title>PT. Kualitas Indonesia Sistem</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
<!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Surat Masuk Keluar</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>  
        <div class="row" style="margin-bottom: 10px">
            
            
            

        </div>
		<a href="#" class="create-masuk-keluar btn btn-primary">Tambah</a>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Surat Masuk Keluar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<table id="example2" class="table table-bordered table-striped">
			<thead>
            <tr>
        <th>No</th>
		<th>No Surat</th>
		<th>Tanggal</th>
		<th>Keperluan</th>
		<th>Status</th>
		<th>Action</th>
		</thead>
		<tbody>
            </tr><?php
            foreach ($row as $surat_masuk_keluar)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $surat_masuk_keluar->no_surat ?></td>
			<td><?php echo $surat_masuk_keluar->tanggal ?></td>
			<td><?php echo $surat_masuk_keluar->deskripsi ?></td>
			<td><?php echo $surat_masuk_keluar->status ?></td>
			<td>
			<a href="#" class="detail-masuk-keluar btn btn-primary" data-id="<?php echo $surat_masuk_keluar->id_surat ?>">Detail</a>
				<?php 
				//echo anchor(site_url('surat_masuk_keluar/read/'.$surat_masuk_keluar->id_surat),'Read'); 
				//echo ' | '; 
				echo anchor(site_url('surat_masuk_keluar/update/'.$surat_masuk_keluar->id_surat),'Edit','class="btn btn-success"'); 
				//echo ' | '; 
				echo anchor(site_url('surat_masuk_keluar/delete/'.$surat_masuk_keluar->id_surat),'Hapus','class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
			</tbody>
        </table>
		</div>
		</div>

        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
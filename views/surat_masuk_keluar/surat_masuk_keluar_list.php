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
            <div class="box-body" style="overflow:scroll;">
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
            foreach ($surat_masuk_keluar_data as $surat_masuk_keluar)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $surat_masuk_keluar->no_surat ?></td>
			<td><?php echo $surat_masuk_keluar->tanggal ?></td>
			<td><?php echo $surat_masuk_keluar->deskripsi ?></td>
			
			
			<td><?php echo $surat_masuk_keluar->status ?></td>
			
			<td>
			<a href="#" class="detail-masuk-keluar btn btn-primary" data-id="<?php echo $surat_masuk_keluar->id_surat ?>">
			<span class="fa fa-file"></span>
			</a>
			
			<a href="<?php echo base_url();?>surat_masuk_keluar/update/<?php echo $surat_masuk_keluar->id_surat;?>" class="btn btn-success">
				<span class="fa fa-pencil"></span>
			</a>
			<a onclick="javasciprt: return confirm('Are You Sure ?')" href="<?php echo base_url();?>surat_masuk_keluar/delete/<?php echo $surat_masuk_keluar->id_surat;?>" class="btn btn-danger">
				<span class="fa fa-trash-o"></span>
			</a>

			</td>
		</tr>
                <?php
            }
            ?>
			</tbody>
        </table>
		</div>
		</div>
		
		
        
    </body>
</html>
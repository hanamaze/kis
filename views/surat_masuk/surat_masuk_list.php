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
                        <h4 class="modal-title" id="myModalLabel">Surat Masuk</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>  

		
		<a href="#" class="create-masuk btn btn-primary">Tambah</a>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Surat Masuk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
		<thead>
            <tr>
        <th>No</th>
		<th>No Surat</th>
		<th>Tanggal</th>
		<th>Keperluan</th>
		<th>Action</th>
            </tr>
			</thead>
			<tbody>
			<?php
            foreach ($surat_masuk_data as $surat_masuk_keluar)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo md5_decrypt($surat_masuk_keluar->no_surat) ?></td>
			<td><?php echo $surat_masuk_keluar->tanggal ?></td>
			<td><?php echo md5_decrypt($surat_masuk_keluar->deskripsi) ?></td>
			<td>
				<?php 
				echo "<a href='#' class='detail-masuk btn btn-primary' data-id='".$surat_masuk_keluar->id_surat."'><span class='fa fa-list-ul'></span></a>";
				if($this->session->userdata('id')==$surat_masuk_keluar->id_user OR $this->session->userdata('status')=="admin"){
				//echo anchor(site_url('surat_masuk/read/'.),'Read'); 
				?>
	
			<a href="<?php echo base_url();?>surat_masuk/update/<?php echo $surat_masuk_keluar->id_surat;?>" class="btn btn-success">
				<span class="fa fa-pencil"></span>
			</a>
			<a onclick="javasciprt: return confirm('Are You Sure ?')" href="<?php echo base_url();?>surat_masuk/delete/<?php echo $surat_masuk_keluar->id_surat;?>" class="btn btn-danger">
				<span class="fa fa-trash-o"></span>
			</a>
				
				<?php
				}else{
					echo "<div class='btn btn-danger'>Dilarang Mengakses</div>";
				}
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
		</div>
		
       
    </body>
</html>
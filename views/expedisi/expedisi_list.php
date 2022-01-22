<!doctype html>
<html>
    <head>
        <title>KIS</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
	<!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Expedisi Pop +</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
		
		<a href="#" class="create-expedisi btn btn-primary">Tambah</a>
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Expedisi Home</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
			<tr>
         <th>No</th>
		<th>Kepada/Dari</th>
		<th>Kurir</th>
		<th>Resi</th>
		<th>Status</th>
		<th>Action</th>
            </tr>
			</thead>
			<tbody>
			<?php
            foreach ($expedisi_data as $expedisi)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $expedisi->kepada ?></td>
			<td><?php echo $expedisi->kurir ?></td>
			<td><?php echo $expedisi->resi ?></td>
			<td><?php echo $expedisi->status ?></td>
			<td style="text-align:center" width="200px">
			<a href="#" class="btn btn-primary detail-expedisi" data-id="<?php echo $expedisi->id_expedisi; ?>">
			<span class="fa fa-list-ul"></span>
			</a>
			
			
				<?php if($this->session->userdata('status')=="admin" or $this->session->userdata('status')=="hrd"){?>	
				 <a href="expedisi/update/<?php echo $expedisi->id_expedisi;?>" class="btn btn-success">
				 <span class="fa fa-pencil"></span>
				 </a>
				 <a onclick="javasciprt: return confirm('Yakin Menghapus ?')" href="expedisi/delete/<?php echo $expedisi->id_expedisi;?>" class="btn btn-danger">
				 <span class="fa fa-trash-o"></span>
				 </a>
				<?php } ?>
			</td>
		</tr>
                <?php
            }
            ?>
			</tbody>
        </table>
		<div class="row">
            <div class="col-md-6">
			<?php echo anchor(site_url('expedisi/excel'), 'Download Excel', 'class="btn btn-success"'); ?>
			<?php //echo anchor(site_url('expedisi/word'), 'Word', 'class="btn btn-primary"'); ?>
			</div>
        </div>
		
		</div>
		</div>
		</div>
    </body>
</html>
<!doctype html>
<html>
    <head>
        <title>Faktur</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
<!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Faktur</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>     

	
        <a href="#" class="create-faktur btn btn-primary">Tambah</a>
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Faktur</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow:scroll;">
			<table id="example2" class="table table-bordered table-striped">
            <thead>
			<tr>
				<th>No</th>
				<th>No Faktur</th>
				<th>Keterangan</th>
				<th>Dari</th>
				<th>Action</th>
            </tr>
			</thead>
			<tbody>
			<?php
            foreach ($faktur_data as $faktur)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $faktur->no_faktur ?></td>
			<td style="width:300px;"><?php echo $faktur->uraian ?></td>
			<td><?php echo $faktur->dari ?></td>
			<td>
            <a href="#" class="detail-faktur btn btn-primary" data-id="<?php echo $faktur->id_faktur ?>">
				<span class="fa fa-list-ul"></span>
			</a>
            <a href="#" class="cetak-faktur btn btn-default" data-id="<?php echo $faktur->id_faktur ?>">
				<span class="fa fa-download"></span>
			</a>
			
			
			<a href="faktur/update/<?php echo $faktur->id_faktur;?>" class="btn btn-success">
				<span class="fa fa-pencil"></span>
			</a>
			<a onclick="javasciprt: return confirm('Are You Sure ?')" href="faktur/delete/<?php echo $faktur->id_faktur;?>" class="btn btn-danger">
				<span class="fa fa-trash-o"></span>
			</a>
			</td>
		</tr>
                <?php
            }
            ?>
			</tbody>
        </table>
				<div class="row">
         <div class="col-md-6">
                
		<?php //echo anchor(site_url('faktur/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php //echo anchor(site_url('faktur/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                
            </div>
        </div>
        </div>
		</div>
		
		
		

    </body>
</html>
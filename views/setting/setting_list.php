<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
	                <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Setting</h4>
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
            <div class="col-md-4">
                <a href="#" class="create-setting btn btn-primary">Tambah</a>
            </div>
        </div>
		
		
		        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Surat Keluar</h3>
            </div>
            <!-- /.box-header -->



            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
		<thead>
            <tr>
                <th>No</th>
		<th>Nama Setting</th>
		<th>Status</th>
		<th>Action</th>
            </tr>
			</thead>
			<tbody>
			<?php
            foreach ($setting_data as $setting)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $setting->nama_setting ?></td>
			<td><strong><?php if($setting->status == '1'){ echo "<span style='color:#00c442;'>Buka</span>"; }else{ echo "<span style='color:#ff5555;'>Tutup</span>";} ?></strong></td>
			<td>
				<?php 
				echo "<a href='#' class='detail-setting btn btn-primary' data-id='$setting->id_setting'><span class='fa fa-list-ul'></span></a>";
				?>
				<?php 

				echo anchor(site_url('setting/update/'.$setting->id_setting),'<span class="fa fa-pencil"></span>','class="btn btn-success"'); 
				?>
				
				<?php
				//echo anchor(site_url('setting/delete/'.$setting->id_setting),'<span class="fa fa-trash-o"></span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')" class="btn btn-danger"'); 
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
		<?php //echo anchor(site_url('setting/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php //echo anchor(site_url('setting/word'), 'Word', 'class="btn btn-primary"'); ?>
	</div>
	</div>
	</div>
    </body>
</html>
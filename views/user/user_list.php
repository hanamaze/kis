<!doctype html>
<html>
    <head>
        <title>PT. Kualitas Indonesia Sistem</title>
        <link rel="stylesheet" href="<?php //echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
<!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">User</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>     

		<a href="#" class="create-user btn btn-primary">Tambah</a>
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">USERS</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
			<table id="example2" class="table table-bordered table-striped">
			<thead>
            <tr>
        <th>No</th>
		<th>Nama</th>
		<th>Username</th>
		<th>jabatan</th>
		<th>Foto</th>
		
		<th>Action</th>
            </tr>
			</thead>
			<tbody>
			<?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo md5_decrypt($user->nama); ?></td>
			<td><?php echo md5_decrypt($user->username) ?></td>
			<td><?php echo md5_decrypt($user->jabatan) ?></td>
			<td><?php echo md5_decrypt($user->foto) ?></td>
			
			<td>
			<a href="#" class="detail-user btn btn-primary" data-id="<?php echo $user->id_user ?>">
				<span class="fa fa-file"></span>
			</a>
			<!-- <a href="#" class="edit-user btn btn-success" data-id="<?php echo $user->id_user ?>">Edit</a> -->
			<a href="<?php echo base_url();?>user/update/<?php echo $user->id_user;?>" class="btn btn-success">
				<span class="fa fa-pencil"></span>
			</a>
			<a onclick="javasciprt: return confirm('Are You Sure ?')" href="<?php echo base_url();?>user/delete/<?php echo $user->id_user;?>" class="btn btn-danger">
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
		</div>

    </body>
</html>

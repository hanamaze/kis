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
                        <h4 class="modal-title" id="myModalLabel">Karyawan</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
		
		<a href="#" class="create-karyawan btn btn-primary">Tambah</a>
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Karyawan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
		<thead>
            <tr>
        <th>No</th>
		<th>Nama Karyawan</th>
		<th>Jabatan</th>
		<th>Foto</th>
		<th style="width:105px;">Action</th>
            </tr>
			</thead>
			<tbody>
			<?php
            foreach ($karyawan_data as $karyawan)
            {
                ?>
                <tr <?php if($karyawan->status_aktif == 0){ echo "style='background-color:red;'";}?> >
			<td><?php echo ++$start ?></td>
			<td><?php echo md5_decrypt($karyawan->nama_karyawan) ?></td>
			<td><?php echo md5_decrypt($karyawan->jabatan) ?></td>
			<td>
			<?php 
			if(md5_decrypt($karyawan->foto) != NULL){ 
				echo "<img width='50' src='foto_karyawan/".md5_decrypt($karyawan->foto)."' />";
			}else{ 
				echo "<img width='50' src='foto_karyawan/kosong.png' />"; 
			} ?></td>
			<td style="text-align:center" width="122">
			<a href="#" class="detail-karyawan btn btn-primary" data-id="<?php echo $karyawan->id_karyawan ?>">
				<span class="fa fa-list-ul"></span>
			</a>
			<?php if($this->session->userdata('status')=="admin" or $this->session->userdata('status')=="hrd"){?>	
			<a href="karyawan/update/<?php echo $karyawan->id_karyawan;?>" class="btn btn-success">
				<span class="fa fa-pencil"></span>
			</a>
			<a onclick="javasciprt: return confirm('Are You Sure ?')" href="karyawan/delete/<?php echo $karyawan->id_karyawan;?>" class="btn btn-danger">
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
		<?php //echo anchor(site_url('karyawan/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php //echo anchor(site_url('karyawan/word'), 'Word', 'class="btn btn-primary"'); ?>
			</div>
        </div>
		
		</div>
		</div>
		</div>
    </body>
</html>
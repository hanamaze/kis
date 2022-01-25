<!doctype html>
<html>
    <head>
        <title>SMK3 KIS</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 0px;
            }
        </style>
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
		<!-- Modal END -->

<!-- BUTTON TAMBAH MODAL - POPUP -->
		<a href="#" class="create-nomor_smk3 btn btn-primary">Tambah</a>
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Penomoran SMK3</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
			<tr>
                <th>No</th>
		<th>Nama Perusahaan</th>
		<th>No Laporan</th>
		<th>No Aplikasi</th>
		<th>No Ska</th>
		<th>Tgl Audit</th>
		<th>Pembawa</th>
		
		<th>Action</th>
        </tr>
			</thead>
			<tbody>
			<?php
            foreach ($nomor_smk3_data as $nomor_smk3)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $nomor_smk3->nama_perusahaan ?></td>
			<td><?php echo $nomor_smk3->no_laporan ?></td>
			<td><?php echo $nomor_smk3->no_aplikasi ?></td>
			<td><?php echo $nomor_smk3->no_ska ?></td>
			<td><?php echo $nomor_smk3->tgl_audit ?></td>
			<td><?php echo $nomor_smk3->pembawa ?></td>
			

			<td style="text-align:center" width="200px">
			<a href="#" class="btn btn-primary detail-nomor_smk3" data-id="<?php echo $nomor_smk3->id_nomorsmk3; ?>">
			<span class="fa fa-list-ul"></span>
			</a>
			
			
				<?php if($this->session->userdata('status')=="admin" or $this->session->userdata('status')=="hrd"){?>	
				 <a href="nomor_smk3/update/<?php echo $nomor_smk3->id_nomorsmk3;?>" class="btn btn-success">
				 <span class="fa fa-pencil"></span>
				 </a>
				 <a onclick="javasciprt: return confirm('Yakin Menghapus ?')" href="nomor_smk3/delete/<?php echo $nomor_smk3->id_nomorsmk3;?>" class="btn btn-danger">
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
			<?php  echo anchor(site_url('nomor_iso/excel'), 'Download Excel', 'class="btn btn-success"'); ?>
			<?php echo anchor(site_url('expedisi/word'), 'Word', 'class="btn btn-primary"'); ?>
			</div>
        </div>
		
		</div>
		</div>
		</div>
    </body>
</html>
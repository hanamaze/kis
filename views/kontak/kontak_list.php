<!doctype html>
<html>
    <head>
        <title>KONTAK</title>
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
		<a href="#" class="create-kontak btn btn-primary">Tambah</a>
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">KONTAK</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
			<tr>
             
                <th>No</th>
		<th>Nama Kontak</th>
		<th>Instansi</th>
		<th>No Hp1</th>
		<th>No Hp2</th>
		<th>Email 1</th>
		<th>Email 2</th>
		<th>Alamat 1</th>
		<th>Alamat 2</th>
		<th>Ket</th>
		<th>Action</th>
            </tr></thead>
			<tbody>
			<?php
            foreach ($kontak_data as $kontak)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kontak->nama_kontak ?></td>
			<td><?php echo $kontak->instansi ?></td>
			<td><?php echo $kontak->no_hp1 ?></td>
			<td><?php echo $kontak->no_hp2 ?></td>
			<td><?php echo $kontak->email_1 ?></td>
			<td><?php echo $kontak->email_2 ?></td>
			<td><?php echo $kontak->alamat_1 ?></td>
			<td><?php echo $kontak->alamat_2 ?></td>
			<td><?php echo $kontak->ket ?></td>
			<td style="text-align:center" width="200px">
            <a href="#" class="btn btn-primary detail-kontak" data-id="<?php echo $kontak->id_kontak; ?>">
			<span class="fa fa-list-ul"></span>
			</a>
			
			
				<?php if($this->session->userdata('status')=="admin" or $this->session->userdata('status')=="hrd"){?>	
				 <a href="kontak/update/<?php echo $kontak->id_kontak;?>" class="btn btn-success">
				 <span class="fa fa-pencil"></span>
				 </a>
				 <a onclick="javasciprt: return confirm('Yakin Menghapus ?')" href="kontak/delete/<?php echo $kontak->id_kontak;?>" class="btn btn-danger">
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
			<?php  echo anchor(site_url('kontak/excel'), 'Download Excel', 'class="btn btn-success"'); ?>
			<?php echo anchor(site_url('kontak/word'), 'Word', 'class="btn btn-primary"'); ?>
			</div>
        </div>
		
		</div>
		</div>
		</div>
    </body>
</html>
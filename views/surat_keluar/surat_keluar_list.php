
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
                        <h4 class="modal-title" id="myModalLabel">Surat Keluar</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>  
             
		<a href="#" class="create-keluar btn btn-primary">Tambah</a>

        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Surat Keluar</h3>
            </div>
            <!-- /.box-header -->
			<br>
<form method="post">
             <table>
             <tr>
                 <td>
                 <select class="form-control" name="sortir">
                    <?php 
                    $kd = $this->db->query('SELECT * FROM kategori_surat WHERE keterangan != "SKL"')->result();

                    foreach($kd as $k){
						$kk = md5_encrypt($k->keterangan);
						if($kk == "SKL"){
							echo '<option value=""></option>';
						}else{
							echo '<option value="'.md5_encrypt($k->kode).'">'.$k->keterangan.'</option>';
						}
						
                    }
                    ?>

                 </select>
                 </td>
                 <td><input type="submit" name="submit" class="btn btn-primary" value="SORTIR"></td>
             </tr>
            
            
            </table>
            </form>


            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
		<thead>
            <tr>
                <th>No</th>
		<th>No Surat</th>
		<th>Tanggal</th>
		<th>Keperluan</th>
		<th style="width:120px;">Action</th>
            </tr>
			</thead>
			<tbody>
			<?php
            foreach ($surat_keluar_data as $surat_masuk_keluar)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo md5_decrypt($surat_masuk_keluar->no_surat); ?></td>
			<td><?php echo $surat_masuk_keluar->tanggal; ?></td>
			
			<?php 
					$cek = strlen($surat_masuk_keluar->deskripsi);
					$pl = $surat_masuk_keluar->deskripsi;
					$ps = $surat_masuk_keluar->keterangan;
					$plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$pl'")->row();
					$pst = $this->db->query("SELECT * FROM peserta WHERE id_peserta='$ps'")->row();
					
						if($cek <= 5){
							
							echo "<td style='background-color:#f6ff7e;'>SKL ".md5_decrypt($plt->nama_pelatihan)."<br>(";
							echo md5_decrypt($pst->nama_peserta).$plt.")</td>";
						}else{
							echo "<td>".md5_decrypt($surat_masuk_keluar->deskripsi)."</td>"; 
						}
						
			?>
			<td>
				<?php 
				echo "<a href='#' class='detail-keluar btn btn-primary' data-id='$surat_masuk_keluar->id_surat)'><span class='fa fa-list-ul'></span></a>";
				if($this->session->userdata('id')==$surat_masuk_keluar->id_user OR $this->session->userdata('status')=="admin"){
				//echo anchor(site_url('surat_keluar/read/'.,'Read'); 
				?>
				
				<a href="<?php echo base_url();?>surat_keluar/update/<?php echo $surat_masuk_keluar->id_surat;?>" class="btn btn-success">
				<span class="fa fa-pencil"></span>
			</a>
			<a onclick="javasciprt: return confirm('Are You Sure ?')" href="<?php echo base_url();?>surat_keluar/delete/<?php echo $surat_masuk_keluar->id_surat;?>" class="btn btn-danger">
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
		<div class="row">
         <div class="col-md-6">
                
		<?php //echo anchor(site_url('surat_keluar/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php //echo anchor(site_url('surat_keluar/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                
            </div>
        </div>
		</div>
		</div>
		</div>
        
    </body>
</html>
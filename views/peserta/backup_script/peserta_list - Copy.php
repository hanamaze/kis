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
                        <h4 class="modal-title" id="myModalLabel">Peserta</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div> 
		<?php if($this->uri->segment('3') != NULL){
			$id = $this->uri->segment('3');
			
			$judul = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
			//echo $judul->nama_pelatihan;
			?>
			

			
			<?php
		}
		?>
		<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h4><?php echo md5_decrypt($judul->nama_pelatihan);?></h4>
              <p><?php echo md5_decrypt($judul->tempat);?></p>
				
              
            </div>
            <div class="icon">
              <i class="fa fa-child"></i>
            </div>
            <a href="#" class="small-box-footer detail-pelatihan2" data-id="<?php echo $judul->id_pelatihan; ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>Sertifikat</h4>

              <p>Mencetak Semua Sertifikat </p>
            </div>
            <div class="icon">
              <i class="fa fa-file-pdf-o"></i>
            </div>
            <a href="#" class="small-box-footer">Cetak <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Id Card</h4>

              <p>Mencetak Semua Id Card Peserta</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-pdf-o"></i>
            </div>
            <a href="<?php echo base_url("peserta/cetak_idcard/".$judul->id_pelatihan);?>" class="small-box-footer">Cetak <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>SKL</h4>

              <p>Mencetak Semua SKL Peserta</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-pdf-o"></i>
            </div>
            <a href="<?php echo base_url("peserta/cetak/".$judul->id_pelatihan);?>" class="small-box-footer">Cetak <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		

      </div>
		
		
		
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
				<a href="#" class="create-peserta btn btn-primary" data-id="<?php echo $judul->id_pelatihan;?>">Tambah</a>
                
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
               
            </div>
        </div>
		
		<div class="col-md-6">
		<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Peserta</h3>
            </div>
            
            <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
			<thead>
            <tr>
                <th>No</th>
		<th>Nama Peserta</th>
		<!-- <th>Perusahaan</th> -->
		<th>Action</th>
            </tr></thead><tbody><?php
            foreach ($peserta_data as $peserta)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			 <td><?php echo md5_decrypt($peserta->nama_peserta) ?></td>
			<!--<td><?php echo md5_decrypt($peserta->perusahaan) ?></td> -->

			<td>
				
				<a href="#" class="detail-peserta btn btn-primary" data-id="<?php echo $peserta->id_peserta ?>">
				 <span class="fa fa-list-ul"></span>
				 </a>
				 <?php if($this->session->userdata('status')=="admin" OR $this->session->userdata('nama')==md5_encrypt("wardah") OR $this->session->userdata('nama')== md5_encrypt("uswatun")){?>
				 <a href="<?php echo base_url();?>peserta/update/<?php echo $peserta->id_peserta;?>" class="btn btn-success">
				 <span class="fa fa-pencil"></span>
				 </a>
				 <a onclick="javasciprt: return confirm('Are You Sure ?')" href="<?php echo base_url();?>peserta/delete/<?php echo $peserta->id_peserta."/".$peserta->id_pelatihan;?>" class="btn btn-danger">
				 <span class="fa fa-trash-o"></span>
				 </a>
				 <?php } ?>
			</td>
		</tr>
                <?php
            }
            ?></tbody>
        </table>
		<?php //echo anchor(site_url('peserta/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php //echo anchor(site_url('peserta/word'), 'Word', 'class="btn btn-primary"'); ?>
		</div>
		</div>
		</div>
		
		
		<?php 
		
		$plthn = $this->db->query("SELECT * FROM progress_pelatihan WHERE id_pelatihan='$judul->id_pelatihan'")->row();
		if($plthn==NULL){
			
		}
		?>
		
	<div class=" col-md-6">
		  <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Progress</h3>
            </div>
            
            <div class="box-body">
			
			
			<?php $pp = $this->db->query("SELECT * FROM progress_pelatihan WHERE id_pelatihan='$judul->id_pelatihan'")->row(); 
			
			if($pp != NULL){
				$a = $pp->progress;
			?>
			<ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-purple">
                    Urutan Prosedur Setiap Pelatihan
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-send-o bg-white"></i>

              <div class="timeline-item">
               
                <h3 class="timeline-header"><a href="#">Persiapan</a> </h3>
				<?php if($a==1){?>
                <div class="timeline-body">
<table width="312" border="0">
  <tr>
    <td colspan="4">Yang Perlu Disiapkan:</td>
    </tr>
  <tr>
    <td width="27">1.</td>
    <td colspan="2"><input type="checkbox" name="input12"> Id Card</td>
    <td width="45"></td>
  </tr>
  <tr>
    <td>2.</td>
    <td colspan="2"><input type="checkbox" name="input11"> Kalung</td>
    <td></td>
  </tr>
  <tr>
    <td>3.</td>
    <td colspan="2"><input type="checkbox" name="input10"> Kaos</td>
    <td></td>
  </tr>
  <tr>
    <td>4.</td>
    <td colspan="2"><input type="checkbox" name="input9"> Blocknote </td>
    <td></td>
  </tr>
  <tr>
    <td>5.</td>
    <td colspan="2"><input type="checkbox" name="input8"> Pin Safety</td>
    <td></td>
  </tr>
  <tr>
    <td>6.</td>
    <td colspan="2"><input type="checkbox" name="input7"> Bolpen</td>
    <td></td>
  </tr>
  <tr>
    <td>7.</td>
    <td colspan="2"><input type="checkbox" name="input6"> Tas</td>
    <td></td>
  </tr>
  <tr>
    <td>8.</td>
    <td colspan="2"><input type="checkbox" name="input5"> Modul/Undang2</td>
    <td></td>
  </tr>
  <tr>
    <td>9.</td>
    <td colspan="2"><input type="checkbox" name="input4"> APD</td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="24">- </td>
    <td width="171"><input type="checkbox" name="input3"> Helm</td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>- </td>
    <td><input type="checkbox" name="input2"> Rompi</td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>-</td>
    <td><input type="checkbox" name="input"> Masker</td>
    <td></td>
  </tr>
</table>

                </div>
                <div class="timeline-footer">
                  <a class="btn btn-success btn-xs">  Simpan Perubahan <i class="fa fa-check-square-o"></i></a>
                  <a class="btn btn-primary btn-xs">  Step Selanjutnya <i class="fa fa-chevron-circle-down"></i></a>
				  
                </div>
				
				<?php } ?>
              </div>
            </li>
            <!-- END timeline item -->
			            <!-- timeline item -->
            <li>
              <i class="fa fa-group bg-yellow"></i>

              <div class="timeline-item">
               
                <h3 class="timeline-header"><a href="#">Waktu Pelatihan</a> </h3>
				<?php if($a==2){?>
                <div class="timeline-body">
                  Yang Perlu Disiapkan
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Step Selanjutnya</a>
				  
                </div>
				<?php } ?>
              </div>
            </li>
            <!-- END timeline item -->
			            <!-- timeline item -->
            <li>
              <i class="fa fa-file-word-o bg-blue"></i>

              <div class="timeline-item"> <!-- style="background-color:#f9ff09; border:1px solid blue" --> 
                
                <h3 class="timeline-header"><a href="#">Pembuatan Laporan</a> </h3>
				<?php if($a==3){?>
                <div class="timeline-body">
                  Yang Perlu Disiapkan:<br>
				  1. Laporan <br>
				  2. SKL <br>
				  3. Ijazah <br>
				  4. Exell <br>
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Step Selanjutnya</a>
				  
				  
                </div>
				<?php } ?>
              </div>
            </li>
            <!-- END timeline item -->
			            <!-- timeline item -->
            <li>
              <i class="fa fa-hourglass-1 bg-red"></i>

              <div class="timeline-item">
               
                <h3 class="timeline-header"><a href="#">Konfirmasi</a> </h3>
				<?php if($a==4){?>
                <div class="timeline-body">
                  Yang Perlu Disiapkan
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Step Selanjutnya</a>
				  
                </div>
				<?php } ?>
              </div>
            </li>
            <!-- END timeline item -->
			<!-- timeline item -->
            <li>
              <i class="fa  fa-check-square-o bg-green"></i>

              <div class="timeline-item">
                
                <h3 class="timeline-header"><a href="#">Selesai</a> </h3>
				<?php if($a==5){?>
				<div class="timeline-body">
                  Pelatihan sudah selesai semua data bisa didownload.
                </div>

                </div>
				<?php } ?>
              </div>
            </li>
            <!-- END timeline item -->

			<?php }else{
				$this->db->query("INSERT INTO progress_pelatihan(id_pelatihan,progress)VALUES('$judul->id_pelatihan','1')");
			} ?>
           
          </ul>
			
			
			
			
			
			</div>
			</div>
			</div>


        </div>
		
		
    </body>
</html>
<script>
		$(function(){
            $(document).on('click','.create-peserta',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('index.php/peserta/create');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
</script>

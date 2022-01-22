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
		}
		?>
		<br>
		<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h4>Sertifikat</h4>

              <p>Data Sertifikat Semua Peserta</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-pdf-o"></i>
            </div>
            <a href="#" class="small-box-footer cetak_sertifikat" data-id="<?php echo $judul->id_pelatihan;?>">Download <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>SKL</h4>

              <p>Data SKL Semua Peserta</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-pdf-o"></i>
            </div>
            <a href="#" class="small-box-footer cetak_skl" data-id="<?php echo $judul->id_pelatihan;?>">Download <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
		 <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>DATA</h4>

              <p>Data Semua Peserta </p>
            </div>
            <div class="icon">
              <i class="fa fa-file-pdf-o"></i>
            </div>
            <a href="#" class="small-box-footer choose_excel" data-id="<?php echo $judul->id_pelatihan;?>">Download <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		 <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>ID Card</h4>

              <p>ID Card Semua Peserta</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-pdf-o"></i>
            </div>
            <a href="#" class="small-box-footer absen_idcard" data-id="<?php echo $judul->id_pelatihan;?>" >Download <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		

		
		

      
		
		
		
        	
            <div class="col-md-6 text-left">
				<a  href="#" class="create-peserta btn btn-primary" data-id="<?php echo $judul->id_pelatihan;?>">Tambah</a>
            </div>
            <div class="col-md-6 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>

        
		
		<div class="col-md-7">
		<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Peserta</h3>
            </div>
            






            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
			<thead>
            <tr>
                <th>No</th>
		<th>ID</th>
		<th>Nama Peserta</th>
		<?php if($this->session->userdata('id')=="1" OR $this->session->userdata('id')=="2" OR $this->session->userdata('id')=="3" OR $this->session->userdata('id')=="8" OR $this->session->userdata('status')=="admin"){ ?>
		<th>Pembayaran</th>
		<?php } ?>
		<th>Action</th>
            </tr>
			</thead>
			<tbody><?php
			$start=0;
            foreach ($peserta_data as $peserta)
            {
                ?>
                <tr>
			<td <?php if($peserta->sertifikat != NULL){ echo "style='background-color:#01ff67;'"; }?>><?php echo ++$start ?></td>
			 <td <?php if($peserta->sertifikat != NULL){ echo "style='background-color:#01ff67;'"; }?>><?php echo $peserta->id_peserta; ?></td>
			 <td <?php if($peserta->sertifikat != NULL){ echo "style='background-color:#01ff67;'"; }?>><?php echo md5_decrypt($peserta->nama_peserta) ?></td>
			 <?php if($this->session->userdata('id')=="1" OR $this->session->userdata('id')=="2" OR $this->session->userdata('id')=="3" OR $this->session->userdata('id')=="8" OR $this->session->userdata('status')=="admin"){ ?>
			 <td <?php if($peserta->sertifikat != NULL){ echo "style='background-color:#01ff67;'"; }?>>
			 <?php
				if($peserta->pembayaran=="lunas"){ ?>
					<a onclick="javascript: return confirm('Are You Sure ?')" class='btn btn-success' href='<?php echo base_url() ?>peserta/pembayaran/<?php echo $peserta->id_peserta ?>'>Lunas</a>
				<?php }else{ ?>
					<a onclick="javascript: return confirm('Are You Sure ?')" class='btn btn-danger' href='<?php echo base_url() ?>peserta/pembayaran/<?php echo $peserta->id_peserta ?>'>Belum Lunas</a>
				<?php } ?>
			 </td>
			 <?php } ?>
			<td <?php if($peserta->sertifikat != NULL){ echo "style='background-color:#01ff67;'"; }?>>
        <?php if($this->session->userdata('status')=="admin" OR $this->session->userdata('id')== 6 OR $this->session->userdata('id')== 13 OR $this->session->userdata('id')== 19 OR $this->session->userdata('id')== 20 OR $this->session->userdata('id')== 17){?>
				<a href="#" class="sertifikat-peserta btn btn-info" data-id="<?php echo $peserta->id_peserta; ?>">
        
				 <span class="fa  fa-upload"></span>
				 </a>
         <?php } ?>
				<a href="#" class="detail-peserta btn btn-primary" data-id="<?php echo $peserta->id_peserta ?>">
				 <span class="fa fa-list-ul"></span>
				 </a>
				 <?php if($this->session->userdata('status')=="admin" OR $this->session->userdata('id')==6 OR $this->session->userdata('id')== 13 OR $this->session->userdata('id')== 19 OR $this->session->userdata('id')== 20 OR $this->session->userdata('id')== 17){?>
				 <a href="<?php echo base_url();?>peserta/update/<?php echo $peserta->id_peserta;?>" class="btn btn-success">
				 <span class="fa fa-pencil"></span>
				 </a>
				 <a onclick="javascript: return confirm('Are You Sure ?')" href="<?php echo base_url();?>peserta/delete/<?php echo $peserta->id_peserta."/".$peserta->id_pelatihan;?>" class="btn btn-danger">
				 <span class="fa fa-trash-o"></span>
				 </a>
				 <?php } ?>
			</td>
		</tr>
                <?php
            }
            ?></tbody>
        </table>
		</div>
		
		</div>
		</div>
		</div>
		
		
		
		<?php 
		
		$plthn = $this->db->query("SELECT * FROM progress_pelatihan WHERE id_pelatihan='$judul->id_pelatihan'")->row();
		if($plthn==NULL){
			
		}
		?>
		
	<div class=" col-md-5">
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
                    TAHAPAN 
                  </span>
            </li>
            <!-- /.timeline-label -->
			
			            <!-- timeline item -->
            <li>
              <i class="fa fa-file-word-o bg-blue"></i>

              <div class="timeline-item"> <!-- style="background-color:#f9ff09; border:1px solid blue" --> 
                
                <h3 class="timeline-header"><a href="#" <?php if($a==1){ echo "style='font-size:30px;'"; } ?>>Pembuatan Laporan</a> </h3>
				
                <div class="timeline-body"  <?php if($a==1){ echo "style='font-size:18px;'"; } ?>>
                  
                  <table width="456" height="152" border="0">
				    <tr>
				      <td width="34">1.</td>
				      <td width="273">Laporan </td>
				      <td width="135">&nbsp;</td>
			        </tr>
				    <tr>
				      <td>2.</td>
				      <td>SKL </td>
				      <td>&nbsp;</td>
			        </tr>
				    <tr>
				      <td>3.</td>
				      <td>Sertifikat </td>
				      <td>&nbsp;</td>
			        </tr>
				    <tr>
				      <td >4.</td>
				      <td>Excell </td>
				      <td>&nbsp;</td>
			        </tr>
					<tr>
				      <td >5.</td>
				      <td>Absen </td>
				      <td>&nbsp;</td>
			        </tr>
			      </table>
                </div>
                <div class="timeline-footer">
				  <?php if($a==1){  ?>
                  <a class="btn btn-success btn-xs" href="<?php echo base_url()."peserta/step/".$judul->id_pelatihan."/1" ?>">  Selesai <i class="fa fa-check-square-o"></i></a>
				  <?php } ?>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
			            <!-- timeline item -->
            <li>
              <i class="fa fa-hourglass-1 bg-red"></i>

              <div class="timeline-item">
               
                <h3 class="timeline-header"><a href="#" <?php if($a==2){ echo "style='font-size:30px;'"; } ?>>Konfirmasi</a> </h3>
				
                <div class="timeline-body" <?php if($a==2){ echo "style='font-size:18px;'"; } ?>>
                  <table width="408" height="108" border="0">
  <tr>
    <td width="33">1.</td>
    <td>
	<div style="padding:5px; border-radius:3px; color:white; background-color:<?php if($pp->approve_1==0){ echo "#ff3f5a";}else{ echo "#2bff5d"; }?>;" width="274">
	Singgih Budiyono,SH.,MKn
	</div>
	</td>
    <td width="107">
	<?php 
	if($pp->approve_1==0 AND $this->session->userdata('id')==2){ 
		echo "<a class='btn btn-primary' href='".base_url()."peserta/approve/".$judul->id_pelatihan."/1'>konfirmasi</a>"; 
	}
	?>
	</td>
  </tr>
  <tr>
    <td>2.</td>
    <td>
	<div style="padding:5px; border-radius:3px; color:white; background-color:<?php if($pp->approve_2==0){ echo "#ff3f5a";}else{ echo "#2bff5d"; }?>;">
	Senen Hadi Saputro
	</div>
	</td>
    <td>
	<?php 
	if($pp->approve_2==0 AND $this->session->userdata('id')==3){
		echo "<a class='btn btn-primary' href='".base_url()."peserta/approve/".$judul->id_pelatihan."/2'>konfirmasi</a>"; }
	?>
	</td
  </tr>
  <tr>
    <td>3.</td>
    <td>
	<div style="padding:5px; border-radius:3px; color:white; background-color:<?php if($pp->approve_3==0){ echo "#ff3f5a";}else{ echo "#2bff5d"; }?>;">
	Aprilia Putri Suhardini,SH., MKn
	</div>
	</td>
    <td>
	<?php 
	if($pp->approve_3==0 AND $this->session->userdata('id')==1){ 
		echo "<a class='btn btn-primary' href='".base_url()."peserta/approve/".$judul->id_pelatihan."/3'>konfirmasi</a>"; 
	}
	?>
	</td>
  </tr>
</table>

				  
                </div>
                <div class="timeline-footer">
				<?php if($a==2){  ?>
				  <a class="btn btn-success btn-xs" href="<?php echo base_url()."peserta/step/".$judul->id_pelatihan."/2" ?>">  Selesai <i class="fa fa-check-square-o"></i></a>
				<?php } ?>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
			<!-- timeline item -->
            <li>
              <i class="fa  fa-check-square-o bg-green"></i>

              <div class="timeline-item">
                
                <h3 class="timeline-header"><a href="#"  <?php if($a==3){ echo "style='font-size:30px;'"; } ?>>Selesai</a> </h3>
				<div class="timeline-body" <?php if($a==3){ echo "style='font-size:18px;'"; } ?>>
                  Pelatihan sudah selesai semua data bisa didownload.
                </div>

                </div>
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

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
                        <h4 class="modal-title" id="myModalLabel">Pelatihan</h4>
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
				  <a href="#" class="create-pelatihan btn btn-primary">Tambah</a>
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
		<div class="box box-primary col-md-7">
		
		
            <div class="box-header">
              <h3 class="box-title">Pelatihan</h3>
            </div>
            
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
			<thead>
        <tr>
        <th>#</th>
		<th>Nama Pelatihan</th>
		<th>Peserta</th>
		<th style="width:150px;">Action</th>
            </tr></thead><tbody><?php
            foreach ($pelatihan_data as $pelatihan)
            {
			$jml = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$pelatihan->id_pelatihan'")->num_rows();
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td>
			<?php echo md5_decrypt($pelatihan->nama_pelatihan); ?>
			<br>
			<span class="badge bg-light-blue">
			<?php 
      $newDate1 = date("d M", strtotime($pelatihan->tanggal_mulai));
      $newDate2 = date("d M Y", strtotime($pelatihan->tanggal_selesai));

      echo $newDate1." - ".$newDate2; ?>
			</span>
			<br>
			<?php if($pelatihan->keluar_sertifikat == NULL){?>
			<span class="badge bg-red">Sertifikat Belum Keluar
			</span>
			<?php }else{ ?>
			<span class="badge bg-green">Sertifikat Sudah Keluar
			</span>
			<?php } ?>
			</td>
			<td><?php echo $jml; ?> org</td>
			<td width="122">
				<a href="<?php echo base_url("peserta/pelatihan/".$pelatihan->id_pelatihan);?>" class="btn btn-info">
				 <span class="fa fa-cogs"></span>
				 </a>
				 <a href="#" class="detail-pelatihan btn btn-primary" data-id="<?php echo $pelatihan->id_pelatihan ?>">
				 <span class="fa fa-list-ul"></span>
				 </a>
         <?php if($this->session->userdata('id')==7){?>
          <a href="pelatihan/update/<?php echo $pelatihan->id_pelatihan;?>" class="btn btn-success">
         <span class="fa fa-pencil"></span>
         </a>
         <?php } ?>
			<?php if($this->session->userdata('status')=="admin" OR $this->session->userdata('id')==6 OR $this->session->userdata('id')== 13 OR $this->session->userdata('id')== 17 OR $this->session->userdata('id')== 19 OR $this->session->userdata('id')== 20){?>	 
				 <a href="pelatihan/update/<?php echo $pelatihan->id_pelatihan;?>" class="btn btn-success">
				 <span class="fa fa-pencil"></span>
				 </a>
				 <a onclick="javasciprt: return confirm('Are You Sure ?')" href="pelatihan/delete/<?php echo $pelatihan->id_pelatihan;?>" class="btn btn-danger">
				 <span class="fa fa-trash-o"></span>
				 </a>
			<?php }  ?>
			</td>
		</tr>
      <?php } ?>
      </tbody>
        </table>
		</div>
		<?php //echo anchor(site_url('pelatihan/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php //echo anchor(site_url('pelatihan/word'), 'Word', 'class="btn btn-primary"'); ?>
		</div>
		</div>
	
<div class="col-md-5">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
			<div class="nav-tabs-custom">
            <!-- Tabs within a box -->
			
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#sales-chart" data-toggle="tab">Chart</a></li>
              <li><a href="#revenue-chart" data-toggle="tab">Statistik</a></li>
              <li><a href="#persentase" data-toggle="tab">Persentase</a></li>
            </ul>
			
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="sales-chart">
			  <center>
			  <div style="width:300px; ">
			  <?php $total_p = $this->db->get('peserta')->num_rows();?>
			  <span class="badge bg-light-blue">Total Semua Peserta Pelatihan: <?php echo $total_p;?></span>
			  <br>
			  <br>
			  <canvas id="chart-area" width="300" height="300"/>
				</div>
				</center>
            <!-- /.box-body -->
			  
			  </div>
              <div class="chart tab-pane" id="revenue-chart">
			   
			  </div>
			  <div class="chart tab-pane" id="persentase">
			   <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
                  <th>Kategori</th>
                  <!-- <th>Progress</th> -->
                  <th style="width: 40px">Label</th>
                </tr>
				</thead>
				<tbody>
				
				<?php 
			$kategori = $this->db->query("SELECT * FROM kategori_pelatihan")->result();
		foreach($kategori as $p2_data){

			$id_k =  $p2_data->id_kategori_pelatihan;
			$persen = $this->Pelatihan_model->persen($id_k);
			$total = $total_peserta;  
			?>
                <tr>
                  <td><?php echo $p2_data->nama_kategori; ?></td>

                  <td><span class="badge bg-light-blue"><?php echo round(($persen/$total) * 100,1);?>%</span></td>
                </tr>
		<?php } ?>
              </tbody>
			  </table>
		  
			  </div>
            </div>
          </div>
		  
            </div>
			
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box -->
        </div>

    </body>
</html>
<script>
		$(function(){
            $(document).on('click','.create-pelatihan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('index.php/pelatihan/create');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
</script>

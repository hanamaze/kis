
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $s_masuk; ?></h3>

              <p>Surat Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="<?php echo base_url('surat_masuk')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $s_keluar; ?></h3>

              <p>Surat Keluar</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-reply"></i>
            </div>
            <a href="<?php echo base_url('surat_keluar/tahun/2022')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $total_p; ?></h3>

              <p>Peserta</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo base_url('karyawan')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $pelatihan; ?></h3>

              <p>Pelatihan</p>
            </div>
            <div class="icon">
              <i class="fa fa-child"></i>
            </div>
            <a href="<?php echo base_url('pelatihan')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
	  
	  <div class="col-md-6">

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Chart Pelatihan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
			<center>
			  <span class="badge bg-light-blue">Total Semua Peserta Pelatihan: <?php echo $total_p;?></span>
			  <br>
			  <br>
			<canvas id="chart-area" width="300" height="300"/>
			</center>
		  
            </div>
            </div>
			
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		
	  <div class="col-md-6">
	    <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Masa Perpanjangan Sertifikat</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
			<div class="box-body" style="overflow:scroll;">
		<table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
                  <th>#</th>
                  <th>Pelatihan</th>
                  <th>Habis</th>
                  <!-- <th>Progress</th> -->
                  <th style="width: 40px">Perpanjangan</th>
                </tr>
				</thead>
				<tbody>
				
				<?php 
			$a =1;
			foreach($data as $dt){
			if($dt->keluar_sertifikat != NULL OR $dt->keluar_sertifikat != 0){
				$tanggal = $dt->keluar_sertifikat;
				$date = date('d-m-Y');
				$bulan_hari = ($tanggal[0].$tanggal[1].$tanggal[2].$tanggal[3].$tanggal[4].$tanggal[5]);
				$tahun = (int)($tanggal[6].$tanggal[7].$tanggal[8].$tanggal[9])+3;
				$tenggang = $bulan_hari.$tahun;
				$diff  = date_diff(date_create($date),date_create($tenggang));
			?>
                <tr>
                  <td><?php echo $a++; ?></td>
                  <td><?php echo md5_decrypt($dt->nama_pelatihan); ?></td>
                  <td><?php echo $tenggang; ?></td>
				  <?php if($diff->y == 0 AND $diff->m == 0){?>
                  <td><span class="badge bg-red"><?php echo $diff->y." Tahun ".$diff->m." Bulan ";?></span></td>
					<?php }elseif($diff->y == 0 AND $diff->m <= 3){ ?>
					<td><span class="badge bg-yellow"><?php echo $diff->y." Tahun ".$diff->m." Bulan ";?></span></td>
					<?php }else{ ?>
					<td><span class="badge bg-light-blue"><?php echo $diff->y." Tahun ".$diff->m." Bulan ";?></span></td>
					<?php } ?>
                </tr>
			<?php } 
			}?>
              </tbody>
			  </table>
			  </div>
			  </div>
            </div>
          </div>
	  
	  </div>
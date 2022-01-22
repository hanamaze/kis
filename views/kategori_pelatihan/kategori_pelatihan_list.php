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
                        <h4 class="modal-title" id="myModalLabel">Kategori_pelatihan</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div> 
		
		

		<div class="col-md-6">
		<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">PERPANJANGAN</h3>
            </div>
            
            <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
			<thead>
            <tr>
                <th>No</th>
		<th>Nama Kategori</th>
		<th>Jumlah</th>
		<th>Action</th>
            </tr></thead><tbody><?php
            foreach ($kategori_pelatihan_data as $kategori_pelatihan)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $kategori_pelatihan->nama_kategori ?></td>
			<td><?php 
			$a = $this->db->query("SELECT * FROM perpanjangan WHERE id_kategori_pelatihan='".$kategori_pelatihan->id_kategori_pelatihan."'")->num_rows();
			echo "<center>".$a."</center>";
			?>
			</td>
			<td>
			
			<a href="<?php echo base_url('perpanjangan/data/');?><?php echo $kategori_pelatihan->id_kategori_pelatihan ?> " class="btn btn-primary" data-id="">Perpanjangan 
			<span class="fa fa-arrow-circle-right"></span></a>
			
				 <!-- <a href="#" class="detail-kategori_pelatihan btn btn-primary" data-id="<?php echo $kategori_pelatihan->id_kategori_pelatihan ?>">Detail</a> -->
			<?php
				//echo anchor(site_url('kategori_pelatihan/update/'.$kategori_pelatihan->id_kategori_pelatihan),'Update', 'class="btn btn-success"'); 
				//echo anchor(site_url('kategori_pelatihan/delete/'.$kategori_pelatihan->id_kategori_pelatihan),'Delete','class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?></tbody>
        </table>
		</div>
		</div>
        <div class="row">
            <div class="col-md-6">
                
		<?php //echo anchor(site_url('kategori_pelatihan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php //echo anchor(site_url('kategori_pelatihan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
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
			$data = $this->db->query("SELECT * FROM pelatihan")->result();
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
    </body>
</html>
<script>
		$(function(){
            $(document).on('click','.create-kategori_pelatihan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('index.php/kategori_pelatihan/create');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
</script>

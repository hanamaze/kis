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
		<?php $ss = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id_pelatihan'")->row();
			echo "<center><h1>".$ss->nama_pelatihan."</h1></center>";
		?>
		
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
				<a href="#" class="create-peserta btn btn-primary">Tambah</a>
                
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
		<div class="box box-primary col-md-6">
            <div class="box-header">
              <h3 class="box-title">Peserta</h3>
            </div>
            
            <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
			<thead>
            <tr>
                <th>No</th>
		<th>Nama Peserta</th>
		<th>Perusahaan</th>
		<th>Action</th>
            </tr></thead><tbody><?php
            foreach ($peserta_data as $peserta)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php echo $peserta->nama_peserta ?></td>
			<td><?php echo $peserta->perusahaan ?></td>
			<td>
				 <a href="#" class="detail-peserta btn btn-primary" data-id="<?php echo $peserta->id_peserta ?>">
				 <span class="fa fa-file"></span>
				 </a>
				 <a href="<?php echo base_url();?>peserta/update/<?php echo $ss->id_pelatihan."/".$peserta->id_peserta;?>" class="btn btn-success">
				 <span class="fa fa-pencil"></span>
				 </a>
				 <a onclick="javasciprt: return confirm('Are You Sure ?')" href="<?php echo base_url();?>peserta/delete/<?php echo $ss->id_pelatihan."/".$peserta->id_peserta;?>" class="btn btn-danger">
				 <span class="fa fa-trash-o"></span>
				 </a>
			</td>
		</tr>
                <?php
            }
            ?></tbody>
        </table>
		<?php echo anchor(site_url('peserta/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('peserta/word'), 'Word', 'class="btn btn-primary"'); ?>
		</div>
		</div>





<div class="col-md-6">

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Perusahaan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height: 267px; width: 534px;" width="534" height="267"></canvas>
            </div>
			
			<div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
                  <th>Perusahaan</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                  <th style="width: 40px">Peserta</th>
                </tr>
				</thead>
				<tbody>
				<?php 
				$ps22 = $this->db->query("SELECT DISTINCT perusahaan FROM peserta")->result();
			foreach($ps22 as $p22){
				$pst22 = $this->db->query("SELECT * FROM peserta WHERE perusahaan='$p22->perusahaan'")->num_rows();
				$pst221 = $this->db->query("SELECT * FROM peserta")->num_rows();
			?>

                <tr>
                  <td><?php echo $p22->perusahaan; ?></td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width:<?php echo round(($pst22/$pst221)*100,1); ?>%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue"><?php echo round(($pst22/$pst221)*100,1); ?>%</span></td>
				  <td><?php echo $pst22; ?></td>
                </tr>
		<?php } ?>
              </tbody>
			  </table>
            </div>
			
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
		  


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

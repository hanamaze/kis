<?php 
  $id = $this->session->userdata('id'); 
  $user = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();
  //include "cryptz.php";
?>
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
                        <h4 class="modal-title" id="myModalLabel">Job Harian</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div> 
		
		

		
		
		
		    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <center><h4 class="box-title">Job Hari Ini </h4></center>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="">
			  <a href="#" class="create-job_harian btn btn-primary" style="width:100%;"><span class="fa fa-plus"></span> Tambah Job</a><br><br><br>
			  <?php
			$a = 1;
            foreach ($job_harian_data as $job_harian)
            {
                ?>
                <div class="external-event bg-yellow"><a style="color:white;" href="#" class="detail-job_harian" data-id="<?php echo $job_harian->id_job_harian ?>"><?php echo $a++.". ".$job_harian->uraian ?></a></div>
               <br>
			   <?php
            }
            ?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->

<?php if($user->id_user==1 OR $user->id_user==2 OR $user->id_user==3 OR $user->id_user==4 OR $user->id_user==12){?>
          <div class="box box-solid">
            <div class="box-header with-border">
              <center><h4 class="box-title">Lihat Job Karyawan </h4></center>
            </div>
            <div class="box-body">
              <!-- the events -->
              <form method="POST">
                <select name="cari" class="form-control">
                  <?php $a = $this->db->get('user')->result();
                  foreach($a as $aa){
                  ?>
                  <option value="<?php echo $aa->id_user; ?>" <?php if($aa->id_user==$job_user->id_user){ echo " selected";}?>><?php echo md5_decrypt($aa->nama); ?></option>
                  <?php } ?>

                </select>
                
                <input type="submit" name="submit" value="Tampilkan" class="btn btn-success" style="width:100%;">
              </form>
              <br>

              <?php
                $a = 1;
                if($job_count != NULL){
                  echo "<strong><center>".md5_decrypt($job_user->username)."<br>Hari Ini</center></strong>"; 

            foreach ($job_selected as $job_harian)
            {
                ?>
<div class="external-event bg-yellow"><a style="color:white;" href="#" class="detail-job_harian" data-id="<?php echo $job_harian->id_job_harian ?>"><?php echo $a++.". ".$job_harian->uraian."<br>Keterangan: ".$job_harian->keterangan?></a></div>
               <br>
                <?php
              }
              }else{ 
                echo "<center><h3>Hari Ini Kosong</h3></center>";
              }
            

                ?>
            </div>
            <!-- /.box-body -->
          </div>
<?php } ?>


        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">


              <!-- THE CALENDAR -->
              <div class="box-body" style="overflow:scroll;">
              <div id="calendar"></div>
            </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    </body>
</html>
<script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
            
</script>

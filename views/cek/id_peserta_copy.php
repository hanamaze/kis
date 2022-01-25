<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,800" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/main.css" rel="stylesheet" />
	<link rel="icon" type="image/png" href="<?php echo base_url();?>gambar/kis.png">
	  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>dist/css/skins/skin-yellow.min.css">
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Morris charts -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/morris.js/morris.css">
  </head>
  <body>
    <div class="s006">
      <form method="POST">
		<div class="input-group input-group-sm">
            <input type="text" class="form-control" name="kode" required> 
             <span class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-info btn-flat" placeholder="Masukan Kode Anda">SEARCH</button>
            </span>
         </div>
		 <?php
		 				include "cryptz.php";
				if($this->input->post("kode") != NULL){
				//$q1 = $this->db->get("peserta");
				$c = $this->input->post("kode");
				$q2 = $this->db->query("SELECT * FROM peserta WHERE id_peserta='$c'")->row();
				
				if($q2 != NULL){
				$nama_peserta2 = $q2->nama_peserta;
				$ttl = $q2->tempat_tgl_lahir;
				$nama_perusahaan = $q2->perusahaan;
				$alamat_perusahaan = $q2->alamat_perusahaan;
				$alamat_rumah = $q2->alamat_rumah;
				?>
				<br>
				<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data ID: <?php echo $this->input->post("kode"); ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <td>1.</td>
                  <td>Nama</td>
				  <td>:</td>
                  <td>
					<?php echo md5_decrypt($nama_peserta2); ?>
                  </td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>TTL</td>
				  <td>:</td>
                  <td>
					<?php echo md5_decrypt($ttl); ?>
                  </td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Nama Perusahaan</td>
				  <td>:</td>
                  <td>
						<?php echo md5_decrypt($nama_perusahaan); ?>
                  </td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Alamat Perusahaan</td>
				  <td>:</td>
                  <td>
					<?php echo md5_decrypt($alamat_perusahaan); ?>
                    
                  </td>
                </tr>
				<tr>
                  <td>5.</td>
                  <td>Alamat Rumah</td>
				  <td>:</td>
                  <td>
					<?php echo md5_decrypt($alamat_rumah); ?>
                    
                  </td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
		  

				
			<?php	
			}else{
				echo "<center><h3 style='color:white;'>Data Tidak Ditemukan.</h3></center>";
			}
			}
		 ?>
      </form>
	  
    </div>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

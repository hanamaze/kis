<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
		<?php if($button == "Update"){?>
            <div class="container">
        <div class="box col-md-6">
            <div class="box-header">
              <h3 class="box-title">Update Peserta</h3>
            </div>
            
            <div class="box-body">
            <div class="box-body" style="overflow:scroll;">
		
		<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
           
            <input type="hidden" class="form-control" name="id_pelatihan" id="id_pelatihan" placeholder="Id Pelatihan" value="<?php echo $id_pelatihan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Peserta <?php echo form_error('nama_peserta') ?></label>
            <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" value="<?php echo md5_decrypt($nama_peserta); ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">NIK KTP <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK Peserta" value="<?php echo md5_decrypt($nik); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat, Tgl Lahir <?php echo form_error('tempat_tgl_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_tgl_lahir" id="tempat_tgl_lahir" placeholder="kota,01 Januari 1991" value="<?php echo md5_decrypt($tempat_tgl_lahir); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Perusahaan <?php echo form_error('perusahaan') ?></label>
            <input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan" value="<?php echo md5_decrypt($perusahaan); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Perusahaan <?php echo form_error('alamat_perusahaan') ?></label>
            <input type="text" class="form-control" name="alamat_perusahaan" id="alamat_perusahaan" placeholder="Alamat Perusahaan" value="<?php echo md5_decrypt($alamat_perusahaan); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Rumah <?php echo form_error('alamat_rumah') ?></label>
            <input type="text" class="form-control" name="alamat_rumah" id="alamat_rumah" placeholder="Alamat Rumah" value="<?php echo md5_decrypt($alamat_rumah); ?>" />
        </div>

	    <div class="form-group">
            <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="08xxxxxxxxxx" value="<?php echo md5_decrypt($no_hp); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="alamat@email.com" value="<?php echo md5_decrypt($email); ?>" />
        </div>
		<div class="form-group">
            <label for="varchar">Pendidikan <?php echo form_error('pendidikan') ?></label>
            <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" value="<?php echo md5_decrypt($pendidikan); ?>" />
        </div>
		<div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo md5_decrypt($jabatan); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo md5_decrypt($keterangan); ?>" />
        </div>
	    <input type="hidden" name="id_peserta" value="<?php echo $id_peserta; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('peserta/pelatihan/'.$id_pelatihan) ?>" class="btn btn-default">Cancel</a>
	</form>
	</div>
</div>
</div>



  <div class="container" id="crop-avatar">

    <!-- Current avatar -->
    <div class="avatar-view" style="width: 400px; height: 400px">
    <?php if($foto == NULL){?>
      <img src="<?php echo base_url(); ?>gambar/picture.jpg" alt="Avatar" style="text-align: left;">
    <?php }else{?>
      <img src="<?php echo base_url()."foto_peserta/".$foto; ?>" alt="Avatar" style="text-align: left;">
    <?php } ?>
    </div>

    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="<?php echo base_url(); ?>crop.php" enctype="multipart/form-data" method="post">

            

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Crop Foto Peserta</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" name="base_url" value="<?php echo base_url();?>">
                  <input type="hidden" name="id_peserta" value="<?php echo $id_peserta; ?>">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  <label for="avatarInput">Upload Foto: </label>
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                    <div class=""><img width="200" src="<?php echo base_url(); ?>gambar/kis_circle.png"></div>
                  </div>
                </div>

                <div class="row avatar-btns">
                  <div class="col-md-9">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block avatar-save">SELESAI</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
          </form>
        </div>
      </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
  </div>






</div>


		<?php }else{
			
			?>
		
		
		        <form action="<?php echo $action; ?>" method="post">
				
	   
            <input type="hidden" class="form-control" name="id_pelatihan" id="id_pelatihan" placeholder="Id Pelatihan" value="<?php echo $this->input->post('id');?>" />
        
	    <div class="form-group">
            <label for="varchar">Nama Peserta </label>
            <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" value="" />
        </div>
        <div class="form-group">
            <label for="varchar">NIK Peserta </label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK Peserta" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Tgl Lahir</label>
            <input type="text" class="form-control" name="tempat_tgl_lahir" id="tempat_tgl_lahir" placeholder="Tempat Tgl Lahir" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Perusahaan</label>
            <input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Perusahaan</label>
            <input type="text" class="form-control" name="alamat_perusahaan" id="alamat_perusahaan" placeholder="Alamat Perusahaan" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Rumah</label>
            <input type="text" class="form-control" name="alamat_rumah" id="alamat_rumah" placeholder="Alamat Rumah" value="" />
        </div>

	    <div class="form-group">
            <label for="varchar">No Hp</label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email </label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="" />
        </div>
		<div class="form-group">
            <label for="varchar">Pendidikan <?php echo form_error('pendidikan') ?></label>
            <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" value="" />
        </div>
		<div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="" />
        </div>
	    <input type="hidden" name="id_peserta" value="<?php echo $id_peserta; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	</form>
		<?php } ?>
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
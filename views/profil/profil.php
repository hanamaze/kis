<?php
	$id = $this->session->userdata('id');	
	$user = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();
?>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Profil</h4>
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
<div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
				<span class="username">PT. KUALITAS INDONESIA SISTEM</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->

<!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo md5_decrypt($this->session->userdata('nama'));?></h3>
              <h5 class="widget-user-desc"><?php echo md5_decrypt($user->jabatan);?></h5>
            </div>
            <div class="widget-user-image">
              
              <?php if($user->foto != NULL){ ?>
                <img src="foto_user/<?php echo md5_decrypt($user->foto); ?>" class="img-circle" alt="User Avatar">
              <?php }else{?>
                <img src="<?php echo base_url(); ?>dist/image/21A.png" class="img-circle" alt="User Avatar">
              <?php } ?>

            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    
                    <span class="description-text">
						<a class="btn btn-primary ganti_foto">Ganti Foto</a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    
                    <span class="description-text">PROFIL</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <span class="description-text"><a class="btn btn-primary ganti_password">Ganti Password</a></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
            </div>
          </div>
			</div>



<div class="col-md-6">
<div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
				<span class="username">PT. KUALITAS INDONESIA SISTEM</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

<form id="form1" name="form1" method="post" action="<?php echo base_url('profil/update'); ?>">
<table id="example2" class="table table-bordered table-striped">
  <tr>
    <td width="104">Nama:</td>
    <td width="228">
      <input type="text" name="nama" class="form-control" value="<?php echo md5_decrypt($user->nama); ?>"  /></td>
  </tr>
  <tr>
    <td>Username:</td>
    <td>
    <input type="text" name="username" class="form-control" value="<?php echo md5_decrypt($user->username); ?>"   />
    </td>
  </tr>
  <tr>
    <td>Jabatan:</td>
    <td>
    <input type="text" name="jabatan" class="form-control" value="<?php echo md5_decrypt($user->jabatan); ?>"   />
    </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="hidden" name="id" id="id" value="<?php echo $this->session->userdata('id'); ?>" />
      <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Simpan" />
    </td>
  </tr>
</table>
</form>



             
            </div>

          </div>
			</div>

		

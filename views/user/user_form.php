
        <?php if($button=="Update"){ ?>
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">User</h3>
            </div>
            
            <div class="box-body">
            <div class="box-body" style="overflow:scroll;">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo md5_decrypt($nama); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo md5_decrypt($username); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo md5_decrypt($password); ?>" />
        </div>

	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo md5_decrypt($foto) ?>" />
        </div>	    
		<div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo md5_decrypt($jabatan); ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <select name="status" class="form-control">
            <option value="user" <?php if($status=="user"){ echo "selected"; }?> >User</option>
            <option value="admin" <?php if($status=="admin"){ echo "selected"; }?>>Admin</option>
            <option value="leader" <?php if($status=="leader"){ echo "selected"; }?>>Direksi</option>
            <option value="akunting" <?php if($status=="akunting"){ echo "selected"; }?>>Akunting</option>
            <option value="hrd" <?php if($status=="hrd"){ echo "selected"; }?>>Hrd</option>
            <option value="cabang" <?php if($status=="cabang"){ echo "selected"; }?>>Cabang</option>
            </select>
        </div>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    
	</form>
</div>
</div>
</h3>
		<?php }else{ ?>
		        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="" />
        </div>

	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="" />
        </div>	    
		<div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            
            <select class="form-control" name="status" value="<?php echo $status; ?>">
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="leader">Direksi</option>
            <option value="akunting">Akunting</option>
            <option value="hrd">Hrd</option>
            <option value="cabang">Cabang</option>
            </select>
        </div>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    
	</form>
		<?php }?>
		
		
		

		<script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>

        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Karyawan <?php echo form_error('id_karyawan') ?></label>
           <select class="form-control" name="id_karyawan">
		   <?php $ka = $this->db->get('karyawan')->result();
		   foreach($ka as $k){
		   ?>
		   <option value="<?php echo $k->id_karyawan; ?>"<?php if($id_karyawan==$k->id_karyawan){ echo " selected";}?>><?php echo md5_decrypt($k->nama_karyawan); ?></option>
		   <?php } ?>
		   </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">WhatsApp <?php echo form_error('whatsapp') ?></label>
            <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="WhatsApp" value="<?php echo $whatsapp; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <select class="form-control" name="status">
				<option value="aktif">Aktif</option>
				<option value="tidak_aktif">Tidak Aktif</option>
			</select>
        </div>
	    <input type="hidden" name="id_email" value="<?php echo $id_email; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('email_karyawan') ?>" class="btn btn-default">Cancel</a>
	</form>

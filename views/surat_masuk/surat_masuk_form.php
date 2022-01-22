<?php 

if($akses != "boleh"){
if($this->session->userdata('status')!="admin"){
if($this->session->userdata('id')!=$id_user){
	redirect(base_url("index.php/restrict"));
}
}
}
?>
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Surat Masuk</h3>
            </div>
            
            <div class="box-body">
            <div class="box-body" style="overflow:scroll;">

        <?php echo form_open("surat_masuk/update_action", array('enctype'=>'multipart/form-data')); ?>
	    <div class="form-group">
            <label for="varchar">No Surat <?php echo form_error('no_surat') ?></label>
            <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo md5_decrypt($no_surat); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="tanggal form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keperluan <?php echo form_error('deskripsi') ?></label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Keperluan" value="<?php echo md5_decrypt($deskripsi); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo md5_decrypt($keterangan); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">File <?php echo form_error('file') ?></label>
			<a href="<?php echo base_url();?>images/<?php echo md5_decrypt($file); ?>"><?php echo md5_decrypt($file); ?></a>
            <input type="file" class="custom-file-input" name="file" id="file" placeholder="File" value="<?php echo md5_decrypt($file); ?>" />
        </div>

            <input type="hidden"  name="id_user" id="id_user" value="<?php echo  $this->session->userdata('id'); ?>" />
      
	    <input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>" /> 
	    <button type="submit" class="btn btn-primary">Edit</button> 
</div>
</div>
</div>
	<?php echo form_close(); ?>
    <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>

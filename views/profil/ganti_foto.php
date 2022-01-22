<?php
	$id = $this->session->userdata('id');	
	$user = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();
?>
<center><h1>Ganti Foto</h1></center>
<?php echo form_open("profil/update_foto", array('enctype'=>'multipart/form-data')); ?>
<table id="example2" class="table table-bordered table-striped">
  <tr>
    <td width="104">Masukan Foto:</td>
    <td width="228">
      <input type="file" name="file" />
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="hidden"  name="id_user" id="id_user"  value="<?php echo  $this->session->userdata('id'); ?>" />
      <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Simpan" />
    </td>
  </tr>
</table>
   
<?php echo form_close(); ?>
<?php
	$id = $this->session->userdata('id');	
	$user = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();
?>
<center><h1>Ganti Password</h1></center>
<form id="form1" name="form1" method="post" action="<?php echo base_url('profil/update_password'); ?>">
<table id="example2" class="table table-bordered table-striped">

  <tr>
    <td>Masukan Password Baru:</td>
    <td>
    <input type="password" name="password_baru" class="form-control" placeholder="Masukan Password Baru" />
    </td>
  </tr>
  <tr>
    <td>Masukan Ulang Password Baru:</td>
    <td>
    <input type="password" name="ulang_password_baru" class="form-control" placeholder="Masukan Ulang Password Baru" />
    </td>
  </tr>
  <tr>
    <td>Masukan Password Lama:</td>
    <td>
	<input type="password" name="password_lama" class="form-control" placeholder="Masukan Password Lama" />
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Simpan" />
    </td>
  </tr>
</table>
</form>
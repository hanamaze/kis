	<?php 	$p2 = $this->db->query('SELECT * FROM pelatihan')->result(); ?>
<div class='form-group'><label for='varchar'>Pelatihan </label>
<select class='form-control' name='pelatihan'>
<?php
		foreach($p2 as $pp){
?>
<option value="<?php echo $pp->id_pelatihan; ?>"><?php echo $pp->nama_pelatihan; ?></option>
	<?php } ?>
</select>
</div>
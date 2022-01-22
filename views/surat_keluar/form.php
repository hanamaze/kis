<?php include "cryptz.php";?>
<!-- Menampilkan Error jika validasi tidak valid -->
<div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>

<?php echo form_open("surat_keluar/tambah", array('enctype'=>'multipart/form-data')); ?>
		
		<div class="form-group">
            <label for="varchar">Kategori </label>
			<?php 
			$r = $this->db->get('kategori_surat')->result();
			
			?>
			<select name="kode" class="form-control" onchange="leaveChange()" id="leave">
			<option value="">Pilih Kategori</option>
			<?php foreach($r as $k){?>
				<option value="<?php echo $k->kode;?>"><?php echo $k->keterangan; ?></option>
			<?php }?>
			</select>
		</div>
		
		<div class="form-group">
            <label for="varchar">Tanggal </label>
			<input class="form-control tanggal" type="text" name="tanggal" placeholder="Tanggal" value="" required>
		</div>
			
		
		
		
		<div id="message"></div>
		



	<input type="hidden" name="id_user" id="id_user" value="<?php echo  $this->session->userdata('id'); ?>" />
	<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
	
	






<?php echo form_close(); ?>
    <script type="text/javascript">
            $(document).ready(function () {
				
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
				
				
            });
function leaveChange() {
    if (document.getElementById("leave").value != "SKL"){
        document.getElementById("message").innerHTML = "<div class='form-group'><label for='varchar'>Keperluan </label><input class='form-control' type='text' name='deskripsi' placeholder='Keperluan' value='' required></div><div class='form-group'><label for='varchar'>Keterangan </label><input class='form-control' type='text' name='keterangan' placeholder='Keterangan' value='' required></div>";
    }     
    else{
        document.getElementById("message").innerHTML = "<?php 	$p2 = $this->db->query('SELECT * FROM pelatihan ORDER BY id_pelatihan DESC')->result(); ?><div class='form-group'><label for='varchar'>Pelatihan </label><select class='form-control' name='pelatihan'><?php foreach($p2 as $pp){ ?><option value='<?php echo $pp->id_pelatihan; ?>'><?php echo md5_decrypt($pp->nama_pelatihan); ?></option><?php } ?></select></div>";
    }        
}
        </script>
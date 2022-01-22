
<!-- Menampilkan Error jika validasi tidak valid -->
<div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>

<?php echo form_open("surat_masuk_keluar/tambah", array('enctype'=>'multipart/form-data')); ?>
	<div class="form-group">
            <label for="varchar">No Surat </label>
			<input class="form-control" type="text" name="no_surat" placeholder="No Surat" value="<?php echo set_value('no_surat'); ?>" required>
			</div>
		<div class="form-group">
            <label for="varchar">Tanggal </label>
			<input class="form-control tanggal" type="text" name="tanggal" placeholder="Tanggal" value="<?php echo set_value('tanggal'); ?>" required>
			</div>
		<div class="form-group">
            <label for="varchar">Keperluan </label>
			<input class="form-control" type="text" name="deskripsi" placeholder="Keperluan" value="<?php echo set_value('deskripsi'); ?>" required>
			</div>
		<div class="form-group">
            <label for="varchar">Keterangan </label>
			<input class="form-control" type="text" name="keterangan" placeholder="Keterangan" value="<?php echo set_value('keterangan'); ?>" required>
			</div>
		<div class="form-group">
            <label for="varchar">File </label>
			<input type="file" name="file" >
			</div>
		<div class="form-group">
            <label for="varchar">Status </label>
			<select class="form-control" name="status" required>
			<option value="masuk">Masuk</option>
			<option value="keluar">Keluar</option>
			</select>
		</div>
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
        </script>
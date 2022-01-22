<div class="box">
            <div class="box-header">
              <h3 class="box-title">Karyawan</h3>
            </div>
            
            <div class="box-body">
            <div class="box-body" style="overflow:scroll;">
        
        <?php echo form_open("karyawan/update_action", array('enctype'=>'multipart/form-data')); ?>
	    <div class="form-group">
            <label for="varchar">Nama Karyawan <?php echo form_error('nama_karyawan') ?></label>
            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" value="<?php echo md5_decrypt($nama_karyawan); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nik <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo md5_decrypt($nik); ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <select name="jenis_kelamin" class="form-control">
				<option value="laki-laki"<?php if($jenis_kelamin=="laki-laki") echo "selected"; ?>> Laki-laki</option>
				<option value="perempuan"<?php if($jenis_kelamin=="perempuan") echo "selected"; ?>> Perempuan</option>
			</select>
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl Masuk Kerja <?php echo form_error('tgl_masuk_kerja') ?></label>
            <input type="text" class="form-control tanggal" name="tgl_masuk_kerja" id="tgl_masuk_kerja" placeholder="Tgl Masuk Kerja" value="<?php echo md5_decrypt($tgl_masuk_kerja); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo md5_decrypt($jabatan); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
            <input type="text" class="form-control tanggal" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo md5_decrypt($tgl_lahir); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ibu Kandung <?php echo form_error('nama_ibu_kandung') ?></label>
            <input type="text" class="form-control" name="nama_ibu_kandung" id="nama_ibu_kandung" placeholder="Nama Ibu Kandung" value="<?php echo md5_decrypt($nama_ibu_kandung); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <select name="status" class="form-control">
				<option value="lajang"<?php if($jenis_kelamin=="lajang") echo "selected"; ?>> Lajang</option>
				<option value="menikah"<?php if($jenis_kelamin=="menikah") echo "selected"; ?>> Menikah</option>
			</select>
        </div>
	    <div class="form-group">
            <label for="int">Jumlah Anak <?php echo form_error('jumlah_anak') ?></label>
            <input type="number" class="form-control" name="jumlah_anak" id="jumlah_anak" placeholder="Jumlah Anak" value="<?php echo $jumlah_anak; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo md5_decrypt($alamat); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo md5_decrypt($no_hp); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo md5_decrypt($keterangan); ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="file" name="file" id="file" />
        </div>
	    <div class="form-group">
            <label for="enum">Status Aktif <?php echo form_error('status_aktif') ?></label>
            <select name="status_aktif" class="form-control">
				<option value="1"<?php if($status_aktif=="1") echo "selected"; ?>> aktif</option>
				<option value="0"<?php if($status_aktif=="0") echo "selected"; ?>> tidak</option>
			</select>
        </div>
	    <input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan; ?>" /> 
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    
	<?php echo form_close(); ?>
</div>
</div>
</div>

	<script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>

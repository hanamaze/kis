<!doctype html>
<html>
    <head>
        <title>KIS</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
        
        <?php echo form_open("karyawan/tambah", array('enctype'=>'multipart/form-data')); ?>
	    <div class="form-group">
            <label for="varchar">Nama Karyawan </label>
            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan"value="<?php echo set_value('nama_karyawan'); ?>" required  />
        </div>
	    <div class="form-group">
            <label for="varchar">Nik </label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo set_value('nik'); ?>" required />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin </label>
            <select name="jenis_kelamin" class="form-control"value="<?php echo set_value('jenis_kelamin'); ?>">
				<option value="laki-laki"> Laki-laki</option>
				<option value="perempuan"> Perempuan</option>
			</select>
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl Masuk Kerja</label>
            <input type="text" class="form-control tanggal" name="tgl_masuk_kerja" id="tgl_masuk_kerja" placeholder="Tgl Masuk Kerja" value="<?php echo set_value('tgl_masuk_kerja'); ?>" required />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo set_value('jabatan'); ?>" required />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl Lahir</label>
            <input type="text" class="form-control tanggal" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo set_value('tgl_lahir'); ?>" required  />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ibu Kandung</label>
            <input type="text" class="form-control" name="nama_ibu_kandung" id="nama_ibu_kandung" placeholder="Nama Ibu Kandung" value="<?php echo set_value('nama_ibu_kandung'); ?>" required />
        </div>
	    <div class="form-group">
            <label for="varchar">Status </label>
            <select name="status" class="form-control" value="<?php echo set_value('status'); ?>">
				<option value="lajang"> Lajang</option>
				<option value="menikah"> Menikah</option>
			</select>
        </div>
	    <div class="form-group">
            <label for="int">Jumlah Anak </label>
            <input type="number" class="form-control" name="jumlah_anak" id="jumlah_anak" placeholder="Jumlah Anak" value="<?php echo set_value('jumlah_anak'); ?>" required  />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat </label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo set_value('alamat'); ?>" required />
        </div>
	    <div class="form-group">
            <label for="varchar">No Hp </label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo set_value('no_hp'); ?>" required />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan </label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo set_value('keterangan'); ?>" required />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto</label>
            <input type="file" name="file" id="file" value="<?php echo set_value('foto'); ?>" required />
        </div>
	    <div class="form-group">
            <label for="enum">Status Aktif </label>
            <select name="status_aktif" class="form-control"value="<?php echo set_value('status_aktif'); ?>" required >
				<option value="1"> aktif</option>
				<option value="0"> tidak</option>
			</select>
        </div>

	    <input name="submit" type="submit" class="btn btn-primary" value="Simpan" /> 
	    
	<?php echo form_close(); ?>    
	<script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
    </body>
</html>
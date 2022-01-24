<!doctype html>
<html>
    <head>
        <title>KIS</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <?php echo form_open("expedisi/tambah", array('enctype'=>'multipart/form-data')); ?>
	    <div class="form-group">
            <label for="varchar">Kepada </label>
            <input type="text" class="form-control" name="kepada" id="kepada" placeholder="Kepada" />
        </div>
	    <div class="form-group">
            <label for="enum">Kurir </label>
            <select name="kurir" class="form-control">
            <option value="J&T EXPRESS" >J&T EXPRESS</option>
            <option value="POS" >POS</option>
            <option value="TIKI" >TIKI</option>
            <option value="JNE" >JNE</option>
            <option value="NCS" >NCS</option>
            <option value="WAHANA" >WAHANA</option>
            <option value="SICEPAT" >SICEPAT</option>
            <option value="ANTERAJA" >ANTERAJA</option>
            <option value="INDAH LOGISTIK" >INDAH LOGISTIK</option>
            <option value="LION" >LION</option>
            <option value="LAINNYA" >LAINNYA</option>
			
			</select>
        </div>
	    <div class="form-group">
            <label for="varchar">Resi </label>
            <input type="text-area" class="form-control" name="resi" id="resi" placeholder="Resi" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tanggalan </label>
            <input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan </label>
                        <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="3"></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">File </label>
            <input type="file" name="file" id="file" />

            
        </div>
	    <div class="form-group">
            <label for="enum">Status </label>
            <select name="status" class="form-control">
				<option value="kirim" >Kirim</option>
				<option value="terima">Terima</option>
			
			</select>
			
        </div>
	     
	    <input type="submit" class="btn btn-primary" value="Simpan" name="submit" /> 
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
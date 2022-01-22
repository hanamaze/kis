<div class="box col-md-6" >
            <div class="box-header">
              <h3 class="box-title">Expedisi Baca Edt</h3>
            </div>
            
            <div class="box-body">
            <div class="box-body" style="overflow:scroll;">
        <?php echo form_open("expedisi/update_action", array('enctype'=>'multipart/form-data')); ?>
	    <div class="form-group">
            <label for="varchar">Kepada <?php echo form_error('kepada') ?></label>
            <input type="text" class="form-control" name="kepada" id="kepada" placeholder="Kepada" value="<?php echo $kepada; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Kurir <?php echo form_error('kurir') ?></label>
            <select name="kurir" class="form-control">
            <option value="J&T EXPRESS" <?php if($status=="J&T EXPRESS"){ echo "selected"; }?>>J&T EXPRESS</option>
    <option value="POS" <?php if($kurir=="POS"){ echo "selected"; }?>>POS</option>
    <option value="TIKI" <?php if($kurir=="TIKI"){ echo "selected"; }?>>TIKI</option>
    <option value="JNE" <?php if($kurir=="JNE"){ echo "selected"; }?>>JNE</option>
    <option value="NCS" <?php if($kurir=="NCS"){ echo "selected"; }?>>NCS</option>
    <option value="WAHANA" <?php if($kurir=="WAHANA"){ echo "selected"; }?>>WAHANA</option>
    <option value="SICEPAT" <?php if($kurir=="SICEPAT"){ echo "selected"; }?>>SICEPAT</option>
    <option value="ANTERAJA" <?php if($kurir=="ANTERAJA"){ echo "selected"; }?>>ANTERAJA</option>
    <option value="INDAH LOGISTIK" <?php if($kurir=="INDAH LOGISTIK"){ echo "selected"; }?>>INDAH LOGISTIK</option>
    <option value="LION" <?php if($kurir=="LION"){ echo "selected"; }?>>LION</option>
    <option value="LAINNYA" <?php if($kurir=="LAINNYA"){ echo "selected"; }?>>LAINNYA</option>
    


			</select>
        </div>
	    <div class="form-group">
            <label for="varchar">Resi <?php echo form_error('resi') ?></label>
            <input type="text" class="form-control" name="resi" id="resi" placeholder="Resi" value="<?php echo $resi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="3" ><?php echo $keterangan; ?></textarea>
            
        </div>
	    <div class="form-group">
        <label for="varchar">File <?php echo form_error('file') ?></label>
			<a href="<?php echo base_url();?>images/<?php echo $file; ?>"><?php echo $file; ?></a>
            <input type="file" class="form-control" name="file" id="file" placeholder="File"  />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <select name="status" class="form-control">
				<option value="kirim" <?php if($status=="kirim"){ echo "selected"; }?>>Kirim</option>
				<option value="terima"<?php if($status=="terima"){ echo "selected"; }?>>Terima</option>
			</select>
        </div>
	    <input type="hidden" name="id_expedisi" value="<?php echo $id_expedisi; ?>" /> 
	    <button type="submit" class="btn btn-primary"> sIMOAN</button> 
	    <a href="<?php echo site_url('expedisi') ?>" class="btn btn-default">Cancel</a>
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

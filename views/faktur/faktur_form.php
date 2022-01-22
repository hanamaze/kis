<!doctype html>
<html>
    <head>
        <title>KIS</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>

        <form action="<?php echo $action; ?>" method="post">

	    <div class="form-group">
            <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
            <input type="text" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
        </div>

	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('uraian') ?></label>
            <input type="text" class="form-control" name="uraian" id="uraian" placeholder="Uraian" value="<?php echo $uraian; ?>" />
        </div>

	    <div class="form-group">
            <label for="int">Jumlah  <?php echo form_error('jumlah') ?></label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Harga Satuan <?php echo form_error('harga_satuan') ?></label>
            <input type="text" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar">Tipe Satuan <?php echo form_error('harga_satuan') ?></label>
            <select name="satuan" class="form-control">
				<option value="org">org</option>
				<option value="pcs">pcs</option>
				<option value="lot">lot</option>

			</select>
			
        </div>
	    <div class="form-group">
            <label for="varchar">Payment Of <?php echo form_error('payment_of') ?></label>
            <input type="text" class="form-control" name="payment_of" id="payment_of" placeholder="Payment Of" value="<?php echo $payment_of; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Dari <?php echo form_error('dari') ?></label>
            <input type="text" class="form-control" name="dari" id="dari" placeholder="Dari" value="<?php echo $dari; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar">Telp<?php echo form_error('telp') ?></label>
            <input type="text" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" />
        </div><div class="form-group">
            <label for="varchar">Npwp <?php echo form_error('npwp') ?></label>
            <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Npwp" value="<?php echo $npwp; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar">Disc <?php echo form_error('disc') ?></label>
            <input type="text" class="form-control" name="disc" id="disc" placeholder="Disc" value="<?php echo $disc; ?>" />
        </div>

		<div class="form-group">
            <label for="varchar">Transaksi <?php echo form_error('transaksi') ?></label>
           
		   <select name="transaksi" class="form-control">
			<option value="Transfer" <?php if($transaksi=="Transfer") echo "selected";?>>Transfer</option>
			<option value="Cash" <?php if($transaksi=="Cash") echo "selected";?>>Cash</option>
			
		   </select>
        </div>
	    <input type="hidden" name="id_faktur" value="<?php echo $id_faktur; ?>" /> 
	    <input type="hidden" name="id_user" value="<?php echo  $this->session->userdata('id'); ?>" /> 
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	    
	</form>
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
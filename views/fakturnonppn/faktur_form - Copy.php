<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Faktur <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No Faktur <?php echo form_error('no_faktur') ?></label>
            <input type="text" class="form-control" name="no_faktur" id="no_faktur" placeholder="No Faktur" value="<?php echo $no_faktur; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar">No Kwitansi <?php echo form_error('no_faktur') ?></label>
            <input type="text" class="form-control" name="no_kwitansi" id="no_kwitansi" placeholder="No Kwitansi" value="<?php echo $no_kwitansi; ?>" />
        </div>
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
            <label for="varchar">Harga Total <?php echo form_error('harga_total') ?></label>
            <input type="text" class="form-control" name="harga_total" id="harga_total" placeholder="Harga Total" value="<?php echo $harga_total; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Total In Char <?php echo form_error('total_in_char') ?></label>
            <input type="text" class="form-control" name="total_in_char" id="total_in_char" placeholder="Total In Char" value="<?php echo $total_in_char; ?>" />
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
            <label for="varchar">Ppn <?php echo form_error('alamat') ?></label>
            <select name="ppn" class="form-control">
				<option value="ya">YA</option>
				<option value="tidak">TIDAK</option>
			</select>
        </div>
		<div class="form-group">
            <label for="varchar">Transaksi <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="transaksi" id="transaksi" placeholder="transaksi" value="<?php echo $transaksi; ?>" />
        </div>
	    <input type="hidden" name="id_faktur" value="<?php echo $id_faktur; ?>" /> 
	    <input type="hidden" name="id_user" value="<?php echo  $this->session->userdata('id'); ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('faktur') ?>" class="btn btn-default">Cancel</a>
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
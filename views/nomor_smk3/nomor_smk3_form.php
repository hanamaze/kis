<!doctype html>
<html>
    <head>
        <title>KIS SMK3</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 0px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Nomor_smk3 <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Perusahaan <?php echo form_error('nama_perusahaan') ?></label>
            <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Laporan <?php echo form_error('no_laporan') ?></label>
            <input type="text" class="form-control" name="no_laporan" id="no_laporan" placeholder="No Laporan" value="<?php echo $no_laporan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Aplikasi <?php echo form_error('no_aplikasi') ?></label>
            <input type="text" class="form-control" name="no_aplikasi" id="no_aplikasi" placeholder="No Aplikasi" value="<?php echo $no_aplikasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Ska <?php echo form_error('no_ska') ?></label>
            <input type="text" class="form-control" name="no_ska" id="no_ska" placeholder="No Ska" value="<?php echo $no_ska; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl Audit <?php echo form_error('tgl_audit') ?></label>
            <input type="text" class="form-control tanggal" name="tgl_audit" id="tgl_audit" placeholder="Tgl Audit" value="<?php echo $tgl_audit; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pembawa <?php echo form_error('pembawa') ?></label>
            <input type="text" class="form-control" name="pembawa" id="pembawa" placeholder="Pembawa" value="<?php echo $pembawa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ket <?php echo form_error('ket') ?></label>
            <textarea class="form-control" id="ket" name="ket" placeholder="Keterangan" rows="3" ><?php echo $ket; ?></textarea>
        </div>
	    <input type="hidden" name="id_nomorsmk3" value="<?php echo $id_nomorsmk3; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nomor_smk3') ?>" class="btn btn-default">Cancel</a>
	
        <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
    
    </form>
    </body>
</html>
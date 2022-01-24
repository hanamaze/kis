<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        
        <style>
            body{
                padding: 0px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Nomor_iso <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Tgl Issued <?php echo form_error('tgl_issued') ?></label>
            <input type="text" class="form-control tgl_issued" name="tgl_issued" id="tgl_issued" placeholder="Tgl Issued" value="<?php echo $tgl_issued; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Perusahaan <?php echo form_error('nama_perusahaan') ?></label>
            <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Audit <?php echo form_error('no_audit') ?></label>
            <input type="text" class="form-control" name="no_audit" id="no_audit" placeholder="No Audit" value="<?php echo $no_audit; ?>" />
        </div>
	    
      
        <div class="form-group">
            <label for="varchar">Jenis ISO <?php echo form_error('jenis_iso') ?></label>
            <input type="text" class="form-control" name="jenis_iso" id="jenis_iso" placeholder="Jenis ISO" value="<?php echo $jenis_iso; ?>" />
        </div>

             <div class="form-group">
            <label for="varchar">Pembawa <?php echo form_error('pembawa') ?></label>
            <input type="text" class="form-control" name="pembawa" id="pembawa" placeholder="Pembawa" value="<?php echo $pembawa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ket <?php echo form_error('ket') ?></label>
            <textarea class="form-control" id="ket" name="ket" placeholder="Keterangan" rows="3" ><?php echo $ket; ?></textarea>
        </div>
	    <input type="hidden" name="id_nomoriso" value="<?php echo $id_nomoriso; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('nomor_iso') ?>" class="btn btn-default">xCancel</a>



        <script type="text/javascript">
            $(document).ready(function () {
                $('.tgl_issued').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
	</form>


    
    </body>
</html>


    
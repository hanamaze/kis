<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
       
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No Surat <?php echo form_error('no_surat') ?></label>
            <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $no_surat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pt <?php echo form_error('nama_pt') ?></label>
            <input type="text" class="form-control" name="nama_pt" id="nama_pt" placeholder="Nama Pt" value="<?php echo $nama_pt; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Auditor <?php echo form_error('auditor') ?></label>
            <input type="text" class="form-control" name="auditor" id="auditor" placeholder="Auditor" value="<?php echo $auditor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl 1 <?php echo form_error('tgl_1') ?></label>
            <input type="text" class="form-control" name="tgl_1" id="tgl_1" placeholder="Tgl 1" value="<?php echo $tgl_1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl 2 <?php echo form_error('tgl_2') ?></label>
            <input type="text" class="form-control" name="tgl_2" id="tgl_2" placeholder="Tgl 2" value="<?php echo $tgl_2; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl 3 <?php echo form_error('tgl_3') ?></label>
            <input type="text" class="form-control" name="tgl_3" id="tgl_3" placeholder="Tgl 3" value="<?php echo $tgl_3; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl 4 <?php echo form_error('tgl_4') ?></label>
            <input type="text" class="form-control" name="tgl_4" id="tgl_4" placeholder="Tgl 4" value="<?php echo $tgl_4; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl 5 <?php echo form_error('tgl_5') ?></label>
            <input type="text" class="form-control" name="tgl_5" id="tgl_5" placeholder="Tgl 5" value="<?php echo $tgl_5; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl 6 <?php echo form_error('tgl_6') ?></label>
            <input type="text" class="form-control" name="tgl_6" id="tgl_6" placeholder="Tgl 6" value="<?php echo $tgl_6; ?>" />
        </div>
	    <input type="hidden" name="id_laporan_iso" value="<?php echo $id_laporan_iso; ?>" /> 
	    <button type="submit" class="btn btn-primary">Simpan</button> 
	</form>
    </body>
</html>
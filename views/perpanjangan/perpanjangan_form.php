        <?php if($button == "Edit"){?>
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Perpanjangan</h3>
            </div>
            
            <div class="box-body">
            <div class="box-body" style="overflow:scroll;">
        <?php } ?>
        <?php echo $id_k; ?>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Kategori Pelatihan <?php echo form_error('id_kategori_pelatihan') ?></label>
            <select class="form-control" name="id_kategori_pelatihan" >
			<?php $kategori = $this->db->get("kategori_pelatihan")->result(); 
			foreach($kategori as $k){
			?>
				<option value="<?php echo $k->id_kategori_pelatihan; ?>" <?php if($id_kategori_pelatihan == $k->id_kategori_pelatihan){ echo " selected"; } ?>><?php echo $k->nama_kategori; ?></option>
			<?php } ?>
			</select>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Peserta <?php echo form_error('nama_peserta') ?></label>
            <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" value="<?php echo $nama_peserta; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar"> Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
            <input type="text" class="form-control tgl_lahir" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NIK <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?php echo $nik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pendidikan <?php echo form_error('pendidikan') ?></label>
            <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Pendidikan" value="<?php echo $pendidikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar"> No Reg <?php echo form_error('no_reg') ?></label>
            <input type="text" class="form-control" name="no_reg" id="no_reg" placeholder="No Reg" value="<?php echo $no_reg; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar"> No Sert <?php echo form_error('no_sert') ?></label>
            <input type="text" class="form-control" name="no_sert" id="no_sert" placeholder="No Sert" value="<?php echo $no_sert; ?>" />
        </div>
<div class="alert alert-secondary" role="alert">
  <b>Data Perusahaan </b>
</div>
		<div class="form-group">
            <label for="varchar"> Perusahaan <?php echo form_error('perusahaan') ?></label>
            <input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan" value="<?php echo $perusahaan; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar"> Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar"> No Surat Permo <?php echo form_error('no_surat_permo') ?></label>
            <input type="text" class="form-control" name="no_surat_permo" id="no_surat_permo" placeholder="No Surat Permo" value="<?php echo $no_surat_permo; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar"> Tgl Surat Permo <?php echo form_error('tgl_surat_permo') ?></label>
            <input type="text" class="form-control tgl_surat_permo" name="tgl_surat_permo" id="tgl_surat_permo" placeholder="Tgl Surat Permo" value="<?php echo $tgl_surat_permo; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar"> Tgl Submit <?php echo form_error('tgl_submit') ?></label>
            <input type="text" class="form-control tgl_submit" name="tgl_submit" id="tgl_submit" placeholder="Tgl Submit" value="<?php echo $tgl_submit; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar"> No Ptsa <?php echo form_error('no_ptsa') ?></label>
            <input type="text" class="form-control" name="no_ptsa" id="no_ptsa" placeholder="No Ptsa" value="<?php echo $no_ptsa; ?>" />
        </div>
		<div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <select name="status" class="form-control">
    <option value="input" <?php if($status=="input"){ echo "selected"; }?>>INPUT</option>
    <option value="submit" <?php if($status=="submit"){ echo "selected"; }?>>SUBMIT</option>
    <option value="ptsa" <?php if($status=="ptsa"){ echo "selected"; }?>>PTSA</option>
    <option value="cetak" <?php if($status=="cetak"){ echo "selected"; }?>>CETAK</option>
    <option value="selesai" <?php if($status=="selesai"){ echo "selected"; }?>>SELESAI</option>
    
        </select>
        </div>
		<div class="form-group">
            <label for="varchar"> Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="3" ><?php echo $keterangan; ?></textarea>

        </div>
		
	    <input type="hidden" name="id_perpanjangan" value="<?php echo $id_perpanjangan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('perpanjangan') ?>" class="btn btn-default">Batal</a>
	</form>
<?php if($button == "Edit"){?>
</div>
</div>
</div>
<?php } ?>


<script type="text/javascript">
            $(document).ready(function () {
                $('.tgl_lahir').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.tgl_surat_permo').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.tgl_submit').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
        
        <?php
/* http://djagatrayanetwork.com */ ?>
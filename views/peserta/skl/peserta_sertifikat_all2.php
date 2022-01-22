<style>
p {
   line-height:1.5;
}
.hf{
	
}
body {
    margin: 0;
    padding: 0;
}

#box {
    margin: 0;
    padding: 0;
    width: 803px;
    height: 1400px;
}
.text{
	margin: 10px 100px 100px 100px;
	
	
}
</style>

<?php 

		//if($pl->id_peserta > 672 AND $pl->id_peserta < 703){
		for($id=$id_pp; $id<$tt; $id++){	

		$surat = $this->db->query("SELECT * FROM surat_masuk_keluar WHERE keterangan='$id'")->row();
		$pl = $this->db->query("SELECT * FROM peserta WHERE id_peserta='$id' AND id_pelatihan='$id_pelatihan'")->row();
    	$plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id_pelatihan'")->row();
    	$kategori_plt = $this->db->query("SELECT * FROM kategori_pelatihan WHERE id_kategori_pelatihan='$plt->id_kategori_pelatihan'")->row();
    	if($id >= 911){
    		$idf = $id;
    	}else{
    		$idf = "tidak ditemukan";
    	}
		if($surat != NULL){
			$no_surat = md5_decrypt($surat->no_surat);
		}else{
			$no_surat = "Nomor Tidak Ditemukan";
		}
		
if($pl->foto != NULL){
	$foto = $pl->foto;
}else{
	$foto = "kosong.jpg";
}
  $newDate1 = date("d M Y", strtotime($plt->tanggal_mulai));
  $newDate2 = date("d M Y", strtotime($plt->tanggal_selesai));	
?>	
<div id="box">

<img src="skl/header_surat2.jpg" style="width:803px;">


<div class="text" style="">
  <p align="center">
  	<br>
  	<br>
  	<br><br>
  	<br>
  	<br>
    <strong>This Certifies That:</strong>

<h1><?php echo strtoupper(md5_decrypt($pl->nama_peserta));?></h1>

<strong>Has Successfully Completed</strong>
<br>
<br>
<strong> 
	<?php echo $kategori_plt->deskripsi_sertifikat;?>
<br>
No Reg: <?php echo $idf; ?>/<?php echo $kategori_plt->kategori_reg;?>
<br>
</strong>
<br>
<br>
<?php echo md5_decrypt($plt->kota); ?>, <?php echo $newDate1; ?> - <?php echo $newDate2; ?>
<br>
At <?php echo md5_decrypt($plt->tempat); ?>

<br>
<br>
<br>

<img width="100" src="foto_peserta/<?php echo $foto; ?>" />
<br>
<br>
<img width="100" src="foto_peserta/<?php echo $id; ?>.png" />

<br>
<br>
<br>

<?php echo md5_decrypt($plt->kota); ?>, <?php echo $newDate2; ?>
<br>
PT. KUALITAS INDONESIA SISTEM (KIS)
<br>
<img width="200" src="gambar/ttd.png" />
<br>
APRILIA PUTRI SUHARDINI, SH
<br>
Director

</p>
</div>
</div>

	<?php 
	}
	//}
	?>
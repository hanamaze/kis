<?php
 $path =  'skl/sertifikat2.jpg';
 $type = pathinfo($path, PATHINFO_EXTENSION);
 $data = file_get_contents($path);
 $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<style>
p {
   line-height:1.5;
}


#box {
    width: 105%;
    height: 1400px;
    background-image: url(skl/sertifikat2.jpg);
    background-position: center;
    position: relative;
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

		
if($pl->foto != NULL){
	$foto = $pl->foto;
}else{
	$foto = "kosong.jpg";
}
	

  $newDate1 = date("d M Y", strtotime($plt->tanggal_mulai));
  $newDate2 = date("d M Y", strtotime($plt->tanggal_selesai));
?>	

<div id="box">

<div class="text">
  <p align="center">
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
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
<img width="100" src="foto_peserta/<?php echo $id;?>.png" />

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

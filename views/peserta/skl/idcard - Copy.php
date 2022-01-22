<style>
p {
   line-height:1.5;
}
.hf{
	
}
body {
    margin-top: 0px;
    margin-left: 0px;
    
}

#box {
    margin: 0;
    padding: 0;
    width: 805px;
    height: 1400px;
    text-align: center;

}
.text{
	margin: 10px 100px 100px 100px;
	
	
}
</style>

<?php foreach($pst as $p){?>
	
<div id="box">
<!-- <img src="gambar/idcard.jpg" style=" position:relative; width:100%;"> -->

<div style="position: absolute; text-align: center; background-image: url('gambar/idcard.jpg');">
<strong><h3>
<?php echo $p->id_peserta; ?>
<br>
<?php echo md5_decrypt($p->nama_peserta); ?>
<br>
<?php $pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$p->id_pelatihan'")->row();  ?>
<br>
<?php echo $pelatihan->tanggal_mulai; ?> - 
<?php echo $pelatihan->tanggal_selesai; ?>
<br>
<?php echo md5_decrypt($pelatihan->kota); ?>, 
<?php echo md5_decrypt($pelatihan->tempat); ?>

</h3></strong>
</div>


</div>
<?php } ?>
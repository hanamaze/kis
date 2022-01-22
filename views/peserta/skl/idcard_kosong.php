<style>
.container {
    position: relative;
}

.center {
  position: absolute;
  left: 0;
  top: 510px;
  width: 100%;
  text-align: center;
}


</style>
<body>

	
<div class="container">
<?php foreach($pst as $p){?>

  <img src="gambar/custom_idcard.jpg" alt="Cinque Terre" style="width:100%;">

  <div class="center">
<strong>
    <span style="font-size: 50px"><?php echo $p->id_peserta; ?></span>
<br><br><br><br><br><br>
<span style="font-size: 35px"><?php echo strtoupper(md5_decrypt($p->nama_peserta)); ?></span>
<br>

<?php $pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$p->id_pelatihan'")->row();  ?>
<br>
<br><br><br><br><br>
<span style="font-size: 30px">

<?php 
$h1 = $pelatihan->tanggal_mulai[0].$pelatihan->tanggal_mulai[1];
$b1 = $pelatihan->tanggal_mulai[3].$pelatihan->tanggal_mulai[4];
$h2 = $pelatihan->tanggal_selesai[0].$pelatihan->tanggal_selesai[1];
$b2 = $pelatihan->tanggal_selesai[3].$pelatihan->tanggal_selesai[4];
$t2 = $pelatihan->tanggal_selesai[6].$pelatihan->tanggal_selesai[7].$pelatihan->tanggal_selesai[8].$pelatihan->tanggal_selesai[9];


if($b1=="01"){
  $bulan1 = "Januari";
}elseif($b1=="02"){
  $bulan1 = "Pebruari";
}elseif($b1=="03"){
  $bulan1 = "Maret";
}elseif($b1=="04"){
  $bulan1 = "April";
}elseif($b1=="05"){
  $bulan1 = "Mei";
}elseif($b1=="06"){
  $bulan1 = "Juni";
}elseif($b1=="07"){
  $bulan1 = "Juli";
}elseif($b1=="08"){
  $bulan1 = "Agustus";
}elseif($b1=="09"){
  $bulan1 = "September";
}elseif($b1=="10"){
  $bulan1 = "Oktober";
}elseif($b1=="11"){
  $bulan1 = "November";
}elseif($b1=="12"){
  $bulan1 = "Desember";
}else{
  $bulan1 = "-";
}
if($b2=="01"){
  $bulan2 = "Januari";
}elseif($b2=="02"){
  $bulan2 = "Pebruari";
}elseif($b2=="03"){
  $bulan2 = "Maret";
}elseif($b2=="04"){
  $bulan2 = "April";
}elseif($b2=="05"){
  $bulan2 = "Mei";
}elseif($b2=="06"){
  $bulan2 = "Juni";
}elseif($b2=="07"){
  $bulan2 = "Juli";
}elseif($b2=="08"){
  $bulan2 = "Agustus";
}elseif($b2=="09"){
  $bulan2 = "September";
}elseif($b2=="10"){
  $bulan2 = "Oktober";
}elseif($b2=="11"){
  $bulan2 = "November";
}elseif($b2=="12"){
  $bulan2 = "Desember";
}else{
  $bulan2 = "-";
}
?>



<?php echo $h1." ".$bulan1." "; ?> - 
<?php echo $h2." ".$bulan2." ".$t2; ?>

<br>
<?php echo md5_decrypt($pelatihan->kota); ?>, 
<?php echo md5_decrypt($pelatihan->tempat); ?>
</span>
</strong>
  </div>


<?php } ?>
</div>

</body>
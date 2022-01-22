<?php error_reporting(0);?>
<center>
<?php 
$post = $this->input->post('id');
$check = $this->db->query("SELECT * FROM surat_masuk_keluar WHERE deskripsi='$post'")->row(); 
	if($check != NULL){
		$total = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$post'")->num_rows();
		
		
		$part = $total/30;
		
		if($part <= 1){
			$part2 = 1;
		}elseif($part <= 2){
			$part2 = 2;
		}elseif($part <= 3){
			$part2 = 3;
		}elseif($part <= 4){
			$part2 = 4;
		}elseif($part <= 5){
			$part2 = 5;
		}elseif($part <= 6){
			$part2 = 6;
		}elseif($part <= 7){
			$part2 = 7;
		}elseif($part <= 8){
			$part2 = 8;
		}elseif($part <= 9){
			$part2 = 9;
		}elseif($part <= 10){
			$part2 = 10;
		}else{
			$part2 = 1;
		}
?>
<table style="width:100%;" id="example2" class="table table-bordered table-striped">
 <tr>
    <td colspan="2"><div align="center"><h1>TOTAL SKL: <?php echo $total; ?></h1></div></td>
    </tr>
  <tr>
    <td width="119"><div align="center"><a href="<?php echo base_url("peserta/cetak_all_skl/".$this->input->post("id"));?>" class="btn btn-danger">Download Semua dengan KOP <i class="fa fa-sticky-note"></i></a></div></td>
    <td width="120"><div align="center"><a href="<?php echo base_url("peserta/cetak_all_skl2/".$this->input->post("id"));?>" class="btn btn-success">Download Semua tanpa KOP <i class="fa fa-sticky-note-o"></i></a></div></td>
  </tr>
  <?php 
  if($part2==1){
  	echo "";

  }else{  

  	?>

  <tr>
    <td colspan="2"><div align="center"><h2>ALTERNATIF LAIN</h2></div></td>
    </tr>
  <tr>
    <td><div align="center"><h3>DENGAN KOP</h3></div></td>
    <td><div align="center"><h3>TANPA KOP</h3></div></td>
  </tr>
  	<?php
  	for($a=1; $a<=$part2; $a++){?>
  <tr>
    <td><div align="center"><a href="<?php echo base_url("peserta/cetak_all_skl/".$this->input->post("id")."/".$a);?>" class="btn btn-danger">Download Part <?php echo $a;?></a></div></td>
    <td><div align="center"><a href="<?php echo base_url("peserta/cetak_all_skl2/".$this->input->post("id")."/".$a);?>" class="btn btn-success">Download Part <?php echo $a;?> </a></div></td>
  </tr>
  <?php } }?>

  
  
  
</table>



<?php }else{
	echo "<h3>Belum Ada Nomor Surat</h3>";
	echo "<h3>Silahkan Tambahkan Dulu <a href='".base_url()."surat_keluar/tahun/2019'>Klik Disini</a></h3>";
}	?>
</center>
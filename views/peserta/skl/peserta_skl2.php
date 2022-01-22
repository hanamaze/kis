<?php
 $path =  '<?php echo base_url(); ?>skl/sertifikat2.jpg';
 $type = pathinfo($path, PATHINFO_EXTENSION);
 $data = file_get_contents($path);
 $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
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
	$plthn 	= $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
	$pst 	= $this->db->query("SELECT * FROM peserta WHERE id_peserta='$id_peserta'")->result(); 



	foreach($pst as $pl){
		//$aa = md5_encrypt($pl->id_pelatihan);
		$bb = $pl->id_peserta;
		$surat = $this->db->query("SELECT * FROM surat_masuk_keluar WHERE keterangan='$bb'")->row();
		if($surat != NULL){
			$no_surat = md5_decrypt($surat->no_surat);
		}else{
			$no_surat = "Nomor Tidak Ditemukan";
		}
    if($plthn->id_kategori_pelatihan==1){
  $keterangan = " Keputusan Penunjukan (SKP), sertifikat dan kartu lisensi ";
}elseif($plthn->id_kategori_pelatihan==2){
  $keterangan = " Sertifikat";
}elseif($plthn->id_kategori_pelatihan==3){
$keterangan = " Sertifikat dan kartu lisensi ";
}elseif($plthn->id_kategori_pelatihan==4){
  $keterangan = " Keputusan Penunjukan (SKP), sertifikat dan kartu lisensi ";
}elseif($plthn->id_kategori_pelatihan==5){
  $keterangan = " Keputusan Penunjukan (SKP), sertifikat dan kartu lisensi ";
}elseif($plthn->id_kategori_pelatihan==6){
  $keterangan = " Sertifikat dan kartu lisensi";
}elseif($plthn->id_kategori_pelatihan==7){  
  $keterangan = " Sertifikat";
}elseif($plthn->id_kategori_pelatihan==8){
  $keterangan = " Keputusan Penunjukan (SKP), sertifikat dan kartu lisensi ";
}elseif($plthn->id_kategori_pelatihan==9){
  $keterangan = " Keputusan Penunjukan (SKP), sertifikat dan kartu lisensi ";
}else{
  $keterangan = " Keputusan Penunjukan (SKP), sertifikat dan kartu lisensi ";
}
?>
<div id="box">

<img src="skl/header_surat2.jpg" style="width:803px;">



<div class="text">
  <p align="center"><strong><u>SURAT  KETERANGAN</u></strong><br />
    <strong><?php echo  $no_surat;?></strong></p>

<table width="643" border="0">
  <tr>
    <td colspan="2"><p>Yang bertanda tangan di bawah  ini:</p></td>
  </tr>
  <tr>
    <td width="117">Nama   </td>
    <td width="516">: Aprilia Putri Suhardini, SH.</td>
  </tr>
  <tr>
    <td>Alamat  </td>
    <td>: Ds. Undaan Tengah RT. 004 RW. 002, Kec.  Undaan, Kab. Kudus</td>
  </tr>
  <tr>
    <td>Jabatan   </td>
    <td> : Direktur  </td>
  </tr>
</table>
<br>
<div style="height:100px;">
<table width="644" style="width:644px;" border="0">
  <tr>
    <td colspan="2">Menerangkan  dengan sesungguhnya bahwa:</td>
  </tr>
  <tr>
    <td width="116">Nama </td>
    <td width="512">: <?php echo md5_decrypt($pl->nama_peserta);?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td style="width:512px;"> :  <?php echo md5_decrypt($pl->alamat_rumah);?></td>
  </tr>
  <tr>
    <td>Asal Perusahaan </td>
    <td>: <?php echo md5_decrypt($pl->perusahaan);?> </td>
  </tr>
</table>
</div>
<div style="height:220px;">	
<?php $pl->id_pelatihan;
$plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$pl->id_pelatihan'")->row();
$kategori = $this->db->query("SELECT * FROM kategori_pelatihan WHERE id_kategori_pelatihan='$plt->id_kategori_pelatihan'")->row();

    $tgl_mulai = $plt->tanggal_mulai[3].$plt->tanggal_mulai[4];
    $tgl_selesai = $plt->tanggal_selesai[3].$plt->tanggal_selesai[4];
   if($tgl_mulai=="01"){
        $tgl_1 = "Januari";
    }elseif($tgl_mulai=="02"){
        $tgl_1 = "Februari";
    }elseif($tgl_mulai=="03"){
        $tgl_1 = "Maret";
    }elseif($tgl_mulai=="04"){
        $tgl_1 = "April";
    }elseif($tgl_mulai=="05"){
        $tgl_1 = "Mei";
    }elseif($tgl_mulai=="06"){
        $tgl_1 = "Juni";
    }elseif($tgl_mulai=="07"){
        $tgl_1 = "Juli";
    }elseif($tgl_mulai=="08"){
        $tgl_1 = "Agustus";
    }elseif($tgl_mulai=="09"){
        $tgl_1 = "September";
    }elseif($tgl_mulai=="10"){
        $tgl_1 = "Oktober";
    }elseif($tgl_mulai=="11"){
        $tgl_1 = "November";
    }elseif($tgl_mulai=="12"){
        $tgl_1 = "Desember";
    }else{
        $tgl_1 = "Unknown";
    }
    if($tgl_selesai=="01"){
        $tgl_2 = "Januari";
    }elseif($tgl_selesai=="02"){
        $tgl_2 = "Februari";
    }elseif($tgl_selesai=="03"){
        $tgl_2 = "Maret";
    }elseif($tgl_selesai=="04"){
        $tgl_2 = "April";
    }elseif($tgl_selesai=="05"){
        $tgl_2 = "Mei";
    }elseif($tgl_selesai=="06"){
        $tgl_2 = "Juni";
    }elseif($tgl_selesai=="07"){
        $tgl_2 = "Juli";
    }elseif($tgl_selesai=="08"){
        $tgl_2 = "Agustus";
    }elseif($tgl_selesai=="09"){
        $tgl_2 = "September";
    }elseif($tgl_selesai=="10"){
        $tgl_2 = "Oktober";
    }elseif($tgl_selesai=="11"){
        $tgl_2 = "November";
    }elseif($tgl_selesai=="12"){
        $tgl_2 = "Desember";
    }else{
        $tgl_2 = "Unknown";
    }
    $thn_selesai = $plt->tanggal_selesai[6].$plt->tanggal_selesai[7].$plt->tanggal_selesai[8].$plt->tanggal_selesai[9];
    $tanggal_mulai = $plt->tanggal_mulai[0].$plt->tanggal_mulai[1]." ".$tgl_1;
    $tanggal_selesai = $plt->tanggal_selesai[0].$plt->tanggal_selesai[1]." ".$tgl_2." ".$thn_selesai;



?> 	
<p align="justify">Bahwa  yang bersangkutan diatas telah mengikuti <?php echo $kategori->keterangan; ?>  
yang diselenggarakan oleh PT. Kualitas  Indonesia Sistem (KIS) pada tanggal <?php echo $tanggal_mulai." - ".$tanggal_selesai; ?> di <?php echo md5_decrypt($plt->tempat); ?> 
dan dinyatakan <strong>LULUS. </strong>Adapun  <?php echo $keterangan; ?> masih dalam  proses di Kementerian Tenaga Kerja dan 
Transmigrasi. </p>
<p align="justify">Demikian  surat keterangan ini kami buat untuk dipergunakan sebagaimana mestinya. Atas  kerjasamanya kami ucapkan terimakasih. </p>
</div>
<table border="0" cellspacing="0" cellpadding="0" align="left">


  <tr>
    <td width="321" valign="top"><p><strong>Hormat    Kami,</strong></p></td>
  </tr>
  <tr>
    <td valign="top"><strong>PT.    Kualitas Indonesia Sistem (KIS)</strong></td>
  </tr>
	
  <tr>
    <td width="321" valign="top">
<img src="skl/ttd_surat.jpg" style="width:200px;"></td>
  </tr>
</table>
</div>
<p align="justify">&nbsp;</p>

<img src="skl/footer_surat2.jpg" style="width:803px;">

</div>

	<?php }?>
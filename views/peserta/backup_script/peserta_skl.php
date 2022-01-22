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
    border: 1px solid #000;
}
.text{
	margin: 10px 100px 100px 100px;
	
	
}
</style>



<?php 
	$plthn 	= $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
	$pl 	= $this->db->query("SELECT * FROM peserta WHERE id_peserta='$id_peserta'")->row(); 
?>
<div id="box">

<img src="<?php echo base_url();?>skl/header_surat.jpg" style="width:803px;">



<div class="text">
  <p align="center"><strong><u>SURAT  KETERANGAN</u></strong><br />
    <strong>000/PJK3-PT.KIS/III/2019</strong></p>

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
<?php $plthn->id_pelatihan;
$plt = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$pl->id_pelatihan'")->row();
$kategori = $this->db->query("SELECT * FROM kategori_pelatihan WHERE id_kategori_pelatihan='$plt->id_pelatihan'")->row();
?> 	
<p align="justify">Bahwa  yang bersangkutan diatas telah mengikuti pembinaan <?php echo $kategori->nama_kategori; ?>  
yang diselenggarakan oleh PT. Kualitas  Indonesia Sistem (KIS) pada tanggal <?php echo md5_decrypt($plt->keterangan); ?> di <?php echo md5_decrypt($plt->tempat); ?> 
dan dinyatakan <strong>LULUS. </strong>Adapun  Surat Keputusan Penunjukan (SKP), sertifikat dan kartu lisensi masih dalam  proses di Kementerian Tenaga Kerja dan 
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
<img src="<?php echo base_url();?>skl/ttd_surat.jpg" style="width:200px;"></td>
  </tr>
</table>
</div>
<p align="justify">&nbsp;</p>

<img src="<?php echo base_url();?>skl/footer_surat.jpg" style="width:803px;">

</div>


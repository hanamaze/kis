<!doctype html>
<html><head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
    <?php
    function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}?>
    <!--
        <img width="400" src="gambar/header.jpg">
        <table class="table">
	    <tr><td>No Faktur</td><td><?php echo $no_faktur; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Po</td><td><?php echo $po; ?></td></tr>
	    <tr><td>Uraian</td><td><?php echo $uraian; ?></td></tr>
	    <tr><td>Nama Peserta</td><td><?php echo $nama_peserta; ?></td></tr>
	    <tr><td>Jumlah Peserta</td><td><?php echo $jumlah_peserta; ?></td></tr>
	    <tr><td>Harga Satuan</td><td><?php echo $harga_satuan; ?></td></tr>
	    <tr><td>Harga Total</td><td><?php echo $harga_total; ?></td></tr>
	    <tr><td>Total In Char</td><td><?php echo $total_in_char; ?></td></tr>
	    <tr><td>Payment Of</td><td><?php echo $payment_of; ?></td></tr>
	    <tr><td>Dari</td><td><?php echo $dari; ?></td></tr>
	    
	</table>
-->

<table width="829" height="111">
      <tr>
        <td width="557" rowspan="3"><img width="400" src="gambar/header.jpg"></td>
        <td width="116">P/O :</td>
        <td width="140"><?php echo $po; ?></td>
      </tr>
      <tr>
        <td>Pembayaran  :</td>
        <td>transfer</td>
      </tr>
      <tr>
        <td>Telp :</td>
        <td>08999999</td>
      </tr>
    </table>
<table width="635" height="108">
  <tr>
    <td width="496" rowspan="3"><h4>Jasa:</h4><h3><strong><br>
    <?php echo $dari; ?></strong></h3></td>
    <td width="86" height="48">&nbsp;</td>
    <td width="237">&nbsp;</td>
  </tr>
  <tr>
    <td height="27">No Faktur :</td>
    <td><?php echo $no_faktur; ?></td>
  </tr>
  <tr>
    <td height="23">Tanggal :</td>
    <td><?php echo $tanggal; ?></td>
  </tr>
</table>
<p style="text-align: center;">
<h1>INVOICE</h1>
<table width="742" border="1">
  <tr>
    <td width="26" rowspan="2">NO</td>
    <td width="360" rowspan="2">URAIAN</td>
    <td width="84" rowspan="2">JUMLAH</td>
    <td colspan="2">HARGA</td>
  </tr>
  <tr>
    <td width="107">SATUAN</td>
    <td width="131">JUMLAH</td>
  </tr>
  <tr>
    <td height="200">1</td>
    <td><?php echo $uraian; ?></td>
    <td><?php echo $jumlah_peserta; ?> Orang</td>
    <td><?php echo rupiah($harga_satuan); ?></td>
    <td><?php echo rupiah($harga_total); ?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td>JUMLAH</td>
    <td><?php echo rupiah($harga_total); ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

</p>
</body>
</html>
<!doctype html>
<html><head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php //echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

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

<style>
#b{

	border:1px;

}
</style>
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
<br>

<p  style="text-align: center;">
<h1>INVOICE</h1>
<table id="b" width="742" >
  <tr id="b">
    <td id="b" width="24" rowspan="2">NO</td>
    <td id="b" width="362" rowspan="2">URAIAN</td>
    <td id="b" width="72" rowspan="2">JUMLAH</td>
    <td id="b" colspan="2">HARGA</td>
  </tr>
  <tr id="b">
    <td id="b" width="119">SATUAN</td>
    <td id="b" width="131">JUMLAH</td>
  </tr>
  <tr id="b">
    <td id="b" height="200">1</td>
    <td id="b" style="width:300px;"><?php echo $uraian; ?></td>
    <td id="b"><?php echo $jumlah_peserta; ?> Orang</td>
    <td id="b"><?php echo rupiah($harga_satuan); ?></td>
    <td id="b"><?php echo rupiah($harga_total); ?></td>
  </tr>
  <tr id="b">
    <td id="b" colspan="3">&nbsp;</td>
    <td id="b">JUMLAH</td>
    <td id="b"><?php echo rupiah($harga_total); ?></td>
  </tr>
</table>
</p>
Terbilang: <?php echo $total_in_char; ?>
<table width="740" >
  <tr>
    <td height="182" colspan="3"><div align="left"></div></td>
  </tr>
  <tr>
    <td width="338"><p>Pembayaran Dapat di Transfer ke :</p>
    
    <ul>
    <li>Bank Mandiri <br>a/c : 184-00-0039898-0<br>a/n : PT KUALITAS INDONESIA SISTEM</li>
    
    </ul>
    </td>
    <td width="129">&nbsp;</td>
    <td width="257"><p align="center">HORMAT KAMI,
      </p>
      <p align="center">&nbsp;<img width="200" src="gambar/ttd.png" />
      <br>
      Aprilia Putri Suhardini, SH.
      </p>
      
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="747" >
  <tr>
    <td width="486" height="80" rowspan="2">
    <img width="400" src="gambar/header.jpg">
    </td>
    <td width="116">NO KWITANSI</td>
    <td width="129">:-</td>
  </tr>
  <tr>
    <td height="47">TANGGAL</td>
    <td>:<?php echo $tanggal; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="745" height="164">
  <tr>
    <td width="206">Sudah Terima Dari</td>
    <td width="523">:<?php echo $dari; ?></td>
  </tr>
  <tr>
    <td>Banyaknya Uang</td>
    <td>:<?php echo $total_in_char; ?></td>
  </tr>
  <tr>
    <td height="46">Untuk Pembayaran</td>
    <td>:<?php echo $payment_of; ?><br>
    <?php echo $nama_peserta; ?></td>
  </tr>
  <tr>
    <td>Jumlah:</td>
    <td>:<?php echo rupiah($harga_total); ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="740" height="434">
  <tr>
    
  </tr>
  <tr>
    <td width="338"><p>Pembayaran Dapat di Transfer ke :</p>
      <ul>
        <li>Bank Mandiri <br>
          a/c : 184-00-0039898-0<br>
          a/n : PT KUALITAS INDONESIA SISTEM</li>
      </ul></td>
    <td width="129">&nbsp;</td>
    <td width="257"><p align="center">HORMAT KAMI, </p>
      <p align="center">&nbsp;<img width="200" src="gambar/ttd.png" /> <br>
        Aprilia Putri Suhardini, SH. </p></td>
  </tr>
</table>
</body>
</html>
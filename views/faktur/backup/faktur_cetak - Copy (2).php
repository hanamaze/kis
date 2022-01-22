<!doctype html>
<html><head>
        <title>KIS</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    </head>
    <body>
    <?php
    function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}


			$sub_total = ($harga_satuan * $jumlah)-$disc;
			if($ppn=="ya"){
				$ppn2 = $sub_total * 0.1;
			}else{
				$ppn2 = 0;
			}
			$harga_total	=	$sub_total + $ppn2;
?>

<style>


 
.table1, .tb {
    border: 1px solid black;
	border-collapse: collapse;
}
</style>
<table width="747" >
  <tr>
    <td width="486" height="80" rowspan="2">
    <img width="500" src="gambar/new_header.jpg">
    </td>
    <td width="116">&nbsp;</td>
    <td width="129">&nbsp;</td>
  </tr>
  <tr>
    <td height="47">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>

<table width="828" height="168" >
  <tr>
    <td height="21" colspan="4">
   	  <hr style="color:white;">
    </td>
  </tr>
  <tr>
    <td><table width="332" height="116">
      
      <tr>
        <td height="27">Kepada</td>
        <td height="27">: <?php echo $dari; ?></td>
      </tr>
      <tr>
        <td height="27">Alamat</td>
        <td height="27">: <?php echo $alamat; ?></td>
      </tr>
      <tr>
        <td width="78" height="27">Telp</td>
        <td width="242" height="27">: <?php echo $telp; ?></td>
      </tr>
      <tr>
        <td height="23">NPWP</td>
        <td height="23">: <?php echo $npwp; ?></td>
      </tr>
    </table></td>
    <td width="129">&nbsp;</td>
    <td width="325" colspan="2"><table width="288" height="108">
      <tr>
        <td height="48" colspan="2"><h3><strong>Invoice / Faktur</strong></h3></td>
      </tr>
      <tr>
        <td width="96" height="27">No Invoice</td>
        <td width="180" height="27">: <?php echo $no_faktur; ?></td>
      </tr>
      <tr>
        <td height="23">Tanggal</td>
        <td height="23">: <?php echo $tanggal; ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>
	<table class="table1">
<tr>
			<th class="tb" rowspan="2" style="text-align:center">No</th>
	<th class="tb" rowspan="2" style="text-align:center">Keterangan</th>
	<th class="tb" colspan="2" style="text-align:center">&nbsp;</th>
	  </tr>
		<tr>
			<td class="tb" style="text-align:center"><strong>Satuan</strong></td>
		  <td class="tb" style="text-align:center"><strong>Jumlah</strong></td>
	  </tr>
		<tr>
			<td class="tb" height="235" style="width:30px;">1</td>
			<td class="tb" style="width:400px;">&nbsp;</td>
			<td class="tb" style="width:150px;">&nbsp;</td>
			<td class="tb" style="width:150px;">&nbsp;</td>
		</tr>
		<tr>
			<td class="tb" colspan="2" rowspan="5" style="text-align:center;">&nbsp;</td>
			<td class="tb">Sub Total</td>
			<td class="tb">: </td>
		</tr>
		<tr>
        
		  <td class="tb">Disc</td>
		  <td class="tb">:</td>
	  </tr>
		<tr>
		  <td class="tb">Total</td>
		  <td class="tb">: </td>
	  </tr>
		<tr>
			<td class="tb">PPN 10%</td>
			<td class="tb">: </td>
		</tr>
		<tr>
			<td class="tb">Grand Total</td>
			<td class="tb">: </td>
		</tr>
	</table>	
    </p>

    <table class="table1">
      <tr>
        <th class="tb" width="31">No</th>
        <th class="tb" width="329">Keterangan</th>
        <th class="tb" width="180">Harga Satuan</th>
        <th class="tb" width="181">Jumlah</th>
      </tr>
      <tr>
        <td class="tb" height="158">1.</td>
        <td class="tb"><span class="tb" style="width:400px;"><?php echo $uraian; ?></span></td>
        <td class="tb"><span class="tb" style="width:150px;">
          <?php 
		
			echo rupiah($harga_satuan); 
			$total2 = ($harga_satuan * $jumlah);
		
	?>
        </span></td>
        <td class="tb"><span class="tb" style="width:150px;"><?php echo $jumlah." ".$satuan; ?></span></td>
      </tr>
      <tr>
        <td class="tb" colspan="2" rowspan="5"><span class="tb" style="text-align:center;">Terbilang: <?php echo $total_in_char." Rupiah"; ?></span></td>
        <td class="tb">Sub Total</td>
        <td class="tb">: <?php echo rupiah($total2);?></td>
      </tr>
      <tr>
        <td class="tb">Disc</td>
        <td class="tb">: <span style="text-align: center;"><?php echo rupiah($disc); ?></span></td>
      </tr>
      <tr>
        <td class="tb">Total</td>
        <td class="tb">: <?php echo rupiah($harga_satuan * $jumlah);?></td>
      </tr>
      <tr>
        <td class="tb">PPN 10%</td>
        <td class="tb">: <?php echo rupiah($ppn2);?></td>
      </tr>
      <tr>
        <td class="tb">Grand Total</td>
        <td class="tb">: <?php echo rupiah($harga_total); ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="740" >
  <tr>
    <td height="77" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="389"><p>1. Metode Pembayaran : <?php echo $transaksi;?></p>
      <p>2. Mohon Pembayaran ditransfer ke rekening dibawah :</p>
      <table width="362">
        <tr>
          <td width="15">&nbsp;</td>
          <td width="331">Bank Mandiri Cabang Kudus</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>a/c : 184-00-00339898-0</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>a/n : PT. Kualitas Indonesia Sistem</td>
        </tr>
      </table>
    <p>3. Pembayaran dianggap sah apabila cek/giro sudah dicairkan</p></td>
    <td width="78">&nbsp;</td>
    <td width="257"><p align="center">HORMAT KAMI,
      </p>
      <p align="center">&nbsp;
	  <?php if($harga_total >= 3000000){ ?>
      	<img width="200" src="gambar/ttd_kosong.png" />
      <?php }else{ ?>
      	<img width="200" src="gambar/ttd.png" />	
      <?php } ?>
      <br>
      Aprilia Putri Suhardini, SH, M.kn
      </p>
      
    </td>
  </tr>
  
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="747" >
  <tr>
    <td width="486" height="80" rowspan="2">
    <img width="500" src="gambar/new_header.jpg">
    </td>
    <td width="116">NO KWITANSI</td>
    <td width="129">:<?php echo $no_kwitansi; ?></td>
  </tr>
  <tr>
    <td height="47">TANGGAL</td>
    <td>:<?php echo $tanggal; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="745">
  <tr>
    <td width="206"><p>Sudah Terima Dari</p>
    </td>
    <td width="523"><p>: <?php echo $dari; ?></p>
    </td>
    <td></td>
  </tr>
  <tr>
    <td><p>Banyaknya Uang</p>
    </td>
    <td><p>: <?php echo $total_in_char; ?></p>
    </td>
    <td></td>
  </tr>
  <tr>
    <td><p>Untuk Pembayaran</p>
    </td>
    <td>
      <p>: <?php echo $uraian; ?></p>
    </td>
    <td></td>
  </tr>
  <tr>
    <td><p>Jumlah:</p>
    </td>
    <td><p> : <?php echo rupiah($harga_total); ?></p>
    </td>
    <td></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="740" height="434">
  <tr>
    
  </tr>
  <tr>
    <td width="338"><p>1. Metode Pembayaran : <?php echo $transaksi;?></p>
      <p>2. Mohon Pembayaran ditransfer ke rekening dibawah :</p>
      <table width="362">
        <tr>
          <td width="15">&nbsp;</td>
          <td width="331">Bank Mandiri Cabang Kudus</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>a/c : 184-00-00339898-0</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>a/n : PT. Kualitas Indonesia Sistem</td>
        </tr>
      </table>
    <p>3. Pembayaran dianggap sah apabila cek/giro sudah dicairkan</p></td>
    <td width="129">&nbsp;</td>
    <td width="257"><p align="center">HORMAT KAMI, </p>
      <p align="center">&nbsp;
      <?php if($harga_total >= 3000000){ ?>
      	<img width="200" src="gambar/ttd_kosong.png" />
      <?php }else{ ?>
      	<img width="200" src="gambar/ttd.png" />	
      <?php } ?>
       <br>
        Aprilia Putri Suhardini, SH, M.kn </p></td>
  </tr>
</table>
</body>
</html>
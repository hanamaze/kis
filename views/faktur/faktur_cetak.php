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
			
			$harga_total	=	$sub_total;
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
    <img width="500" src="gambar/new_header2.png">
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
    <td><table width="332" height="96">
      
      <tr>
        <td height="21">Kepada</td>
        <td height="21">: <?php echo $dari; ?></td>
      </tr>
      <tr>
        <td height="21">Alamat</td>
        <td height="21">: <?php echo $alamat; ?></td>
      </tr>
      <tr>
        <td width="78" height="21">Telp</td>
        <td width="242" height="21">: <?php echo $telp; ?></td>
      </tr>
      <tr>
        <td height="21">NPWP</td>
        <td height="21">: <?php echo $npwp; ?></td>
      </tr>
    </table></td>
    <td width="129">&nbsp;</td>
    <td width="325" colspan="2"><table width="288" height="74">
      <tr>
        <td height="22" colspan="2"><h3><strong>Invoice / Faktur</strong></h3></td>
      </tr>
      <tr>
        <td width="96" height="21">No Invoice</td>
        <td width="180" height="21">: <?php echo $no_faktur; ?></td>
      </tr>
      <tr>
        <td height="21">Tanggal</td>
        <td height="21">: <?php echo $tanggal; ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>
	</p>

    <table class="table1">
      <tr>
        <th class="tb" width="31" style="text-align:center;">No</th>
        <th class="tb" style="text-align:center;">Keterangan</th>
        <th class="tb" style="text-align:center;">Satuan</th>
        <th class="tb" style="text-align:center;">Jumlah</th>
        <th class="tb" style="text-align:center;">Harga Satuan</th>
      </tr>
      <tr>
        <td class="tb" height="186"><p>1.</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p></td>
        <td class="tb" style="width:300px;"><p style="width:300px;"><?php echo $uraian; ?></p>
        <p style="width:300px;">&nbsp;</p>
        <p style="width:300px;">&nbsp;</p>
        <p style="width:300px;">&nbsp;</p>
        <p style="width:300px;">&nbsp;</p></td>
        <td class="tb" style="width:100px;"><p><span class="tb" style="width:150px;"><span class="tb" style="width:150px;"><?php echo $jumlah." ".$satuan; ?></span></span></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p></td>
        <td class="tb" style="width:150px;"><p style="width:100px;">
          <?php 
		
			echo rupiah($harga_satuan); 
			$total2 = ($harga_satuan * $jumlah);
		
	?>
        </p>
        <p style="width:100px;">&nbsp;</p>
        <p style="width:100px;">&nbsp;</p>
        <p style="width:100px;">&nbsp;</p>
        <p style="width:100px;">&nbsp;</p></td>
        <td class="tb" style="width:150px;"><?php echo rupiah($total2);?>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p></td>
      </tr>
      <tr>
        <td class="tb" colspan="2">&nbsp;</td>
        <td class="tb">&nbsp;</td>
        <td class="tb">Sub Total</td>
        <td class="tb">: <?php echo rupiah($total2);?></td>
      </tr>
      <tr>
        <td colspan="2" class="tb">&nbsp;</td>
        <td class="tb">&nbsp;</td>
        <td class="tb">Disc</td>
        <td class="tb">: <span style="text-align: center;"><?php echo rupiah($disc); ?></span></td>
      </tr>
      <tr>
        <td colspan="2" class="tb">&nbsp;</td>
        <td class="tb">&nbsp;</td>
        <td class="tb">Total</td>
        <td class="tb">: <?php echo rupiah($harga_satuan * $jumlah);?></td>
      </tr>

      <tr>
        <td colspan="2" class="tb"><span class="tb" style="text-align:center;">Terbilang:<span class="tb" style="text-align:center;"><?php echo $total_in_char." Rupiah"; ?></span></span></td>
        <td class="tb">&nbsp;</td>
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
    <td width="389"><table width="388">
      <tr>
        <td colspan="2">1. Metode Pembayaran : <?php echo $transaksi;?></td>
      </tr>
      <tr>
        <td colspan="2">2. Mohon Pembayaran ditransfer ke rekening dibawah :</td>
      </tr>
      <tr>
        <td width="14">&nbsp;</td>
        <td width="362">Bank Mandiri Cabang Kudus</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>a/c : 184-00-00339898-0</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>a/n : PT. Kualitas Indonesia Sistem</td>
      </tr>
      <tr>
        <td height="21" colspan="2">3. Pembayaran dianggap sah apabila cek/giro sudah dicairkan</td>
      </tr>
    </table></td>
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="747" >
  <tr>
    <td width="486" height="80">
    <img width="500" src="gambar/new_header2.png">
    </td>
    <td colspan="2">
    <table width="231">
        <tr>
          <td width="119">NO KWITANSI </td>
          <td width="96">:<?php echo $no_kwitansi; ?></td>
        </tr>
        <tr>
          <td>TANGGAL</td>
          <td>:<?php echo $tanggal; ?></td>
        </tr>
    </table></td>
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
    <td width="338"><table width="388">
      <tr>
        <td colspan="2">1. Metode Pembayaran : <?php echo $transaksi;?></td>
      </tr>
      <tr>
        <td colspan="2">2. Mohon Pembayaran ditransfer ke rekening dibawah :</td>
      </tr>
      <tr>
        <td width="14">&nbsp;</td>
        <td width="362">Bank Mandiri Cabang Kudus</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>a/c : 184-00-00339898-0</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>a/n : PT. Kualitas Indonesia Sistem</td>
      </tr>
      <tr>
        <td height="21" colspan="2">3. Pembayaran dianggap sah apabila cek/giro sudah dicairkan</td>
      </tr>
    </table></td>
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
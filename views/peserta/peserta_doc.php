<?php include "cryptz.php"; ?>
<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
		<style>        
@page Section1 {size:595.45pt 841.7pt; margin:1.0in 1.25in 1.0in 1.25in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
        div.Section1 {page:Section1;}
        @page Section2 {size:841.7pt 595.45pt;mso-page-orientation:landscape;margin:1.25in 1.0in 1.25in 1.0in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
        div.Section2 {page:Section2;}
</style>
    </head>
	
    <body>
	
	<div class=Section2>
		<center>
		<strong>
        <table width="1200" style="font-size:18px;">
	  <tr>
	    <td width="496" rowspan="3"><div align="center"><img src="<?php echo base_url();?>gambar/kis.png" width="130" height="115"  /></div></td>
	    <td width="496"><div align="center"></div></td>
	    <td width="496" rowspan="3"><div align="center"><img src="<?php echo base_url();?>gambar/k3.jpg" width="100" height="100"  /></div></td>
      </tr>
	  
	  <tr>
	    <td><div align="center"><strong>DAFTAR HADIR PESERTA</strong></div></td>
	    </tr>
	  <tr>
	    <td><div align="center"><strong>PT. KUALITAS INDONESIA SISTEM</strong></div></td>
	    </tr>
    </table>

		</strong>
		</center>
		<table style="font-size:18px;">
		<tr>
			<td style="width:200px;">Hari/Tanggal</td>
			<td> : </td>
			<td> </td>
		</tr>
		<tr>
			<td style="width:200px;">Pelatihan</td>
			<td> : </td>
			<td> <?php 
		
		$pelatihan = $peserta_data->row();
		$pelatihan2 = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$pelatihan->id_pelatihan'")->row();
		$pelatihan3 = $this->db->query("SELECT * FROM kategori_pelatihan WHERE id_kategori_pelatihan='$pelatihan2->id_kategori_pelatihan'")->row();
		echo " ".$pelatihan3->nama_kategori;
		?></td>
		</tr>
		<tr>
			<td style="width:200px;">Tempat</td>
			<td> : </td>
			<td> <?php echo " ".md5_decrypt($pelatihan2->tempat);?></td>
		</tr>
		</table>
			
        <div align="center"></div>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
        <th style="width:30px;">No</th>
		<th style="height:50px;">Nama Peserta</th>
		<th style="height:50px;">Perusahaan</th>
		<th style="width:150px; height:50px;">No Hp</th>
		<th style="width:150px; height:50px;">TTD</th>
		
            </tr><?php
			$start = 0;
            foreach ($peserta_data->result() as $peserta)
            {
                ?>
                <tr>
		      <td style="height:50px;"><?php echo ++$start ?></td>
		      <td style="height:50px;"><?php echo md5_decrypt($peserta->nama_peserta); ?></td>
		      <td style="height:50px;"><?php echo md5_decrypt($peserta->perusahaan); ?></td>
		      <td style="height:50px;">
			  <?php 
			  $hp = md5_decrypt($peserta->no_hp); 
			  if($hp==0 OR $hp=="-"){
				echo "";
			  }else{
				echo md5_decrypt($peserta->no_hp);
			  }
			  ?>
			  </td>
		      <td></td>
                </tr>
                <?php
            }
            ?>
        </table>
		</div>
    </body>
</html>
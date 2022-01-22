<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=excel_kemenaker.xls");
include "cryptz.php";
?>
<style>
@font-face {
        font-family: tulisan_keren;
        src: url(<?php echo base_url(); ?>dist/fonts/calibri.ttf);
}
#tabel{
	font-family: 'tulisan_keren';
	font-size: 14pt;
	font-variant: inherit;
}
</style>
<!doctype html>
<html>
    <head>
        <title>Excel</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <table width="4850" border="1" id="tabel">
			<thead>
            <tr>
              <th colspan="11" style="background-color:yellow;"><div align="left">HARAP DIISI MENGGUNAKAN FORMAT YANG SUDAH ADA ( <span style="color:red">DILARANG MERUBAH ukuran serta bentuk huruf KAPITAL &amp; latin dari font</span> )</div></th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
            <tr>
              <th colspan="11" style="background-color:yellow;"><div align="left">Setelah diisi segera kirimkan kembali form ini ke  <span style="color:red">daafi_a@yahoo.com</span> untuk pertanyaan silahkan hub. 0812 9 666 300 (DAAFI)</div></th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
            <tr>
              <th colspan="11"><div align="left">
              <h3><strong>
              JUDUL TRAINING :<em> AHLI MUDA K3 KONSTRUKSI<span style="color:red">(hapus yang tidak perlu)</span> </em>
			  </strong></h3>
              </div>
              </th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
            <tr style="background-color:#00b0f0;">
                <th width="34"><div align="center">NO</div></th>
		<th width="243"><div align="center">NAMA LENGKAP PESERTA</div></th>
		<th width="243"><div align="center">TEMPAT, TANGGAL LAHIR</div></th>
		<th width="243"><div align="center">NAMA PERUSAHAAN PESERTA</div></th>
		<th width="243"><div align="center">ALAMAT PERUSAHAAN</div></th>
		<th width="243"><div align="center">ALAMAT RUMAH</div></th>
		<th width="243"><div align="center">NAMA PJK3</div></th>
		<th width="243"><div align="center">PIMPINAN PJK3</div></th>
		<th width="243"><div align="center">JABATAN PIMPINAN PJK3</div></th>
		<th width="243"><div align="center">KOTA PELAKSANAAN</div></th>
		<th width="243"><div align="center">TANGGAL PELAKSANAAN</div></th>
		<th width="243"><div align="center">JENIS PELATIHAN</div></th>
		<th width="243"><div align="center">NO.TLP/HP PESERTA</div></th>
		<th width="243"><div align="center">ALAMAT EMAIL PESERTA</div></th>
            </tr>
			</thead>
			<tbody><?php
			$peserta_data = $this->db->query("SELECT * FROM peserta ORDER BY id_peserta DESC")->result();
			$start=0;
            foreach ($peserta_data as $peserta)
            {
                ?>
                <tr>
			<td><?php echo ++$start; ?></td>
			 <td><?php echo md5_decrypt($peserta->nama_peserta); ?></td>
			 <td><?php echo md5_decrypt($peserta->tempat_tgl_lahir); ?></td>
			 <td><?php echo md5_decrypt($peserta->perusahaan); ?></td>
			 <td><?php echo md5_decrypt($peserta->alamat_perusahaan); ?></td>
			 <td><?php echo md5_decrypt($peserta->alamat_rumah); ?></td>
			 <td><?php echo "PT. KUALITAS INDONESIA SISTEM"; ?></td>
			 <td><?php echo "Aprilia Putri Suhardini, SH.,M.Kn"; ?></td>
			 <td><?php echo "Direktur"; ?></td>
			 <td><?php echo md5_decrypt($peserta->nama_peserta); ?></td>
			 <td><?php echo md5_decrypt($peserta->keterangan); ?></td>
			 <td><?php echo md5_decrypt($peserta->nama_peserta); ?></td>
			 <td><?php echo md5_decrypt($peserta->no_hp); ?></td>
			 <td><?php echo md5_decrypt($peserta->email); ?></td>
			 <?php } ?>
		</tr>
           </tbody>
        </table>
		
</body>
</html>

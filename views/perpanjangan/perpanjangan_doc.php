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
    </head>
    <body>
        <h2>Perpanjangan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kategori Pelatihan</th>
		<th>Nama Peserta</th>
		<th>Tempat Lahir</th>
        <th>Tanggal lahir</th>
        <th>nik</th>
        <th>Pendidikan</th>
        <th>No registrasi</th>
        <th>No Sertifikat</th>
        <th>Perusahaan</th>
        <th>Alamat</th>
        <th>No Surat Permohonan</th>
        <th>Tgl Surat Permohonan</th>
		<th>Tgl Submit</th>
        <th>No PTSA</th>
        <th>Status</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($perpanjangan_data as $perpanjangan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $perpanjangan->id_kategori_pelatihan ?></td>
		      <td><?php echo $perpanjangan->nama_peserta ?></td>
		      <td><?php echo $perpanjangan->tempat_lahir ?></td>
              <td><?php echo $perpanjangan->tgl_lahir?></td>
              <td><?php echo $perpanjangan->nik ?></td>
              <td><?php echo $perpanjangan->pendidikan ?></td>
              <td><?php echo $perpanjangan->no_reg ?></td>
              <td><?php echo $perpanjangan->no_sert ?></td>
              <td><?php echo $perpanjangan->perusahaan ?></td>
              <td><?php echo $perpanjangan->alamat ?></td>		              
		      <td><?php echo $perpanjangan->no_surat_permo ?></td>
              <td><?php echo $perpanjangan->tgl_surat_permo ?></td>
              <td><?php echo $perpanjangan->tgl_submit ?></td>
              <td><?php echo $perpanjangan->no_ptsa ?></td>
              <td><?php echo $perpanjangan->status ?></td>
		      <td><?php echo $perpanjangan->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
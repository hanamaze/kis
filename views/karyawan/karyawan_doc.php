<!doctype html>
<html>
    <head>
        <title>KIS</title>
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
        <h2>Karyawan List okoko</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Karyawan</th>
		<th>Nik</th>
		<th>Jenis Kelamin</th>
		<th>Tgl Masuk Kerja</th>
		<th>Jabatan</th>
		<th>Tgl Lahir</th>
		<th>Nama Ibu Kandung</th>
		<th>Status</th>
		<th>Jumlah Anak</th>
		<th>Alamat</th>
		<th>No Hp</th>
		<th>Keterangan</th>
		<th>Foto</th>
		<th>Status Aktif</th>
		
            </tr><?php
            foreach ($karyawan_data as $karyawan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $karyawan->nama_karyawan ?></td>
		      <td><?php echo $karyawan->nik ?></td>
		      <td><?php echo $karyawan->jenis_kelamin ?></td>
		      <td><?php echo $karyawan->tgl_masuk_kerja ?></td>
		      <td><?php echo $karyawan->jabatan ?></td>
		      <td><?php echo $karyawan->tgl_lahir ?></td>
		      <td><?php echo $karyawan->nama_ibu_kandung ?></td>
		      <td><?php echo $karyawan->status ?></td>
		      <td><?php echo $karyawan->jumlah_anak ?></td>
		      <td><?php echo $karyawan->alamat ?></td>
		      <td><?php echo $karyawan->no_hp ?></td>
		      <td><?php echo $karyawan->keterangan ?></td>
		      <td><?php echo $karyawan->foto ?></td>
		      <td><?php echo $karyawan->status_aktif ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
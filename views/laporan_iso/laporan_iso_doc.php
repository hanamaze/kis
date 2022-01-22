<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>Laporan_iso List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Surat</th>
		<th>Nama Pt</th>
		<th>Alamat</th>
		<th>Auditor</th>
		<th>Tgl 1</th>
		<th>Tgl 2</th>
		<th>Tgl 3</th>
		<th>Tgl 4</th>
		<th>Tgl 5</th>
		<th>Tgl 6</th>
		
            </tr><?php
            foreach ($laporan_iso_data as $laporan_iso)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $laporan_iso->no_surat ?></td>
		      <td><?php echo $laporan_iso->nama_pt ?></td>
		      <td><?php echo $laporan_iso->alamat ?></td>
		      <td><?php echo $laporan_iso->auditor ?></td>
		      <td><?php echo $laporan_iso->tgl_1 ?></td>
		      <td><?php echo $laporan_iso->tgl_2 ?></td>
		      <td><?php echo $laporan_iso->tgl_3 ?></td>
		      <td><?php echo $laporan_iso->tgl_4 ?></td>
		      <td><?php echo $laporan_iso->tgl_5 ?></td>
		      <td><?php echo $laporan_iso->tgl_6 ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
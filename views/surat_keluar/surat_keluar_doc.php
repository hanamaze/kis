<!doctype html>
<html>
    <head>
        <title>Faktur</title>
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
        <h2>Surat Keluar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Surat</th>
		<th>Tanggal</th>
		<th>Deskripsi</th>
		<th>Keterangan</th>

		
            </tr><?php
            foreach ($surat_data as $surat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $surat->no_surat ?></td>
		      <td><?php echo $surat->tanggal ?></td>
		      <td><?php echo $surat->deskripsi ?></td>
		      <td><?php echo $surat->keterangan ?></td>
		
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
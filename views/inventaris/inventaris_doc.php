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
        <h2>Inventaris List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Kategori</th>
		<th>Lokasi</th>
		<th>Satuan</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>Tanggal</th>
		<th>Merk</th>
		<th>Foto</th>
		<th>Keterangan</th>
		<th>Kondisi</th>
		
            </tr><?php
            foreach ($inventaris_data as $inventaris)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $inventaris->kode_barang ?></td>
		      <td><?php echo $inventaris->nama_barang ?></td>
		      <td><?php echo $inventaris->kategori ?></td>
		      <td><?php echo $inventaris->lokasi ?></td>
		      <td><?php echo $inventaris->satuan ?></td>
		      <td><?php echo $inventaris->harga ?></td>
		      <td><?php echo $inventaris->jumlah ?></td>
		      <td><?php echo $inventaris->tanggal ?></td>
		      <td><?php echo $inventaris->merk ?></td>
		      <td><?php echo $inventaris->foto ?></td>
		      <td><?php echo $inventaris->keterangan ?></td>
		      <td><?php echo $inventaris->kondisi ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
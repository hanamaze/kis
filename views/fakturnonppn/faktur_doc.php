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
        <h2>faktur List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Faktur</th>
		<th>No Kwitansi</th>
		<th>Tanggal</th>
		<th>Uraian</th>
		<th>Jumlah</th>
		<th>Harga Satuan</th>
		<th>Harga Total</th>
		<th>Dari</th>
		<th>Alamat</th>
		<th>Telp</th>
		<th>Npwp</th>
		<th>Disc</th>
		<th>Ppn</th>
		<th>Transaksi</th>
		
            </tr><?php
            foreach ($faktur_data as $faktur)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $faktur->no_faktur ?></td>
		      <td><?php echo $faktur->no_kwitansi ?></td>
		      <td><?php echo $faktur->tanggal ?></td>
		      <td><?php echo $faktur->uraian ?></td>
		      <td><?php echo $faktur->jumlah ?></td>
		      <td><?php echo $faktur->harga_satuan ?></td>
		      <td><?php echo $faktur->harga_total ?></td>
		      <td><?php echo $faktur->dari ?></td>	
		      <td><?php echo $faktur->alamat ?></td>	
		      <td><?php echo $faktur->telp ?></td>	
		      <td><?php echo $faktur->npwp ?></td>	
		      <td><?php echo $faktur->disc ?></td>	
		      <td><?php echo $faktur->ppn ?></td>	
		      <td><?php echo $faktur->transaksi ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
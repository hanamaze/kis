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
        <h2>Kategori_pelatihan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Kategori</th>
		<th>Keterangan</th>
		<th>Color Chart</th>
		
            </tr><?php
            foreach ($kategori_pelatihan_data as $kategori_pelatihan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kategori_pelatihan->nama_kategori ?></td>
		      <td><?php echo $kategori_pelatihan->keterangan ?></td>
		      <td><?php echo $kategori_pelatihan->color_chart ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
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
        <h2>Kontak List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Kontak</th>
		<th>Instansi</th>
		<th>No Hp1</th>
		<th>No Hp2</th>
		<th>Email 1</th>
		<th>Email 2</th>
		<th>Alamat 1</th>
		<th>Alamat 2</th>
		<th>Ket</th>
		
            </tr><?php
            foreach ($kontak_data as $kontak)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kontak->nama_kontak ?></td>
		      <td><?php echo $kontak->instansi ?></td>
		      <td><?php echo $kontak->no_hp1 ?></td>
		      <td><?php echo $kontak->no_hp2 ?></td>
		      <td><?php echo $kontak->email_1 ?></td>
		      <td><?php echo $kontak->email_2 ?></td>
		      <td><?php echo $kontak->alamat_1 ?></td>
		      <td><?php echo $kontak->alamat_2 ?></td>
		      <td><?php echo $kontak->ket ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
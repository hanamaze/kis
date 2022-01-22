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
        <h2>Email_karyawan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Karyawan</th>
		<th>Email</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($email_karyawan_data as $email_karyawan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $email_karyawan->id_karyawan ?></td>
		      <td><?php echo $email_karyawan->email ?></td>
		      <td><?php echo $email_karyawan->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
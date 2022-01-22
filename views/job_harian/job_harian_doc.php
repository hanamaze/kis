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
        <h2>Job_harian List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Peserta</th>
		<th>Uraian</th>
		<th>Tanggal</th>
		<th>Start</th>
		<th>End</th>
		<th>Keterangan</th>
		<th>Color</th>
		
            </tr><?php
            foreach ($job_harian_data as $job_harian)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $job_harian->id_peserta ?></td>
		      <td><?php echo $job_harian->uraian ?></td>
		      <td><?php echo $job_harian->tanggal ?></td>
		      <td><?php echo $job_harian->start ?></td>
		      <td><?php echo $job_harian->end ?></td>
		      <td><?php echo $job_harian->keterangan ?></td>
		      <td><?php echo $job_harian->color ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
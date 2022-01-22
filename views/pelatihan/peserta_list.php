<!doctype html>
<html>
    <head>
        <title>CRUD</title>

    </head>
    <body>
	<?php
		$peserta_data = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id_pelatihan'")->result();
		$start = 0;
	?>
	<a href="<?php echo base_url("peserta")."/pelatihan/".$id_pelatihan; ?>" class="btn btn-primary">Kelola Data Peserta</a>
		<div class="box">

            <div class="box-body">
			
		<?php
			if($peserta_data != NULL){
		?>

		
        <table id="example2" class="table table-bordered table-striped">
			<thead>
            <tr>
        <th>No</th>
		<th>Nama Peserta</th>
        </tr></thead>
		<tbody>
		<?php
            foreach ($peserta_data as $peserta)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td>
			<?php echo md5_decrypt($peserta->nama_peserta) ?><br>
			<span class="badge bg-light-blue"><?php echo md5_decrypt($peserta->perusahaan) ?></span>
			
			</td>

		</tr>
                <?php
			}
            ?></tbody>
        </table>

		<?php
			}else{
				echo "<center><h1>Kosong</h1></center>";
			}
		?>		
		</div>
		</div>
		
		
		
		
		
		
    </body>
</html>


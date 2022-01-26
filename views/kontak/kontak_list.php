<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Kontak List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kontak/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kontak/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kontak'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
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
		<th>Action</th>
            </tr><?php
            foreach ($kontak_data as $kontak)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kontak->nama_kontak ?></td>
			<td><?php echo $kontak->instansi ?></td>
			<td><?php echo $kontak->no_hp1 ?></td>
			<td><?php echo $kontak->no_hp2 ?></td>
			<td><?php echo $kontak->email_1 ?></td>
			<td><?php echo $kontak->email_2 ?></td>
			<td><?php echo $kontak->alamat_1 ?></td>
			<td><?php echo $kontak->alamat_2 ?></td>
			<td><?php echo $kontak->ket ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kontak/read/'.$kontak->id_kontak),'Read'); 
				echo ' | '; 
				echo anchor(site_url('kontak/update/'.$kontak->id_kontak),'Update'); 
				echo ' | '; 
				echo anchor(site_url('kontak/delete/'.$kontak->id_kontak),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('kontak/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('kontak/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
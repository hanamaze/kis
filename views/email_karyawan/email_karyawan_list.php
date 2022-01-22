<!doctype html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Email_karyawan</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div> 
		
		
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
				<a href="#" class="create-email_karyawan btn btn-primary">Tambah</a>
                
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
               
            </div>
        </div>
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Email_karyawan</h3>
            </div>
            
            <div class="box-body">
            <div class="box-body" style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
			<thead>
            <tr>
                <th>No</th>
		<th>Karyawan</th>
		<th>Email</th>
        <th>Nomor WA</th>
        <?php if($this->session->userdata("status")=="admin"){ ?>
        <th>Action</th>
        <?php } ?>
            </tr></thead><tbody><?php
            foreach ($email_karyawan_data as $email_karyawan)
            {
                ?>
                <tr>
			<td><?php echo ++$start ?></td>
			<td><?php $em = $email_karyawan->id_karyawan;
			$m = $this->db->query("SELECT * FROM karyawan WHERE id_karyawan='$em'")->row();
			echo md5_decrypt($m->nama_karyawan);
			?></td>
			<td><?php echo $email_karyawan->email ?></td>
            <td><?php 


            echo "<a class='btn btn-success' href='http://wa.me/62".substr($email_karyawan->wa,1,20)."'><img width='20'src='gambar/wa.png'> ".$email_karyawan->wa."</a>"; ?>
                
            </td>
                <?php if($this->session->userdata("status")=="admin"){ ?>
            <td>
                
                <a href="<?php echo base_url("email_karyawan/delete/".$email_karyawan->id_email);?>" class="btn btn-danger"><span class="fa fa-trash-o"></span></a>
            </td>
                <?php }?>
		</tr>
                <?php
            }
            ?></tbody>
        </table>
        </div>
		</div>
		</div>
        <div class="row">
            <div class="col-md-6">
                
		<?php echo anchor(site_url('email_karyawan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('email_karyawan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            
        </div>
    </body>
</html>
<script>
		$(function(){
            $(document).on('click','.create-email_karyawan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('index.php/email_karyawan/create');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
</script>

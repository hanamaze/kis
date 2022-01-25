<?php   
$id = $this->session->userdata('id');   
$user = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();  ?>

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
                        <h4 class="modal-title" id="myModalLabel">Perpanjangan</h4>
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
		<div class="box box-primary">
            <?php if($id=="7" OR $id=="12" OR $id=="334"){ ?> 
            <br><a href="#" class="create-perpanjangan btn btn-primary fa  fa-plus" data-id='<?php echo $this->uri->segment(3); ?>'> Tambah</a><br><br>
            <?php } ?>
            <div class="box-body">
            	<div class="box-body"  style="overflow:scroll;">
        <table id="example2" class="table table-bordered table-striped">
			<thead>
            <tr>
                <th>No</th>
		<th>Nama Peserta</th>
		<th>Perusahaan</th>
		<th>Tgl Perpanjangan</th>
        <th>Status Proses</th>
		<th>Action</th>
            </tr></thead><tbody><?php
			$start = 1;
            foreach ($perpanjangan_data as $perpanjangan)
            {
                ?>
                <tr>
			<td><?php echo $start++ ?></td>
			<td><?php echo $perpanjangan->nama_peserta."<br><span class='badge bg-light-blue'>".strtoupper($perpanjangan->status)."</span>"; ?></td>
			<td><?php echo $perpanjangan->perusahaan ?></td>
			<td><?php echo $perpanjangan->tgl_submit; ?></td>
            <td><?php echo $perpanjangan->status; ?></td>
            
			<td>
			<?php if($id=="7" OR $id=="12"){ ?>	 
		<a href="#" class="detail-perpanjangan btn btn-primary" data-id="<?php echo $perpanjangan->id_perpanjangan ?>"><span class=" fa fa-building-o"></span></a>
		<a href="<?php echo site_url('perpanjangan/update/'.$perpanjangan->id_perpanjangan) ?>" class="btn btn-success"><span class=" fa fa-pencil"></span></a>
		<a href="<?php echo site_url('perpanjangan/delete/'.$perpanjangan->id_perpanjangan) ?>" class="btn btn-danger" onclick="javasciprt: return confirm('Anda Yakin Ingin Menghapus?');"><span class=" fa fa-trash-o"></span></a>
		
		<?php 
				}
				
				?>
			</td>
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
                
		<!-- 
		<a href='<?php echo site_url('perpanjangan/excel') ?>' class='btn btn-success'><span class='fa fa-download'></span> Excel</a>
		<a href='<?php echo site_url('perpanjangan/word') ?>' class='btn btn-primary'><span class='fa fa-download'></span> Word</a>
		-->
	    </div>
            
        </div>
    </body>
</html>
<script>
		$(function(){
            $(document).on('click','.create-perpanjangan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('index.php/perpanjangan/create');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
</script>
<script>
		$(function(){
            $(document).on('click','.detail-perpanjangan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('index.php/perpanjangan/read');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
</script>
<?php
/*  */ ?>
<center>
<table style="width:100%;" id="example2" class="table table-bordered table-striped">

<tr>
    
    <td >
<div align="center" style="font-size:26px;"><strong>ID CARD BG: </strong></div>

</td>
<td>


    	<div align="center">
    		<a href="<?php echo base_url("peserta/cetak_idcard/".$this->input->post('id'));?>" class="btn btn-info">Download </a>
    	</div>
    </td>
  </tr>
  <tr>
    
    <td >
<div align="center" style="font-size:26px;"><strong>ID CARD TANPA BG: </strong></div>

</td>
<td>


        <div align="center">
            <a href="<?php echo base_url("peserta/cetak_idcard_kosong/".$this->input->post('id'));?>" class="btn btn-danger">Download</a>
        </div>
    </td>
  </tr>
 <tr>
    <td style="width: 50%;"><div align="center" style="font-size:26px;"><strong>UPLOAD DESIGN: </strong></div></td>
    <td style="width: 50%;"><center>
	<?php $id = $this->input->post('id'); ?>
<?php echo form_open("peserta/update_idcard", array('enctype'=>'multipart/form-data')); ?>
	    <table>
	    	<tr>
            <td>
            <input type="file" class="form-control" name="file" required />
        	</td>
        	
        	<td>
	    	<input type="hidden" name="id_pelatihan" value="<?php echo $id; ?>" /> 
	    	<input type="submit" class="btn btn-primary" name="submit" value="Upload" /> 
			</td>
			</tr>
	</table>
	<?php echo form_close(); ?>
</center></td>
 </tr>
 
  
  
</table>
<?php $img_idcard = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
if($img_idcard->idcard != NULL){
?>
<img src="<?php echo base_url()."idcard/".$img_idcard->idcard; ?>" style="width: 100%;">
<?php }else{
	echo "<br><br><br><br><h1>DESIGN ID CARD BELUM ADA</h1><br><br><br><br>";
} ?>
</center>
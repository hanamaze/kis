<center>
<table style="width:100%;" id="example2" class="table table-bordered table-striped">
 <tr>
    <td colspan="2"><div align="center"><h1>Cetak Data: </h1></div></td>
    </tr>
  <tr>
    <td width="119"><div align="center">
    	<a href="<?php echo base_url("peserta/word/".$this->input->post('id'));?>" class="btn btn-success">Download Absen <i class="fa fa-sticky-note"></i></a></div>
    </td>
    <td width="119"><div align="center">
    	<a href="<?php echo base_url("peserta/excel/".$this->input->post('id'));?>" class="btn btn-danger">Download Excel Biasa <i class="fa fa-sticky-note"></i></a></div>
    </td>
    <!-- td width="120"><div align="center"><a href="<?php echo base_url("peserta/excel2/");?>" class="btn btn-success">Download Excel Format Kemenaker <i class="fa fa-sticky-note-o"></i></a></div></td> -->
  </tr>
  
</table>

</center>
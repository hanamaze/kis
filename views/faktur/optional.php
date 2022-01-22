<?php error_reporting(0);?>
<center>
<?php 
echo anchor(site_url('faktur/cetak/'.$this->input->post('id')),'Cetak Tanpa Materai','class="btn btn-primary"'); 
echo anchor(site_url('faktur/cetak2/'.$this->input->post('id')),'Cetak Dengan Materai','class="btn btn-success"'); 

?>
</center>
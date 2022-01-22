<?php 
echo anchor(site_url('faktur/cetak/'.$this->input->post('id')),'Biasa','class="btn btn-primary"'); 
echo anchor(site_url('faktur/cetak2/'.$this->input->post('id')),'Materai','class="btn btn-success"'); 

?>
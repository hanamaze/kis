

<?php 
	//$plthn 	= $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id_pelatihan'")->result();
	//$pst 	= $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$id_pelatihan'")->result(); 
	//foreach($pst as $pl){
?>
<?php //echo md5_decrypt($pl->nama_peserta);?>


<?php //}?>
<style>

</style>
</head>
<body>

<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.container {
  position: relative;
  font-family: Arial;
}

.text-block {
  position: absolute;
  bottom: 20px;
  padding-left: 20px;
  padding-right: 20px;
  text-align:center;
}
</style>
</head>
<body>


<div class="row">
  <div class="column" >
  <img src="<?php echo base_url(); ?>skl/id.png" alt="Nature" style="width:100%;">
	<div class="text-block">
		<h1>Nature</h1>
	</div>
  </div>
  <div class="column" >
    <img src="<?php echo base_url(); ?>skl/id.png" alt="Nature" style="width:100%;">
	<div class="text-block">
		<h1>Nature</h1>
	</div>
  </div> 
  <div class="column" >
  <img src="<?php echo base_url(); ?>skl/id.png" alt="Nature" style="width:100%;">
	<div class="text-block">
		<h1>Nature</h1>
	</div>
  </div>
  <div class="column">
    <img src="<?php echo base_url(); ?>skl/id.png" alt="Nature" style="width:100%;">
	<div class="text-block">
		<h1>Nature</h1>
	</div>
  </div> 
   


</div>

	<link rel="icon" type="image/png" href="<?php echo base_url();?>gambar/kis.png">

<style type="text/css">
@font-face {
        font-family: fontku;
        src: url(<?php echo base_url(); ?>font/tebal3.otf);
}
 
.fontku{
  font-family: 'fontku';
  font-variant: inherit;
  text-align: center;
}
@font-face {
        font-family: fontku2;
        src: url(<?php echo base_url(); ?>font/tebal4.otf);
}
 
.fontku2{
  font-family: 'fontku2';
  font-variant: inherit;
  
}
	.sert{
		text-align:center;
		;
	}
body{
	background-image: url("<?php echo base_url(); ?>gambar/sertifikat.jpg");
		width: 95%;
    	height: 95%;
    	background-position: center;
    	background-repeat: no-repeat;

}

</style>

<body>
<center><img width="300" src="<?php echo base_url();?>gambar/checkmark.gif"></center>
<div class="sert fontku2">

<h1 class="fontku"><?php echo strtoupper($nama);?></h1><br>	
<h2 class="fontku">Has Successfully Completed</h2> <br>


 <center>
<div style=" width: 600px; height:100px; color:white; background: linear-gradient(240deg, #9ebd13 0%, #008552 100%);">
	<br><br>
<?php echo $kategori;?><br>	

No.Reg: <?php echo $idd;?>/<?php echo $kategori_reg;?><br>
</div>
</center>
</div>
</body>
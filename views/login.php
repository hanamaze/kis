<!DOCTYPE html>
<html lang="en">
<head>
	<title>PT. Kualitas Indonesia Sistem</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>gambar/kis.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dist/css/main.css">
<!--===============================================================================================-->

</head>
<style>
body {
 background-image: url("<?php echo base_url();?>dist/images/back.jpg");
 background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover;
}
</style>
<body>
	
	<div class="limiter"><center>

			<?php 
			if($this->uri->segment(2)=="wrong"){
			echo "<div class='alert alert-danger alert-dismissible' style='width:500px;'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-ban'></i> Peringatan!</h4>
                Username atau password anda salah. <br>
                Silahkan coba lagi atau hubungi web master
              </div>"; 
          }else{
          	echo "<div class='alert alert-primary alert-dismissible' style='width:500px; text-align:center;'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4>Welcome</h4>
                >>> Selamat datang di Sistem Informasi KIS <<< <br>  
              </div>"; 
          }
          ?>
			<div class="wrap-login100" style="background:url('<?php echo base_url();?>dist/images/kotak.jpg')">
				
				<form class="login100-form validate-form"  action="<?php echo base_url('index.php/login/aksi_login'); ?>" method="post">
					<span class="login100-form-logo">
						<img src="<?php echo base_url();?>gambar/kis.png" width="100" >
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						PT. K I S
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" style="border-radius:5px;">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" style="border-radius:5px;">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>


				</form>
			</div>
		</center>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>dist/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>dist/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>dist/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>dist/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>dist/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>dist/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>dist/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>dist/js/main.js"></script>

</body>
</html>
<!DOCTYPE html>
<?php
error_reporting(0);
include "cryptz.php";

if($this->session->userdata('status') == "user" OR $this->session->userdata('status') == "hrd" OR $this->session->userdata('status') == "akunting" OR $this->session->userdata('status') == "leader"  OR $this->session->userdata('status') == "admin" OR $this->session->userdata('status') == "cabang"){
}else{
	redirect(base_url()."index.php/login");
}
	$id = $this->session->userdata('id');	
	$user = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT. Kualitas Indonesia Sistem </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();  ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();  ?>dist/css/skins/skin-yellow.min.css">
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Morris charts -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/morris.js/morris.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/fullcalendar/dist/fullcalendar.min.css">
<link rel="icon" type="image/png" href="<?php echo base_url();?>gambar/kis.png">
<!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url();  ?>bower_components/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?php echo base_url();  ?>js/cropper/cropper.min.css">
  <link rel="stylesheet" href="<?php echo base_url();  ?>css/main.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style>
@font-face {
        font-family: fontku;
        src: url(<?php echo base_url(); ?>font/tebal4.ttf);
}
 
.fontku{
  font-family: 'fontku';
  font-variant: inherit;
}
@font-face {
        font-family: fontku2;
        src: url(<?php echo base_url(); ?>font/tebal4.ttf);
}
 
.fontku2{
  font-family: 'fontku2';
  font-variant: inherit;
}
</style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->


<body class="hold-transition skin-yellow sidebar-mini ">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>IS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PT. </b>K I S</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top fontku" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- /.messages-menu -->
          <!-- Notifications Menu -->
         <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 
              <span class="hidden-xs">
				<center><strong><span style="color:white;" id="clock"></span> </strong></center>
			  </span>
            </a>
			</li>
			
			 
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <?php if(md5_decrypt($user->foto) != NULL){ ?>
                <img src="<?php echo base_url();?>foto_user/<?php echo md5_decrypt($user->foto); ?>" class="user-image" alt="User Image">
              <?php }else{?>
                <img src="<?php echo base_url(); ?>dist/image/21A.png" class="user-image" alt="User Image">
              <?php } ?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo md5_decrypt($user->nama);?>  
			  
			  </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <?php if(md5_decrypt($user->foto) != NULL){ ?>
                <img src="<?php echo base_url();?>foto_user/<?php echo md5_decrypt($user->foto); ?>" class="img-circle" alt="User Image">
              <?php }else{?>
                <img src="<?php echo base_url(); ?>dist/image/21A.png" class="img-circle" alt="User Image">
              <?php } ?>
                <p>
                  <strong><small><?php echo md5_decrypt($user->nama);?></small></strong>
				 <small> <?php echo md5_decrypt($user->jabatan);?></small>
                  <small>PT Kualitas Indonesia Sistem. <?php echo date("Y");?></small>

				<small></small>
				</p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('profil'); ?>" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>index.php/login/logout" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
    </section>
    <div class="fontku">
<?php $this->load->view('menu');?>
</div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container-fluid">

	<section class="content-header fontku">
    <img width="40" src="<?php echo base_url();?>gambar/kis_circle.png">
    <strong style="font-size:16px;">PT. KIS</strong>
    <!--
    <strong style="font-size:16px; ">
      PT. KUALITAS INDONESIA SISTEM -> 
		<?php if($konten == "user/user_list"){ echo "USER"; } ?>
		<?php if($konten == "surat_masuk/surat_masuk_list"){ echo "SURAT MASUK"; } ?>
		<?php if($konten == "surat_keluar/surat_keluar_list"){ echo "SURAT KELUAR"; } ?>
		<?php if($konten == "faktur/faktur_list"){ echo "FAKTUR"; } ?>
		<?php if($konten == "karyawan/karyawan_list"){ echo "KARYAWAN"; } ?>
		<?php if($konten == "expedisi/expedisi_list"){ echo "EXPEDISI"; } ?>
		<?php if($konten == "inventaris/inventaris_list"){ echo "INVENTARIS"; } ?>
		<?php if($konten == "job_harian/job_harian_list"){ echo "JOB HARIAN"; } ?>
    <?php if($konten == "kategori_pelatihan/kategori_pelatihan_list"){ echo "PERPANJANGAN"; } ?>
    <?php if($konten == "nomor_iso/nomor_iso_list"){ echo "NOMOR ISO"; } ?>
    <?php if($konten == "nomor_smk3/nomor_smk3_list"){ echo "NOMOR SMK3"; } ?>
    <?php if($konten == "kontak/kontak_list"){ echo "KONTAK"; } ?>

    <?php if($konten == "email_karyawan/email_karyawan_list"){ echo "EMAIL KARYAWAN"; } ?>
    <?php if($konten == "setting/setting_list"){ echo "SETTING"; } ?>
    <?php if($konten == "pelatihan/pelatihan_list"){ echo "PELATIHAN"; } ?>
  </strong>
-->
		</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-folder"></i>Home</a></li>
		<?php if($this->uri->segment("1") == "peserta"){ ?>
			<li><a href="<?php echo base_url("pelatihan");?>">
			<?php echo "pelatihan"; ?>
			</a></li>
			<?php 
      $id = $this->uri->segment("3"); 
      $p = $this->db->query("SELECT * FROM pelatihan WHERE id_pelatihan='$id'")->row();
      $pst = $this->db->query("SELECT * FROM peserta WHERE id_peserta='$id'")->row();
      ?>
      
			<li><a href="<?php echo base_url("pelatihan");?>" class="detail-pelatihan2" data-id="<?php echo $id;?>">

			<?php 

      if($this->uri->segment("2")=="update"){
        echo md5_decrypt($pst->nama_peserta);
      }else{
        echo md5_decrypt($p->nama_pelatihan);
      }
      ?>
			</a></li>
		<?php } if($this->uri->segment("1") != NULL and $this->uri->segment("1") != "peserta"){?>
			<li><a href="<?php echo base_url().$this->uri->segment("1");?>">
			<?php echo $this->uri->segment("1"); ?>
			</a></li>
		<?php }?>
		<?php if($this->uri->segment("3") != NULL and $this->uri->segment("1") != "peserta"){?>

			<li class="active"><?php echo $this->uri->segment("3"); ?></li>
		<?php }?>
	  </ol>
	  </section>
	  <br>
<br>
      <!--------------------------
        | Your Page Content Here |
        ------------------------
-->

	<?php 
$date =  date("d-m");
if($date=="13-08"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun BUDI SISWANTO<br>Tgl Lahir: ";
  echo "13-08-1974";
  echo "</center></h3><br>";
}elseif($date=="22-12"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun SUMIDI<br>Tgl Lahir: ";
  echo "22-12-1960";
  echo "</center></h3><br>";
}elseif($date=="07-01"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun AGUS JALIL<br>Tgl Lahir: ";
  echo "07-01-2000";
  echo "</center></h3><br>";
}elseif($date=="01-03"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Miftah Azizi,ST<br>Tgl Lahir: ";
  echo "01-03-1991";
  echo "</center></h3><br>";
}elseif($date=="21-01"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Wardatul Khoiriyah,S.Si<br>Tgl Lahir: ";
  echo "21-01-1993";
  echo "</center></h3><br>";
}elseif($date=="12-02"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Muhamad Ridwan Huseyni,S.Kom<br>Tgl Lahir: ";
  echo "12-02-1996";
  echo "</center></h3><br>";
}elseif($date=="25-03"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Emi Megawati,SE
<br>Tgl Lahir: ";
  echo "25-03-1995";
  echo "</center></h3><br>";
}elseif($date=="02-03"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Dwiyanto, SKM
<br>Tgl Lahir: ";
  echo "02-03-19xx";
  echo "</center></h3><br>";
}elseif($date=="19-04"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun dr.Agus Prastyo
<br>Tgl Lahir: ";
  echo "19-04-1987";
  echo "</center></h3><br>";
}elseif($date=="25-06"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Haryono
<br>Tgl Lahir: ";
  echo "25-06-1974";
  echo "</center></h3><br>";
}elseif($date=="18-07"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Ahmat Zuli<br>Tgl Lahir: ";
  echo "18-07-1993";
  echo "</center></h3><br>";
}elseif($date=="28-03"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Fahrul Hana,S.Kom
<br>Tgl Lahir: ";
  echo "28-03-1990";
  echo "</center></h3><br>";
}elseif($date=="01-03"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Retno Rahayu Ningsih,SE
<br>Tgl Lahir: ";
  echo "01-03-1978";
  echo "</center></h3><br>";
}elseif($date=="26-02"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Uswatun Hasanah
<br>Tgl Lahir: ";
  echo "26-02-2000";
  echo "</center></h3><br>";
}elseif($date=="20-02"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Liena Ulva,SS
<br>Tgl Lahir: ";
  echo "20-02-1988";
  echo "</center></h3><br>";
}elseif($date=="23-09"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Ferry Artininingrum
<br>Tgl Lahir: ";
  echo "23-09-1979";
  echo "</center></h3><br>";
}elseif($date=="05-04"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Senen Hadi Saputro
<br>Tgl Lahir: ";
  echo "05-04-1967";
  echo "</center></h3><br>";
}elseif($date=="21-03"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Singgih Budiyono,SH.,MKn
<br>Tgl Lahir: ";
  echo "21-03-1991";
  echo "</center></h3><br>";
}elseif($date=="01-04"){
  echo "<h3 style='background-color:yellow; padding:20px; color:red;'><center>Selamat Ulang Tahun Aprilia Putri Suhardini,SH., MKn
<br>Tgl Lahir: ";
  echo "01-04-1995";
  echo "</center></h3><br>";
}

?>
<div class="fontku2">
	<?php	$this->load->view($konten);?>
</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer fontku2">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="#">PT. Kualitas Indonesia Sistem</a>.</strong> All rights reserved.
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3-->
<script src="<?php echo base_url();  ?>bower_components/jquery/dist/jquery.min.js"></script> 
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();  ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<!-- DataTables -->
<script src="<?php echo base_url();  ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();  ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();  ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();  ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();  ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes >-->
<script src="<?php echo base_url();  ?>dist/js/demo.js"></script>
<script src="<?php echo base_url();  ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();  ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url();  ?>bower_components/chart.js/Chart.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();  ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();  ?>bower_components/morris.js/morris.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();  ?>plugins/iCheck/icheck.min.js"></script>
<!-- fullCalendar -->
<script src="<?php echo base_url();?>bower_components/moment/moment.js"></script>
<script src="<?php echo base_url();?>bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <script src="<?php echo base_url();?>js/cropper/cropper.min.js"></script>
  <script src="<?php echo base_url();?>js/main.js"></script>


<script>

 $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {
        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }
        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)
        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'Hari Ini',
        month: 'Bulan',
        week : 'Minggu',
        day  : 'Hari'
      },
      //Random default events
      events    : [
	  <?php 
		foreach($job_harian_utama as $job){
		$id_user = $this->db->query("select * FROM user WHERE id_user='$job->id_peserta'")->row();
		$nama = md5_decrypt($id_user->username);
		$tahun = $job->tanggal[6].$job->tanggal[7].$job->tanggal[8].$job->tanggal[9];
		$hari = ($job->tanggal[0].$job->tanggal[1]);
		$bulan = $job->tanggal[3].$job->tanggal[4]-1;
    $jam = $job->start[0].$job->start[1];
    $menit = $job->start[3].$job->start[4];
    $jam2 = $job->end[0].$job->end[1];
    $menit2 = $job->end[3].$job->end[4];
    $title = $nama.": ".$job->uraian;
    $title2 = str_replace("'"," ",$title);
	  ?>
        {
          title          : '<?php  echo $title2; ?>',
          start          : new Date(<?php echo $tahun; ?>, <?php echo $bulan; ?>, <?php echo $hari; ?>, <?php echo $jam.",".$menit; ?>),
          end          : new Date(<?php echo $tahun; ?>, <?php echo $bulan; ?>, <?php echo $hari; ?>, <?php echo $jam2.",".$menit2; ?>),
          backgroundColor: '<?php echo $job->color; ?>',
          url            : '<?php echo base_url();?>job_harian/detail/<?php echo $job->id_job_harian?>', 
          borderColor    : '<?php echo $job->color; ?>'
        },
		<?php } ?>
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { 
      // this function is called when something is dropped
        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  });


  $(function () {
    "use strict";

    // AREA CHART
    var area = new Morris.Area({
      element: 'revenue-chart',
      resize: true,
      data: [
	  
<?php
		foreach ($pelatihan_data as $pelatihan)
            {
			$jml = $this->db->query("SELECT * FROM peserta WHERE id_pelatihan='$pelatihan->id_pelatihan'")->num_rows();
                ?>
				
        {y: '<?php echo $pelatihan->id_pelatihan; ?>', item1: <?php echo $jml; ?>},
			<?php } ?>
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Jumlah Peserta'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });

  });
//iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

  
		var pieData = [
			<?php 
			  $pa2 = $this->db->query("SELECT * FROM kategori_pelatihan")->result();
			  foreach($pa2 as $p2){
				  $id2 = $p2->id_kategori_pelatihan;
				  
				  $chart = $this->db->query("SELECT pelatihan.*,peserta.* FROM pelatihan, peserta WHERE pelatihan.id_pelatihan=peserta.id_pelatihan AND pelatihan.id_kategori_pelatihan='$id2'")->num_rows();

			  ?>
				{
					value: <?php echo $chart; ?>,
					color:"<?php echo $p2->color_chart;?>",
					highlight: "black",
					label: "<?php echo $p2->nama_kategori; ?>"
				},
				<?php } ?>
				
			];

			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myPie = new Chart(ctx).Pie(pieData);
			};
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
    $(function () {
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
    $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
  //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
      showMeridian: false 
    })
		$(function(){
            $(document).on('click','.create-user',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('user/create');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		 $(function(){
            $(document).on('click','.detail-user',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('user/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });		
		$(function(){
            $(document).on('click','.edit-user',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('user/update/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-masuk-keluar',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('surat_masuk_keluar/tambah/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-masuk-keluar',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('surat_masuk_keluar/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-masuk',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('surat_masuk/tambah');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });		
		$(function(){
            $(document).on('click','.detail-masuk',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('surat_masuk/read');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-keluar',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('surat_keluar/tambah');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });		
		$(function(){
            $(document).on('click','.detail-keluar',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('surat_keluar/read');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        $(function(){
            $(document).on('click','.create-faktur',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('faktur/create');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        }); 
        $(function(){
            $(document).on('click','.detail-faktur',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('faktur/read');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.cetak-faktur',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('faktur/optional');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-iso',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('laporan_iso/read');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });		
		$(function(){
            $(document).on('click','.create-iso',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('laporan_iso/create');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-karyawan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('karyawan/tambah');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-karyawan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('karyawan/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.edit-karyawan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('karyawan/update/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.ganti_foto',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('profil/ganti_foto/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.ganti_password',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('profil/ganti_password/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-expedisi',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('expedisi/tambah/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-expedisi',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('expedisi/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.edit-expedisi',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('expedisi/edit/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-inventaris',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('inventaris/create/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-inventaris',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('inventaris/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.edit-inventaris',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('inventaris/edit/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-pelatihan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('pelatihan/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-pelatihan2',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('pelatihan/read2/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-pelatihan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('pelatihan/create/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-peserta',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('peserta/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-peserta',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('peserta/create/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    $(function(){
            $(document).on('click','.sertifikat-peserta',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('peserta/update_sert/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.cetak_skl',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('peserta/choose_skl/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-setting',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('setting/read');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });	
		$(function(){
            $(document).on('click','.create-setting',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('setting/create');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-perpanjangan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('perpanjangan/create/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-perpanjangan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('perpanjangan/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-email_karyawan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('email_karyawan/create/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-email_karyawan',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('email_karyawan/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.choose_excel',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('peserta/choose_excel/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.create-job_harian',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('job_harian/create/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
		$(function(){
            $(document).on('click','.detail-job_harian',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('job_harian/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    $(function(){
            $(document).on('click','.cetak_sertifikat',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('peserta/choose_sertifikat/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    $(function(){
            $(document).on('click','.absen_idcard',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('peserta/choose_absen_idcard/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        $(function(){
            $(document).on('click','.detail-nomor_iso',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('nomor_iso/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        $(function(){
            $(document).on('click','.create-nomor_iso',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('nomor_iso/create/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        
        	$(function(){
            $(document).on('click','.detail-nomor_smk3',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('nomor_smk3/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        $(function(){
            $(document).on('click','.create-nomor_smk3',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('nomor_smk3/create/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        	$(function(){
            $(document).on('click','.detail-kontak',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('kontak/read/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        
        $(function(){
            $(document).on('click','.create-kontak',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('<?php echo base_url('kontak/create/');?>',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
        

</script> 
</body>
</html>
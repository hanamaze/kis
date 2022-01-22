<?php

	$id = $this->session->userdata('id');	
		
	$user = $this->db->query("SELECT * FROM user WHERE id_user='$id'")->row();
	
?>


<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background:url('<?php echo base_url(); ?>gambar/bg.jpg');">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        
          <?php if(md5_decrypt($user->foto) != NULL){ ?>
                <img src="<?php echo base_url();?>foto_user/<?php echo md5_decrypt($user->foto); ?>" class="img-circle" alt="User Image">
              <?php }else{?>
                <img src="<?php echo base_url(); ?>dist/image/21A.png" class="img-circle" alt="User Image">
              <?php } ?>

        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper(md5_decrypt($user->username));?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><?php echo md5_decrypt($user->jabatan);?></li>
        <!-- Optionally, you can add icons to the links -->
		
		
		<li <?php if($konten == "welcome"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>">
            <i class="fa fa-home"></i>
            <span>Beranda</span>
            
          </a>
          
        </li>
		
		
		<?php if($this->session->userdata('status')=="admin"){?>
        <li <?php if($konten == "user/user_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>user">
            <i class="fa fa-user"></i>
            <span>User</span>
            
          </a>
          
        </li>
		<?php }else{
			?>
			
		<li <?php if($konten == "profil/profil"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>profil">
            <i class="fa fa-user"></i>
            <span>Profil</span>
            
          </a>
          
        </li>
		<?php }?>
		
		<!--
		<?php if($this->session->userdata('status')=="admin"){?>

		<li <?php if($konten == "surat_masuk_keluar/surat_masuk_keluar_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>surat_masuk_keluar">
            <i class="fa fa-mail-reply-all"></i>
            <span>Surat Masuk Keluar </span>
          </a>
        </li>
		<?php } ?>
		-->
		
		<li <?php if($konten == "surat_masuk/surat_masuk_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>surat_masuk">
            <i class="fa fa-mail-forward"></i>
            <span>Surat Masuk</span>
          </a>
        </li>
		<li class="treeview <?php if($konten == "surat_keluar/surat_keluar_list"){ echo " active"; } ?>" >
          <a href="#"><i class="fa fa-mail-reply"></i> <span>Surat Keluar</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
		  <!-- <li><a href="<?php echo base_url();?>index.php/surat_keluar/">Semua</a></li> -->
		  <?php $now = date('Y')+1; for($i=2018;$i<$now; $i++){ ?>
            
            <li><a href="<?php echo base_url();?>surat_keluar/tahun/<?php echo $i;?>"><?php echo $i; ?></a></li>
		  <?php } ?>
          </ul>
        </li>
		<!--
		<?php// if($this->session->userdata('status')=="admin" or $this->session->userdata('status')=="akunting" or $this->session->userdata('status')=="leader"){?>
		<li <?php if($konten == "faktur/faktur_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>faktur">
            <i class="fa fa-usd"></i>
            <span>Faktur</span>
          </a>
        </li>
        <?php// } ?>


		<li <?php if($konten == "laporan_iso/laporan_iso_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>laporan_iso">
            <i class="fa fa-file-text-o"></i>
            <span>Laporan ISO</span>
          </a>
        </li>
-->
        <?php if($this->session->userdata('status')=="admin" or $this->session->userdata('status')=="hrd" or $this->session->userdata('status')=="leader"){?>
		<li <?php if($konten == "karyawan/karyawan_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>karyawan">
            <i class="fa fa-users"></i>
            <span>Karyawan</span>
          </a>
        </li>
        <?php } ?>
		<?php if($this->session->userdata('status')=="admin" or $this->session->userdata('status')=="hrd" or $this->session->userdata('status')=="leader"){?>
		<li <?php if($konten == "expedisi/expedisi_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>expedisi">
            <i class="fa fa-exchange"></i>
            <span>Expedisi</span>
          </a>
        </li>
        <?php } ?>
		<?php if($this->session->userdata('status')=="admin" or $this->session->userdata('status')=="hrd" or $this->session->userdata('status')=="leader"){?>
		<li <?php if($konten == "inventaris/inventaris_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>inventaris">
            <i class="fa fa-cubes"></i>
            <span>Inventaris</span>
          </a>
        </li>
        <?php } ?>
		<li <?php if($konten == "pelatihan/pelatihan_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>pelatihan">
            <i class="fa fa-child"></i>
            <span>Pelatihan</span>
          </a>
        </li>

        <li <?php if($konten == "nomor_iso/nomor_iso_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>nomor_iso">
            <i class="fa fa-child"></i>
            <span>Nomor ISO</span>
          </a>
        </li>
    
      <?php if($this->session->userdata('status') != "cabang"){?>
        <li <?php if($konten == "kategori_pelatihan/kategori_pelatihan_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>kategori_pelatihan">
            <i class="fa fa-circle-o-notch"></i>
            <span>Perpanjangan</span>
          </a>
        </li>
        <?php } ?>
        <li <?php if($konten == "email_karyawan/email_karyawan_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>email_karyawan">
            <i class="fa fa-bookmark-o"></i>
            <span>Email Karyawan</span>
          </a>
        </li>

        <?php if($this->session->userdata('status')=="admin" OR $this->session->userdata('id')==9 OR $this->session->userdata('id')==6 OR $this->session->userdata('id')==13 OR $this->session->userdata('id')==17 OR $this->session->userdata('id')==19 OR $this->session->userdata('id')==20){?>
    <li <?php if($konten == "setting/setting_list"){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url();?>setting">
            <i class="fa fa-gear"></i>
            <span>Setting</span>
          </a>
        </li>
        <?php } ?>

        <li>
          <a href="<?php echo base_url();?>login/logout">
            <i class="fa fa-power-off"></i>
            <span>Logout</span>
            
          </a>
          
        </li>
		
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
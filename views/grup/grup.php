<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>PT KUALITAS INDONESIA SISTEM</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Encode+Sans:400,500,600,700'>
<link rel="stylesheet" href="<?php echo base_url(); ?>materi_assets/style.css">
</head>
<body>
<!-- partial:index.partial.html -->

<?php $link = $this->db->query("SELECT * FROM setting WHERE id_setting='5' OR id_setting='6' OR id_setting='7' AND status='1'")->result(); ?>

<div class="container" id="app">


    <div class="col">

        <div class="box">
            <h3>GRUP WHATSAPP PELATIHAN</h3>
            <div>

                <ul class="iconList">
                    <?php 
                        foreach($link as $l){
                        if($l->status==1){  
                    ?>
                    <li>
                        <a href="<?php echo $l->info; ?>">
                            <div class="icon">
                                <i data-eva="clipboard-outline"></i>
                            </div>
                            <div class="text">
                                <?php echo $l->nama_setting; ?>
                                <small>PT Kualitas Indonesia Sistem</small>
                            </div>
                            <i data-eva="chevron-right-outline"></i>
                        </a>
                    </li>
                    <?php 
                        }
                        }
                    ?>
                </ul>

            </div>

        </div>
</div>
</div>

       
  <script src='https://unpkg.com/eva-icons'></script>
<script src='https://cdn.jsdelivr.net/npm/vue@2.5.21/dist/vue.js'></script>
<script  src="<?php echo base_url(); ?>materi_assets/script.js"></script>

</body>
</html>
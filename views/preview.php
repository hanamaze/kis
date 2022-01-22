    <html>
    <head>    
    <title>Cetak PDF</title>
    </head>
    <body>
    <h1 style="text-align: center;">Data Siswa</h1>
    <a href="<?php echo base_url("index.php/welcome/cetak"); ?>">Cetak Data</a>
    <br><br>
    <table border="1" width="100%">
    <tr>    
    <th>URUT</th>    
    <th>ID</th>    
    <th>NO</th>    
    <th>Tanggal</th>    
    <th>PO</th>    

    </tr>
    <?php 
    if( ! empty($faktur)){    
    $no = 1;    
    foreach($faktur as $data){        
    echo "<tr>";        
    echo "<td>".$no."</td>";        
    echo "<td>".$data->id_faktur."</td>";        
    echo "<td>".$data->no_faktur."</td>";        
    echo "<td>".$data->tanggal."</td>";        
    echo "<td>".$data->po."</td>";        
       
    echo "</tr>";        
       
    }}?>
    </table>

    </body>
    </html>
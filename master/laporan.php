
       <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         
        <section class="content-header">
          <h1>
             Laporan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">List Laporan</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Laporan</h3>
              <div class="box-tools pull-right" id="buttons">
                 </div>
            </div>
            <div class="box-body table-responsive ">
                               <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        
                        <th>SMS Center</th>
                        <th>No Telepon</th>
                        <th>Default</th>
                        
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM no_center INNER JOIN sms_center ON sms_center.id_sms_center=no_center.id_sms_center";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                          $utama = $row['utama'];
                          if ($utama == 'Y') 
                            $utama = '<label class="label label-info">Ya</label>';
                          else
                            $utama = '<label class="label label-info">Tidak</label>'; 
                    ?>
                    
                        <tr>
                        
                           
                            <td><?php echo $row['nama_sms_center'];?></td>
                             <td><?php echo $row['no_telepon'];?></td>
                            <td><?php echo $utama;?></td>
                           
                        </tr> 
                            <?php    
                    $no++;                    
                        }
                    }  else {
                    echo '';    
                    }
                    }?>
                    </tbody>
                   
                     
                  </table>
            </div><!-- /.box-body -->
             
          </div><!-- /.box --> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
     

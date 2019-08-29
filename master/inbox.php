
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Inbox
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Inbox</a></li>
            <li class="active">List Inbox</li>
            
          </ol>
        </section>


        <section class="content">
       
          <div class="box">
            
            <div class="box-body table-responsive">
                               <table id="tabel-inbox" class="table table-striped  dataTable no-footer">
                    <thead>
                      <tr> 
                        <th>UpdatedInDB</th>
                        <th>ReceivingDateTime</th>
                        <th>SenderNumber</th> 
                        <th>Text Decoded</th>
                        <th>ID</th>
                        <th>Processed</th>
                        <th>Aksi</th>
                        
                        
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM inbox";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                        
                            <td><?php echo $row['UpdatedInDB'];?></td>
                            <td><?php echo $row['ReceivingDateTime'];?></td>
                            <td><?php echo $row['SenderNumber'];?></td> 
                            <td><?php echo $row['TextDecoded'];?></td>
                            <td><?php echo $row['ID'];?></td>
                            <td><?php echo $row['Processed'];?></td>

                            <td>
                                
                                <a data-href="aksi7.php?sender=hapus&ID=<?php echo $row['ID']; ?>" class="btn btn-danger btn-hapus" data-toggle='modal' data-target='#modal_hapus'><li class="fa fa-trash-o"></li> Hapus</a> 
                             </td>
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
      
      
      
      <!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->


      <!-- Content Wrapper. Contains page content -->
      
     

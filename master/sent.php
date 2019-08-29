
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Sent Items
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Sent Items</a></li>
            <li class="active">List Set Items</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
         
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
                
              <div class="box-tools pull-right">
                 </div>
            </div>
            <div class="box-body table-responsive">
                               <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        
                        
                        <th>UpdatedInDB</th>
                        <th>InsertIntoDB</th>
                        <th>SendingDateTime</th>
                        <th>DestinationNumber</th>
                        <th>TextDecoded</th >
                        <th>ID</th>
                        <th>Status</th>
                        <th>StatusError</th>
                        <th>Aksi</th>
                      
                        
                        
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM sentitems";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                        
                            
                            <td><?php echo $row['UpdatedInDB'];?></td>
                            <td><?php echo $row['InsertIntoDB'];?></td>
                            <td><?php echo $row['SendingDateTime'];?></td>
                            <td><?php echo $row['DestinationNumber'];?></td>
                            <td><?php echo $row['TextDecoded'];?></td>
                            <td><?php echo $row['ID'];?></td>
                            <td><?php echo $row['Status'];?></td>
                            <td><?php echo $row['StatusError'];?></td>
                  


                            <td>
                               
                                <a data-href="aksi8.php?sender=hapus&ID=<?php echo $row['ID']; ?>" class="btn btn-danger btn-hapus" data-toggle='modal' data-target='#modal_hapus'><li class="fa fa-trash-o"></li> Hapus</a> 
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
      
      
      
     
     

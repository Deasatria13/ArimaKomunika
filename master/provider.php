
      
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Provider
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Provider</a></li>
            <li class="active">List prov</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $id=$_GET['id_provider'];
                        $sql="SELECT  * FROM provider where id_provider='$id' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit Provider
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" > </i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksi2.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">

            
                   
                     <label>Nama Provider</label>
                    <input readonly="" type="hidden" name="nama_provider" value="<?php echo $row['nama_provider'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="nama_provider" value="<?php echo $row['nama_provider'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  



                 <div class="col-md-12 form-group"> 
                   <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-send"></span> Simpan</button>
                 </div>
                </div> 
                  </div></form>
              </div>
                   <?php                
                        }
                    }  else {
                    echo '';    
                    }
                    }?> 
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> Tambah</a></h3>
              <div class="box-tools pull-right">
                 </div>
            </div>
            <div class="box-body table-responsive">
                               <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        
                        <th>Nama Provider</th>
                         <th>Aksi</th>
                        
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM provider";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                            
                          
                            <td><?php echo $row['nama_provider'];?></td>
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=tprovider&id_provider=<?php echo $row['id_provider'];?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a> 
                               
                                   <?php echo "<a class='btn btn-danger btn-hapus' data-toggle='modal' data-target='#modal_hapus' data-href='aksi2.php?sender=hapus&id=". $row['id_provider']."'>Hapus</a>"; ?>
                                </div>
                            </div>
                        </div>

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
<form action="aksi2.php?sender=tprovider" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title" id="myModalLabel">Tambah Provider</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->

 
    <div class="form-group">
      <label>Nama Provider</label>
      <textarea type="text" name="nama_provider" class="form-control" required="" placeholder="Enter ..."></textarea> 
    </div>

  
</div>
<div class="modal-footer">
<button type="reset" class="btn btn-danger"> Reset</button>
<button type="submit" class="btn btn-success"> Simpan</button> 
  
</div>
   
</div>
</div>
</div>

  
</form>

      <!-- Content Wrapper. Contains page content -->
      
     

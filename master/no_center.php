
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             No Center
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">No center</a></li>
            <li class="active">List center</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $id=$_GET['id_no'];
                        $sql="SELECT  * FROM no_center where id_no='$id' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){


                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit No Center
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksi4.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">

                 
                    
                    <div class="col-md-12 form-group">
                          <input type="hidden" name="id_no" value="<?php echo $row['id_no']; ?>">

                         <label>SMS Center</label>

                         <select class="form-control" name="cmb_sms_center">
                        <?php
                              $sql="SELECT  * FROM sms_center";
                              $result=  mysqli_query($config, $sql);
                              if (mysqli_num_rows($result)> 0){
                              while ($data=  mysqli_fetch_assoc($result)){
                        ?>
                       <option value="<?php echo $data['id_sms_center']; ?>"  <?php if($row['id_sms_center']==$data['id_sms_center'])echo "selected"; ?> ><?php echo $data['nama_sms_center']; ?></option>
                         <?php
                       }
                     }
                         ?>
                      </select> 
                    </div>


                       <div class="col-md-12 form-group">
                         <label>No Telepon</label>
                         <textarea class="form-control" placeholder="Enter..." name="no_telepon" type="text"><?php echo $row['no_telepon'];?></textarea>
                    </div>


                     <div class="col-md-12 form-group">
                         <label>Default</label>
                        <select class="form-control" name="cmb_utama">
      
                         <option value="Y" <?php if($row['utama']=='Y')echo "selected"; ?>>YA</option>
                         <option value="T"<?php if($row['utama']=='T')echo "selected"; ?>>TIDAK</option>
       
      </select>  
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
                        
                        <th>SMS Center</th>
                        <th>No Telepon</th>
                        <th>Default</th>
                        <th>Aksi</th>
                        
                         
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
                            $utama = '<label class="label label-danger">Tidak</label>'; 
                    ?>
                    
                        <tr>
                        
                           
                            <td><?php echo $row['nama_sms_center'];?></td>
                             <td><?php echo $row['no_telepon'];?></td>
                            <td><?php echo $utama;?></td>
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=tnocenter&id_no=<?php echo $row['id_no'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 




                                <a data-href="aksi4.php?sender=hapus&id_no=<?php echo $row['id_no']; ?>" class="btn btn-danger btn-hapus" data-toggle='modal' data-target='#modal_hapus'><li class="fa fa-trash-o"></li> Hapus</a> 
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
<form action="aksi4.php?sender=tnocenter" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" id="myModalLabel">Tambah No Transaksi</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
  
  
    <div class="form-group">
      <label>SMS Center</label>
       <select class="form-control" name="cmb_sms_center" required="">
        <?php
              $sql="SELECT  * FROM sms_center";
              $result=  mysqli_query($config, $sql);
              if (mysqli_num_rows($result)> 0){
              while ($row=  mysqli_fetch_assoc($result)){
        ?>
         <option value="<?php echo $row['id_sms_center']; ?>"><?php echo $row['nama_sms_center']; ?></option>
         <?php
       }
     }
         ?>
      </select>           
    </div>

    <div class="form-group">
      <label>Nomor Telepon</label>
      <input type="number" name="nomor_telepon" class="form-control" required="" placeholder="Enter..."></textarea>
    </div>

     <div class="form-group">
      <label>Default</label>
      <select class="form-control" name="cmb_utama" required="">
      
         <option value="Y">YA</option>
         <option value="T">TIDAK</option>
       
      </select>     
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
      
     

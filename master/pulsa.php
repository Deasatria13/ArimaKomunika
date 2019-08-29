
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Pulsa
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Pulsa</a></li>
            <li class="active">List Pulsa</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $id=$_GET['id_pulsa'];
                        $sql="SELECT  * FROM pulsa where id_pulsa='$id' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit Pulsa
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksi.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">

                

                     <div class="col-md-12 form-group">
                    <input type="hidden" name="id_pulsa" value="<?php echo $row['id_pulsa']; ?>">

                         <label>ID Provider</label>

                         <select class="form-control" name="cmb_provider">
                        <?php
                              $sql="SELECT  * FROM provider";
                              $result=  mysqli_query($config, $sql);
                              if (mysqli_num_rows($result)> 0){
                              while ($data=  mysqli_fetch_assoc($result)){
                        ?>
                       <option value="<?php echo $data['id_provider']; ?>"  <?php if($row['id_provider']==$data['id_provider'])echo "selected"; ?> ><?php echo $data['nama_provider']; ?></option>
                         <?php
                       }
                     }
                         ?>
                      </select> 
                    </div>

                       <div class="col-md-12 form-group">
                         <label>Kode Pulsa</label>
                         <textarea class="form-control" placeholder="Enter..." name="kode_pulsa" type="text"><?php echo $row['kode_pulsa'];?></textarea>
                    </div>


                       <div class="col-md-12 form-group">
                         <label>Nominal</label>
                         <textarea class="form-control" placeholder="Enter..." name="nominal" type="text"><?php echo $row['nominal'];?></textarea>
                    </div>

                     <div class="col-md-12 form-group">
                         <label>Harga Beli</label>
                         <textarea class="form-control" placeholder="Enter..." name="hrg_beli" type="text"><?php echo $row['hrg_beli'];?></textarea>
                    </div>


                      <div class="col-md-12 form-group">
                         <label>Harga Jual</label>
                         <textarea class="form-control" placeholder="Enter..." name="hrg_jual" type="text"><?php echo $row['hrg_jual'];?></textarea>
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
                        
                        <th>Provider</th>
                        <th>Kode Pulsa</th>
                        <th>Nominal</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                        
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="
                              SELECT  * FROM pulsa
                              INNER JOIN provider ON provider.id_provider = pulsa.id_provider
                            ";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                        
                            
                            <td><?php echo $row['nama_provider'];?></td>
                            <td><?php echo $row['kode_pulsa'];?></td>
                            <td><?php echo $row['nominal'];?></td>
                            <td><?php echo $row['hrg_beli'];?></td>
                            <td><?php echo $row['hrg_jual'];?></td>
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=tpulsa&id_pulsa=<?php echo $row['id_pulsa'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                                <a data-href="aksi.php?sender=hapus&id_pulsa=<?php echo $row['id_pulsa']; ?>" class="btn btn-danger btn-hapus" data-toggle='modal' data-target='#modal_hapus'><li class="fa fa-trash-o"></li> Hapus</a> 
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
<form action="aksi.php?sender=tpulsa" method="POST" autocomplete="off" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title" id="myModalLabel">Tambah Data Pulsa</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
   
    <div class="form-group">
      <label>Provider</label>
         <select class="form-control" name="cmb_provider" required="">
        <?php
              $sql="SELECT  * FROM provider";
              $result=  mysqli_query($config, $sql);
              if (mysqli_num_rows($result)> 0){
              while ($row=  mysqli_fetch_assoc($result)){
        ?>
         <option value="<?php echo $row['id_provider']; ?>"><?php echo $row['nama_provider']; ?></option>
         <?php
       }
     }
         ?>
      </select>           

    </div>

    <div class="form-group">
      <label>Kode Pulsa</label>
   <input type="text" name="kode_pulsa" class="form-control" required="" placeholder="Enter..."></textarea>

      </select>

    </div>


    <div class="form-group ">
      <label>Nominal</label>
      <input type="number" name="nominal" class="form-control" required="" placeholder="Enter..."></textarea>
    </div>
 
 	 <div class="form-group">
      <label>Harga Beli</label>
    

    <div class="input-group">
      <div class="input-group-addon">
        Rp.
      </div>
      <input type="number" name="hrg_beli" class="form-control pull-right" required />
    </div>

    </div>


     <div class="form-group">
      <label>Harga Jual</label>

      <div class="input-group">
      <div class="input-group-addon">
        Rp.
      </div>
      <input type="number" name="hrg_jual" class="form-control pull-right" required />
    </div>

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
      
     

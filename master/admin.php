
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Admin
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Admin</a></li>
            <li class="active">List Admin</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
              <?php
            
                        $id_admin=$_GET['id_admin'];
                        $sql="SELECT  * FROM admin where id_admin='$id_admin' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){


                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit Admin
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksi5.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">

                <div class="col-md-12 form-group">
                    <label>ID Admin</label>
                    <input readonly="" type="hidden" name="id_admin" value="<?php echo $row['id_admin'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="id_admin" value="<?php echo $row['id_admin'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  



                     <div class="col-md-12 form-group">
                         <label>Nama Lengkap</label>
                         <textarea class="form-control" placeholder="Enter..." name="nama_lengkap" type="text"><?php echo $row['nama_pengguna'];?></textarea>
                    </div>


                     <div class="col-md-12 form-group">
                         <label>Nama Pengguna</label>
                         <textarea class="form-control" placeholder="Enter..." name="nama_pengguna" type="text"><?php echo $row['nama_pengguna'];?></textarea>
                    </div>

                      <div class="col-md-12 form-group">
                         <label>Kata Sandi</label>
                         <textarea class="form-control" placeholder="Enter..." name="kata_sandi" type="text"><?php echo $row['kata_sandi'];?></textarea>
                    </div>

                      <div class="col-md-12 form-group">
                         <label>Email</label>
                         <textarea class="form-control" placeholder="Enter..." name="email" type="text"><?php echo $row['email'];?></textarea>
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
                        <th>ID Admin</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Pengguna</th>
                        <th>Kata Sandi</th>
                        <th>Email</th>
                        <th>Aksi</th>
                        
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM admin";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                            
                            <td><?php echo $row['id_admin'];?></td>
                            <td><?php echo $row['nama_lengkap'];?></td>
                            <td><?php echo $row['nama_pengguna'];?></td>
                            <td><?php echo $row['kata_sandi'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=tadmin&id_admin=<?php echo $row['id_admin'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                                <a data-href="aksi5.php?sender=hapus&id_admin=<?php echo $row['id_admin']; ?>" class="btn btn-danger btn-hapus" data-toggle='modal' data-target='#modal_hapus'><li class="fa fa-trash-o"></li> Hapus</a> 
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


      <?php
      $kode = 'ADM-';
      $sql="SELECT  * FROM admin ORDER BY id_admin DESC LIMIT 1";
      $result=  mysqli_query($config, $sql);
      $row=  mysqli_fetch_assoc($result);

      $angka = substr($row['id_admin'], 4, 5);
      
      $angka = $angka + 1;
      $hasil = '';

      if (strlen($angka) == 1) $hasil = $kode . '0000'. $angka;
      if (strlen($angka) == 2) $hasil = $kode . '000'. $angka;
      if (strlen($angka) == 3) $hasil = $kode . '00'. $angka;
      if (strlen($angka) == 4) $hasil = $kode . '0'. $angka;
      if (strlen($angka) == 5) $hasil = $kode . $angka;


      $kode_otomatis = $hasil;
?>
      
      
      
      <!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<form action="aksi5.php?sender=tadmin" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" id="myModalLabel">Tambah Admin</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
    <div class="form-group">
      <label>ID Admin</label>
      <input type="text" name="id_admin" class="form-control" readonly value="<?php echo $kode_otomatis;?>" required="" placeholder="Enter ...">
    </div>

     <div class="form-group">
      <label>Nama Lengkap</label>
      <textarea type="text" name="nama_lengkap" class="form-control" required="" placeholder="Enter ..."></textarea> 
    </div>
 
    <div class="form-group">
      <label>Nama Pengguna</label>
      <textarea type="text" name="nama_pengguna" class="form-control" required="" placeholder="Enter ..."></textarea> 
    </div>

    <div class="form-group">
      <label>Kata Sandi</label>
      <textarea type="text" name="kata_sandi" class="form-control" required="" placeholder="Enter..."></textarea>
    </div>

      <div class="form-group">
      <label>Email</label>
      <textarea type="text" name="email" class="form-control" required="" placeholder="Enter..."></textarea>
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
      
     

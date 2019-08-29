
      
         <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Pelanggan
            
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
            
                        $id=$_GET['id_pelanggan'];
                        $sql="SELECT  * FROM pelanggan where id_pelanggan='$id' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  DAFTAR PELANGGAN
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus" > </i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksi9.php?tbl=pelanggan&aksi=edit&id=<?php echo $row['id_pelanggan'];?>" method="POST">
                  <div class="box-body">
                        <div class="row">

            
                  <div class="col-md-12 form-group">
                         <label>ID Pelanggan</label>
                         <textarea class="form-control" placeholder="Enter..." name="id_pelanggan" type="text"><?php echo $row['id_pelanggan'];?></textarea>
                    </div>


                       <div class="col-md-12 form-group">
                         <label>Nama Pelanggan</label>
                         <textarea class="form-control" placeholder="Enter..." name="nm_pl" type="text"><?php echo $row['nm_pl'];?></textarea>
                    </div>

                     <div class="col-md-12 form-group">
                         <label>Jenis Kelamin</label>
                         <textarea class="form-control" placeholder="Enter..." name="jk" type="text"><?php echo $row['jk'];?></textarea>
                    </div>


                      <div class="col-md-12 form-group">
                         <label>Alamat</label>
                         <textarea class="form-control" placeholder="Enter..." name="alamat" type="text"><?php echo $row['alamat'];?></textarea>
                    </div>


                      <div class="col-md-12 form-group">
                         <label>No HP</label>
                         <textarea class="form-control" placeholder="Enter..." name="no_hp" type="number"><?php echo $row['no_hp'];?></textarea>
                    </div>

                       <div class="col-md-12 form-group">
                         <label>USER</label>
                         <textarea class="form-control" placeholder="Enter..." name="user" type="text"><?php echo $row['user'];?></textarea>
                    </div>

                       <div class="col-md-12 form-group">
                         <label>PASSWORD</label>
                         <textarea class="form-control" placeholder="Enter..." name="pass" type="text"><?php echo $row['pass'];?></textarea>
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
                <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> Tambah Pelanggan</a></h3>
              <div class="box-tools pull-right">
                <?php 
                $qkonfir = mysqli_query($config,"select count(*) as bkonfir from pelanggan where status = '0'");
                $jkonfir = mysqli_fetch_assoc($qkonfir);
                $dkonfir = $jkonfir['bkonfir'];
                if ($qkonfir > 0) {
                  echo "<p style='color:blue'>Anda Memiliki <b style='color:red;'>".$dkonfir."</b> Belum Dikonfirmasi</p>";
                }else{
                  echo "Tidak Ada Data Yang Belum Dikonfirmasi";
                }
                 ?>
                 </div>
            </div>
            <div class="box-body table-responsive">
                               <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        
                       
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>L/P</th>
                        <th>Alamat</th>
                        <th>NO HP</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM pelanggan";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row =  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                            
                          
                            <td><?php echo $row['id_pelanggan'];?></td>
                            <td><?php echo $row['nm_pl'];?></td>
                            <td><?php echo $row['jk'];?></td>
                            <td><?php echo $row['alamat'];?></td>
                            <td><?php echo $row['no_hp'];?></td>
                            <td><?php echo $row['user'];?></td>
                            <td><?php echo $row['pass'];?></td>
                            <td><?= $row['status'] ?></td>
                            <td> <?php
                              if ($row['status'] == "0") {
                                ?>
                               <a href="#" data-toggle="modal" data-target="#my-modal2" class="btn btn-info konfir-plg" data-plg="<?php echo $row['id_pelanggan'];?>" data-nm_pl="<?php echo $row['nm_pl'];?>" data-no_telp="<?php echo $row['no_hp'];?>" ><i class="fa fa-check-circle"></i> Konfirmasi</a>
                                <?php
                              }else{
                                ?>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=pelanggan&id_pelanggan=<?php echo $row['id_pelanggan'];?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a> 
                               
                                   <a href="aksi9.php?tbl=pelanggan&aksi=hapus&id=<?php echo $row['id_pelanggan'];?>" class="btn btn-danger"><i class="fa fa-pencil"></i> Hapus</a>
                                <?php
                              }
                               ?>
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
<!-- kode otomatis pelanggan -->
<?php 
$qp = mysqli_query($config,"select max(id_pelanggan) as maxKode from pelanggan");
$data = mysqli_fetch_assoc($qp);
$kode = $data['maxKode'];

$noUrut = (int)substr($kode, 3,3);
$noUrut = $noUrut + 1;
$kata = "PL";
$kd_pelanggan = $kata.str_pad($noUrut,3,"0", STR_PAD_LEFT);

 ?>
<form action="aksi9.php?tbl=pelanggan&aksi=input" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title" id="myModalLabel">Data Pelanggan</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->

 
    <div class="form-group">
      <label>Nama Pelanggan</label>
      <input type="hidden" name="kd_pl" class="form-control" value="<?php echo $kd_pelanggan ; ?>"> 
      <input type="text" name="nm_pelanggan" class="form-control" required="" placeholder="Enter ..."> 
    </div>

    <div class="form-group">
      <label>Jenis Kelaman</label><br>
      <input type="radio" name="jk" value="P"> Perempuan <input type="radio" name="jk" value="L"> Laki-Laki
    </div>

    <div class="form-group">
      <label>Alamat</label>
      <textarea type="text" name="alamat" class="form-control" required="" placeholder="Enter ..."></textarea> 
    </div>

    <div class="form-group">
      <label>Nomor Hp</label>
      <input type="text" name="tlp" class="form-control" required> 
    </div>
    <div class="form-group">
      <label>Username</label>
      <input type="text" name="user" class="form-control" required> 
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="pass" class="form-control" required> 
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


<form  action="aksi_validasi.php?tbl=pelanggan" method="POST" autocomplete="off" >
<div class="modal fade" id="my-modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title" id="myModalLabel">KONFIRMASI</h4>
</div>
   
<div class="modal-body center"> 


    <div class="form-group ">
      <label>Kode Pelanggan</label>
      <input type="text" readonly name="plg" class="form-control" required="">

      <label>Nama Pelanggan</label>
      <input type="text" readonly name="nm_pl" class="form-control" required="">

      <label>No Telepon</label>
      <input type="text" readonly name="no_telp" class="form-control" required="">
    
    </div>

     <div class="form-group ">
      <label>Konfirmasi Status</label>
      <select name="konf" class="form-control" >
        <option value="2">Tolak</option>
        <option value="1">Konfirmasi</option>
      </select>
    </div>
 
</div>


<div class="modal-footer">
<input type="submit" class="btn btn-success" name="u_plg" value="Konfirmasi">
  
</div>
   
</div>
</div>
</div>
</form>

<?php 
if (isset($_POST['u_plg'])){

  include "koneksi.php";
    $id = $_POST['plg'];
        $st = $_POST['konf'];

        $qstaus = mysqli_query($config,"update pelanggan set status='$st' where id_pelanggan = '$id'");
        if ($qstaus) {
           echo '<script LANGUAGE="JavaScript">
            alert("Pelanggan telah di Konfirmasi")
            window.location.href="index.php?page=pelanggan";
            </script>';

        }else{
            echo '<script LANGUAGE="JavaScript">
            alert("Pelanggan GAGAL di Konfirmasi")
            window.location.href="index.php?page=pelanggan";
            </script>';

        }
}
 ?>



      <!-- Content Wrapper. Contains page content -->
      
     

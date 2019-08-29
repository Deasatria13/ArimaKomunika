
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             TOP UP
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#" class="active">TOP UP</a></li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
          
          <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> TOP UP</a></h3>
              <div class="box-tools pull-right">

                <?php 
                $qkonfir = mysqli_query($config,"select count(*) as btopup from topup where status = 'D'");
                $jkonfir = mysqli_fetch_assoc($qkonfir);
                $dkonfir = $jkonfir['btopup'];
                if ($qkonfir > 0) {
                  echo "<p style='color:blue'>Anda Memiliki <b style='color:red;'>".$dkonfir."</b> Belum Diproses Topup</p> <a href='index.php?page=topup&op=desc' class='btn btn-warning'>Cek</a>";
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
                        
                        <th>Kode TOP-UP</th>
                        <th>ID Pelanggan</th>
                        <th>No Hp</th>
                        <th>Jumlah TOP-UP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        
                         
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     if ($_GET['op'] == "desc") {
                       
                       $sql="SELECT  * FROM topup ORDER BY status ASC";
                       
                        $result=  mysqli_query($config, $sql);
                        while (sort($row=  mysqli_fetch_assoc($result))){
                    ?>
                    
                        <tr>
                        
                            
                            <td><?php echo $row['kd_topup'];?></td>
                            <td><?php echo $row['id_pelanggan'];?></td>
                            <td><?php echo $row['no_hp'];?></td>
                            <td><?php echo $row['jml_topup'];?></td>
                            <td>
                              <?php if ($row['status'] == 'D') echo '<b style="color:red;">Diproses</b>'; else echo '<b style="color:blue;">Berhasil</b>';?>

                                
                              </td>
                            <td>
                               <?php 
                               if ($row['status'] == 'D') {
                                ?>
                                  <a href="#" data-toggle="modal" data-target="#my-modal2" class="btn btn-success status-topup" data-kode="<?php echo $row['kd_topup'];?>" data-no="<?php echo $row['no_hp'];?>" data-jml="<?php echo $row['jml_topup'];?>" data-status="<?php echo $row['status'];?>"><li class="fa fa-search"></li> Proses</a>
                                   <a href="#" data-toggle="modal" data-target="#my-modal2" class="btn btn-info status-topup" data-kode="<?php echo $row['kd_topup'];?>" data-no="<?php echo $row['no_hp'];?>" data-jml="<?php echo $row['jml_topup'];?>" data-status="<?php echo $row['status'];?>"><li class="fa fa-search"></li> Detail</a>
                                <?php
                                  }else{
                                    ?>
                                    <a href="#" class="btn btn-info status-topup" data-kode="<?php echo $row['kd_topup'];?>" data-no="<?php echo $row['no_hp'];?>" data-jml="<?php echo $row['jml_topup'];?>" data-status="<?php echo $row['status'];?>"><li class="fa fa-search"></li> Detail</a>
                                    <?php
                                  } ?>
                             </td>
                        </tr> 
                            <?php                       
                        }
                     }else{
                        $sql="SELECT  * FROM topup";
                       
                        $result=  mysqli_query($config, $sql);
                        while (sort($row=  mysqli_fetch_assoc($result))){
                    ?>
                    
                        <tr>
                        
                            
                            <td><?php echo $row['kd_topup'];?></td>
                            <td><?php echo $row['id_pelanggan'];?></td>
                            <td><?php echo $row['no_hp'];?></td>
                            <td><?php echo $row['jml_topup'];?></td>
                            <td>
                              <?php if ($row['status'] == 'D') echo '<b style="color:red;">Diproses</b>'; else echo '<b style="color:blue;">Berhasil</b>';?>

                                
                              </td>
                            <td>
                               <?php 
                               if ($row['status'] == 'D') {
                                ?>
                                  <a href="#" data-toggle="modal" data-target="#my-modal2" class="btn btn-success status-topup" data-kode="<?php echo $row['kd_topup'];?>" data-no="<?php echo $row['no_hp'];?>" data-jml="<?php echo $row['jml_topup'];?>" data-status="<?php echo $row['status'];?>"><li class="fa fa-search"></li> Proses</a>
                                  
                                   <a href="#" data-toggle="modal" data-target="#my-modal2" class="btn btn-info status-topup" data-kode="<?php echo $row['kd_topup'];?>" data-no="<?php echo $row['no_hp'];?>" data-jml="<?php echo $row['jml_topup'];?>" data-status="<?php echo $row['status'];?>"><li class="fa fa-search"></li> Detail</a>
                                <?php
                                  }else{
                                    ?>
                                    <a href="#" class="btn btn-info status-topup" data-kode="<?php echo $row['kd_topup'];?>" data-no="<?php echo $row['no_hp'];?>" data-jml="<?php echo $row['jml_topup'];?>" data-status="<?php echo $row['status'];?>"><li class="fa fa-search"></li> Detail</a>
                                    <?php
                                  } ?>
                             </td>
                        </tr> 
                            <?php                       
                        }}?>
                    </tbody>
                   
                     
                  </table>
            </div><!-- /.box-body -->
             
          </div><!-- /.box --> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
      
      <!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<form action="aksi9.php?tbl=topup&aksi=input" method="POST" autocomplete="off" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title" id="myModalLabel">TOP UP</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 <?php 



$qp = mysqli_query($config,"select max(kd_topup) as maxKode from topup");
$data = mysqli_fetch_assoc($qp);
$kode = $data['maxKode'];
$hari = date('dmy');
$noUrut = (int)substr($kode, 10,4);
$noUrut = $noUrut + 1;
$kata = "TP-".$hari."-";
$kd_topup = $kata.str_pad($noUrut,5,"0", STR_PAD_LEFT);

date_default_timezone_set('Asia/Jakarta');
$date = date_create();
$date_start=date('d-m-Y G:i:s');
date_add($date, date_interval_create_from_date_string('11 hours'));
$waktu = date_format($date, 'd-m-Y G:i:s');


    



 ?>
   
      <div class="form-group">
      <label>ID Pelanggan</label>
      <input type="hidden"  name="kd_topup" class="form-control" required="" value="<?php echo $kd_topup ; ?>">
   <input type="text" name="id_pelanggan" class="form-control" required="" placeholder="Enter...">

      </select>

    </div>

    <div class="form-group ">
      <label>No Hp</label>
      <input type="text" name="no_hp" class="form-control" required="" placeholder="Enter...">
    </div>

    <div class="form-group ">
      <label>Jumlah Top Up</label>
      <input type="number" name="jml_topup" class="form-control" required="" placeholder="Enter...">
    </div>

    
    <div class="form-group ">
      <label>Tgl Top Up</label>
      <input type="text" readonly name="tgl_topup" class="form-control" required="" value="<?php echo $date_start ; ?>">
    </div>
    <div class="form-group ">
      <label>Tgl Tempo</label>
      <input type="text" readonly name="tgl_tempo" class="form-control" required="" value="<?php echo $waktu ; ?>">
      <input type="hidden" name="status" class="form-control" value="L">
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

<form action="aksi9.php?tbl=topup&aksi=proses" method="POST" autocomplete="off" >
<div class="modal fade" id="my-modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title" id="myModalLabel">TOP UP</h4>
</div>
   
<div class="modal-body center"> 


    <div class="form-group ">
      <label>Kode Topup</label>
      <input type="text" name="kd_topup" class="form-control" required="" placeholder="Enter...">
    </div>

    <div class="form-group ">
      <label>No Hp</label>
      <input type="text" name="no_hp" class="form-control" required="" placeholder="Enter...">
    </div>

     <div class="form-group ">
      <label>Jumlah Topup</label>
      <input type="number" name="jml_topup" class="form-control" required="" placeholder="Enter...">
    </div>

     <div class="form-group ">
      <label>Status</label>
      <select name="status" class="form-control" >
        <option value="D">Diproses</option>
        <option value="B">Berhasil</option>
      </select>
    </div>
 
</div>


<div class="modal-footer">
<button type="submit" class="btn btn-success"> Simpan</button> 
  
</div>
   
</div>
</div>
</div>
</form>
      

     

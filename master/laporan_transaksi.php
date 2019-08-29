
      <div class="content-wrapper">
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
              <div class="pull-right">
                <?php 
                $hari = date('Y-m-d');
                 ?>
                <a href="print_laporan.php?p=<?= $hari; ?>" class="btn btn-sm btn-success">Laporan Harian</a>
                <a href="print_laporan.php" class="btn btn-sm btn-danger">Laporan Keseluruhan</a>
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#my-modal1">Laporan Tertentu</button>
                 </div>
            </div>
            <div class="box-body table-responsive ">
                               <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        
                        <th>No Faktur</th>
                        <th>Tanggal</th>
                        <th>ID Pulsa</th>
                        <th>No Telepon</th>
                         <th>Nominal</th>
                        <th>ID Admin</th>
                        
                         
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                    $p = empty($_GET['p']) ? "" : $_GET['p'];
                    if ($p == "") {
                      $result = mysqli_query($config,"SELECT  * FROM sms_transaksi");
                        $no=1;
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                        
                           
                            <td><?php echo $row['no_faktur'];?></td>
                            <td><?php echo $row['tanggal'];?></td>
                            <td><?php echo $row['id_pulsa'];?></td>
                            <td><?php echo $row['no_telp'];?></td>
                              <td><?php echo $row['nominal'];?></td>
                            <td><?php echo $row['id_admin'];?></td>
                           
                        </tr> 
                            <?php    
                             $no++;           
                        }
                    }else{
                          $result = mysqli_query($config,"SELECT  * FROM sms_transaksi where tanggal = '$p'");
                        $no=1;
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                        
                           
                            <td><?php echo $row['no_faktur'];?></td>
                            <td><?php echo $row['tanggal'];?></td>
                            <td><?php echo $row['id_pulsa'];?></td>
                            <td><?php echo $row['no_telp'];?></td>
                              <td><?php echo $row['nominal'];?></td>
                            <td><?php echo $row['id_admin'];?></td>
                           
                        </tr> 
                            <?php    
                    $no++;                    
                        }

                    }
                        ?>
                    </tbody>
                   
                     
                  </table>
            </div><!-- /.box-body -->
             
          </div><!-- /.box --> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <form action="print_laporan.php?p=pilih" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title" id="myModalLabel">Tambah Transaksi pulsa</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->

 
    <div class="form-group">
      <label>Dari Tangal</label><br>
      <select name="d1">
        <option> hari </option>
        <?php 
        $no = 1;
        while ( $no<= 31) {
          echo "<option>$no</option>";

          $no++;
        }
         ?>
      </select>

       <select name="m1">
        <option> Bulan </option>
        <option value="1"> Januari </option>
        <option value="2"> Februari </option>
        <option value="3"> Maret </option>
        <option value="4"> April </option>
        <option value="5"> Mei </option>
        <option value="6"> Juni </option>
        <option value="7"> Juli </option>
        <option value="8"> Agustus </option>
        <option value="9"> September </option>
        <option value="10"> Oktober </option>
        <option value="11"> November </option>
        <option value="12"> Desember </option>
      </select>
      <input type="text" name="t1" placeholder="tahun" > 
    </div>
     <div class="form-group">
      <label>Sampai Tanggal</label><br>
      <select name="d2">
        <option> hari </option>
        <?php 
        $no = 1;
        while ( $no<= 31) {
          echo "<option>$no</option>";

          $no++;
        }
         ?>
      </select>

       <select name="m2">
        <option> Bulan </option>
        <option value="1"> Januari </option>
        <option value="2"> Februari </option>
        <option value="3"> Maret </option>
        <option value="4"> April </option>
        <option value="5"> Mei </option>
        <option value="6"> Juni </option>
        <option value="7"> Juli </option>
        <option value="8"> Agustus </option>
        <option value="9"> September </option>
        <option value="10"> Oktober </option>
        <option value="11"> November </option>
        <option value="12"> Desember </option>
      </select>
      <input type="text" name="t2" placeholder="Tahun" >  
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
      
      
     

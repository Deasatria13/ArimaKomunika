<script type='text/javascript'>
function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

var xmlhttp = createRequestObject();

function rubah(combobox)
{
    var kode = combobox.value;
    if (!kode) return;
    xmlhttp.open('get', 'master/ambildata.php?kode='+kode, true);
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("divkedua").innerHTML = xmlhttp.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}

function tambah_pulsa(combo)
{
  var kode = combo.value;
  $.ajax({
    url: 'master/ambildata.php?sender=pulsa',
    type: 'POST',
    data: 'kode='+ kode,
    dataType: 'html',
    success: function(data){
        $("#cmb_pulsa").html(data);
    }
  })
}

function ambil_nominal(combo)
{
  var kode = combo.value;
  $.ajax({
    url: 'master/ambildata.php?sender=nominal',
    type: 'POST',
    data: 'kode='+ kode,
    dataType: 'json',
    success: function(response){
        $("#nominal").val(response.nominal);
    }
  })
}

</script>

       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        
          <h1>
             SMS Transaksi
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">SMS Transaksi</a></li>
            <li class="active">List SMS </li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
                       $id=$_GET['no_faktur'];
                        $sql="SELECT  * FROM sms_transaksi where no_faktur='$id' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result) > 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit SMS Transaksi
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksi6.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">

                <div class="col-md-12 form-group">
                    <label>No Faktur</label>
                    <input readonly="" type="hidden" name="no_faktur" value="<?php echo $row['no_faktur'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="no_faktur" value="<?php echo $row['no_faktur'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  

                  <div class="col-md-12 form-group">
                     <label>Tanggal</label>
                    <input readonly="" type="hidden" name="tanggal"  value="<?php echo $row['tanggal'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="tanggal" value="<?php echo $row['tanggal'];?>" class="form-control" id='datepicker' placeholder="Enter..." required="">
                    </div>  


                  
                    <div class="col-md-12 form-group">
                   <label>ID pulsa</label>
                    <input readonly="" type="hidden" name="id_pulsa" value="<?php echo $row['id_pulsa'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="id_pulsa" value="<?php echo $row['id_pulsa'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  


                    <div class="col-md-12 form-group">
                      <label>No Telepon</label>
                    <input readonly="" type="hidden" name="no_telp" value="<?php echo $row['no_telp'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="no_telp" value="<?php echo $row['no_telp'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  

                    <div class="col-md-12 form-group">
                          <label>Nominal</label>
                    <input readonly="" type="hidden" name="nominal" value="<?php echo $row['nominal'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="nominal" value="<?php echo $row['nominal'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  



                    <div class="col-md-12 form-group">
                      <label>ID Admin</label>
                    <input readonly="" type="hidden" name="id_admin" value="<?php echo $row['id_admin'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="id_admin" value="<?php echo $row['id_admin'];?>" class="form-control" placeholder="Enter..." required="">
                    </div>  

                     


                 <div class="col-md-12 form-group"> 
                   <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-send"></span> Simpan</button>
                 </div>
                </div> 
                  </div>
                </form>
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
                        <th>No Faktur</th>
                        <th>Tanggal</th>
                        <th>ID Pulsa</th>
                        <th>No Telepon</th>
                         <th>Nominal</th>
                        <th>ID Admin</th>
                        <th>Aksi</th>
                        
                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM sms_transaksi";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                            
                            <td><?php echo $row['no_faktur'];?></td>
                            <td><?php echo $row['tanggal'];?></td>
                            <td><?php echo $row['id_pulsa'];?></td>
                            <td><?php echo $row['no_telp'];?></td>
                              <td><?php echo $row['nominal'];?></td>
                            <td><?php echo $row['id_admin'];?></td>
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=ttransaksi&no_faktur=<?php echo $row['no_faktur'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                                <a data-href="aksi6.php?sender=hapus&no_faktur=<?php echo $row['no_faktur']; ?>" class="btn btn-danger btn-hapus" data-toggle='modal' data-target='#modal_hapus'><li class="fa fa-trash-o"></li> Hapus</a> 
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
<?php
      $kode = 'INV-';
      $sql="SELECT  * FROM sms_transaksi ORDER BY no_faktur DESC LIMIT 1";
      $result=  mysqli_query($config, $sql);
      $row=  mysqli_fetch_assoc($result);

      $angka = substr($row['no_faktur'], 4, 5);
      
      $angka = $angka + 1;
      $hasil = '';

      if (strlen($angka) == 1) $hasil = $kode . '0000'. $angka;
      if (strlen($angka) == 2) $hasil = $kode . '000'. $angka;
      if (strlen($angka) == 3) $hasil = $kode . '00'. $angka;
      if (strlen($angka) == 4) $hasil = $kode . '0'. $angka;
      if (strlen($angka) == 5) $hasil = $kode . $angka;


      $kode_otomatis = $hasil;
?>






<form action="aksi6.php?sender=ttransaksi" method="POST" autocomplete="off" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" id="myModalLabel">Transaksi penjualan pulsa offline</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
    <div class="form-group">
      <label>No Faktur</label>
      <input type="text" name="no_faktur" class="form-control" readonly value="<?php echo $kode_otomatis; ?>" placeholder="Enter ...">
    </div>
 
    <div class="form-group">
      <label>Tanggal</label>
      <input type="text" name="tanggal" class="form-control" readonly value="<?php echo date("Y-m-d");?>" placeholder="Enter ..." required></textarea> 
    </div>

    <div class="form-group">
      <label>ID Provider</label>
       
   
 <select class="form-control" name="cmb_provider" onchange='javascript:tambah_pulsa(this)' required>
  <option value="">--Pilih Provider--</option>
        <?php
        include "koneksi.php";
      $query = mysqli_query($config,"select * from provider ORDER BY nama_provider");
      while ($r = mysqli_fetch_array($query))
      {
        ?>
         <option value="<?php echo $r['id_provider']; ?>"><?php echo $r['nama_provider']; ?></option>
      <?php
    }
         ?>
      </select>  


    </div>


     <div class="form-group">
      <label>ID Pulsa</label>
       
   
 <select class="form-control" name="cmb_kode" id="cmb_pulsa" onchange='javascript:ambil_nominal(this)' required>

      </select>  

               
    </div>

    <div class="form-group">
      <label>Nominal</label>
        <input type="text" name='nominal' class='form-control' id='nominal' required>
    </div>

      <div class="form-group">
      <label>No Telepon</label>
      <input type="number" name="no_telp" class="form-control" placeholder="Enter..." required />
    </div>

       


      <div class="form-group">
      <label>ID Admin</label>
          <?php
              $sql="SELECT  id_admin FROM admin where id_admin = '".$_SESSION['session_id']."'";
              $result=  mysqli_fetch_assoc(mysqli_query($config, $sql));
              $idadmin = $result['id_admin'];
          ?>
          <input type="text" name='cmb_id' class='form-control' value="<?php echo $idadmin; ?>" readonly required>
    </div>
 
 
</div>
<div class="modal-footer">
<button type="reset" class="btn btn-danger"> Reset</button>
<button type="submit" class="btn btn-success"> Kirim</button> 
  
</div>
   
   </div>
 </div>
 </div>
</form>
 



        
      <!-- Content Wrapper. Contains page content -->
      
     

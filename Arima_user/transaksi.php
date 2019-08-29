 <!-- Main content -->
 <?php
      $kode = 'TRS-';
      $sql="SELECT  * FROM auto_transaksi ORDER BY no_faktur DESC LIMIT 1";
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

      $hpuser =  $duser['no_hp'];
      $iuser = $duser['id_pelanggan'];
      $usaldo = $dsaldo['saldo'];

      $day = date('d/m/Y');

?><form name="operator" action="main.php?tbl=auto_transaksi&aksi=input" method="POST">
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Transaksi</h3>

              <div class="box-tools pull-right">
                <a href="index.php" class="btn btn-sm btn-info btn-flat pull-left">BATAL</a>
              </div>
            </div>

           <form  autocomplete="off">
            <!-- /.box-header -->
            <div class="box-body">
              <input type="hidden" name="no_faktur" value="<?php echo $iduser; ?>" >
              <input type="hidden" name="no_faktur" value="<?php echo $kode_otomatis; ?>" >
              <input type="hidden" name="no_telp" value="<?php echo $hpuser ; ?>"  />
              <input type="hidden" name="tanggal" value="<?php echo $day ; ?>">

              <?php 

              $no = substr($hpuser, 0,4);
              $tel = array("0812","0813","0821","0822","0852","0853","0823","0851");
              $sat = array("0814","0815","0816","0855","0856","0857","0858");
              $tri = array("0895","0896","0897","0898","0899");
              $xl = array("0817","0818","0819","0859","0877","0878");
              $smart = array("0881","0882","0883","0884","0885","0886","0887","0888","0889");
              $axis = array("0838","0831","0832","0833");

              $nt = count($tel);
              $i = 0;

              include "koneksi.php";
              while ($i<$nt) {
                
                if($no == $tel[$i]){
                  $pv = "telkomsel";
                 $qplsa = mysqli_query($config,"select * from provider where nama_provider = '$pv'");
                  $qz = mysqli_num_rows($qplsa);
                  if ($qz == 1) {
                    echo "<div class='col-md-8 form-group'><label>Nomor Anda</label><h3>$hpuser <img src='gambar/$pv.png' width='70px'></h3></div>
                    <hr>
                    <b> ISI Pulsa</b>";
                    $dpulsa = mysqli_fetch_assoc($qplsa);
                    $id = $dpulsa['id_provider'];
                    $qnom = mysqli_query($config,"select * from pulsa where id_provider = '$id'");
                    ?>
                      <input type="hidden" name="hpuser" class="form-control" required value="<?php echo $hpuser; ?>"> 
                      <input type="hidden" name="idprov" class="form-control" required value="<?php echo $id; ?>"> 
                      <input type="hidden" name="iduser" class="form-control" required value="<?php echo $iuser; ?>"> 
                      <input type="hidden" name="sluser" class="form-control" required value="<?php echo $usaldo; ?>"> 

                     <select class="form-control" name="nom">
                    <?php
                    while($dnom=mysqli_fetch_assoc($qnom)){
                      ?>

                       <option><?php echo $dnom['nominal']; ?>.000 </option>
                       
                    <?php
                    }
                    ?>
                    </select>
                    <?php
                  }
                   
                }
                $i++;
              }

              $nt = count($sat);
              $i = 0;

              include "koneksi.php";
              while ($i<$nt) {
                
                if($no == $sat[$i]){
                  $pv = "indosat";
                 $qplsa = mysqli_query($config,"select * from provider where nama_provider = '$pv'");
                  $qz = mysqli_num_rows($qplsa);
                  if ($qz == 1) {

                    echo "<small>Nomor Anda</small>";
                    echo "<div class='col-md-8'><h3>$hpuser <img src='gambar/$pv.png' width='70px'></h3></div>
                    <hr>
                    <b> ISI Pulsa</b>";
                    $dpulsa = mysqli_fetch_assoc($qplsa);
                    $id = $dpulsa['id_provider'];
                    $qnom = mysqli_query($config,"select * from pulsa where id_provider = '$id'");
                    ?>
                      <input type="hidden" name="hpuser" class="form-control" required value="<?php echo $hpuser; ?>"> 
                      <input type="hidden" name="idprov" class="form-control" required value="<?php echo $id; ?>"> 
                      <input type="hidden" name="iduser" class="form-control" required value="<?php echo $iuser; ?>"> 
                      <input type="hidden" name="sluser" class="form-control" required value="<?php echo $usaldo; ?>"> 

                     <select class="form-control" name="nom">
                    <?php
                    while($dnom=mysqli_fetch_assoc($qnom)){
                      ?>

                       <option><?php echo $dnom['nominal']; ?>.000 </option>
                       
                    <?php
                    }
                    ?>
                    </select>
                    <?php
                  }
                   
                }
                $i++;
              }

              $nt = count($tri);
              $i = 0;

              include "koneksi.php";
              while ($i<$nt) {
                
                if($no == $tri[$i]){
                  $pv = "three";
                 $qplsa = mysqli_query($config,"select * from provider where nama_provider = '$pv'");
                  $qz = mysqli_num_rows($qplsa);
                  if ($qz == 1) {

                    echo "<small>Nomor Anda</small>";
                    echo "<div class='col-md-8'><h3>$hpuser <img src='gambar/$pv.png' width='70px'></h3></div>
                    <hr>
                    <b> ISI Pulsa</b>";
                    $dpulsa = mysqli_fetch_assoc($qplsa);
                    $id = $dpulsa['id_provider'];
                    $qnom = mysqli_query($config,"select * from pulsa where id_provider = '$id'");
                    ?>
                      <input type="hidden" name="hpuser" class="form-control" required value="<?php echo $hpuser; ?>"> 
                      <input type="hidden" name="idprov" class="form-control" required value="<?php echo $id; ?>"> 
                      <input type="hidden" name="iduser" class="form-control" required value="<?php echo $iuser; ?>"> 
                      <input type="hidden" name="sluser" class="form-control" required value="<?php echo $usaldo; ?>"> 

                     <select class="form-control" name="nom">
                    <?php
                    while($dnom=mysqli_fetch_assoc($qnom)){
                      ?>

                       <option><?php echo $dnom['nominal']; ?>.000 </option>
                       
                    <?php
                    }
                    ?>
                    </select>
                    <?php
                  }
                   
                }
                $i++;
              }



                $nt = count($xl);
              $i = 0;

              include "koneksi.php";
              while ($i<$nt) {
                
                if($no == $xl[$i]){
                  $pv = "xl";
                 $qplsa = mysqli_query($config,"select * from provider where nama_provider = '$pv'");
                  $qz = mysqli_num_rows($qplsa);
                  if ($qz == 1) {

                    echo "<small>Nomor Anda</small>";
                    echo "<div class='col-md-8'><h3>$hpuser <img src='gambar/$pv.png' width='70px'></h3></div>
                    <hr>
                    <b> ISI Pulsa</b>";
                    $dpulsa = mysqli_fetch_assoc($qplsa);
                    $id = $dpulsa['id_provider'];
                    $qnom = mysqli_query($config,"select * from pulsa where id_provider = '$id'");
                    ?>
                      <input type="hidden" name="hpuser" class="form-control" required value="<?php echo $hpuser; ?>"> 
                      <input type="hidden" name="idprov" class="form-control" required value="<?php echo $id; ?>"> 
                      <input type="hidden" name="iduser" class="form-control" required value="<?php echo $iuser; ?>"> 
                      <input type="hidden" name="sluser" class="form-control" required value="<?php echo $usaldo; ?>"> 

                     <select class="form-control" name="nom">
                    <?php
                    while($dnom=mysqli_fetch_assoc($qnom)){
                      ?>

                       <option><?php echo $dnom['nominal']; ?>.000 </option>
                       
                    <?php
                    }
                    ?>
                    </select>
                    <?php
                  }
                   
                }
                $i++;
              }

               ?>
            <div class="box-footer clearfix">
              <button type="submit" class="btn btn-success">BELI</button> 
            </div>
          </div>
        </div>
        </form>


    </section>
    </form>
    <script type="text/javascript">
function cekNomorHP(){

      var x = document.forms["operator"]["no_telp"].value;
      if(x == null || x == "" || x < 4){
        document.getElementById("perdana").innerHTML = "Masukan Nomor HP";
      } else if(x == "0812" || x == "0813" || x == "0821"){
        document.getElementById("perdana").innerHTML = "Masukan Nomor HP";
      }

 
    }
    </script>
 <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <h3>SALDO Rp. <?php echo $dsaldo['saldo']; ?></h3>
              <a href="" class="label label-danger" data-toggle="modal" data-target="#my-modal1" >Tambah Saldo</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Transaksi</h3>

              <div class="box-tools pull-right">
                <a href="index.php?page=transaksi&id=<?php echo $iduser ; ?>" class="btn btn-sm btn-info btn-flat pull-left">BELI</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>No</th>
                    <!-- <th>ID Transaksi</th> -->
                    <th>Deskripsi</th>
                    <!-- <th>Tgl Transaksi</th> -->
                    <th>Status</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $qlog = mysqli_query($config,"select * from log_pelanggan where id_pelanggan = '$iduser'");
                    $vtop = mysqli_num_rows($qlog);

                    if ($vtop >0) {
                      $no=0;
                      while($dlog = mysqli_fetch_assoc($qlog)){
                         $no++;
                      ?>
                       <tr>
                    <td><?php echo $no ?></td>
                   <!--  <td><?php echo $dlog['kd_transaksi']; ?></td> -->
                    <td><?php echo $dlog['deskripsi']; ?>
                    <!-- <td><?php
                    $tgl = explode(' ',$dlog['tgl_trans']);
                     echo $tgl[0]; ?></td> -->
                   </td>
                    <td>

                      <?php 
                      $tr = $dlog['kd_transaksi'];
                      $qp = mysqli_query($config,"select * from topup where kd_topup = '$tr' ");
                      $cs = mysqli_num_rows($qp);
                      $dtp = mysqli_fetch_assoc($qp);
                      $js = $dtp['status'];
                      if ($js == "D") {
                        
                        echo "<span class='label label-danger'>Pendding</span>";
                      
                      }else{
                        
                        echo "<span class='label label-success'>Sukses</span>";
                        
                      }
                       ?></td>
                    <td>
                      <a href="?page=invois&kode=<?= $dlog['kd_transaksi']; ?>&id=<?= $dlog['id_pelanggan']; ?>" class="btn btn-sm btn-warning">DETAIL</a>
                    </td>
                  </tr>
                      <?php
                     
                      }
                    }else{
                      ?>
                     <tr>
                       <td colspan="5" align="center">BELUM ADA TRANSAKSI</td>
                     </tr>
                    <?php
                    }
                 ?>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-footer clearfix">
              
            </div>
          </div>
        </div>

      </div>


    </section>

     <form action="main.php?tbl=topup&aksi=input" method="POST" autocomplete="off" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" >&times;</button>

<h4 class="modal-title" id="myModalLabel">TOP UP</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 <?php
 $qp = mysqli_query($config,"select max(kd_topup) as maxKode from topup");
$data = mysqli_fetch_assoc($qp);
$kode = $data['maxKode'];
$hari = date('dmy');
$noUrut = (int)substr($kode, 10,5);
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
      <h2>#<?php echo $kd_topup ; ?></h2>
      <label>Tgl. <?php echo $date_start ; ?></label><br>

      <label>MASUKAN JUMLAH TOP UP</label>
      <input type="number" name="jml_topup" class="form-control" onchange="cekJml(this.value)" onkeypress="return inputNumber(event)" required="" placeholder="Masukan nominal top-up minimal Rp. 20.0000,-">
      <p id="jmlTopup" style="color: red;"></p><p id="jmlTopup2" style="color: blue;"></p>
      <input type="hidden"  name="kd_topup" class="form-control" required="" value="<?php echo $kd_topup ; ?>">
      <input type="hidden" name="id_pelanggan" class="form-control" required="" value="<?php echo $iduser ; ?>">
      <input type="hidden" name="no_hp" class="form-control" required="" value="<?php echo $hpuser ; ?>">
      </div>

    
    <div class="form-group ">
      <label>Metode Pembayaran</label>
      <select class="form-control" name="m_bayar">
        <option value="Via Bank">Transfer Via Bank</option>
        <option value="Konter">Bayar di Konter</option>
      </select>
      <input type="hidden" readonly name="tgl_topup" class="form-control" required="" value="<?php echo $date_start ; ?>">
      <input type="hidden" readonly name="tgl_tempo" class="form-control" required="" value="<?php echo $waktu ; ?>">
    </div>

 
</div>
<div class="modal-footer">
<button type="reset" class="btn btn-danger" data-dismiss="modal"> Batal</button>
<button type="submit" id="btnK" class="btn btn-success"> Kirim</button>

  
</div>
   
</div>
</div>
</div>
</form>

<script type="text/javascript">
  document.getElementById('btnK').disabled = true;
   function cekJml(val){

      if (val < 20000) {
        document.getElementById("jmlTopup").innerHTML = "*) Maaf Top-Up tidak Sesuai";
         document.getElementById('btnK').disabled = true;
      }else{
        document.getElementById("jmlTopup").innerHTML = "*)Jumlah Top-Up Sesuai";
         document.getElementById('btnK').disabled = false;
      }
    }
</script>


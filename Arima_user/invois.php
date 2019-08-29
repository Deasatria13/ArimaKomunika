 <?php 
include "koneksi.php";

$idpl = $_GET['id'];
$kdtopup = $_GET['kode'];
$qpl = mysqli_query($config,"select * from pelanggan where id_pelanggan = '$idpl'");
$q = mysqli_query($config, "select topup.*, topup_tempo.*, log_pelanggan.* from topup, topup_tempo, log_pelanggan where topup.kd_topup = log_pelanggan.kd_transaksi and topup.kd_topup = topup_tempo.kd_topup and topup.kd_topup = '$kdtopup'");
$cq = mysqli_num_rows($qpl);
$dp = mysqli_fetch_assoc($qpl);
$dt = mysqli_fetch_assoc($q);
$hari = date('d/m/Y');
  ?>
 <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> <b style="color: #0C8AF9;">ARIMA</b> KOMUNIKA
          <small class="pull-right">Tanggal : <?= $hari ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin Arima Komunika</strong><br>
          Jl. Gunungtanjung Kp. Sukasirna Rt.019/Rw.005 Desa Cibeber<br>
          Kec. Manonjaya - Kab. Tasikmalaya 46197<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?php echo $dp['nm_pl'] ?></strong><br>
          <?= $dp['alamat']; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #<?= $kdtopup ?></b><br>
        <br>
        <b>Kode Top-UP:</b> <?= $kdtopup ?><br>
        <b>Tanggal Top-UP:</b> <?= $dt['tgl_topup']; ?><br>
        <b>ID Akun:</b> <?= $idpl; ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Transaksi</th>
            <th>Price</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td><?= $dt['deskripsi'] ?></td>
            <td>Rp. <?= number_format($dt['jml_topup'],2,",","."); ?></td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
        <p class="lead">Metode Pembayaran : <?= $dt['pembayaran_via']; ?></p>
        <!-- <img src="dist/img/credit/visa.png" alt="Visa">
        <img src="dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="dist/img/credit/american-express.png" alt="American Express">
        <img src="dist/img/credit/paypal2.png" alt="Paypal"> -->
        <?php 
        $via = $dt['pembayaran_via'];

        if ($via == "Via Bank") {
          ?>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Silahkan transfer ke bank BRI dengan No. Rekening XXXX atas nama Andang Suhanda dengan mentransfer sejumlah total bayar pada invois ini. Jika pembayaran tidak sesuai total bayar maka transaksi top-up tidak akan segera di proses langsung.
        </p>
        
        <?php 
        }else if ($via == "Konter") {
          ?>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Silahkan datang ke konter Arima Komunika di alamat Jl. Gunungtanjung Kp. Sukasirna Rt.019/Rw.005 Desa Cibeber Kec. Manonjaya - Kab. Tasikmalaya. 
        </p>
        <?php
        }
         ?>
        
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead">Batas Pembayaran Sampai : 2/22/2019</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Jumlah Top-Up :</th>
              <td>Rp. <?= number_format($dt['jml_topup'],2,",","."); ?></td>
            </tr>
            <tr>
              <th>Biaya Admin(10%) : </th>
              <td>RP.2.000</td>
            </tr>
            <tr>
              <th>Total Bayar : </th>
              <td><?php
              $top = $dt['jml_topup'];
              $adm = 2000;
              $total = $top + $adm ;
              echo "<b>".number_format($total,2,",",".")."</b>";
               ?></td>
            </tr>
            <tr>
              <td colspan="2">
                <?php 
                if ($dt['status'] == "D") {
                   ?>
                   <a href="#" class='btn btn-success col-xs-12 konfir-byr' data-toggle='modal' data-target='#my-modal1' data-kode="<?= $kdtopup ; ?>" data-jml="<?= $total;?>" data-status="<?php echo $row['status'];?>"><li class="fa fa-search"></li> KONFIRMASI</a>
                 <?php
               }else{
                  ?>
                  <div style="background-color: red;color: white;"><h1 align="center"><b>LUNAS</b></h1></div>
                  <?php
                 } ?>
                </td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>


     <form action="main.php?tbl=bayar_topup&aksi=input" method="POST" autocomplete="off" enctype="multipart/form-data">
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" >&times;</button>

<h4 class="modal-title" id="myModalLabel">KONFIRMASI PEMBAYARAN</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 <?php
 $qp = mysqli_query($config,"select max(kd_bayar) as maxKode from bayar_topup");
$data = mysqli_fetch_assoc($qp);
$kode = $data['maxKode'];
$hari = date('dmy');
$noUrut = (int)substr($kode, 11,5);
$noUrut = $noUrut + 1;
$kata = "BYR-".$hari."-";
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

      <label>KODE TRANSAKSI</label>
      <input type="text" name="kd_topup" class="form-control" value="<?php echo $_GET['kode'];?>">
      <input type="hidden" value="<?php echo $kd_topup ?>" name="transaksi" class="form-control" >
      </div>

    
  
     <div class="form-group">
       <label>Nama Pemilik Rekening</label>
       <input type="text" name="nm_rek" class="form-control">
     </div>
     <div class="form-group">
      <label>Jumlah Bayar</label>
       <input type="text"  name="jml_bayar" class="form-control" value="<?php echo $total;?>">
     </div>
     <div class="form-group">
       <label>Bukti Pembayaran</label>
       <input type="file" name="bukti_byr" class="form-control">
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
  
        $(document).on("click", ".konfir-byr", function (){
        var str_kode = $(this).data('kode'),
        str_jml = $(this).data('jml'),
        status = $(this).data('status');

        $('input[name="kd_topup"]').val(str_kode);
        $('input[name="jml_topup"]').val(str_jml);
        $('select[name="status"]').val(status);
    });
</script>

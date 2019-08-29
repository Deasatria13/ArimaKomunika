<!DOCTYPE html>
<html>
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ARIMA | Registrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index2.html"><img src="logo.png" width="100%"></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Lengkapi Formulir dibawah ini untuk Pendaftaran</p>

    <?php 
    include "koneksi.php";
$qp = mysqli_query($config,"select max(id_pelanggan) as maxKode from pelanggan");
$data = mysqli_fetch_assoc($qp);
$kode = $data['maxKode'];

$noUrut = (int)substr($kode, 3,3);
$noUrut = $noUrut + 1;
$kata = "PL";
$kd_pelanggan = $kata.str_pad($noUrut,3,"0", STR_PAD_LEFT);

 ?>

    
        <form action="main.php?tbl=pelanggan&aksi=input" method="POST" autocomplete="off" >
          
      <div class="form-group has-feedback">
        <input type="hidden" class="form-control" name="kd_pelanggan" value="<?php echo $kd_pelanggan; ?>">
        <input type="text" class="form-control" name="nm_pl" placeholder="Nama Lengkap">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <select class="form-control" name="jk" >
          <option value="0">-Pilih Jenis Kelamin-</option>
          <option value="L">Laki - Laki</option>
          <option value="P">Perempuan</option>
          
        </select>
        <span class="glyphicon glyphicon-heart form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
        <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone">
        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
      </div>

       <div class="form-group has-feedback">
        <input type="text" name="user" class="form-control" placeholder="user">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
    
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="password" name="pass2" class="form-control" placeholder="Ulangi Password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
              <input type="checkbox" name="checkbox"> <label>Saya menyetujuai semua  <a href="#" data-toggle="modal" data-target="#my-modal1">Persyaratan Pendaftaran</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" name="daftar" class="btn btn-primary btn-block btn-flat" value="DAFTAR" onclick="if(!this.form.checkbox.checked){alert('Ceklis persetujuan persyaratan pendaftaran .');return false}" >
        </div>
        <!-- /.col -->
      </div>
   

    Punya Akun <a href="login.php" class="text-center">Login</a>

  </div>
    </form>
  <!-- /.form-box -->
   
    <div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="col-xs-12">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Aturan Penggunaan Arima Komunika Konter</h4>
        </div>


        <div class="modal-body center"> 
 <!--Content-->

 
          <ul>
            <li align="justify">Arima Komunika Konter sebagai sarana penunjang bisnis berusaha menyediakan berbagai fitur dan layanan untuk menjamin keamanan dan kenyamanan para penggunanya.</li>
            <li align="justify">Arima Komunika Konter hanya berperan sebagai Penjual pulsa,  sebagai perantara antara Pelapak dan Pembeli, untuk mengamankan setiap transaksi yang berlangsung di dalam platform Arima Komunika Komputer melalui mekanisme Arima Komunika Payment System. </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

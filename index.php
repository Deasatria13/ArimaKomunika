<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


error_reporting(0);
include 'koneksi.php';
$get=$_GET['page'];
 

session_start();
if(empty($_SESSION['status']))
header("location:login.php");

  if ( empty($get))
  {
     $tampil = "dashboard.php";	
  }

  elseif ($get=='tpulsa')
  {
    $tampil="pulsa.php";
  }

  elseif ($get=='tprovider') {
  	
  	$tampil="provider.php";
  }

  elseif ($get=='tsmscenter') {
  	$tampil="sms_center.php";
  }

  elseif ($get=='tnocenter') {
  	$tampil="no_center.php";
  }

  elseif ($get=='tadmin') {
  	$tampil="admin.php";
  }

elseif ($get=='pelanggan') {
    $tampil="pelanggan.php";
  }
  elseif ($get=='ttransaksi') {
  	$tampil="sms_transaksi.php";
  }

  elseif ($get=='tinbox') {
    include 'koneksi2.php';
    $tampil="inbox.php";
  }

  elseif ($get=='tsent'){
    include 'koneksi2.php';
    $tampil='sent.php';
  }
  elseif ($get=='topup'){
    $tampil='topup.php';
  }

  elseif ($get=='laporan_transaksi'){
    include 'koneksi.php';
    $tampil='laporan_transaksi.php';
  }

  elseif ($get=='laporan_topup'){
    include 'koneksi.php';
    $tampil='laporan_topup.php';
  }

   elseif ($get=='tinbox'){
    include 'koneksi.php';
    $tampil='insert.php';
  }
  
  

  ?>

  <?php include 'theme/header.php'; ?>


       
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
              <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>
<?php $tipe=mysqli_fetch_row(mysqli_query($config,"select * from admin where id_admin='$_SESSION[session_id]'"));
                      echo $tipe[1]; ?>
            </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
             
            <!-- /.search form -->
            <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="<?php if ( empty($get)) echo "active "; ?>">
                <a href="index.php">
                   <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
              </li> 
              <li class="treeview <?php if ($get == "ttransaksi" or $get == "tinbox" or $get== "tsent") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tpulsa">
                  <i class=" fa fa-credit-card"></i> <span>Transaksi</span>  
                </a>
                 <ul class="treeview-menu">
                  <li class="<?php if ($get == "ttransaksi") echo "active"; ?>">
                      <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=ttransaksi"><i class="fa  fa-reply"></i>Penjualan Pulsa Offline</a>
                    </li>
                  <li class="<?php if ($get == "tinbox") echo "active"; ?>">
                      <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tinbox"><i class="fa fa-envelope-o"></i>Inbox</a>
                    </li>
                    <li class="<?php if ($get == "tsent") echo "active"; ?>">
                        <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tsent"><i class="fa fa-send-o "></i>Sent Items</a>
                    </li>
                  </ul>
              </li> 

               <li class="treeview <?php if ($get == "pelanggan" or $get == "topup") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tprovider">
                  <i class="fa  fa-user"></i> <span>Pelanggan</span>  
                </a>
                <ul class="treeview-menu">
              <li class ="<?php if ($get == "pelanggan") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=pelanggan"><i class="fa fa-circle-o"></i>DAFTAR PELANGGAN</a></li>
              <li class ="<?php if ($get == "topup") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=topup"><i class="fa fa-circle-o"></i>TOP UP</a></li>
              
            </ul>
              </li>

               <li class="treeview <?php if ($get == "tprovider" or $get == "tpulsa") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tprovider">
                  <i class="fa fa-file"></i> <span>Data Provider</span>  
                </a>
                <ul class="treeview-menu">
              <li class ="<?php if ($get == "tprovider") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tprovider"><i class="fa fa-circle-o"></i>Provider</a></li>
              <li class ="<?php if ($get == "tpulsa") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tpulsa"><i class="fa fa-circle-o"></i>Pulsa</a></li>
              
            </ul>
              </li>


               <li class="treeview <?php if ($get == "tsmscenter" or $get == "tnocenter") echo "active"; ?>" >
                <a href="#">
                  <i class="fa  fa-desktop"></i> <span>Server SMS</span>  
                </a>
                <ul class="treeview-menu">
              <li class ="<?php if ($get == "tsmscenter") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tsmscenter"><i class="fa fa-circle-o"></i> SMS Center</a></li>
              <li class ="<?php if ($get == "tnocenter") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tnocenter"><i class="fa fa-circle-o"></i> No Center</a></li>
              
            </ul>
              </li> 


               <li class="treeview <?php if ($get == "ttransaksi" or $get == "topup") echo "active"; ?>" >
                <a href="#">
                  <i class="fa  fa-desktop"></i> <span>Laporan</span>  
                </a>
                <ul class="treeview-menu">
              <li class ="<?php if ($get == "ttransaksi") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=laporan_transaksi"><i class="fa fa-circle-o"></i>Laporan Transaksi Pulsa</a></li>
              <li class ="<?php if ($get == "tnocenter") echo "active"; ?> ">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=laporan_topup"><i class="fa fa-circle-o"></i>Laporan Top Up</a></li>
              
            </ul>
              </li>
              

              <li class="<?php if ($get == "tadmin") echo "active"; ?>">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=tadmin">
                  <i class="fa  fa-user"></i> <span>Admin</span>  
                </a>
              </li> 

                <li class="">
                <li><a href="logout.php"><i class="fa  fa-sign-out"></i> <span>Logout</span></a></li>
                </li>
              
             
             </ul>
          </section>
          <!-- /.sidebar -->
        </aside>


        
     
        	<?php include "master/$tampil" ?>
        
       
  <?php include 'theme/footer.php'; ?>
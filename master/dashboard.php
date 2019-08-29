    <!-- Content Wrapper. Contains page content -->
    <?php
     include 'koneksi.php';
    ?>
      <div class="content-wrapper">
<section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>
                       <?php
                      $table = "sms_transaksi";
                      $sql = "SELECT count(*) AS smsku FROM $table";
                        $query = mysqli_query($config,$sql);
                        $result = mysqli_fetch_array($query);
                        echo " <h3>".$result['smsku']." <p>Pelanggan</p></h3> <br/>";

                    ?> 


                  </h3>



                 
                 
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="topup.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
                    
                     <?php
                      $table = "topup";
                      $sql = "SELECT count(*) AS smsku FROM $table";
                        $query = mysqli_query($config,$sql);
                        $result = mysqli_fetch_array($query);
                        echo " <h3>".$result['smsku']."<p>TOPUP</p></h3> <br/>";

                    ?> 

                  </h3>
                 
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>
                    
                    <?php
                      $table = "sms_transaksi";
                      $sql = "SELECT count(*) AS smsku FROM $table";
                        $query = mysqli_query($config,$sql);
                        $result = mysqli_fetch_array($query);
                        echo " <h3>".$result['smsku']."<p>TRANSAKSI</p></h3> <br/>";

                    ?> 
                  </h3>
                  
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>
                    <?php
                      $table = "inbox";
                      $sql = "SELECT count(*) AS smsku FROM $table";
                        $query = mysqli_query($config,$sql);
                        $result = mysqli_fetch_array($query);
                        echo " <h3>".$result['smsku']."<p>inbox</p></h3> <br/>";

                    ?> 
                  </h3>
                  
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
   
            


            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div>
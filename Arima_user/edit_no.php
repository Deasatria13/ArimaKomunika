<br>
<div class="col-md-10">
  <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $duser['nm_pl']; ?></h3>

              <p class="text-muted text-center"><?php echo $duser['alamat']; ?></p>
              <div class="col-md-12">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Saldo </b> <a class="pull-right"><?php echo $dsaldo['saldo']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Transaksi</b> <a class="pull-right">
                    
                       <?php
                      $table = "auto_transaksi";
                      $sql = "SELECT count(*) AS smsku FROM $table where = $id_pelanggan";
                        $query = mysqli_query($config,$sql);
                        $result = mysqli_fetch_array($query);
                        echo " <h3>".$result['smsku']."<p></p></h3> <br/>";

                          ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>TOP UP</b> <a class="pull-right"><?php echo $dsaldo['saldo']; ?></a>
                </li>
              </ul>
            </div><br>
            <br><br><br><br><br><br><br><br><br><br>

              <a href="index.php" class="btn btn-primary btn-block"><b>Back Home</b></a>
              <a href="edit_no.php" class="btn btn-primary btn-block"><b>Edit nomor</b></a>




            </div>



            
            <!-- /.box-body -->
          </div>
        </div>



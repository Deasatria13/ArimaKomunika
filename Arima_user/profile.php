<br>
<div class="col-md-10">
  <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $duser['nm_pl']; ?></h3>

              <p class="text-muted text-center"><?php echo $duser['alamat']; ?></p>
              <p class="text-muted text-center"><?php echo $duser['no_hp']; ?></p>
              <div class="col-md-12">
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Saldo </b> <a class="pull-right"><?php echo $dsaldo['saldo']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>TOP UP</b> <a class="pull-right"><?php echo $dsaldo['saldo']; ?></a>
                </li>
              </ul>
            </div><br>
            <br><br><br><br><br><br><br><br><br><br>

              <a href="index.php" class="btn btn-primary btn-block"><b>Back Home</b></a>
              <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-primary btn-block"></li>Edit User</a>



            </div>



            
            <!-- /.box-body -->
          </div>
        </div>


<form action="main.php?aksi=editno&tbl=editnmr" method="POST" autocomplete="off" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title" id="myModalLabel">Edit User</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
    
    <div class="form-group">
      <label>Id</label>
      <input type="text" name="idusr" class="form-control" readonly value="<?php echo $duser['user']; ?>" placeholder="Enter ...">
    </div>

    <div class="form-group">
      <label>Nama User</label>
      <input type="text" name="nama" class="form-control" value="<?php echo $duser['nm_pl']; ?>" placeholder="Enter ...">
    </div>

     
 
    <div class="form-group">
      <label>No Hp</label>
      <input type="text" name="nohp" class="form-control" value="<?php echo $duser['no_hp'];?>" placeholder="Enter ..." required></textarea> 
    </div>


</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success">Simpan</button> 
  
</div>
   
   </div>
 </div>
 </div>
</form>

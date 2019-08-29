<table class="table no-margin">
                  <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>Isi Transaksi</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $id_pl = $iduser;
                    $qtopup = mysqli_query($con,"select *.topup,*.topup_tempo from topup, topup_tempo where kd_topup.topup = kd_topup.topup_tempo and id_pelanggan.topup = '$id_pl'");
                    $vtop = mysqli_num_rows($qtopup);

                    if ($vtop == 1) {
                      ?>
                       <tr>
                    <td><a href="pages/examples/invoice.html">TP0001</a></td>
                    <td>Call of Duty IV</td>
                    <td>Transaksi Pulsa Ke no 082119305063</td>
                    <td><span class="label label-success">Succes</span></td>
                    <td>
                      <button class="btn btn-sm btn-warning">DETAIL</button>
                    </td>
                  </tr>
                      <?php
                    }else{
                      ?>
                     <tr>
                       <td colspan="5" align="center">Tidak ada transaksi</td>
                     </tr>
                    <?php
                    }
                 ?>

                  </tbody>
                </table>
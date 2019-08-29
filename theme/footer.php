 <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2018-2019 <a href="#">ARIMA KOMUNIKA</a>.</strong> All rights reserved.
      </footer>

       
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

      <!-- NOTIF TERKIRIM -->
      <?php
        $id_terkirim = "";
        $rs = mysqli_query ($config,"select * from sentitems ORDER BY ID DESC LIMIT 1");
        while ($r = mysqli_fetch_array($rs))
        {
            $id_terkirim = $r[ID];
        }
      ?>
      <input type="hidden" id="saat_ini" value="<?php echo $id_terkirim; ?>" />
      <!-- NOTIF TERKIRIM -->

      <!-- No SMS BARU -->
      <?php
       $id_inbox = "";
       $rs = mysqli_query ($config,"select * from inbox ORDER BY ID DESC LIMIT 1");
       while ($r = mysqli_fetch_array($rs))
       {
        $id_inbox = $r[ID];

       }
       ?>
       <input type="hidden" id="pesan_baru" value="<?php echo $id_inbox; ?>"/>




    <!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   
    <!-- Bootstrap 3.3.5 --
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="./bower_components/moment/min/moment.min.js"></script>
    
    <!-- datatable + laporan -->
    <script src="./bower_components/datatables.net/js/jquery.dataTables.js"></script>
    <script src="./bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="./bower_components/datatables.net-bs/extension/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script src="./bower_components/datatables.net-bs/extension/buttons/1.5.1/js/buttons.flash.min.js"></script>
  <script src="./bower_components/datatables.net-bs/extension/jszip/2.5.0/jszip.min.js"></script>
  <script src="./bower_components/datatables.net-bs/extension/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script src="./bower_components/datatables.net-bs/extension/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script src="./bower_components/datatables.net-bs/extension/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script src="./bower_components/datatables.net-bs/extension/buttons/1.5.1/js/buttons.print.min.js"></script>
   <!-- datatable + laporan -->

    <!-- Bootstrap WYSIHTML5 -->
    <script src="dist/js/app.min.js"></script>
    
    <!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/pnotify/js/pnotify.min.js"></script>
<script src="plugins/pnotify/js/pnotify.js"></script>


    <!-- DataTables -->
       <script>
      $(function () {

        //datatable + lap
        if ($("#example1").length)
        {
          
        var table = $("#example1").DataTable();
        

          var buttons = new $.fn.dataTable.Buttons(table, {
         buttons: [
          { extend: 'csv', className: 'btn btn-default'},
          { extend: 'excel', className: 'btn btn-default'},
          { extend: 'pdf', className: 'btn btn-default' },
          { extend: 'copy', className: 'btn btn-default', text: 'Salin'},
          { extend: 'print', className: 'btn btn-default', text: 'Cetak'},
          
        ]
      }).container().appendTo($('#buttons'));
        }

        if ($("#tabel-inbox").length)
        {
          
        $("#tabel-inbox").DataTable({ "order": [[4, "desc"]] });
        
        }

          //datatable + lap

      $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });

    //---cek-terkirim-->
    
    
   

  });

</script>
    <script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

<div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <b>Anda yakin ingin menghapus data ini ?</b><br><br>
                <a class="btn btn-danger btn-ok"> Hapus</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
  $(".btn-hapus").on("click", function() {
      var url = $(this).data("href");
      $(".btn-ok").attr("href", url);
  })
</script>
   
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>


    <script type="text/javascript">
      
      $(document).ready(function() {

function cek_terkirim()
    {
      
      var saat_ini = $("#saat_ini").val();

      $.ajax({
        url: 'master/proses_sms.php?sender=cek_terkirim&ID='+ saat_ini,
        dataType: 'json',
        success: function(response) {
            
            if (response.status == 0)
              {
                buat_pnotify("info", "stack_top_right", "300px", "SMS sedang dikirim! ("+ response.status_SMS +")");
                $("#saat_ini").val(response.id_baru);
              }
        }
      })
    }
    //--end

    function cek_inbox()
    {
      var pesan_baru = $("#pesan_baru").val();

      $.ajax({
        url: 'master/proses_sms.php?sender=cek_inbox&ID='+ pesan_baru,
        dataType: 'json',
        success: function(response){
           
           if (response.status == 0) 
           {
              buat_pnotify("info", "stack_top_right", "300px", "SMS Baru Telah Masuk!");
              $("#pesan_baru").val(response.id_baru);
           }
        }
      })
    }

    setInterval(function(){
        cek_terkirim();
        cek_inbox();
    }, 1200);


    $(document).on("click", ".status-topup", function (){
        var str_kode = $(this).data('kode'),
        str_no_hp = $(this).data('no'),
        str_jml = $(this).data('jml'),
        status = $(this).data('status');
        

        $('input[name="kd_topup"]').val(str_kode);
        $('input[name="no_hp"]').val(str_no_hp);
        $('input[name="jml_topup"]').val(str_jml);
        $('select[name="status"]').val(status);


    });

      $(document).on("click", ".konfir-plg", function (){
        var str_plg = $(this).data('plg'),
        str_nm_pl = $(this).data('nm_pl'),
        str_no_telp = $(this).data('no_telp');

        $('input[name="plg"]').val(str_plg);
         $('input[name="nm_pl"]').val(str_nm_pl);
         $('input[name="no_telp"]').val(str_no_telp);

    });



});
    </script>
    
  </body>
</html> 
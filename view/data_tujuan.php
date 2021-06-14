<?php 
  include '../control/koneksi.php';
?> 

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Tujuan</h3>
        </div>
        <div class="box-body">
          <button type="button" data-toggle="modal" data-target="#ModalAddTujuan" class="btn btn-info fa fa-plus" class="btn btn-danger"><span class="gliphicon gliphicon-plus" data-toggle="modal" data-target=.bs-example-modal-lg></span> Tambah Data</button>
        </div>

        <!-- ModalADD  -->
        <div id="ModalAddTujuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="#" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myModalLabel"><center>Tambah Data Tujuan</center></h4>
                </div>
                <div class="modal-body">
                  
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <!-- /.form-group -->
                         <div class="form-group">
                            <label>Tujuan</label>
                            <input type="text" name="tujuan" id="tujuan" class="form-control" />
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                      </div>
                    <!-- /.row -->
                    </div>
                  <!-- /.box-body -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-info" id="saveTujuan">Save</button>
                      <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                      Close
                    </button>
                  </div>
             </form>
              </div>         
            </div>
          </div>
        </div>

        <!-- End-ModalADD  -->

      <!-- ModalEdit  -->
      <div class="modal fade" id="EditDataTujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="#" method="post" id="updateFormTujuan">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel"><center>Edit Data Tujuan</center></h4>
            </div>
            <div class="modal-body" id="info_updateTujuan">
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="updateTujuan">Update</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- End-ModalEdit  -->

       <!-- ModalHapus  -->
      <div class="modal fade" id="delDataTujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="#" method="post" id="delFormTujuan">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel"><center>Delete Tujuan</center></h4>
            </div>
            <div class="modal-body" id="info_delTujuan">
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="delTujuan">Delete</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- End-ModalHapus  -->

<!-- /.box-header -->
  <div class="box-body">
    <table id="Tj" class="table table-bordered table-striped">
      <thead>
        <tr class="info">
          <th>Id Pengguna</th>
          <th>Tujuan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $query = ("SELECT * FROM tujuan");
          $hasil_query = mysqli_query($koneksi,$query);
          $number = 1;
          while ($key = mysqli_fetch_array($hasil_query)) {
        ?>
      <tr>
              <td><?php echo $key['id_tujuan']; ?></td>
              <td><?php echo $key['tujuan']; ?></td>
             <td>
              <button class="btn btn-info btn-sm fa fa-edit edit_dataTujuan" id="<?php echo $key['id_tujuan'] ?>"> Edit</button>
              <button class="btn btn-danger btn-sm fa fa-trash del_dataTujuan" id="<?php echo $key['id_tujuan'] ?>"> Hapus</button>
             </td>
           </tr>

            <?php 
          $number++;
          }
            ?>    
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</section>

 <script>
  $(function () {
    $('#Tj').DataTable()
    $('#pelajaran').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $("#saveTujuan").click(function(){
      
      var tujuan = $('#tujuan').val();

      var value = {tujuan};
                      
      $.ajax({
        type : 'POST',
        url : "../control/save_tujuan.php",
        data :value,
        success: function(data){
        
      $('#ModalAddTujuan').modal('hide');
      $('.modal').remove();
      $('.modal-backdrop').remove();
      $('body').removeClass( "modal-open" );
      window.onload = data_tujuan();
        }
      })
    });
    $(document).on('click','.edit_dataTujuan',function(){
    var edit_id=$(this).attr('id');
    $.ajax({
      url :"../control/edit_dataTujuan.php",
      type : "post",
      data : {edit_id : edit_id},
      success:function(data){
        $("#info_updateTujuan").html(data);
        $("#EditDataTujuan").modal('show');
      }
    });
  });
  $(document).on('click','#updateTujuan', function(){
    $.ajax({
      url:"../control/save_updateTujuan.php",
      type: "post",
      data: $("#updateFormTujuan").serialize(),
      success:function(data){
        $("#EditDataTujuan").modal('hide');
        $('.modal').remove();
        $('.modal-backdrop').remove();
        $('body').removeClass( "modal-open" );
        window.onload = data_tujuan();
      }
    });
  });
  $(document).on('click','.del_dataTujuan', function(){
    var del_id=$(this).attr('id');
    $.ajax({
      url :"../control/del_dataTujuan.php",
      type : "post",
      data : {del_id : del_id},
      success:function(data){
        $("#info_delTujuan").html(data);
        $("#delDataTujuan").modal('show');
      }
    });
  });  
   $(document).on('click','#delTujuan', function(){
    $.ajax({
      url:"../control/save_deleteTujuan.php",
      type: "post",
      data: $("#delFormTujuan").serialize(),
      success:function(data){
        $("#delDataTujuan").modal('hide');
        $('.modal').remove();
        $('.modal-backdrop').remove();
        $('body').removeClass( "modal-open" );
        window.onload = data_tujuan();
      }
    });
  });
  });
</script>
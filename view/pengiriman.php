<?php 
	include '../control/koneksi.php';
?>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Pengiriman</h3>
        </div>
        <div class="box-body">
          <button type="button" data-toggle="modal" data-target="#ModalAddPengiriman" class="btn btn-info fa fa-plus" class="btn btn-danger"><span class="gliphicon gliphicon-plus" data-toggle="modal" data-target=.bs-example-modal-lg></span> Tambah Data</button>
        </div>

        <!-- ModalADD  -->
        <div id="ModalAddPengiriman" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
              	<form action="#" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title" id="myModalLabel"><center>Tambah Data Pengiriman</center></h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6">
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label> Nama Pengirim</label>
                            <input type="text" name="nm_pengirim" id="nm_pengirim" class="form-control" />
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label>Id Layanan</label>
                           <select name="id_layanan" id="id_layanan" class="form-control">
                             <option value=""selected disabled>Pilih Layanan</option>
                             <?php $a=mysqli_query($koneksi,"SELECT * FROM layanan");
                             while ($b=mysqli_fetch_assoc($a)) {
                                echo "<option value='$b[id_layanan]'>$b[layanan]</option>";
                              } ?>
                           </select>
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label> Id Tujuan</label>
                            <select name="id_tujuan" id="id_tujuan" class="form-control">
                              <option value=""selected disabled> Pilih Tujuan</option>
                              <?php $a=mysqli_query($koneksi, "SELECT * FROM tujuan");
                              while ($b=mysqli_fetch_assoc($a)) {
                                 echo "<option value='$b[id_tujuan]'>$b[tujuan]</option>";
                               } ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label> Tanggal Pengiriman</label>
                            <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control"/>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                          <!-- /.form-group -->
                          <div class="form-group">
                              <label>Berat</label>
                              <input type="number" name="berat" id="berat" class="form-control" onkeyup="hitung();" value="1" />
                            </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label> Biaya Paket</label>
                            <input type="number" name="biaya_paket" id="biaya_paket" class="form-control" value="0" disabled />
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                              <label>Total Biaya</label>
                              <input type="number" name="total_biaya" id="total_biaya" class="form-control" disabled />
                            </div>
                        <!-- /.form-group -->
                        </div>    
                      <!-- /.col -->
                      </div>
                    <!-- /.row -->
                    </div>
                  <!-- /.box-body -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-info" id="savePengiriman">Save</button>
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
      <div class="modal fade" id="editDataPengiriman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="#" method="post" id="updateFormPengiriman">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel"><center>Edit Data Pengiriman</center></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="info_updatePengiriman">
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="updatePengiriman">Update </button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- End-ModalEdit  -->

       <!-- ModalHapus  -->
      <div class="modal fade" id="delDataPengiriman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="#" method="post" id="delFormPengiriman">
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel"><center>Delete Pengiriman</center></h4>
            </div> 
            <div class="modal-body" id="info_delPengiriman">
               
            </div>
            <div class="modal-footer ">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="delPengiriman">Delete</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- End-ModalHapus  -->
<!-- /.box-header -->

	<div class="box-body">
		<table id="user" class="table table-bordered table-striped">
			<thead>
				<tr class="info">
					<th>Id Pengiriman</th>
					<th>Nama Pengirim</th>
					<th>Id Layanan</th>
					<th>Id Tujuan</th>
					<th>Tanggal Pengiriman</th>
					<th>Berat</th>
          <th>Biaya Paket</th>
          <th>Total Biaya</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query = ("SELECT * FROM pengiriman");
					$hasil_query = mysqli_query($koneksi,$query);
					$number = 1;
					while ($row = mysqli_fetch_array($hasil_query)) {
				?>
			<tr>     
              <td><a href="JavaScript:newPopup('../control/print_struk.php?kode=<?php echo $row['id_pengiriman'] ?>');"><?php echo $row['id_pengiriman']; ?></td></a>
              <td><?php echo $row['nm_pengirim']; ?></td>
              <td><?php echo $row['id_layanan']; ?></td>
              <td><?php echo $row['id_tujuan']; ?></td>
              <td><?php echo $row['tanggal_pengiriman']; ?></td>
              <td><?php echo $row['berat']; ?> Kg</td>
              <td>Rp. <?php echo number_format($row['biaya_paket']) ?>,-</td>
              <td>Rp. <?php echo number_format($row['total_biaya']) ?>,-</td>
             <td>
             <button class="btn btn-info btn-sm fa fa-edit edit_dataPengiriman" id="<?php echo $row['id_pengiriman'] ?>"> Edit</button>
             <button class="btn btn-danger btn-sm fa fa-trash del_dataPengiriman" id="<?php echo $row['id_pengiriman'] ?>"> Hapus</button>
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
    $('#user').DataTable()
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
// Popup window code
function newPopup(url) {
    popupWindow = window.open(
        url,'popUpWindow','height=550,width=595,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $("#savePengiriman").click(function(){
      
      var nm_pengirim = $('#nm_pengirim').val();
      var id_layanan = $('#id_layanan').val();
      var id_tujuan = $('#id_tujuan').val();
      var tanggal_pengiriman = $('#tanggal_pengiriman').val();
      var berat = $('#berat').val();
      var biaya_paket = $('#biaya_paket').val();
      var total_biaya = $('#total_biaya').val();
      
      var value = {    nm_pengirim,
                       id_layanan,
                       id_tujuan,
                       tanggal_pengiriman,
                       berat,
                       biaya_paket,
                       total_biaya
                       };
                         
      $.ajax({
        type : 'POST',
        url : "../control/save_pengiriman.php",
        data :value,                            
        success: function(data){
        
      $('#ModalAddPengiriman').modal('hide');
      $('.modal').remove();
      $('.modal-backdrop').remove();
      $('body').removeClass( "modal-open" );
      window.onload = pengiriman();
        }
      }) 
    });
    $(document).on('click','.edit_dataPengiriman', function(){
    var edit_id=$(this).attr('id');
    $.ajax({
      url :"../control/edit_dataPengiriman.php",
      type : "post",
      data : {edit_id : edit_id},
      success:function(data){
        $("#info_updatePengiriman").html(data);
        $("#editDataPengiriman").modal('show');
      }
    });
  });
  $(document).on('click','#updatePengiriman', function(){
    $.ajax({
      url:"../control/save_updatePengiriman.php",
      type: "post",
      data: $("#updateFormPengiriman").serialize(),
      success:function(data){
        $("#editDataPengiriman").modal('hide');
        $('.modal').remove();
        $('.modal-backdrop').remove();
        $('body').removeClass( "modal-open" );
        window.onload = pengiriman();
      }
    });
  });
     $(document).on('click', '.del_dataPengiriman', function(){
      var del_id=$(this).attr('id');
      $.ajax({
        url : "../control/del_pengiriman.php",
        type : "post",
        data : {del_id : del_id},
        success:function(data){
          $("#info_delPengiriman").html(data);
          $("#delDataPengiriman").modal('show');
        }
      });
    });
    $(document).on('click', '#delPengiriman', function(){
      $.ajax({
        url : "../control/save_deletePengiriman.php",
        type : "post",
        data : $("#delFormPengiriman").serialize(),
        success:function(data){
          $("#delDataPengiriman").modal('hide');
          $('.modal').remove();
          $('.modal-backdrop').remove();
          $('body').removeClass("modal-open");
          window.onload = pengiriman();
        }
      });
    });
  });    
  </script>
  <script>
    $('#id_layanan').bind('change', function(){
      var layanan = $('#id_layanan').val();
      var berat = document.getElementById('berat').value;
      $.ajax({
        url: "../control/get_price.php",
        method: "POST",
        dataType: "html",
        data: {layanan: layanan},
        success: function(response){
          var hasil = response * berat;
          $('#biaya_paket').val(response);
          $('#total_biaya').val(hasil);
        },
      });
    });
    
    function hitung(){
      var biaya_paket = document.getElementById('biaya_paket').value;
      var berat = document.getElementById('berat').value;
      
      var hasil = biaya_paket * berat;
      
      $('#total_biaya').val(hasil);
    }
</script>
  

























































































































































































































































































  
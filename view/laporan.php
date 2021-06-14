<?php 
  include '../control/koneksi.php';
?>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Laporan Data Pengiriman</h3>
        </div>
        <div class="box-body">
          <a href="../control/cetak_dataLap.php"  class="btn btn-info btn-sm" target="_Blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
        </div>
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
              <td><?php echo $row['id_pengiriman']; ?></td></a>
              <td><?php echo $row['nm_pengirim']; ?></td>
              <td><?php echo $row['id_layanan']; ?></td>
              <td><?php echo $row['id_tujuan']; ?></td>
              <td><?php echo $row['tanggal_pengiriman']; ?></td>
              <td><?php echo $row['berat']; ?> Kg</td>
              <td>Rp. <?php echo number_format($row['biaya_paket']) ?>,-</td>
              <td>Rp. <?php echo number_format($row['total_biaya']) ?>,-</td>
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

   $(document).on('click','.cetak_lap', function(){
    var print_id=$(this).attr('id');
    $.ajax({
      url :"../control/cetak_dataLap.php",
      type : "post",
      data : {print_id : print_id},
      success:function(data){
        $("#info_delUser").html(data);
        $("#delDataUser").modal('show');
      }
    });
  });  
});
</script>

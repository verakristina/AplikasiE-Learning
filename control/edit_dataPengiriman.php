<?php 
include 'koneksi.php';
if (isset($_POST['edit_id'])) {
	$id=$_POST['edit_id'];
	$sql="SELECT * FROM pengiriman WHERE id_pengiriman='$id'";
	$result=mysqli_query($koneksi, $sql);
	while ($row=mysqli_fetch_array($result)) {
		$id=$row['id_pengiriman'];
		$nm_pengirim=$row['nm_pengirim'];
		$id_layanan=$row['id_layanan'];
		$id_tujuan=$row['id_tujuan'];
		$tanggal_pengiriman=$row['tanggal_pengiriman'];
		$berat=$row['berat'];
		$biaya_paket=$row['biaya_paket'];
		$total_biaya=$row['total_biaya'];
	}
}

?>
  <div class="row">
 	<div class="col-md-6">
 	 <div class="form-group">
 		<input type="hidden" name="edit_id" id="edit_id" class="form-control" value="<?php echo $id ?>" />
    </div>
      <!-- /.form-group -->
     <div class="form-group">
        <label>Nama Pengirim</label>
        <input type="text" name="nm_pengirim" id="nm_pengirim" class="form-control" value="<?php echo $nm_pengirim ?>" />
      </div>
      <!-- /.form-group -->
      <div class="form-group">
        <label> Id Layanan</label>
        <input type="number" name="id_layanan" id="id_layanan" class="form-control" value="<?php echo $id_layanan ?>">
      </div>
      <!-- /.form-group -->
      <div class="form-group">
        <label>Id Tujuan</label>
        <input type="number" name="id_tujuan" id="id_tujuan" class="form-control" value="<?php echo $id_tujuan ?>"/>
      </div>
      <!-- /.form-group -->
      <div class="form-group">
        <label> Tanggal Pengiriman</label>
        <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" class="form-control" value="<?php echo $tanggal_pengiriman ?>" />
      </div>
      <!-- /.form-group -->
    </div>
    <!-- /.col -->
    <div class="col-md-6">
      <div class="form-group">
        <input type="hidden" name="edit_id" id="edit_id" class="form-control" value="<?php echo $id ?>" />
      </div>
      <!-- /.form-group -->
      <div class="form-group">
        <label> Berat</label>
        <input type="text" name="berat" id="berat" class="form-control" value="<?php echo $berat ?>"/>
      </div>
      <!-- /.form-group -->
     <div class="form-group">
        <label> Biaya Paket</label>
        <input type="number" name="biaya_paket" id="biaya_paket" class="form-control" value="<?php echo $biaya_paket ?>" />
      </div>
      <!-- /.form-group -->
      <div class="form-group">
        <label> Total Biaya</label>
        <input type="number" name="total_biaya" id="total_biaya" class="form-control" value="<?php echo $total_biaya ?>"/>
      </div>
    <!-- /.form-group -->

	</div>
</div>
      
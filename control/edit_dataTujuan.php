<?php 
include '../control/koneksi.php';
if (isset($_POST['edit_id'])) {
	$id=$_POST['edit_id'];
	$sql="SELECT * FROM tujuan WHERE id_tujuan='$id'";
	$result=mysqli_query($koneksi, $sql);
	while ($key=mysqli_fetch_array($result)) {
		$id=$key['id_tujuan'];
		$tujuan=$key['tujuan'];
		}
}
?>		

	 <div class="row">
	 	<div class="col-md-12">
	 		 <div class="form-group">
	 		<input type="hidden" name="edit_id" id="edit_id" class="form-control" value="<?php echo $id ?>" />
	      </div>
	      <!-- /.form-group -->
	     <div class="form-group">
	        <label>Tujuan</label>
	        <input type="text" name="tujuan" id="tujuan" class="form-control" value="<?php echo $tujuan ?>" />
	      </div>
	      <!-- /.form-group -->
	</div>
</div>
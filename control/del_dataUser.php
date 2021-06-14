<?php 
include '../control/koneksi.php';
if (isset($_POST['del_id'])) {
	$id=$_POST['del_id'];
	$sql="SELECT * FROM user WHERE id_pengguna='$id'";
	$result=mysqli_query($koneksi, $sql);
	while ($key=mysqli_fetch_array($result)) {
		$id=$key['id_pengguna'];
		}
}
?>		

	
	 		<input type="hidden" name="del_id" id="del_id" class="form-control" value="<?php echo $id ?>" />
	 	
	<h3><p align="center">Do you want to delete this record?</p></h3>
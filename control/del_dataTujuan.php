<?php 
include '../control/koneksi.php';
if (isset($_POST['del_id'])) {
	$id=$_POST['del_id'];
	$sql="SELECT * FROM tujuan WHERE id_tujuan='$id'";
	$result=mysqli_query($koneksi, $sql);
	while ($key=mysqli_fetch_array($result)) {
		$id=$key['id_tujuan'];
		}
}
?>		

	
	 		<input type="hidden" name="del_id" id="del_id" class="form-control" value="<?php echo $id ?>" />
	 	
	<h3><p align="center">Do you want to delete this record?</p></h3>
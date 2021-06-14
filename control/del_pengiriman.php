<?php 
include 'koneksi.php';
if (isset($_POST['del_id'])) {
	$id=$_POST['del_id'];
	$sql="SELECT * FROM pengiriman WHERE id_pengiriman='$id'";
	$result=mysqli_query($koneksi, $sql);
	while ($row=mysqli_fetch_array($result)) {
		$id=$row['id_pengiriman'];
		}
}
?>		

	
	 		<input type="hidden" name="del_id" id="del_id" class="form-control" value="<?php echo $id ?>" />
	 	
	<h3><p align="center">Do you want to delete this record?</p></h3>
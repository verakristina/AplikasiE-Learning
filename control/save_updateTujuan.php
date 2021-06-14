<?php 
include 'koneksi.php';
	$edit_id=$_POST['edit_id'];
	$tujuan=$_POST['tujuan'];


	$sql="UPDATE tujuan SET tujuan='".$tujuan."' where id_tujuan='".$edit_id ."' " ;
	$result = mysqli_query($koneksi,$sql); 

	echo "success" ;

	?>


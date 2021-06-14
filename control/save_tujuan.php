<?php
	include'koneksi.php';
							
	$tujuan=$_POST['tujuan'];

	mysqli_query($koneksi,"INSERT INTO tujuan(tujuan)VALUES ( '$tujuan')");

//$result['status']= "success";
echo "success" ;
	
	
	
	
	
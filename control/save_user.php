<?php
	include'koneksi.php';
							
	$username=$_POST['username'];
	$nama = $_POST['nama'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];
	$no_tlp = $_POST['no_tlp'];
	$level = $_POST['level'];

	mysqli_query($koneksi,"INSERT INTO user( username, nama, password, alamat, no_tlp, level)VALUES ( '$username', '$nama',md5('$password'), '$alamat', '$no_tlp', '$level')");

//$result['status']= "success";
echo "success" ;
	
	
	
	
	
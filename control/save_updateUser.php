<?php 
include 'koneksi.php';
	$edit_id=$_POST['edit_id'];
	$username=$_POST['username'];
	$nama = $_POST['nama'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];
	$no_tlp = $_POST['no_tlp'];
	$level = $_POST['level'];


	$sql="UPDATE user SET username='".$username."',nama='".$nama."',password='".$password."',alamat='".$alamat."', no_tlp='".$no_tlp."',level='".$level."' where id_pengguna='".$edit_id ."' " ;
	$result = mysqli_query($koneksi,$sql); 

	echo "success" ;
	?>



	
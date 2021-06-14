<?php

	$host="localhost";
	$user="id12836334_pengirimanbarang";
	$pass="pengirimanbarang";
	$database="id12836334_pengiriman";
	$koneksi=new mysqli($host,$user,$pass,$database);
	
	if (mysqli_connect_errno()) {
	  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
	}
?>
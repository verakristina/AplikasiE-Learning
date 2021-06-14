<?php

include 'koneksi.php';

$layanan = $_POST['layanan'];

$sql_query = "SELECT * FROM layanan WHERE id_layanan = '$layanan'";
$sql_execute = mysqli_query($koneksi, $sql_query);

while($data = mysqli_fetch_assoc($sql_execute)){
	echo $data['biaya_paket'];
}

?>
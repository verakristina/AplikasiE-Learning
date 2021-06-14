
<?php
	include'koneksi.php';
							
	$nm_pengirim=$_POST['nm_pengirim'];
	$id_layanan = $_POST['id_layanan'];
	$id_tujuan = $_POST['id_tujuan'];
	$tanggal_pengiriman = $_POST['tanggal_pengiriman'];
	$berat = $_POST['berat'];
	$biaya_paket = $_POST['biaya_paket'];
	$total_biaya = $_POST['total_biaya'];

	mysqli_query($koneksi,"INSERT INTO pengiriman( nm_pengirim, id_layanan, id_tujuan, tanggal_pengiriman, berat, biaya_paket, total_biaya)VALUES ( '$nm_pengirim', '$id_layanan', $id_tujuan, '$tanggal_pengiriman', '$berat', '$biaya_paket', '$total_biaya')");

//$result['status']= "success";
echo "success" ;
?>

	
	
	
	
	
	
	
	
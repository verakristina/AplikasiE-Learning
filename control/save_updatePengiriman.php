<?php 
include 'koneksi.php';
$edit_id = $_POST['edit_id'];
$nm_pengirim = $_POST['nm_pengirim'];
$id_layanan = $_POST['id_layanan'];
$id_tujuan = $_POST['id_tujuan'];
$tanggal_pengiriman = $_POST['tanggal_pengiriman'];
$berat = $_POST['berat'];
$biaya_paket = $_POST['biaya_paket'];
$total_biaya = $_POST['total_biaya'];
$sql = "UPDATE pengiriman SET nm_pengirim='".$nm_pengirim."',id_layanan='".$id_layanan."',id_tujuan='".$id_tujuan."',tanggal_pengiriman='".$tanggal_pengiriman."',berat='".$berat."',biaya_paket='".$biaya_paket."',total_biaya='".$total_biaya."' where id_pengiriman='".$edit_id."' ";
$result = mysqli_query($koneksi, $sql);


?>

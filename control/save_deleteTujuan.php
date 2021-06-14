<?php 
include 'koneksi.php';

$del_id = $_POST['del_id'];

$sql = "delete from tujuan where id_tujuan= '".$del_id."'";
$result = mysqli_query($koneksi, $sql);

?>
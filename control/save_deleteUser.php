<?php 
include 'koneksi.php';

$del_id = $_POST['del_id'];

$sql = "delete from user where id_pengguna= '".$del_id."'";
$result = mysqli_query($koneksi, $sql);

?>
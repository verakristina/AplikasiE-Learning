<?php 
include 'koneksi.php';

$del_id =$_POST['del_id'];
$sql = "delete from pengiriman where id_pengiriman = '".$del_id."'";
$result=mysqli_query($koneksi, $sql);
?>
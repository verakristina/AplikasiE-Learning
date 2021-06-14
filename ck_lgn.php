<?php

include ('control/koneksi.php');

session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$execute_1 = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$assoc_1 = mysqli_fetch_assoc($execute_1);
//print_r($assoc_1);die();
//$rw = mysqli_num_rows($execute_1);

    if($username == $assoc_1['username'] && $password == $assoc_1['password']){
      $_SESSION['login'] 	= true;
      $_SESSION['username'] = $username;
	  $_SESSION['level'] 	= $assoc_1['level'];
	  header('location: view/index.php');
	
    }else{
      $_SESSION['d'] = true;
  header('location: index.php');
    }  
?>
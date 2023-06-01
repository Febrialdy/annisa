<?php

$server 	= "localhost";
$username	= "root";
$password	= "";
$db 		= "kp_otentikasi"; 
$connect = mysqli_connect($server, $username, $password, $db); 

//untuk cek jika koneksi gagal ke database
if(mysqli_connect_errno()) {
	echo "Failed to connect : ".mysqli_connect_error();
}
session_start();
?>
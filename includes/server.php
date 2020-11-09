<?php

$server 		= "localhost";
$user 			= "root";
$password 		= "";
$nama_database 	= "berkahmandiri";

$sqlconn = mysqli_connect($server, $user, $password, $nama_database);

if( !$sqlconn ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}else{
	// echo "Berhasil";
}

?>
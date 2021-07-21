<?php 
 $servername = 'localhost';
 $username = 'root';
 $password = '';
 $database = 'nexhmedinnixha';
 $db = mysqli_connect($servername,$username,$password,$database);
 //php include('config.php');
if (!$db) {
    die('Opssss, lidhja me databaze deshtoi');
}
?>

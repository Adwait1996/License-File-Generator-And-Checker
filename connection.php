<?php
$hostname='localhost';
$username='root';
$password='';

try {
    $con = new PDO("mysql:host=$hostname;dbname=ajax",$username,$password);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $con->exec("SET CHARACTER SET utf8");
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
include_once "class.licensing.php";
$database= new licensing($con);
?>
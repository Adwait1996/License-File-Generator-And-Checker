<?php
include_once "connection.php";

$filename=$_FILES["license"]["name"];
$database->checkfile($filename);
?>
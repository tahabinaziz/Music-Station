<?php
/*Localhost */
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'musicstation';
$connect=@mysqli_connect($host,$user,$password,$database,$port) or die ('mysqli_error');
?>
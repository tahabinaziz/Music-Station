<?php
include("db.php");
$id=$_REQUEST['id'];
$query = mysqli_query($connect, "DELETE FROM category WHERE id='$id'");
header("Location: viewCategory.php"); 
?>
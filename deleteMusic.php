<?php
include("db.php");
$id=$_REQUEST['id'];
$music = mysqli_query($connect, "SELECT music FROM music WHERE id='$id'");
$musicResult=mysqli_fetch_assoc($music);
unlink($musicResult['music']);
$query = mysqli_query($connect, "DELETE FROM music WHERE id='$id'");
header("Location: viewMusic.php"); 
?>
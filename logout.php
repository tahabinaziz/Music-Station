<?php
session_start();
if(isset($_SESSION['login_user']))
{
 session_destroy();
 header("location:login.php");
}
?>
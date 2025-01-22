<?php
session_start();
$usuario = $_SESSION['username'];
$sid = $_SESSION['sid'];
if(!isset($usuario) or $usuario!='admin'){
    header("location: login.php");

} 
?>
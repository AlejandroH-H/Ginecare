<?php
session_start();
$usuario = $_SESSION['username'];
$dni = $_SESSION['dni'];
$sid = $_SESSION['sid'];

if(!isset($usuario)){
    header("location: login.php");

} 
?>
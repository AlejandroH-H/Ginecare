<?php
session_start();
$name = $_SESSION['username'] . " " . $_SESSION['userLastname'];
$usuario = $_SESSION['usuario'];
$email = $_SESSION['email'];
$dni = $_SESSION['dni'];
$nacimiento = $_SESSION['nacimiento'];
$phone = $_SESSION['phone'];
$sid = $_SESSION['sid'];

if(!isset($usuario)){
    header("location: login.php");
    
} 
?>
<?php
include("./conexion.php");

if(!empty($_POST["registro"])){
    if(empty($_POST["nombre"]) or empty($_POST["apellido"]) 
    or empty($_POST["dni"]) or empty($_POST["password"]) or empty($_POST["usuario"]) ) {
        echo '<div class="bad">¡Por favor, complete todos los campos!</div>';
} else{
    session_start();
    $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $apellido = filter_var($_POST['apellido'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dni = trim(filter_var($_POST['dni'],FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $usuario = filter_var($_POST['usuario'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = trim(filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $hashe = password_hash($password, PASSWORD_DEFAULT);

    if(!$nombre || !$apellido || !$dni || !$password || !$usuario){
        die("Datos inválidos");
    }


    if(strlen($dni)<7 || strlen($dni)>8){
        die('<div class="bad">¡Cedula invalida!</div>');
    }


    $stmt = $pdo->prepare("SELECT * FROM empleados WHERE dni = :dni ");
    $stmt->bindParam(':dni',  $dni, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();

    if($result > 0){
        echo '<div class="bad">¡Error, DNI ya existente!</div>';
    }else{
        $stmt = $pdo->prepare("INSERT INTO empleados ( nombre, apellido, usuario, dni, password) 
        VALUES (:nombre, :apellido, :usuario, :dni, :hash)");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido',  $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':dni',  $dni, PDO::PARAM_STR);
        $stmt->bindParam(':hash',  $hashe);

        if($stmt->execute()){
             header("location:login.php");
        } else {
        echo '<div class="bad">¡Woops, parece que ha ocurrido un error...!</div>';
        }
        }
    }

    
    
}

?>
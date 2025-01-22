<?php
include("./conexion.php");

if(!empty($_POST["registro"])){
    if(empty($_POST["nombre"]) or empty($_POST["apellido"]) 
    or empty($_POST["dni"]) or empty($_POST["password"]) ) {
        echo '<div class="bad">¡Por favor, complete todos los campos!</div>';
} else{
    session_start();
    $nombre = filter_var($_POST['nombre'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $apellido = filter_var($_POST['apellido'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dni = trim(filter_var($_POST['dni'],FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $password = trim(filter_var($_POST['dni'],FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $hashe = password_hash($password, PASSWORD_DEFAULT);

    if(!$nombre || !$apellido || !$dni || !$password){
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
        $stmt = $pdo->prepare("INSERT INTO empleados ( nombre, apellido, dni, hashe) 
        VALUES (:nombre, :apellido, :dni, :hashe)");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido',  $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':dni',  $dni, PDO::PARAM_STR);
        $stmt->bindParam(':hashe',  $hashe);

        if($stmt->execute()){
            $_SESSION['username']= $nombre;
             header("location:inicio.php");
        } else {
        echo '<div class="bad">¡Woops, parece que ha ocurrido un error...!</div>';
        }
        }
    }

    
    
}

?>
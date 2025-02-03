<?php
include("../conexion.php");
include("../controller/session_l.php");

$fotoPerfil = $_FILES['fotoPerfil'];
    if ($fotoPerfil['error'] === UPLOAD_ERR_OK) {
        $tipo = $fotoPerfil['type'];
        $datos = file_get_contents($fotoPerfil['tmp_name']);

        $stmt = $pdo->prepare("UPDATE empleados SET fotoPerfil = :datos, tipoDeFoto = :tipo WHERE id = :id");
        $stmt->bindParam(':datos', $datos, PDO::PARAM_LOB);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':id', $sid);}
        if($stmt->execute()) {
            $mensajeid =$sid;
        } else {
            echo"Error al subir la foto de perfil.";
        }
        
        header("Location: ../Views/User/perfil.php?");?>
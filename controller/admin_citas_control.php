<?php
include("../../conexion.php");

if(!empty($_POST["registro"])){
    if(empty($_POST['estado']) or empty($_POST['fecha']) or empty($_POST['hora'])    ) {
        echo '<div class="alert alert-warning">¡Por favor, complete los campos requeridos!</div>';
} else{
    $id = $_POST['id'];
$estado = $_POST['estado'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$mes = date('m');
    $year = date('Y');
    $fechaActual = date('Y-m-d');

    if($fecha<=$fechaActual){
     echo '<div class="alert alert-warning">¡Fecha inválida!</div>';
     exit;

    }

if ($estado == 'pospuesta'){
   
    $fecha_hora = $fecha . ' ' . $hora . ':00';
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM citas WHERE fecha = :fecha_hora');
    $stmt->bindParam(':fecha_hora', $fecha_hora);
    $stmt->execute();
    $count=$stmt->fetchColumn();

    if($count>0){
        echo '<div class="alert alert-warning">¡La nueva fecha y hora ya están ocupadas. Elija otra!</div>';
        exit;
    } else{
        $stmt = $pdo->prepare('UPDATE citas SET estado = :estado, fecha = :fecha_hora WHERE id = :id ');
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':fecha_hora', $fecha_hora);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        echo '<div class="alert alert-success">¡Estado de la cita actualizado!</div>';

    } else{
        echo '<div class="alert alert-warning">¡Error al actualizar el estado de la cita!</div>';

    }
    }
} else if ($estado == 'confirmada'){
    $stmt = $pdo->prepare('UPDATE citas SET estado = :estado WHERE id = :id ');
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        echo '<div class="alert alert-success">¡Estado de la cita actualizado!</div>';

    } else{
        echo '<div class="alert alert-warning">¡Error al actualizar el estado de la cita!</div>';

    }
} else if ($estado == 'por confirmar'){
    $stmt = $pdo->prepare('UPDATE citas SET estado = :estado WHERE id = :id ');
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':id', $id);

    if($stmt->execute()){
        echo '<div class="alert alert-success">¡Estado de la cita actualizado!</div>';

    } else{
        echo '<div class="alert alert-warning">¡Error al actualizar el estado de la cita!</div>';

    }
} else{
    $stmt = $pdo->prepare("DELETE FROM citas WHERE id = :id");
    $stmt->bindParam(':id',  $id);
    
    if($stmt->execute()){
        echo '<div class="alert alert-success">Cita eliminada correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
    }
}
}




    
} 



?>
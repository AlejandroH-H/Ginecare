<?php
include("../../conexion.php");

if(!empty($_POST["registro"])){
    if(empty($_POST['descripcion']) ) {
        echo '<div class="alert alert-warning">¡Por favor, llene el historial con información!</div>';
} else{
    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];

    $d = date('d');
 $m = date('m');
 $y = date('Y');
 $h = date('h', strtotime('-5 hours'));  
 $i = date('i');  
 $fechaActual = $y . '-' . $m . '-' . $d . ' ' . $h . ':' . $i;

    $stmt = $pdo->prepare('INSERT INTO historiales (empleado_id, fecha, descripcion)
    VALUES (:empleado_id, :fecha, :descripcion)');
    $stmt->bindParam(':empleado_id', $id);
    $stmt->bindParam(':fecha', $fechaActual);
    $stmt->bindParam(':descripcion', $descripcion);

    if($stmt->execute()){
        echo '<div class="alert alert-success">Historial guardado correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
    }

}




    
} 



?>
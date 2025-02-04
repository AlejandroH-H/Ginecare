<?php
include("../../conexion.php");

if(!empty($_POST["registro"])){
    if(empty($_POST['descripcion']) ) {
        echo '<div class="alert alert-warning">¡Por favor, llene el historial con información!</div>';
} else{
    $id = $_POST['h'];
    $descripcion = $_POST['descripcion'];


    $stmt = $pdo->prepare('UPDATE historial_citas h SET h.observacion = :descripcion WHERE h.id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':descripcion', $descripcion);

    if($stmt->execute()){
        echo '<div class="alert alert-success">Observacion guardada correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
    }

}




    
} 



?>
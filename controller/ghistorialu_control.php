<?php
include("../../conexion.php");

if(!empty($_POST["registro"])){
    if(empty($_POST['descripcion']) ) {
        echo '<div class="alert alert-warning">¡Por favor, actualice el historial con información!</div>';
} else{
    $id = $_GET['id1'];
    $descripcion = $_POST['descripcion'];


    $stmt = $pdo->prepare('UPDATE historiales h SET h.descripcion = :descripcion WHERE h.id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':descripcion', $descripcion);

    if($stmt->execute()){
        echo '<div class="alert alert-success">Historial guardado correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
    }

}




    
} 



?>
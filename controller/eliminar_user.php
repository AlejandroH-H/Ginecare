<?php 
if (!empty($_GET["id"])){
    $id = $_GET["id"];
    $stmt = $pdo->prepare("DELETE FROM empleados WHERE id = :id");
    $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
    
    if($stmt->execute()){
        echo '<div class="alert alert-success">Persona eliminada correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
    }
}



?>
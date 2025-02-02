<?php 
if (!empty($_GET["desbid"])){
    $id = $_GET["desbid"];

    $stmt = $pdo->prepare("UPDATE empleados SET restringido = 0 WHERE id = :id");
    $stmt->bindParam(':id',  $id, PDO::PARAM_INT);

    
    
    if($stmt->execute() ){
        echo '<div class="alert alert-success">Paciente desbloqueado correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
    }
}



?>
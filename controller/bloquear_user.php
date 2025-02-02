<?php 
if (!empty($_GET["userid"])){
    $id = $_GET["userid"];

    $stmt = $pdo->prepare("UPDATE empleados SET restringido = 1 WHERE id = :id");
    $stmt->bindParam(':id',  $id, PDO::PARAM_INT);

    
    
    if($stmt->execute() ){
        echo '<div class="alert alert-success">Paciente bloqueado correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
    }
}



?>
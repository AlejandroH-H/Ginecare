<?php 
if (!empty($_GET["id"])){
    $id = $_GET["id"];

    $stmthc = $pdo->prepare("DELETE FROM historial_citas WHERE empleado_id = :id");
    $stmthc->bindParam(':id',  $id, PDO::PARAM_INT);
    $stmthc->execute();

    $stmtc = $pdo->prepare("DELETE FROM citas WHERE empleado_id = :id");
    $stmtc->bindParam(':id',  $id, PDO::PARAM_INT);
    $stmtc->execute();


    $stmth = $pdo->prepare("DELETE FROM historiales WHERE empleado_id = :id ");
    $stmth->bindParam(':id',  $id, PDO::PARAM_INT);
    $stmth->execute();


    $stmtm = $pdo->prepare("DELETE FROM messages WHERE sender_id = :id OR receiver_id = :id");
    $stmtm->bindParam(':id',  $id, PDO::PARAM_INT);
    $stmtm->execute();


    $stmt = $pdo->prepare("DELETE FROM empleados WHERE id = :id");
    $stmt->bindParam(':id',  $id, PDO::PARAM_INT);

    
    
    if($stmt->execute() ){
        echo '<div class="alert alert-success">Persona eliminada correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
    }
}



?>
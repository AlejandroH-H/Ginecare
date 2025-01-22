<?php
include('conexion.php');
include('controller/session_l.php');



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sender_id = $sid;
    $receiver_id = 1;
    $mensajitos = $_POST['mensaje'];
    


    $stmt = $pdo->prepare('INSERT INTO messages (sender_id, receiver_id, mensajitos)
    VALUES (:sender_id, :receiver_id, :mensajitos)');
    $stmt->bindParam(':sender_id', $sender_id);
    $stmt->bindParam(':receiver_id', $receiver_id);
    $stmt->bindParam(':mensajitos', $mensajitos);
    $stmt->execute();
}

?>
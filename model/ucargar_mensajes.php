<?php
include('../conexion.php');
include('../controller/session_l.php');



if ($sid) {
    $sender_id = $sid;
    $receiver_id = 1;

    $stmt = $pdo->prepare('SELECT * FROM messages WHERE (sender_id = :sender_id 
    AND receiver_id = :receiver_id) OR (sender_id = :receiver_id 
    AND receiver_id = :sender_id  ) ORDER BY fecha ASC ');

    $stmtl = $pdo->prepare('UPDATE messages SET leido = 1 WHERE (sender_id = :receiver_id 
AND receiver_id = :sender_id  ) AND leido = 0');

    $stmtl->bindParam(':sender_id', $sender_id);
    $stmtl->bindParam(':receiver_id', $receiver_id);
    $stmtl->execute();

    $stmt->bindParam(':sender_id', $sender_id);
    $stmt->bindParam(':receiver_id', $receiver_id);
    $stmt->execute();
    $mensajes = $stmt->fetchAll();

    foreach ($mensajes as $mensaje) {
        $class = $mensaje['sender_id'] == $sender_id ? 'sender' : 'receiver';
        $nombre = $mensaje['sender_id'] == $sender_id ? 'Tú' : 'Dra. Farfán';
        echo "<div class='$class'><strong>" . htmlspecialchars($nombre) . ": </strong> " .
            htmlspecialchars($mensaje['mensajitos']) . "</div> </div> <br> <div class='$class'>Enviado: " . htmlspecialchars($mensaje['fecha']) . "</div> <br>";
        
    }
}

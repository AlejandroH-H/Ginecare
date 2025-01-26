<?php
include("../conexion.php");

$leidoid = 1;
$rever = $sid;
$stmtl = $pdo->prepare("SELECT e.nombre, m.mensajitos, m.leido FROM messages m 
JOIN empleados e ON (m.receiver_id=e.id) WHERE (m.leido = 0 AND m.sender_id = :leidoid) AND m.receiver_id = :rever");
$stmtl->bindParam(':leidoid', $leidoid);
$stmtl->bindParam(':rever', $rever);
$stmtl->execute();
$conta4 = $stmtl->rowCount();
?>
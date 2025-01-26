<?php
include("../conexion.php");

$stmt = $pdo->prepare("SELECT * FROM historial_citas h WHERE h.realizada = 1 AND h.modificada = 1");
$stmt->execute();
$conta2 = $stmt->rowCount();
?>
<?php
include("../../conexion.php");

$stmt = $pdo->prepare('SELECT DISTINCT DATE(fecha) as fecha, TIME(fecha) as hora FROM citas 
WHERE fecha BETWEEN :primerDia AND :ultimoDia');

$stmt->bindParam(':primerDia', $primerDia);
$stmt->bindParam(':ultimoDia', $ultimoDia);
$stmt->execute();
$citas = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
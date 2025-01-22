<?php
include('conexion.php');

$fechaActual = date('Y-m-d');

$stmt = $pdo->prepare('SELECT * FROM citas WHERE fecha < :fechaActual');
$stmt->bindParam(':fechaActual', $fechaActual);
$stmt->execute();
$citasPasadas = $stmt->fetchAll();

foreach ($citasPasadas as $cita){

    $stmtInsert = $pdo->prepare('INSERT INTO historial_citas (empleado_id, admin_id, fecha, motivo, estado)
    VALUES(:empleado_id, :admin_id, :fecha, :motivo, :estado)');

    $stmtInsert->bindParam(':empleado_id', $cita['empleado_id']);
    $stmtInsert->bindParam(':admin_id', $cita['admin_id']);
    $stmtInsert->bindParam(':fecha', $cita['fecha']);
    $stmtInsert->bindParam(':motivo', $cita['motivo']);
    $stmtInsert->bindParam(':estado', $cita['estado']);
    $stmtInsert->execute();

    $stmtDelete = $pdo->prepare('DELETE FROM citas WHERE id = :id');
    $stmtDelete->bindParam(':id', $cita['id']);
    $stmtDelete->execute();


}

?>
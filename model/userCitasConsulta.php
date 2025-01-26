<?php
include("./conexion.php");

 include("./controller/session_l.php");

$stmt = $pdo->prepare('SELECT e.nombre, e.apellido, e.dni, DATE(c.fecha) as fecha, TIME(c.fecha) as hora, c.motivo, c.estado
FROM citas c JOIN empleados e on (c.empleado_id=e.id) WHERE e.dni = :dni AND e.nombre LIKE :usuario');
$stmt->bindParam('dni', $dni);
$stmt->bindParam('usuario', $usuario);
$stmt->execute();
$resultado = $stmt->fetchAll();
?>
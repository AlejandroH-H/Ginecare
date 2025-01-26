<?php
//incluimos la conexion y obtenemos el ID del index
include("../../conexion.php");
$id = $_GET["id"];

//$consulta = "SELECT * FROM empleados where id=$id";
//$resultado = mysqli_query($conn, $consulta);

$stmt = $pdo->prepare("SELECT c.id, e.nombre, e.apellido, e.dni, DATE(c.fecha) as fecha, TIME(c.fecha) as hora, c.motivo, c.estado 
FROM citas c  JOIN empleados e  on (c.empleado_id=e.id) WHERE c.id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$cita = $stmt->fetch();
?>
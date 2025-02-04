<?php
//incluimos la conexion y obtenemos el ID del index
include("../../conexion.php");
$id = $_GET["id1"];

//$consulta = "SELECT * FROM empleados where id=$id";
//$resultado = mysqli_query($conn, $consulta);

$stmt = $pdo->prepare("SELECT e.nombre, e.apellido, e.dni, h.descripcion FROM historiales h JOIN empleados e ON (h.empleado_id = e.id)  WHERE h.id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$cita = $stmt->fetch();

$attempt = $cita['descripcion'];

$stmt = $pdo->prepare("SELECT h.id FROM historiales h WHERE h.descripcion = :attempt");
$stmt->bindParam(':attempt', $attempt);
$stmt->execute();
$id1 = $stmt->fetchColumn();
?>
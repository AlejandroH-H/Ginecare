<?php
//incluimos la conexion y obtenemos el ID del index
include("../conexion.php");
$h = $_GET["h"];

//$consulta = "SELECT * FROM empleados where id=$id";
//$resultado = mysqli_query($conn, $consulta);

$stmt = $pdo->prepare("SELECT e.nombre, e.apellido, e.dni  FROM  empleados e  WHERE e.id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$cita = $stmt->fetch();
?>
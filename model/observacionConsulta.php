<?php
//incluimos la conexion y obtenemos el ID del index
include("../../conexion.php");

$userid = $_GET['userid'];

//$consulta = "SELECT * FROM empleados where id=$id";
//$resultado = mysqli_query($conn, $consulta);

$stmt = $pdo->prepare("SELECT e.nombre, e.apellido, e.dni  FROM  empleados e  WHERE e.id = :id");
$stmt->bindParam(':id', $userid);
$stmt->execute();
$cita = $stmt->fetch();
?>
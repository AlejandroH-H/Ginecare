<?php
include("../conexion.php");

if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $stmt = $pdo->prepare("SELECT fotoPerfil, tipoDeFoto FROM empleados WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $imagenes=$stmt->fetchAll(PDO::FETCH_ASSOC);
  header("Location: ../Views/User/perfil.php?foto=" . urlencode($imagenes));
}
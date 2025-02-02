<?php
  include("../../conexion.php");

  $stmt = $pdo->prepare("SELECT * FROM empleados e WHERE e.id !=1  ");
  $stmt->execute();
  $pt = $stmt->rowCount();

  $stmt = $pdo->prepare("SELECT * FROM empleados e WHERE e.restringido = 1  ");
  $stmt->execute();
  $ptr = $stmt->rowCount();

  $stmt = $pdo->prepare("SELECT * FROM citas c WHERE c.estado = 'por confirmar' ");
  $stmt->execute();
  $conta = $stmt->rowCount();

  $stmt = $pdo->prepare("SELECT * FROM citas c WHERE c.estado = 'confirmada'");
  $stmt->execute();
  $conta2 = $stmt->rowCount();

  $stmt = $pdo->prepare("SELECT * FROM citas c WHERE c.estado = 'pospuesta'");
  $stmt->execute();
  $conta3 = $stmt->rowCount();
?>


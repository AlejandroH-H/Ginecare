<?php
require '../../conexion.php';
$stmt = $pdo->prepare("SELECT fotoPerfil, tipoDeFoto FROM empleados WHERE id = :id");
$stmt->bindParam(':id', $sid);
$stmt->execute();
$stmt->bindColumn(1, $fotoPerfil, PDO::PARAM_LOB);
$stmt->bindColumn(2, $tipo);
$stmt->fetch(PDO::FETCH_BOUND);
if ($fotoPerfil) {
  $fotoPerfil = stream_get_contents($fotoPerfil);
  echo '<img src="data:' . $tipo . ';base64,' . base64_encode($fotoPerfil) . '" class="imagen" alt="Foto de Perfil">';
} else {
  echo '<img src="../../assets/img/fotoperfil.avif" class="imagen" alt="User-Profile-Image">';
}







?>
<?php 
include("../conexion.php");
include("../controller/session_l.php");
$detalles=$_POST['detalles'];
if (empty($detalles)) {
  $mensaje = "El campo de detalles no puede estar vacío.";
}else{
  $stmt = $pdo->prepare("UPDATE empleados SET detalles = :detalles WHERE id = :id");
$stmt->bindParam(':detalles',  $detalles);
$stmt->bindParam(':id',  $sid);
  if ($stmt->execute()) {
  
  $mensaje="Detalles actualizados exitosamente.";
  } else {
    $mensaje="Error al actualizar los detalles.";
}
header("Location: ../Views/User/perfil.php?mensaje=" . urlencode($mensaje));
exit();
}
<?php
if (!empty($_POST["modify"])) {
  if (empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["dni"]) or empty($_POST["usuario"]) or empty($_POST["date"]) or empty($_POST["email"]) or empty($_POST["phone"])) {
    echo '<p class="validar">Error, ingrese por favor, todos los campos...</p>';
  } else {
    $id = $_GET["id"];

    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dni = trim(filter_var($_POST['dni'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = filter_var($_POST['date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    if (!$nombre || !$apellido || !$dni || !$usuario || !$date || !$email || !$phone) {
      die("Datos inválidos");
    }


    if (strlen($dni) < 7 || strlen($dni) > 8) {
      die('<div class="bad">¡Cedula invalida!</div>');
    }


    $stmt = $pdo->prepare("UPDATE empleados SET nombre=:nombre, apellido=:apellido, dni=:dni, usuario=:usuario, nacimiento=:nacimiento, email=:email, phone=:phone WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':apellido',  $apellido, PDO::PARAM_STR);
    $stmt->bindParam(':dni',  $dni, PDO::PARAM_STR);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':nacimiento',  $date, PDO::PARAM_STR);
    $stmt->bindParam(':email',  $email, PDO::PARAM_STR);
    $stmt->bindParam(':phone',  $phone, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->rowCount();

    if ($result > 0) {
      //Posiblemente haya que mandar un alert de javascript
      header("location: ../../index.php");
    } else {
      echo '<p class="validar">Ocurrió un error!</p>';
    }
  }
}

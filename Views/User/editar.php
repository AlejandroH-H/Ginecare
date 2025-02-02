<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/decoration.css">
  <link rel="stylesheet" href="../../assets/css/Registrostyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Editar</title>
</head>

<body>
  <?php require_once("../../conexion.php");?>
  <?php include("../../controller/session_l.php");?>

  <nav class="navbar navbar-expand-lg navbar-dark text-light bg-dark px-2 d-flex justify-content-between pum">
    <a class="linkHistorial" href="perfil.php">Regresar</a>

    <h3 class="text-center">Edición de Perfil</h3>

    <a class="linkEdit" href="../login/login.php">Salir</a>
  </nav>


  <?php require_once("../../controller/editProfile.php"); ?>
  <div class="color">
    <div class="containerr">
      <form action="" method="post" class="formulario">

        <div class="input-field">
          <input type="text" name="nombre" value="<?php echo $_SESSION["username"] ?>" required>
          <label for="">Nombres</label>
        </div>

        <div class="input-field">
          <input type="text" name="apellido" value="<?php echo $_SESSION["userLastname"] ?>" required>
          <label for="">Apellidos</label>
        </div>

        <div class="input-field">
          <input type="text" name="usuario" value="<?php echo $usuario ?>" required minlength="5" maxlength="20">
          <label for="">Usuario</label>
        </div>

        <div class="input-field">
          <input type="text" name="dni" value="<?php echo $dni ?>" required minlength="7" maxlength="8">
          <label for="">DNI</label>
        </div>

        <div class="input-field">
          <input type="date" name="date" value="<?php echo $nacimiento ?>" required>
          <label for="">Fecha de Nacimiento</label>
        </div>

        <div class="input-field">
          <input type="email" name="email" value="<?php echo $email ?>" required>
          <label for="">Correo Electrónico</label>
        </div>

        <div class="input-field">
          <input type="text" name="phone" value="<?php echo $phone ?>" required>
          <label for="">Número de Teléfono</label>
        </div>

        <input type="submit" class="botton" value="Modificar" name="modify">

      </form>
    </div>
  </div>
</body>

</html>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="es" dir="ltr">

<head>
   <meta charset="utf-8">
   <title>Inicio de Sesión</title>
   <link rel="stylesheet" href="../../assets/css/InicioSesionStyle.css">
   <link rel="stylesheet" href="../../assets/css/HeaderStyles.css">
   <?php require "../partials/linksFooter.php"; ?>
</head>
<body>
<?php require "../partials/header.php";?>
   <div class="containerr">
      <div class="login-form">
         <?php
         include("../../model/mover_citas.php");
         ?>
         <form method="post">
            <h2>Inicio de Sesión</h2>
            <?php
            include("../../controller/login_control.php");
            ?>
            <div class="field">
               <input type="text" name="nombre" required>
               <label>Nombre de usuario</label>
            </div>
            <div class="field">
               <input type="email" name="email" required>
               <label for="">Correo Electrónico</label>
            </div>
            <div class="field">
               <input type="text" name="dni" required minlength="7" maxlength="8">
               <label>DNI</label>
            </div>
            <div class="field">
               <input type="text" name="password" required>
               <label>Contraseña</label>
            </div>
            <Input class="login" name="ingresar" type="submit" value="LOGIN">
            <div class="link">
               <p>No eres parte? <a href="registroClient.php">Registrate Ahora!</a></p>
            </div>
         </form>
      </div>
   </div>

   <footer>
      <?php require "../partials/footer.php"; ?>
   </footer>


</body>

</html>
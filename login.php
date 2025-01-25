<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="./asset/css/InicioSesionStyle.css">
      <?php require "./views/partials/linksFooter.php"; ?>
   </head>
   <body>
      <div class="containerr">
         <div class="login-form">
         <?php
            include("mover_citas.php");
            ?>
         <form method="post">
            <h2>inicio de sesion</h2>
            <?php
            include("controller/login_control.php");
            ?>
            <div class="field">
               <input type="text" name="nombre" required>
               <label>Nombre</label>
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
               <p>no eres parte? <a href="index.php"> registrate ahora</a></p>
            </div>
         </form>
      </div>
      </div>
      
      <footer>
      <?php require "./views/partials/footer.php";?>
      </footer>

   
   </body>
</html>
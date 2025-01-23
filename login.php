<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="lstyle.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="login-form">
         <div class="text">
            LOGIN
         </div>
         <?php
            include("mover_citas.php");
            ?>
         <form method="post">
            <?php
            include("controller/login_control.php");
            ?>
            <div class="field">
               <div class="fas fa-envelope"></div>
               <input type="text" placeholder="Usuario" name="nombre">
            </div>
            <div class="field">
               <div class="fas fa-lock"></div>
               <input type="text" placeholder="DNI" name="dni" required minlength="7" maxlength="8">
            </div>

            <div class="field">
               <div class="fas fa-lock"></div>
               <input type="text" placeholder="Contraseña" name="password">
            </div>
            <Input class="login" name="ingresar" type="submit" value="LOGIN">
            <div class="link">
               Not a member?
               <a href="index.php">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>
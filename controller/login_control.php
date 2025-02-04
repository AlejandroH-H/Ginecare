<?php
include("../../conexion.php");


if (!empty($_POST["ingresar"])) {
    if (empty($_POST["nombre"]) or empty($_POST["email"]) or empty($_POST["dni"]) or empty($_POST['password'])) {
        echo '<div>¡Los campos están vacios!</div>';
    } else {
        session_start();
        $usuario = trim(filter_var($_POST['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $dni = trim(filter_var($_POST['dni'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));



        if (!$usuario || !$dni || !$password || !$email) {
            die("Datos inválidos.");
        }

        /*$stmt = $conn->prepare("SELECT * FROM empleados WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result1 > 0){
            $row = $result->fetch_object();
            if($dni == $row['dni']){
                if($dni == 18970657){
                    $_SESSION['username']= $nombre;
                    header("location:admin_page.php");
                } else{
                    $_SESSION['username']= $nombre;
                    header("location:inicio.php");
                }
                
            } else{
                echo '<div>¡DNI incorrecto!</div>';
            }

            } else{
                echo '<div>¡Empleado inexistente!</div>';
            }
        
        
        */

        $stmt = $pdo->prepare("SELECT * FROM empleados WHERE usuario = :usuario AND dni = :dni AND email = :email ");
        $stmt->bindParam(':usuario',  $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':dni',  $dni, PDO::PARAM_STR);
        $stmt->bindParam(':email',  $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        //$result1= $stmt->rowCount();
        //$result = $stmt->fetchObject();

        if ($user && password_verify($password, $user['password'])) {
            if ($dni == 18970657) {
                $_SESSION['username'] = $user['nombre'];
                $_SESSION['sid'] = 1;
                header("location: ../../Views/admin/inicio_admin.php");
            } else{
                $stmtr = $pdo->prepare("SELECT restringido FROM empleados WHERE usuario = :usuario AND dni = :dni ");
                $stmtr->bindParam(':usuario',  $usuario, PDO::PARAM_STR);
                $stmtr->bindParam(':dni',  $dni, PDO::PARAM_STR);
                $stmtr->execute();
                $r = $stmtr->fetchColumn();
                if($r==1){
                    die("¡Cuenta restringida!");
             }else{
                 $_SESSION['username'] = $user['nombre'];
                 $_SESSION['userLastname'] = $user['apellido'];
                 $_SESSION['usuario'] = $user['usuario'];
                 $_SESSION['dni'] = $user['dni'];
                 $_SESSION['email'] = $user['email'];
                 $_SESSION['nacimiento'] = $user['nacimiento'];
                 $_SESSION['phone'] = $user['phone'];
                 $_SESSION['sid'] = $user['id'];
                  
                 header("location: ../../Views/User/inicio.php");

             }

                
            }
        } else {
            echo '<p class="mensaje">¡Datos incorrectos!</p>';
        }
    }
}

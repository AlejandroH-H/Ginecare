<?php
include("./conexion.php");


if(!empty($_POST["ingresar"])){
    if (empty($_POST["nombre"]) or empty($_POST["dni"]) or empty($_POST['password'])){
        echo '<div>¡Los campos están vacios!</div>';

    }else{
        session_start();
        $usuario = trim(filter_var($_POST['nombre'],FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $dni = trim(filter_var($_POST['dni'],FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $password = trim(filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS));



        if(!$usuario || !$dni || !$password){
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
        
        $stmt = $pdo->prepare("SELECT * FROM empleados WHERE usuario = :usuario AND dni = :dni ");
        $stmt->bindParam(':usuario',  $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':dni',  $dni, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        //$result1= $stmt->rowCount();
        //$result = $stmt->fetchObject();

        if($user && password_verify($password, $user['password'])){
            if($dni == 18970657){
                $_SESSION['username']= $user['nombre'];
                $_SESSION['sid']= 1;
                header("location:Views/admin/inicio_admin.php");
            } else{
                $_SESSION['username']= $user['nombre'];
                $_SESSION['dni']= $dni;
                $stmt = $pdo->prepare("SELECT id FROM empleados WHERE usuario = :usuario AND dni = :dni ");
        $stmt->bindParam(':usuario',  $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':dni',  $dni, PDO::PARAM_STR);
         $stmt->execute();
        $id = $stmt->fetchColumn();
        $_SESSION['sid']= $id;
                header("location:inicio.php");
            }
        } else{
            echo '<p class="mensaje">¡Datos incorrectos!</p>';
        }

        
        }


        

        
    } 


?>
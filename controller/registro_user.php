<?php

if(!empty($_POST["btnregistrar"])){
    if(empty($_POST["nombre"]) or empty($_POST["apellido"])  or empty($_POST["dni"])
    or empty($_POST["usuario"]) or empty($_POST["password"]))  {
        echo '<div class="alert alert-warning">¡Por favor, complete todos los campos!</div>';
} else{
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $dni = trim($_POST['dni']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    $hashe = password_hash($password, PASSWORD_DEFAULT);

    if(!$nombre || !$apellido || !$dni || !$password || !$usuario  ){
        die ('<div class="alert alert-danger">¡Datos invalidos...!</div>');
    }



            $stmt = $pdo->prepare("SELECT * FROM empleados WHERE dni = :dni ");
            $stmt->bindParam(':dni',  $dni, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->rowCount();
        
            if($result > 0){
                echo '<div class="bad">¡Error, DNI ya existente!</div>';
            }else{
                $stmt = $pdo->prepare("INSERT INTO empleados (nombre, apellido, usuario, dni, password) 
                VALUES (:nombre, :apellido, :dni, :hash)");
                $stmt->bindParam(':nombre',  $nombre, PDO::PARAM_STR);
                $stmt->bindParam(':apellido',  $apellido, PDO::PARAM_STR);
                $stmt->bindParam(':usuario',  $usuario, PDO::PARAM_STR);
                $stmt->bindParam(':dni',  $dni, PDO::PARAM_STR);
                $stmt->bindParam(':hash', $hashe);
        
                if($stmt->execute()){
                    echo '<div class="alert alert-success">¡Usuario registrado correctamente!</div>';
                } else {
                echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
                }
                }  

            /*$stmt = $conn->prepare("SELECT * FROM empleados WHERE dni = ? ");
    $stmt->bind_param("s", $dni);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        echo '<div class="alert alert-warning">¡Error, DNI ya existente!</div>';
    }else{
        $stmt = $conn->prepare("INSERT INTO empleados ( nombre, apellido, dni, categoria, thoras, salariob, retencion, salariot) 
        VALUES (?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssssssss", $nombre, $apellido, $dni, $categoria, $ht, $sb, $rt, $st);

        if($stmt->execute()){
            echo '<div class="alert alert-success">¡Usuario registrado correctamente!</div>';
        } else {
        echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
        }
    }*/


        
    
    

}
}
?>
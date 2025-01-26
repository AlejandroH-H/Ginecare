<?php
if (!empty($_POST["btnmodificar"])){
    if(empty($_POST["nombre"]) or empty($_POST["apellido"] or empty($_POST["dni"]))) {
        echo '<div class="alert alert-warning">¡Por favor, complete todos los campos!</div>';
} else{
    $id = $_POST['id'];
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $dni = trim($_POST['dni']);



    if(!$nombre || !$apellido || !$dni ){
        die ('<div class="alert alert-danger">¡Datos invalidos...!</div>');
    }

    $stmt = $pdo->prepare("UPDATE empleados SET nombre = :nombre, apellido = :apellido, dni = :dni
     WHERE id = :id");
    $stmt->bindParam(':id',  $id, PDO::PARAM_INT);
    $stmt->bindParam(':nombre',  $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':apellido',  $apellido, PDO::PARAM_STR);
    $stmt->bindParam(':dni',  $dni, PDO::PARAM_STR);
    


    //$consulta = "UPDATE empleados SET nombre='$nombre', apellido='$apellido', dni='$dni',
    //categoria=$categoria, thoras=$ht, salariob=$sb, retencion=$rt, salariot=$st WHERE id=$id";
    //echo $consulta;exit();
    //$resultado = mysqli_query($conn, $consulta);
    if($stmt->execute()){
        header("location:admin_page.php");
    } else {
        echo '<div class="alert alert-danger">¡Woops, parece que ha ocurrido un error...!</div>';
    }
}
}

?>
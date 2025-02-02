<?php
  require("../../conexion.php");
  if(!empty($_GET["id"])){
    $id = $_GET["id"];
    $query = "DELETE FROM empleados WHERE id = :id";
    $stmt = $pdo -> prepare($query);
    $stmt -> bindParam(':id', $id);
    $stmt -> execute();
    $numeroFilas = $stmt -> rowCount();

    if($numeroFilas > 0){
      header("location: ../../index.php");
    }else{
      echo '<p class="validar">Ocurrió un error...';
    }
  }
?>
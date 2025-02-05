<?php 
include("../../conexion.php");

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT detalles FROM empleados WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$resultado = $stmt->fetchColumn();
/*$consulta = "SELECT * FROM empleados WHERE id!=1";
                $resultado = mysqli_query($conn, $consulta);*/
?>
  <tr>
    <td class="columnas"><?php echo $resultado  ?></td>
    

  </tr>



<?php
include("../../conexion.php");
include("../../controller/desbloquear_user.php");

$stmt = $pdo->prepare("SELECT * FROM empleados WHERE id !=1 AND restringido != 0");
$stmt->execute();
$resultado = $stmt->fetchAll();
/*$consulta = "SELECT * FROM empleados WHERE id!=1";
                $resultado = mysqli_query($conn, $consulta);*/
foreach ($resultado as $datos):
  
?>
  <tr>
    <td class="columnas"><?php echo $datos['id'] ?></td>
    <td class="columnas"><?php echo $datos['nombre'] ?></td>
    <td class="columnas"><?php echo $datos['apellido'] ?></td>
    <td class="columnas"><?php echo $datos['dni'] ?></td>
      
    <td class="bg-dark text-white"><a onclick="return desbloquear()" href="Pacientes_blocked.php?desbid=<?= $datos['id'] //mandamos el id?>" class="btn btn-small btn-secondary"><i class="fa-solid fa-shield-halved"></i></a>
    </td>
    

  </tr>
<?php
endforeach;

?>
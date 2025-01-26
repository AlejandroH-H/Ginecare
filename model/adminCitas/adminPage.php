<?php
include("../../conexion.php");

$stmt = $pdo->prepare("SELECT * FROM empleados WHERE id !=1");
$stmt->execute();
$resultado = $stmt->fetchAll();
/*$consulta = "SELECT * FROM empleados WHERE id!=1";
                $resultado = mysqli_query($conn, $consulta);*/
foreach ($resultado as $datos):
  $leidoid = $datos['id'];
  $stmtl = $pdo->prepare("SELECT e.nombre, m.mensajitos, m.leido FROM messages m 
                      JOIN empleados e ON (m.sender_id=e.id) WHERE m.leido = 0 AND m.sender_id = :leidoid ");
  $stmtl->bindParam(':leidoid', $leidoid);
  $stmtl->execute();
  $conta4 = $stmtl->rowCount();
?>
  <tr>
    <td class="bg-secondary .bg-gradient text-white"><?php echo $datos['id'] ?></td>
    <td class="bg-dark text-white"><?php echo $datos['nombre'] ?></td>
    <td class="bg-dark text-white"><?php echo $datos['apellido'] ?></td>
    <td class="bg-dark text-white"><?php echo $datos['dni'] ?></td>
    <td class="bg-dark text-white">
      <a href="modificar_datos.php?id=<?= $datos['id'] //mandamos el id 
                                      ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
    </td>
    <td class="bg-dark text-white"><a onclick="return eliminar()" href="admin_page.php?id=<?= $datos['id'] //mandamos el id 
                                                                                          ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
    </td>
    <td class="bg-dark text-white"><a href="admin_historial.php?id=<?= $datos['id'] //mandamos el id 
                                                                    ?>" class="btn btn-small btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
    </td>
    <td class="bg-dark text-white"><a href="gh1.php?id=<?= $datos['id'] //mandamos el id 
                                                        ?>" class="btn btn-small btn-secondary"> <i class="fa-regular fa-clipboard"></i></a>
    </td>
    <td class="bg-dark text-white">
      <a href="chat.php?receiver_id=<?= $datos['id'] //mandamos el id 
                                    ?>" class="btn btn-small btn-secondary"> <i class="fa-regular fa-clipboard"></i></a>
    </td>
    <td class="bg-dark text-white"><?php echo $conta4 ?></td>

  </tr>
<?php
endforeach;

?>
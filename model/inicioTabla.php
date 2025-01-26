<?php

if (isset($_SESSION['username'])) {
  $nombre =  $_SESSION['username'];

  $stmt = $pdo->prepare("SELECT * FROM empleados WHERE nombre = :nombre AND dni LIKE :dni");
  $stmt->bindParam(':nombre', $nombre);
  $stmt->bindParam(':dni', $dni);
  $stmt->execute();
  //$stmt->execute(['nombre' => $_SESSION['username']]);
  $resultado = $stmt->fetchAll();

  foreach ($resultado as $datos):
?>
    <tr>

      <td><?php echo $datos['id'] ?></td>
      <td><?php echo $datos['nombre'] ?></td>
      <td><?php echo $datos['apellido'] ?></td>
      <td><?php echo $datos['dni'] ?></td>

      <td><a href="citas.php" class="btn btn-small btn-secondary"> <i class="fa-regular fa-clipboard"></i></a>
      </td>
    </tr>
<?php
  endforeach;
}

/*$consulta = "SELECT * FROM empleados WHERE id!=1";
                $resultado = mysqli_query($conn, $consulta);*/



?>
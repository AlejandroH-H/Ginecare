<?php
include('../../conexion.php');

$stmt = $pdo->prepare('SELECT e.nombre as paciente, e.apellido, e.dni, a.nombre as doctor, h.fecha,
                 h.motivo, h.estado, h.realizada FROM historial_citas h JOIN empleados e ON (h.empleado_id=e.id)
                JOIN admin a ON (h.admin_id=a.id) WHERE e.dni = :dni AND h.realizada = 1');
$stmt->bindParam('dni', $dni);
$stmt->execute();


$citas = $stmt->fetchAll();
foreach ($citas as $cita) {
  echo "<tr>";
  echo "<td class='columnas'>" . htmlspecialchars($cita['paciente']) .  htmlspecialchars($cita['apellido']) . "</td>";

  echo "<td class='columnas'>" . htmlspecialchars($cita['dni']) . "</td>";

  echo "<td class='columnas'>" . htmlspecialchars($cita['doctor']) . "</td>";

  echo "<td class='columnas'>" . htmlspecialchars($cita['fecha']) . "</td>";

  echo "<td class='columnas'>" . htmlspecialchars($cita['motivo']) . "</td>";

  echo "<td class='columnas'>" . htmlspecialchars($cita['estado']) . "</td>";

  echo "<td>" . ($cita['realizada'] ? 'Sí' : 'No') . "</td>";

  echo "</tr>";
}
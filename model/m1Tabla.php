<?php
include('../../conexion.php');

$stmt = $pdo->query('SELECT h.id, e.nombre as paciente, a.nombre as doctor, h.fecha,
                 h.motivo, h.estado, h.realizada, h.observacion FROM historial_citas h JOIN empleados e ON (h.empleado_id=e.id)
                JOIN admin a ON (h.admin_id=a.id) WHERE h.modificada = 1 AND h.realizada = 1');

$citas = $stmt->fetchAll();
foreach ($citas as $cita) {
  echo "<tr>";
  echo "<td>" . htmlspecialchars($cita['paciente']) . "</td>";

  echo "<td>" . htmlspecialchars($cita['doctor']) . "</td>";

  echo "<td>" . htmlspecialchars($cita['fecha']) . "</td>";

  echo "<td>" . htmlspecialchars($cita['motivo']) . "</td>";

  echo "<td>" . htmlspecialchars($cita['estado']) . "</td>";

  echo "<td>" . ($cita['realizada'] ? 'Sí' : 'No') . "</td>";

  echo "<td>" . htmlspecialchars($cita['observacion']) . "</td>";

  echo "</tr>";
}
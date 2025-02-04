<?php
include('../../conexion.php');

$stmt = $pdo->query('SELECT h.id, e.nombre as paciente, e.apellido as paciente1, e.dni, a.nombre as doctor, h.fecha,
                 h.motivo, h.estado, h.realizada FROM historial_citas h JOIN empleados e ON (h.empleado_id=e.id)
                JOIN admin a ON (h.admin_id=a.id) WHERE h.modificada = 1 AND h.realizada = 1');

$citas = $stmt->fetchAll();
foreach ($citas as $cita) {
  echo "<tr>";
  echo "<td class=columnas>" . htmlspecialchars($cita['paciente']) . " " . htmlspecialchars($cita['paciente1']) . "</td>";

  echo "<td class=columnas>" . htmlspecialchars($cita['dni']) . "</td>";

  echo "<td class=columnas>" . htmlspecialchars($cita['doctor']) . "</td>";

  echo "<td class=columnas>" . htmlspecialchars($cita['fecha']) . "</td>";

  echo "<td class=columnas>" . htmlspecialchars($cita['motivo']) . "</td>";

  echo "<td class=columnas>" . htmlspecialchars($cita['estado']) . "</td>";

  echo "<td class=columnas>" . ($cita['realizada'] ? 'Sí' : 'No') . "</td>";

  echo "</tr>";
}
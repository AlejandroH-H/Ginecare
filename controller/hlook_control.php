<?php 
include ("./conexion.php");

$id = $_GET['id'];
if(!isset($_POST['buscar'])){
  
    $_POST['buscar'] = "";
$buscar = $_POST['buscar'] ;


} 


$buscar = $_POST['buscar'] ;
// esta otra forma funciona tambien
//$buscar = isset($_POST['buscar']) ? $conn->real_escape_string($_POST['buscar']) : null;


$stmt = $pdo->prepare('SELECT e.nombre, e.apellido, e.dni, h.fecha, h.descripcion 
FROM historiales h JOIN empleados e on (h.empleado_id=e.id) WHERE h.fecha LIKE :buscar AND e.id = :id');

$buscar_param= '%' . $buscar . '%';

$stmt->bindParam(':buscar', $buscar_param);
$stmt->bindParam(':id', $id);
$stmt->execute();
$resultado = $stmt->fetchAll();

//$resultado = mysqli_query($conn, $consulta);


?>
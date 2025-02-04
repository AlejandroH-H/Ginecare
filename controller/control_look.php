<?php
include("../conexion.php");



$buscar = $_POST['buscar'] ;
$buscar1 = $_POST['buscar1'] ;
$buscar2 = $_POST['buscar2'] ;
// esta otra forma funciona tambien
//$buscar = isset($_POST['buscar']) ? $conn->real_escape_string($_POST['buscar']) : null;


$stmt = $pdo->prepare("SELECT * FROM empleados WHERE (nombre LIKE :buscar AND apellido LIKE :buscar1 AND dni LIKE :buscar2) AND id !=1");

$buscar_param= '%' . $buscar . '%';
$buscar_param1= '%' . $buscar1 . '%';
$buscar_param2= '%' . $buscar2 . '%';
$stmt->bindParam(':buscar', $buscar_param, PDO::PARAM_STR);
$stmt->bindParam(':buscar1', $buscar_param1, PDO::PARAM_STR);
$stmt->bindParam(':buscar2', $buscar_param2, PDO::PARAM_STR);

$stmt->execute();

$resultado = $stmt->fetchAll();

$num = count($resultado);


?>

<h5 class="card-tittle">Resultados encontrados: <?php if($buscar=="" AND $buscar1=="" AND $buscar2==""){echo 0;}else{echo $num;}?> </h5>
<script src="https://kit.fontawesome.com/ca9fa9751b.js" crossorigin="anonymous"></script>

        <table class="table margin-center">
            <thead>
                <tr>
                <th scope="col" class="columnas columTitulo" >ID</th>
                <th scope="col" class="columnas columTitulo">NOMBRES</th>
                <th scope="col" class="columnas columTitulo">APELLIDOS</th>
                <th scope="col" class="columnas columTitulo">DNI</th>
                <th scope="col" class="columnas columTitulo">Editar Datos</th>
                <th scope="col" class="columnas columTitulo">Borrar Paciente</th>
                <th scope="col" class="columnas columTitulo">Historial Diagnostico</th>
                <th scope="col" class="columnas columTitulo">Chat</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($resultado as $result):
    if($result['id']!=1 and ($buscar!="" OR $buscar1!="" OR $buscar2!="")){ ?>

<tr>
                            <td class="bg-secondary .bg-gradient text-white"><?php echo $result['id'] ?></td>
                            <td class="bg-dark text-white"><?php echo $result['nombre'] ?></td>
                            <td class="bg-dark text-white"><?php echo $result['apellido'] ?></td>
                            <td class="bg-dark text-white"><?php echo $result['dni'] ?></td>
                            <td class="bg-dark text-white">
                            <a href="modificar_datos.php?id=<?= $result['id'] //mandamos el id ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td class="bg-dark text-white"><a onclick="return eliminar()"  href="admin_page.php?id=<?= $result['id'] //mandamos el id ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                          </td>
                          <td class="bg-dark text-white"><a href="admin_historial.php?id=<?= $result['id'] //mandamos el id ?>" class="btn btn-small btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                          </td>
                          <td class="bg-dark text-white">
                          <a href="chat.php?receiver_id=<?= $result['id'] //mandamos el id ?>" class="btn btn-small btn-secondary"> <i class="fa-regular fa-clipboard"></i></a> 
                          </td>

                        </tr>

<?php }
endforeach?>
</tbody>
        </table>
    
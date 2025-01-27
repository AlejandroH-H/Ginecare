<?php
//$conn = mysqli_connect("localhost", "root", "", "studio");
 $host = "localhost";
 $usuario = "root";
 $password = "password";
 $baseDatos = "studio";

 $dsn = 'mysql:host=' . $host . ';dbname=' . $baseDatos;

 $pdo = new PDO($dsn, $usuario, $password);
?>
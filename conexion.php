<?php
//$conn = mysqli_connect("localhost", "root", "", "studio");
 $host = "localhost";
 $user = "root";
 $password = "password";
 $baseDatos = "studio";

 $dsn = 'mysql:host=' . $host . ';dbname=' . $baseDatos;

 $pdo = new PDO($dsn, $user, $password);
?>
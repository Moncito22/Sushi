<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "sql101.infinityfree.com";
$username = "if0_38246580"; 
$password = "azy68hfTtIeKV"; 
$dbname = "if0_38246580_db_sushi"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "¡Conexión exitosa a la base de datos!";
?>

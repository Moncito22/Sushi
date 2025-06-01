<?php
include("conexion.php");

// Validar que se reciban todos los datos necesarios
if (
isset($_POST["id_cliente"]) &&
isset($_POST["nombre"]) &&
isset($_POST["apellido_paterno"]) &&
isset($_POST["apellido_materno"]) &&
isset($_POST["sexo"]) &&
isset($_POST["edad"]) &&
isset($_POST["celular"]) &&
isset($_POST["email"]) &&
isset($_POST["zona"]) &&
isset($_POST["metodo_pago"]) &&
isset($_POST["contrasena"])
) {
// Asignar variables
$id_cliente = $_POST["id_cliente"];
$nombre = $_POST["nombre"];
$apellido_paterno = $_POST["apellido_paterno"];
$apellido_materno = $_POST["apellido_materno"];
$sexo = $_POST["sexo"];
$edad = $_POST["edad"];
$celular = $_POST["celular"];
$email = $_POST["email"];
$zona = $_POST["zona"];
$metodo_pago = $_POST["metodo_pago"];
$contrasena = $_POST["contrasena"]; // ⚠️ Puedes cifrarla con password_hash si lo deseas

try {
$stmt = $dbh->prepare("INSERT INTO clientes
(id_cliente, nombre, apellido_paterno, apellido_materno, sexo, edad, celular, email, zona, metodo_pago, contrasena)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bindParam(1, $id_cliente);
$stmt->bindParam(2, $nombre);
$stmt->bindParam(3, $apellido_paterno);
$stmt->bindParam(4, $apellido_materno);
$stmt->bindParam(5, $sexo);
$stmt->bindParam(6, $edad);
$stmt->bindParam(7, $celular);
$stmt->bindParam(8, $email);
$stmt->bindParam(9, $zona);
$stmt->bindParam(10, $metodo_pago);
$stmt->bindParam(11, $contrasena); // o usar: password_hash($contrasena, PASSWORD_DEFAULT)

if ($stmt->execute()) {
echo "Registro insertado correctamente";
} else {
echo "Error al insertar";
}
} catch (PDOException $e) {
echo "Error en la consulta: " . $e->getMessage();
}

$dbh = null; // Cierra conexión
} else {
echo "Faltan datos requeridos.";
}
?>

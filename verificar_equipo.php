<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "equiposbbt";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre del equipo del formulario
$nombreEquipo = $_POST['nombreEquipo'];

// Verificar si el nombre del equipo ya existe
$sql = "SELECT * FROM equipos WHERE nombre_equipo = '$nombreEquipo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "El equipo ya existe";
} else {
    echo "El equipo está disponible";
}

$conn->close();
?>
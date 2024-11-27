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

// Obtener datos del formulario
$nombreEquipo = $_POST['nombreEquipo'];
$nombreAlumno = $_POST['nombreAlumno'];
$primerApellido = $_POST['primerApellido'];
$segundoApellido = $_POST['segundoApellido'];
$grado = $_POST['grado'];
$grupo = $_POST['grupo'];

// Insertar equipo
$sqlEquipo = "INSERT INTO equipos (nombre_equipo) VALUES ('$nombreEquipo')";
if ($conn->query($sqlEquipo) === TRUE) {
    $equipo_id = $conn->insert_id;

    // Insertar alumno
    $sqlAlumno = "INSERT INTO alumnos (nombre_alumno, primer_apellido, segundo_apellido, grado, grupo, equipo_id) 
                  VALUES ('$nombreAlumno', '$primerApellido', '$segundoApellido', '$grado', '$grupo', $equipo_id)";
    if ($conn->query($sqlAlumno) === TRUE) {
        echo "Equipo y alumno creados exitosamente";
    } else {
        echo "Error: " . $sqlAlumno . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sqlEquipo . "<br>" . $conn->error;
}

$conn->close();
?>
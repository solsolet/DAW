<?php
$mysqli = @new mysqli(
    'localhost', // El servidor
    'root', // El usuario
    '', // La contraseña
    'daw'); // La base de datos
if($mysqli->connect_errno) {
echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
echo '</p>';
exit;
}

if(!($resultado = $mysqli->query($sentencia))) {
    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
    echo '</p>';
    exit;
}

?>
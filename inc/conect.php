<?php
$mysqli = @new mysqli(
    'localhost', // El servidor
    'root', // El usuario
    '', // La contraseña
    'pibd'); // La base de datos
if($mysqli->connect_error) {
echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
echo '</p>';
exit;
}

?>
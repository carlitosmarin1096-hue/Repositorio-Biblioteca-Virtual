<?php
include "config/conexion.php";

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM usuario WHERE usuario='$usuario' AND password='$clave'";
$resultado = $conexion->query($sql);

if($resultado->num_rows > 0){
    echo "OK";
} else {
    echo "ERROR";
}
?>
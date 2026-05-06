<?php
include "config/conexion.php";

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$programa = $_POST['programa'];

$archivo = $_FILES['archivo']['name'];
$ruta = "uploads/" . $archivo;

move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);

$sql = "INSERT INTO documento (titulo, autor, programa, archivo)
VALUES ('$titulo', '$autor', '$programa', '$archivo')";

$conexion->query($sql);

echo "Documento subido correctamente";
?>
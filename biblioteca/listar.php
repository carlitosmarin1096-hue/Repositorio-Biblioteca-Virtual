<?php
include "config/conexion.php";

$sql = "SELECT * FROM documento";
$resultado = $conexion->query($sql);

while($row = $resultado->fetch_assoc()){
    echo "<div>";
    echo "<h3>".$row['titulo']."</h3>";
    echo "<p>".$row['autor']."</p>";
    echo "<a href='uploads/".$row['archivo']."' download>Descargar</a>";
    echo "</div>";
}
?>
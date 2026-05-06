<?php
include "config/conexion.php";

$q = $_GET['q'];

$sql = "SELECT * FROM documento 
WHERE titulo LIKE '%$q%' OR autor LIKE '%$q%'";

$resultado = $conexion->query($sql);

while($row = $resultado->fetch_assoc()){
    echo "<h3>".$row['titulo']."</h3>";
    echo "<a href='uploads/".$row['archivo']."'>Descargar</a>";
}
?>
<?php
session_start();
include "config/conexion.php";

$logueado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Biblioteca Virtual</title>

<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">

<style>
body {
    margin: 0;
    font-family: 'IBM Plex Sans', sans-serif;
    background-color: #f4f6fb;
}

/* HEADER */
header {
    background-color: #0e1f87;
    color: white;
    padding: 20px;
    text-align: center;
}

/* LOGIN */
#loginContainer {
    max-width: 350px;
    margin: 40px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
}

#loginContainer input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
}

/* HERO */
.hero {
    background: linear-gradient(135deg, #0e1f87, #e80b0b);
    color: white;
    padding: 60px 20px;
    text-align: center;
}

/* SECCIÓN */
.section { padding: 40px 20px; }

/* CATÁLOGO */
#catalogo {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

/* TARJETAS */
.libro-card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    border-left: 6px solid #e80b0b;
}

/* FOOTER */
footer {
    background-color: #0e1f87;
    color: white;
    text-align: center;
    padding: 15px;
}
</style>
</head>

<body>

<header>
    <h2>📚 Biblioteca Virtual</h2>
</header>

<!-- LOGIN -->
<?php if(!$logueado){ ?>

<div id="loginContainer">

    <form action="login.php" method="POST">

        <h3>Iniciar sesión</h3>

        <input name="usuario" placeholder="Usuario" required>
        <input name="clave" type="password" placeholder="Contraseña" required>

        <button type="submit">Ingresar</button>

    </form>

</div>

<?php } else { ?>

<!-- CONTENIDO -->
<div>

<section class="hero">
    <h1>Sistema de Gestión - Repositorio de Tesis Digitales</h1>
    <p>Bienvenido al sistema</p>
</section>

<!-- SUBIR DOCUMENTO -->
<section class="section">

<h2>Subir documento</h2>

<form action="subir.php" method="POST" enctype="multipart/form-data">

    <input type="text" name="titulo" placeholder="Título" required>
    <input type="text" name="autor" placeholder="Autor" required>
    <input type="text" name="programa" placeholder="Programa" required>

    <input type="file" name="archivo" required>

    <button type="submit">Subir documento</button>

</form>

</section>

<!-- BUSCAR -->
<section class="section">

<h2>Buscar documentos</h2>

<form action="buscar.php" method="GET">
    <input type="text" name="q" placeholder="Buscar tesis...">
</form>

</section>

<!-- CATÁLOGO -->
<section class="section">

<h2>📖 Documentos disponibles</h2>

<div id="catalogo">

<?php
$sql = "SELECT * FROM documento";
$resultado = $conexion->query($sql);

while($row = $resultado->fetch_assoc()){
?>

<div class="libro-card">
    <h4><?php echo $row['titulo']; ?></h4>
    <p><?php echo $row['autor']; ?></p>

    <a href="uploads/<?php echo $row['archivo']; ?>" download>
        Descargar PDF
    </a>
</div>

<?php } ?>

</div>

</section>

</div>

<?php } ?>

<footer>
<p>&copy; 2026 Sistema de Biblioteca - Proyecto SENA</p>
</footer>

</body>
</html>

<?php
session_start();
include "config/conexion.php";

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard Biblioteca</title>

<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'IBM Plex Sans', sans-serif;
    background:#f4f6fb;
}

/* SIDEBAR */
.sidebar{
    width:220px;
    height:100vh;
    background:#0e1f87;
    color:white;
    position:fixed;
    padding:20px;
}

.sidebar h2{
    font-size:18px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    margin:15px 0;
    padding:8px;
    border-radius:5px;
}

.sidebar a:hover{
    background:#e80b0b;
}

/* CONTENIDO */
.content{
    margin-left:240px;
    padding:20px;
}

/* CARDS */
.card{
    background:white;
    padding:20px;
    border-radius:10px;
    margin:10px 0;
    border-left:5px solid #e80b0b;
}

/* HEADER */
.topbar{
    background:white;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
}

.btn{
    background:#e80b0b;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:5px;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>📚 Biblioteca</h2>

    <p>Usuario: <?php echo $usuario; ?></p>
    <p>Rol: <?php echo $rol; ?></p>

    <a href="dashboard.php">🏠 Inicio</a>
    <a href="buscar.php">🔍 Buscar</a>

    <?php if($rol == "administrativo"){ ?>
        <a href="#subir">📤 Subir documento</a>
    <?php } ?>

    <a href="logout.php">🚪 Salir</a>
</div>

<!-- CONTENIDO -->
<div class="content">

<div class="topbar">
    <h1>Dashboard Repositorio Institucional</h1>
    <p>Bienvenido al sistema de gestión de documentos</p>
</div>

<!-- TARJETAS -->
<div class="card">
    <h3>📄 Documentos registrados</h3>

    <?php
    $sql = "SELECT COUNT(*) as total FROM documento";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
    echo "<h2>".$row['total']."</h2>";
    ?>
</div>

<?php if($rol == "administrativo"){ ?>

<div class="card" id="subir">
    <h3>📤 Subir documento</h3>

    <form action="subir.php" method="POST" enctype="multipart/form-data">

        <input type="text" name="titulo" placeholder="Título" required><br><br>
        <input type="text" name="autor" placeholder="Autor" required><br><br>
        <input type="text" name="programa" placeholder="Programa" required><br><br>

        <input type="file" name="archivo" required><br><br>

        <button class="btn">Subir</button>

    </form>
</div>

<?php } ?>

<div class="card">
    <h3>📚 Acciones rápidas</h3>

    <a class="btn" href="buscar.php">Buscar documentos</a>
</div>

</div>

</body>
</html>
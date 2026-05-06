<?php
session_start();

/* 1. BORRAR VARIABLES DE SESIÓN */
session_unset();

/* 2. DESTRUIR SESIÓN COMPLETA */
session_destroy();

/* 3. REDIRIGIR AL LOGIN */
header("Location: index.php");
exit();
?>
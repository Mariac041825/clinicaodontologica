<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Gestión Odontológica</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
    <script src="Vista/jquery/jquery-3.2.1.min.js"></script>
    <script src="Vista/js/script.js"></script>
</head>
<body>
    <div id="contenedor">
        <div id="encabezado">
            <img src="Vista/imagenes/implantes-blog.jpeg" alt="Banner del sistema">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <ul id="menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="index.php?accion=asignar">Asignar</a></li>
            <li><a href="index.php?accion=consultar">Consultar Cita</a></li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a></li>
        </ul>
        <div id="contenido">
            <?php
                if (isset($_GET["accion"])) {
                    require_once "Vista/html/" . $_GET["accion"] . ".php";
                } else {
                    require_once "Vista/html/inicio.php";
                }
            ?>
        </div>
    </div>
</body>
</html>
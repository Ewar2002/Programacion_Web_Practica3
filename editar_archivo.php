<!DOCTYPE html>
<html>
<head>
    <title>Editar Archivo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        textarea {
            width: 100%;
            height: 300px;
        }
    </style>
</head>
<body class="container">
    <h1 class="my-4">Modificar Archivo</h1>
    
    <?php
    if (isset($_GET['archivo'])) {
        $archivo = urldecode($_GET['archivo']);

        if (file_exists($archivo)) {
            $contenido = file_get_contents($archivo);
            echo "<form method='post' action='guardar_archivo.php'>";
            echo "<input type='hidden' name='nombre_archivo' value='" . basename($archivo) . "'>";
            echo "<div class='form-group'>";
            echo "<label for='contenido'>Contenido:</label>";
            echo "<textarea class='form-control' name='contenido' id='contenido'>$contenido</textarea>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input type='submit' class='btn btn-success' value='Guardar'>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "<p class='alert alert-danger'>El archivo no existe.</p>";
        }
    }
    ?>

    <a href="index.php" class="btn btn-primary">Volver a la página principal</a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

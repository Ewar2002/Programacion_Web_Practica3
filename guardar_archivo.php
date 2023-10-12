<!DOCTYPE html>
<html>
<head>
    <title>Guardado de Archivo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container">
    <h1 class="my-4">Proceso realizado satisfactoriamente</h1>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombreArchivo = $_POST['nombre_archivo'];
        $contenidoArchivo = $_POST['contenido'];
        $carpeta = 'Sistema/';

        if (!preg_match('/\.txt$/', $nombreArchivo)) {
            $nombreArchivo .= '.txt';
        }

        if (isset($_POST['nombre_carpeta']) && !empty($_POST['nombre_carpeta'])) {
            $nombreCarpeta = $_POST['nombre_carpeta'];
            $carpeta .= $nombreCarpeta . '/';

            if (!is_dir($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
        }

        file_put_contents($carpeta . $nombreArchivo, $contenidoArchivo);
        echo "<p class='alert alert-success'>El archivo se ha guardado con éxito en la carpeta '$carpeta'.</p>";
    }
    ?>

    <a href="index.php" class="btn btn-primary">Volver a la página principal</a>

    <!-- Agregar el enlace al archivo JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

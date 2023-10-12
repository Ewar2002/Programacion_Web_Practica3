<!DOCTYPE html>
<html>
<head>
    <title>Bloc de Notas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        textarea {
            width: 100%;
            height: 300px;
        }

        .folder-icon {
            color: yellow;
        }

        .txt-icon {
            color: blue;
        }

        .list-group-item-text {
            color: black;
        }
    </style>
</head>
<body class="container">
    <h1 class="my-4">Bloc de Notas</h1>
    
    <form method="post" action="guardar_archivo.php" class="mb-4">
        <div class="form-group">
            <label for="nombre_archivo">Nombre:</label>
            <input type="text" class="form-control" name="nombre_archivo" id="nombre_archivo" placeholder="Nombre del archivo.txt">
        </div>
        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <textarea class="form-control" name="contenido" id="contenido" placeholder="Escribe el contenido del archivo aquí"></textarea>
        </div>
        <div class="form-group">
            <label for="nombre_carpeta">Carpeta (opcional):</label>
            <input type="text" class="form-control" name="nombre_carpeta" id="nombre_carpeta" placeholder="Nombre de la carpeta (opcional)">
        </div>
        <div class="form-group">
            <button type="submit" name="crear_carpeta" class="btn btn-primary">Guardar y crear Carpeta</button>
            <button type="submit" class="btn btn-success">Guardar solo Archivo</button>
        </div>
    </form>

    <h2>Archivos y Carpetas en el Sistema</h2>
    <ul class="list-group">
        <?php
        $carpeta = 'Sistema/';

        if (isset($_GET['carpeta'])) {
            $carpeta .= urldecode($_GET['carpeta']) . '/';
        }

        
        $elementos = array_merge(glob($carpeta . '*.txt'), glob($carpeta . '*', GLOB_ONLYDIR));
        
        foreach ($elementos as $elemento) {
            $nombre = basename($elemento);
            if (is_file($elemento)) {
                echo "<li class='list-group-item'><a href='editar_archivo.php?archivo=" . urlencode($elemento) . "&carpeta=" . urlencode($carpeta) . "'><i class='fas fa-file txt-icon'></i> <span class='list-group-item-text'>" . $nombre . "</span></a></li>";
            } elseif (is_dir($elemento)) {
                echo "<li class='list-group-item'><a href='index.php?carpeta=" . urlencode($nombre) . "'><i class='fas fa-folder folder-icon'></i> <span class='list-group-item-text'>". $nombre . "</span></a></li>";
            }
        }
        ?>
    </ul>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/paginacion.css">
    <title>Document</title>
</head>

<body>
    <!-- Tarjetero 
    <section class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="row py-2">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="Archivos" class="img-fluid rounded-start" alt="..." />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Titulo de la obra</h5>
                                <p class="card-text truncate-text">
                                    Descripcion de la pieza
                                </p>
                                <p class="card-text text-end">
                                    <a href="#" class="btn btn-warning">Ver</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </section>-->

    <?php

    // Datos de conexión a la base de datos
    $host = 'localhost';
    $db = 'patrimonio_dev';
    $user = 'secretaria';
    $password = 'imcutidg';

    // Arreglo con las características de los campos deseados
    $camposDeseados = array(
        'Identificación general' => array(
            '152' => 'Titulo/Nombre',
            '194' => 'Titulo/Nombre',
            '746' => 'Titulo/Nombre',
            '747' => 'Titulo/Nombre',
            '748' => 'Titulo/Nombre',
            '749' => 'Titulo/Nombre',
            '750' => 'Titulo/Nombre',
            '751' => 'Titulo/Nombre',
            '752' => 'Titulo/Nombre',
            '753' => 'Titulo/Nombre',
            '89' => 'Descripcion de la pieza',
            '357' => 'Descripcion de la pieza',
            '389' => 'Descripcion de la pieza',
            '416' => 'Descripcion de la pieza',
            '471' => 'Descripcion de la pieza'
        ),
        'Datos técnicos' => array(
            '152' => 'Titulo/Nombre',
            '194' => 'Titulo/Nombre',
            '746' => 'Titulo/Nombre',
            '747' => 'Titulo/Nombre',
            '748' => 'Titulo/Nombre',
            '749' => 'Titulo/Nombre',
            '750' => 'Titulo/Nombre',
            '751' => 'Titulo/Nombre',
            '752' => 'Titulo/Nombre',
            '753' => 'Titulo/Nombre'
        ),
        'Objetos digitales' => array(
            'archivos' => 'Archivos'
        )
    );

    // Cantidad de registros por página
    $registrosPorPagina = 100;

    try {
        // Conexión a la base de datos
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener el número total de registros
        $queryTotalRegistros = $pdo->query('SELECT COUNT(*) FROM registros');
        $totalRegistros = $queryTotalRegistros->fetchColumn();

        // Calcular el número total de páginas
        $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

        // Obtener el número de página actual (si no se especifica, se asume la primera página)
        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Calcular el índice inicial del registro para la página actual
        $indiceInicio = ($paginaActual - 1) * $registrosPorPagina;

        // Consulta para obtener los nombres de los JSON desde la base de datos, limitada por la página actual
        $query = $pdo->prepare('SELECT ID FROM registros ORDER BY ID DESC LIMIT :inicio, :cantidad');
        $query->bindValue(':inicio', $indiceInicio, PDO::PARAM_INT);
        $query->bindValue(':cantidad', $registrosPorPagina, PDO::PARAM_INT);
        $query->execute();
        $registros = $query->fetchAll(PDO::FETCH_COLUMN);

        // Carpeta donde se encuentran los JSON
        $carpeta = 'reg/';

        // Variable para verificar si ya se imprimió una ficha
        $fichaImpresa = false;

        // Recorremos los registros obtenidos de la base de datos
        foreach ($registros as $registro) {
            // Ruta del archivo JSON
            $rutaJson = $carpeta . $registro . '.json';

            // Verificar si el archivo existe
            if (file_exists($rutaJson)) {
                // Leer el contenido del archivo JSON
                $json = file_get_contents($rutaJson);

                // Decodificar el JSON
                $data = json_decode($json, true);

                // Reiniciar la variable de ficha impresa para cada registro
                $fichaImpresa = false;

                // Recorrer las secciones del JSON
                foreach ($data as $seccion) {
                    $nombreSeccion = $seccion['nombreSeccion'];

                    // Verificar si la sección está dentro de las secciones deseadas
                    if (isset($camposDeseados[$nombreSeccion])) {
                        // Verificar si ya se imprimió una ficha
                        if (!$fichaImpresa) {
                            echo '<section class="row">';
                            echo '<div class="col-2"></div>';
                            echo '<div class="col-4">';
                            echo '<div class="row py-2">';
                            echo '<div class="card">';
                            echo '<div class="row">';
                            echo '<div class="col-md-4">';
                            echo '<img src="' . $archivo . '" class="img-fluid rounded-start" alt="Imagén de obra no disponible" width="300" height="300" />';
                            echo '</div>';
                            echo '<div class="col-md-8">';
                            echo '<div class="card-body">';

                            // Recorrer los campos de la sección
                            foreach ($seccion['campos'] as $campo) {
                                $idCampo = $campo['idCampo'];
                                $valor = $campo['valor'];

                                // Verificar si el idCampo y valor cumplen con las características deseadas
                                if (isset($camposDeseados[$nombreSeccion][$idCampo])) {
                                    $nombreCampo = $camposDeseados[$nombreSeccion][$idCampo];

                                    // Imprimir el campo
                                    if ($nombreCampo === 'Titulo/Nombre') {
                                        echo '<h5 class="card-title">' . $valor . '</h5>';
                                    }
                                    if ($nombreCampo === 'Descripcion de la pieza') {
                                        echo '<p class="card-text truncate-text">' . $valor . '</p>';
                                    }
                                    if ($nombreCampo === 'Archivos') {
                                        // Obtener la extensión del archivo
                                        $extension = pathinfo($valor, PATHINFO_EXTENSION);

                                        // Verificar si la extensión está permitida
                                        if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                                            echo '<script>';
                                            echo 'document.querySelector(".img-fluid").src = "' . $valor . '";';
                                            echo '</script>';
                                        }
                                    }
                                }
                            }
                            echo '<p class="card-text text-end">';
                            echo '<a href="#" class="btn btn-warning">Ver</a>';
                            echo '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="col-2"></div>';
                            echo '</section>';

                            // Actualizar la variable de ficha impresa a true
                            $fichaImpresa = true;
                        }
                    }

                    // Verificar si la sección es "Objetos digitales" y hay archivos
                    if ($nombreSeccion === 'Objetos digitales' && !empty($seccion['archivos'])) {
                        $archivos = $seccion['archivos'];
                        //echo '<p>Archivos:</p>';
                        foreach ($archivos as $archivo) {
                            // Obtener la extensión del archivo
                            $extension = pathinfo($archivo, PATHINFO_EXTENSION);

                            // Verificar si la extensión está permitida
                            if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                                //echo "<p>$archivo</p>";
                            }
                        }
                    }
                }
            } else {
                //echo "No se encontró el archivo JSON para el registro $registro<br>";
            }
        }

        // Paginación
        echo '<div class="pagination">';
        echo '<ul class="pagination-list">';

        // Botón para la página anterior
        if ($paginaActual > 1) {
            echo '<li class="pagination-item">';
            echo '<a href="?pagina=' . ($paginaActual - 1) . '" class="pagination-link">&laquo;</a>';
            echo '</li>';
        }

        // Números de página
        for ($i = max(1, $paginaActual - 2); $i <= min($paginaActual + 2, $totalPaginas); $i++) {
            echo '<li class="pagination-item';
            if ($i == $paginaActual) {
                echo ' active';
            }
            echo '">';
            echo '<a href="?pagina=' . $i . '" class="pagination-link">' . $i . '</a>';
            echo '</li>';
        }

        // Botón para la página siguiente
        if ($paginaActual < $totalPaginas) {
            echo '<li class="pagination-item">';
            echo '<a href="?pagina=' . ($paginaActual + 1) . '" class="pagination-link">&raquo;</a>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>';
    } catch (PDOException $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
    }

    ?>

</body>

</html>
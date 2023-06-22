<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "secretaria";
$password = "imcutidg";
$dbname = "patrimonio_dev";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener la lista de archivos JSON en la carpeta /reg
$directorio = '../reg/';

// Consulta a la base de datos
$idFicha = 10;
$sql = "SELECT ID FROM registros WHERE ID_FICHA = $idFicha AND ID_ESTATUS_PAPELERA = 1 AND ID_ESTATUS_REGISTRO = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Recorrer los nombres de archivos obtenidos de la consulta
    while ($row = $result->fetch_assoc()) {
        $nombreArchivo = $row['ID'] . ".json";
        $archivo = $directorio . $nombreArchivo;

        echo "Archivo: $archivo<br>";
        $id = $archivo;

        // Leer el contenido del archivo JSON
        $jsonData = file_get_contents($archivo);

        // Decodificar el contenido JSON a un array asociativo
        $data = json_decode($jsonData, true);

        // Definir los nombres de las secciones a buscar
        $seccionesBuscadas = array(
            "Campos obligatorios",
            "Objetos digitales",
            "Identificación general",
            "Datos de identificación general",
            "Tipo de objeto",
            "Dimensiones"
        );

        // Recorrer los elementos del array
        foreach ($data as $item) {
            $nombreSeccion = $item['nombreSeccion'];

            // Verificar si la sección está en el arreglo de secciones buscadas
            if (in_array($nombreSeccion, $seccionesBuscadas)) {
                echo "$nombreSeccion" . "<br>";

                // Verificar el nombre de la sección
                switch ($nombreSeccion) {
                    case "Campos obligatorios":
                        // Recorrer los campos de la sección
                        foreach ($item['campos'] as $campo) {
                            $idCampo = $campo['idCampo'];
                            $valorCampo = $campo['valor'];

                            // Verificar el idCampo
                            if ($idCampo == 2) {
                                echo "Coleccion: $valorCampo<br>";
                                $coleccion = $valorCampo;
                            } elseif ($idCampo == 5) {
                                echo "Tematica: $valorCampo<br>";
                                $tematica = $valorCampo;
                            }
                        }
                        break;

                    case "Identificación general":
                        // Recorrer los campos de la sección
                        foreach ($item['campos'] as $campo) {
                            $idCampo = $campo['idCampo'];
                            $valorCampo = $campo['valor'];

                            // Verificar el idCampo
                            if (in_array($idCampo, array(152, 194, 746, 747, 748, 749, 750, 751, 752, 753))) {
                                echo "Titulo: $valorCampo<br>";
                                $titulo = $valorCampo;
                            } elseif (in_array($idCampo, array(89, 357, 389, 416, 471))) {
                                echo "Descripcion de la pieza: $valorCampo<br>";
                                $descPieza = $valorCampo;
                            }
                        }
                        break;

                    case "Datos de identificación general":
                        // Recorrer los campos de la sección
                        foreach ($item['campos'] as $campo) {
                            $idCampo = $campo['idCampo'];
                            $valorCampo = $campo['valor'];

                            // Verificar el idCampo
                            if (in_array($idCampo, array(152, 194, 746, 747, 748, 749, 750, 751, 752, 753))) {
                                echo "Titulo: $valorCampo<br>";
                                $titulo = $valorCampo;
                            } elseif (in_array($idCampo, array(89, 357, 389, 416, 471))) {
                                echo "Descripcion de la pieza: $valorCampo<br>";
                                $descPieza = $valorCampo;
                            }
                        }
                        break;

                    case "Tipo de objeto":
                        // Recorrer los campos de la sección
                        foreach ($item['campos'] as $campo) {
                            $idCampo = $campo['idCampo'];
                            $valorCampo = $campo['valor'];

                            // Verificar el idCampo
                            if (in_array($idCampo, array(11, 85, 251, 287, 321, 351, 383, 411, 437))) {
                                echo "Tipo de objeto: : $valorCampo<br>";
                                $tipoObjeto = $valorCampo;
                            } elseif (in_array($idCampo, array(189, 322, 323, 582, 724, 725, 726, 727, 728, 729))) {
                                echo "Categoria: $valorCampo<br>";
                                $categoria = $valorCampo;
                            }
                        }
                        break;

                    case "Objetos digitales":
                        // Obtener los archivos de la sección
                        $archivos = $item['archivos'];

                        // Verificar si hay archivos
                        if (!empty($archivos)) {
                            $jpegEncontrado = false;
                            foreach ($archivos as $archivo) {
                                // Obtener la extensión del archivo
                                $extension = pathinfo($archivo, PATHINFO_EXTENSION);

                                // Verificar si la extensión es .jpeg
                                if ($extension === 'jpeg') {
                                    echo $archivo . "<br>";
                                    $rutaImg = $archivo;
                                    $jpegEncontrado = true;
                                    break;
                                }
                            }

                            // Si no se encontró ningún archivo jpeg, mostrar "Imagen no disponible"
                            if (!$jpegEncontrado) {
                                echo "Imagen no disponible<br>";
                            }
                        } else {
                            echo "Imagen no disponible<br>";
                        }
                        break;

                    case "Dimensiones":
                        // Recorrer los campos de la sección
                        foreach ($item['campos'] as $campo) {
                            $idCampo = $campo['idCampo'];
                            $valorCampo = $campo['valor'];

                            // Verificar el idCampo
                            switch ($idCampo) {
                                case 330:
                                    echo "Alto Maximo: $valorCampo<br>";
                                    $altoMaximo = $valorCampo;
                                    break;
                                case 331:
                                    echo "Largo Maximo: $valorCampo<br>";
                                    $largoMaximo = $valorCampo;
                                    break;
                                case 51:
                                case 162:
                                case 213:
                                case 220:
                                case 263:
                                case 303:
                                case 455:
                                case 466:
                                    echo "Ancho: $valorCampo<br>";
                                    $ancho = $valorCampo;
                                    break;
                                case 332:
                                    echo "Espesor Maximo: $valorCampo<br>";
                                    $espesorMaximo = $valorCampo;
                                    break;
                                case 45:
                                case 164:
                                case 456:
                                case 477:
                                case 497:
                                    echo "Fondo: $valorCampo<br>";
                                    $fondo = $valorCampo;
                                    break;
                                case 94:
                                case 266:
                                case 305:
                                case 333:
                                case 365:
                                case 396:
                                case 421:
                                case 468:
                                    echo "Peso: $valorCampo<br>";
                                    $peso = $valorCampo;
                                    break;
                                case 53:
                                case 214:
                                case 267:
                                case 306:
                                case 457:
                                case 467:
                                    echo "Diametro: $valorCampo<br>";
                                    $diametro = $valorCampo;
                                    break;
                            }
                        }
                        break;

                    default:
                        // Recorrer los campos de la sección
                        foreach ($item['campos'] as $campo) {
                            $idCampo = $campo['idCampo'];
                            $valorCampo = $campo['valor'];
                            echo "ID del campo: $idCampo, Valor del campo: $valorCampo" . "<br>";
                        }
                        break;
                }
            }
        }
        echo "<br> INSERT A SQL <br>";
        if (empty($id)) {
            $id = 0;
            echo $id;
        } else {
            echo "id: " . $id;
        }
        echo "<br>";

        if (empty($coleccion)) {
            $coleccion = 0;
            echo $coleccion;
        } else {
            echo "Coleccion: " . $coleccion;
        }
        echo "<br>";

        if (empty($tematica)) {
            $tematica = 0;
            echo $tematica;
        } else {
            echo "Temática: " . $tematica;
        }
        echo "<br>";

        if (empty($titulo)) {
            $titulo = 0;
            echo $titulo;
        } else {
            echo "Título: " . $titulo;
        }
        echo "<br>";

        if (empty($descPieza)) {
            $descPieza = 0;
            echo $descPieza;
        } else {
            echo "Descripcion de la pieza: " . $descPieza;
        }
        echo "<br>";

        if (empty($tipoObjeto)) {
            $tipoObjeto = 0;
            echo $tipoObjeto;
        } else {
            echo "Tipo de objeto: " . $tipoObjeto;
        }
        echo "<br>";

        if (empty($categoria)) {
            $categoria = 0;
            echo $categoria;
        } else {
            echo "Categoria: " . $categoria;
        }
        echo "<br>";



        if (empty($rutaImg)) {
            $rutaImg = 0;
            echo $rutaImg;
        } else {
            echo "Imagen: " . $rutaImg;
        }
        echo "<br>";

        if (empty($altoMaximo)) {
            $altoMaximo = 0;
            echo $altoMaximo;
        } else {
            echo "Alto Maximo: " . $altoMaximo;
        }
        echo "<br>";

        if (empty($largoMaximo)) {
            $largoMaximo = 0;
            echo $largoMaximo;
        } else {
            echo "LargoMaximo: " . $largoMaximo;
        }
        echo "<br>";

        if (empty($ancho)) {
            $ancho = 0;
            echo $ancho;
        } else {
            echo "Ancho: " . $ancho;
        }
        echo "<br>";

        if (empty($espesorMaximo)) {
            $espesorMaximo = 0;
            echo $espesorMaximo;
        } else {
            echo "Espesor Maximo: " . $espesorMaximo;
        }
        echo "<br>";

        if (empty($fondo)) {
            $fondo = 0;
            echo $fondo;
        } else {
            echo "Fondo: " . $fondo;
        }
        echo "<br>";

        if (empty($peso)) {
            $peso = 0;
            echo $peso;
        } else {
            echo "Peso: " . $peso;
        }
        echo "<br>";

        if (empty($diametro)) {
            $diametro = 0;
            echo $diametro;
        } else {
            echo "Diametro: " . $diametro;
        }
        echo "<br>";

        echo "<br>";

        echo "<br>";
        echo "*******************************************************************************";
        echo "<br>";
        $sql2 = "INSERT INTO datos_publicos
        (ID, COLECCION, TEMATICA, TITULO, DESC_PIEZA, TECNICA_MANUFACTURA, TIPOS_OBJETO, 
        RUTA_IMG, AUTOR, TIPO_OBRA, FECHA, ESTILO_TENDENCIA, MATERIAL, EPOCA, ESPECIE, 
        FAMILIA, CATEGORIA, SUBCOLECCION, TIPO_FOSIL, ERA_GEO, DETALLES_ACCESORIO, 
        MATERIA_PRIMA, ALTO, LARGO, ANCHO, ESPESOR, FONDO, PESO, DIAMETRO)
        VALUES 
        ('$id', '$coleccion', '$tematica', '$titulo', '$descPieza', '0', '$tipoObjeto', 
        '$rutaImg', '0', '0', '0', '0', '0', '0', '0', 
        '0', '$categoria', '0', '0', '0', '0', 
        '0', '$altoMaximo', '$largoMaximo', '$ancho', '$espesorMaximo', '$fondo', '$peso', '$diametro')
        ";
        $result2 = $conn->query($sql2);
        $id = 0;
        $coleccion = 0;
        $tematica = 0;
        $titulo = 0;
        $descPieza = 0;
        $tipoObjeto = 0;
        $categoria = 0;
        $rutaImg = 0;
        $altoMaximo = 0;
        $largoMaximo = 0;
        $ancho = 0;
        $espesorMaximo = 0;
        $fondo = 0;
        $peso = 0;
        $diametro = 0;
    }
} else {
    echo "No se encontraron archivos en la base de datos.";
}

// Cerrar conexión a la base de datos
$conn->close();

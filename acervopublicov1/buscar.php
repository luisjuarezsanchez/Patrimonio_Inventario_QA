<?php
// Realizar la conexión a la base de datos
$conexion = mysqli_connect('localhost', 'secretaria', 'imcutidg', 'patrimonio_dev');

// Verificar la conexión
if (!$conexion) {
    die('Error de conexión a la base de datos: ' . mysqli_connect_error());
}

// Obtener el número de página actual
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el registro inicial para la consulta
$registrosPorPagina = 10;
$registroInicial = ($paginaActual - 1) * $registrosPorPagina;

// Función para generar la consulta SQL con la búsqueda
function generarConsultaSQL($busqueda, $registroInicial, $registrosPorPagina)
{
    $campos = [
        "COLECCION", "TEMATICA", "TITULO", "DESC_PIEZA", "TECNICA_MANUFACTURA", "TIPOS_OBJETO", "AUTOR", "TIPO_OBRA",
        "ESTILO_TENDENCIA", "MATERIAL", "EPOCA", "ESPECIE", "FAMILIA", "CATEGORIA", "SUBCOLECCION", "TIPO_FOSIL", "ERA_GEO", "DETALLES_ACCESORIO", "MATERIA_PRIMA",
        "ALTO", "LARGO", "ANCHO", "ESPESOR", "FONDO", "PESO", "DIAMETRO"
    ];
    $condiciones = [];
    foreach ($campos as $campo) {
        $condiciones[] = "$campo LIKE '%$busqueda%'";
    }
    return "SELECT * FROM viewDatosPublicos WHERE " . implode(" OR ", $condiciones) . " ORDER BY (RUTA_IMG = '0') ASC LIMIT $registroInicial, $registrosPorPagina";
}

// Obtener la consulta SQL según la búsqueda
$busqueda = isset($_GET['busqueda']) ? mysqli_real_escape_string($conexion, $_GET['busqueda']) : '';
if (!empty($busqueda)) {
    $consulta = generarConsultaSQL($busqueda, $registroInicial, $registrosPorPagina);

    // Calcular el número total de registros de la búsqueda
    $consultaTotalRegistros = generarConsultaSQL($busqueda, 0, PHP_INT_MAX);
    $resultadoTotalRegistros = mysqli_query($conexion, $consultaTotalRegistros);
    $totalRegistros = mysqli_num_rows($resultadoTotalRegistros);
} else {
    $consulta = "SELECT * FROM viewDatosPublicos ORDER BY (RUTA_IMG = '0') ASC LIMIT $registroInicial, $registrosPorPagina";

    // Calcular el número total de registros
    $totalRegistrosConsulta = mysqli_query($conexion, "SELECT COUNT(*) as total FROM viewDatosPublicos");
    $totalRegistros = mysqli_fetch_assoc($totalRegistrosConsulta)['total'];
}

// Obtener los resultados de la consulta
$resultado = mysqli_query($conexion, $consulta);

// Generar el código HTML de los resultados de búsqueda
ob_start();

// Iterar sobre los resultados y generar el código HTML
while ($fila = mysqli_fetch_assoc($resultado)) {
?>
    <div class="card">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo $fila['RUTA_IMG'] !== "0" ? '../' . $fila['RUTA_IMG'] : 'assets/icons/gifcara.gif'; ?>" class="img-fluid rounded-start" alt="Imagen no disponible" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $fila['TITULO'] !== "0" ? $fila['TITULO'] : "Titulo no disponible"; ?>
                    </h5>
                    <p class="card-text truncate-text">
                        <?php echo $fila['DESC_PIEZA'] !== "0" ? $fila['DESC_PIEZA'] : "Descripción no disponible"; ?>
                    </p>
                    <p class="card-text text-end">
                        <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalDetalle-<?php echo $fila['ID']; ?>">Ver</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detalle -->
    <div class="modal fade" id="modalDetalle-<?php echo $fila['ID']; ?>" tabindex="-1" aria-labelledby="modalDetalleLabel-<?php echo $fila['ID']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetalleLabel-<?php echo $fila['ID']; ?>">Datos generales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <?php if ($fila['RUTA_IMG'] !== "0" && !is_null($fila['RUTA_IMG'])) { ?>
                        <img src="<?php echo $fila['RUTA_IMG'] != "0" ? '../' . $fila['RUTA_IMG'] : 'assets/icons/gifcara.gif'; ?>" alt="Imagen" height="250" width="250">
                    <?php } ?>
                    <?php if ($fila['COLECCION'] !== "0" && !is_null($fila['COLECCION'])) { ?>
                        <p><strong>Colección</strong><br><?php echo $fila['COLECCION']; ?></p>
                    <?php } ?>
                    <?php if ($fila['TEMATICA'] !== "0" && !is_null($fila['TEMATICA'])) { ?>
                        <p><strong>Temática</strong><br><?php echo $fila['TEMATICA']; ?></p>
                    <?php } ?>
                    <?php if ($fila['TITULO'] !== "0" && !is_null($fila['TITULO'])) { ?>
                        <p><strong>Título</strong><br><?php echo $fila['TITULO']; ?></p>
                    <?php } ?>
                    <?php if ($fila['DESC_PIEZA'] !== "0" && !is_null($fila['DESC_PIEZA'])) { ?>
                        <p><strong>Descripción de la pieza</strong><br><?php echo $fila['DESC_PIEZA']; ?></p>
                    <?php } ?>
                    <?php if ($fila['TECNICA_MANUFACTURA'] !== "0" && !is_null($fila['TECNICA_MANUFACTURA'])) { ?>
                        <p><strong>Técnica de manufactura</strong><br><?php echo $fila['TECNICA_MANUFACTURA']; ?></p>
                    <?php } ?>
                    <?php if ($fila['TIPOS_OBJETO'] !== "0" && !is_null($fila['TIPOS_OBJETO'])) { ?>
                        <p><strong>Tipo de objeto</strong><br><?php echo $fila['TIPOS_OBJETO']; ?></p>
                    <?php } ?>
                    <?php if ($fila['AUTOR'] !== "0" && !is_null($fila['AUTOR'])) { ?>
                        <p><strong>Autor</strong><br><?php echo $fila['AUTOR']; ?></p>
                    <?php } ?>
                    <?php if ($fila['TIPO_OBRA'] !== "0" && !is_null($fila['TIPO_OBRA'])) { ?>
                        <p><strong>Tipo de obra</strong><br><?php echo $fila['TIPO_OBRA']; ?></p>
                    <?php } ?>
                    <?php if ($fila['FECHA'] !== "0" && !is_null($fila['FECHA'])) { ?>
                        <p><strong>Fecha</strong><br><?php echo $fila['FECHA']; ?></p>
                    <?php } ?>
                    <?php if ($fila['ESTILO_TENDENCIA'] !== "0" && !is_null($fila['ESTILO_TENDENCIA'])) { ?>
                        <p><strong>Estilo-Tendencia</strong><br><?php echo $fila['ESTILO_TENDENCIA']; ?></p>
                    <?php } ?>
                    <?php if ($fila['MATERIAL'] !== "0" && !is_null($fila['MATERIAL'])) { ?>
                        <p><strong>Material</strong><br><?php echo $fila['MATERIAL']; ?></p>
                    <?php } ?>
                    <?php if ($fila['EPOCA'] !== "0" && !is_null($fila['EPOCA'])) { ?>
                        <p><strong>Época</strong><br><?php echo $fila['EPOCA']; ?></p>
                    <?php } ?>
                    <?php if ($fila['ESPECIE'] !== "0" && !is_null($fila['ESPECIE'])) { ?>
                        <p><strong>Especie</strong><br><?php echo $fila['ESPECIE']; ?></p>
                    <?php } ?>
                    <?php if ($fila['FAMILIA'] !== "0" && !is_null($fila['FAMILIA'])) { ?>
                        <p><strong>Familia</strong><br><?php echo $fila['FAMILIA']; ?></p>
                    <?php } ?>
                    <?php if ($fila['CATEGORIA'] !== "0" && !is_null($fila['CATEGORIA'])) { ?>
                        <p><strong>Categoria</strong><br><?php echo $fila['CATEGORIA']; ?></p>
                    <?php } ?>
                    <?php if ($fila['SUBCOLECCION'] !== "0" && !is_null($fila['SUBCOLECCION'])) { ?>
                        <p><strong>Subcolección</strong><br><?php echo $fila['SUBCOLECCION']; ?></p>
                    <?php } ?>
                    <?php if ($fila['TIPO_FOSIL'] !== "0" && !is_null($fila['TIPO_FOSIL'])) { ?>
                        <p><strong>Tipo de fósil</strong><br><?php echo $fila['TIPO_FOSIL']; ?></p>
                    <?php } ?>
                    <?php if ($fila['ERA_GEO'] !== "0" && !is_null($fila['ERA_GEO'])) { ?>
                        <p><strong>Era geográfica</strong><br><?php echo $fila['ERA_GEO']; ?></p>
                    <?php } ?>
                    <?php if ($fila['DETALLES_ACCESORIO'] !== "0" && !is_null($fila['DETALLES_ACCESORIO'])) { ?>
                        <p><strong>Detalles accesorio</strong><br><?php echo $fila['DETALLES_ACCESORIO']; ?></p>
                    <?php } ?>
                    <?php if ($fila['MATERIA_PRIMA'] !== "0" && !is_null($fila['MATERIA_PRIMA'])) { ?>
                        <p><strong>Materia prima</strong><br><?php echo $fila['MATERIA_PRIMA']; ?></p>
                    <?php } ?>
                    <?php if ($fila['ALTO'] !== "0" && !is_null($fila['ALTO'])) { ?>
                        <p><strong>Alto</strong><br><?php echo $fila['ALTO']; ?></p>
                    <?php } ?>
                    <?php if ($fila['LARGO'] !== "0" && !is_null($fila['LARGO'])) { ?>
                        <p><strong>Largo</strong><br><?php echo $fila['LARGO']; ?></p>
                    <?php } ?>
                    <?php if ($fila['ANCHO'] !== "0" && !is_null($fila['ANCHO'])) { ?>
                        <p><strong>Ancho</strong><br><?php echo $fila['ANCHO']; ?></p>
                    <?php } ?>
                    <?php if ($fila['ESPESOR'] !== "0" && !is_null($fila['ESPESOR'])) { ?>
                        <p><strong>Espesor</strong><br><?php echo $fila['ESPESOR']; ?></p>
                    <?php } ?>
                    <?php if ($fila['FONDO'] !== "0" && !is_null($fila['FONDO'])) { ?>
                        <p><strong>Fondo</strong><br><?php echo $fila['FONDO']; ?></p>
                    <?php } ?>
                    <?php if ($fila['PESO'] !== "0" && !is_null($fila['PESO'])) { ?>
                        <p><strong>Peso</strong><br><?php echo $fila['PESO']; ?></p>
                    <?php } ?>
                    <?php if ($fila['DIAMETRO'] !== "0" && !is_null($fila['DIAMETRO'])) { ?>
                        <p><strong>Diámetro</strong><br><?php echo $fila['DIAMETRO']; ?></p>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
$htmlResultados = ob_get_clean();

// Generar la paginación
ob_start();

// Calcular el número total de páginas
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

// Calcular el rango de páginas a mostrar
$rango = 10;
$rangoInicio = $paginaActual - floor($rango / 2);
$rangoFin = $paginaActual + floor($rango / 2);

// Ajustar el rango si está fuera de límites
if ($rangoInicio < 1) {
    $rangoInicio = 1;
    $rangoFin = min($totalPaginas, $rango);
}
if ($rangoFin > $totalPaginas) {
    $rangoInicio = max(1, $totalPaginas - $rango + 1);
    $rangoFin = $totalPaginas;
}

// Mostrar enlaces de paginación dentro del rango
if ($paginaActual > 1) {
    echo '<li class="page-item"><a class="page-link" href="#" onclick="cambiarPagina(1)">&laquo;</a></li>';
    echo '<li class="page-item"><a class="page-link" href="#" onclick="cambiarPagina(' . ($paginaActual - 1) . ')"><</a></li>';
}

for ($i = $rangoInicio; $i <= $rangoFin; $i++) {
    $active = ($i == $paginaActual) ? "active" : "";
    echo '<li class="page-item ' . $active . '"><a class="page-link" href="#" onclick="cambiarPagina(' . $i . ')">' . $i . '</a></li>';
}

if ($paginaActual < $totalPaginas) {
    echo '<li class="page-item"><a class="page-link" href="#" onclick="cambiarPagina(' . ($paginaActual + 1) . ')">></a></li>';
    echo '<li class="page-item"><a class="page-link" href="#" onclick="cambiarPagina(' . $totalPaginas . ')">&raquo;</a></li>';
}

$htmlPaginacion = ob_get_clean();

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

// Crear un array con el HTML de los resultados y la paginación
$response = array(
    'htmlResultados' => $htmlResultados,
    'htmlPaginacion' => $htmlPaginacion
);

// Devolver la respuesta como un JSON
echo json_encode($response);

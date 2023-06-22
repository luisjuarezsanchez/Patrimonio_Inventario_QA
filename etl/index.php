<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Plataforma acervo cultural</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/icons/escudo_armas.png" />
  <link rel="stylesheet" href="css/facetador.css">
  <!-- Bootstrap Icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
  <!-- SimpleLightbox plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link href="css/styles.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/paginacion.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</head>

<body class="container">

  <!-- Ventana emergente -->
  <!-- Modal -->
  <div class="modal fade" id="miVentanaEmergente" tabindex="-1" aria-labelledby="artworkModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="artworkModalLabel">Título de la obra de arte</h5>

        </div>
        <div class="modal-body">
          <img src="assets/img/bg-masthead.jpg" alt="Imagen de la obra de arte" class="img-fluid">
          <p>Descripción de la obra de arte...</p>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">

      <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto my-2 my-lg-0">

        </ul>
      </div>
    </div>
  </nav>

  <header class="header">
    <div class="logo">
      <img src="assets/img/header/estado.jpg" height="50" width="50" alt="Imagen no disponible">
    </div>
    <nav>
      <ul class="nav-links">

        <li id="producto2"><a href="#">PATRIMONIO CULTURAL</a></li>
      </ul>
    </nav>
  </header>
  <br>
  <br>

  <div class="container-lg">

    <!-- parallax -->
    <header class="masthead">
      <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
          <div class="col-lg-8 align-self-end">
            <h1 class="text-white font-weight-bold">TU LUGAR FAVORITO PARA NAVEGAR POR LOS MUSEOS</h1>
            <hr class="divider" />
          </div>
          <div class="col-lg-8 align-self-baseline">
            <p class="text-white-75 mb-5">Aquí podras encontrar información sobre los museos de tú interes y sus
              artesanias.<center> "Los museos son lugares donde el tiempo se transforma en espacio." -Orhan Pamuk</center>
            </p>
          </div>
        </div>
      </div>
    </header>
    <!--parallax -->
    <br>
    <br>
    <!-- content -->
    <div class="row align-items-start">
      <!-- Busqueda-->
      <section class="col-12 col-lg-3 col-md-3">
        <div class="right-menu px-4">
          <div class="right-menu-header p-2">
            <img src="assets/img/portfolio/elements/lupa-de-busqueda.png" width="30" height="30" alt="Imagen no disponible">
          </div>
          <div class="right-menu-content">
            <ul>
              <input type="search" placeholder="Busqueda">
            </ul>
          </div>
        </div>
      </section>
      <!-- content menu column-->

      <!-- content column -->
      <div class="col-12 col-lg-9 col-md-9">
        <!-- filtros -->
        <section class="row">
          <div id="filter-collection" class="filter col-12 col-md-3">
            <div class="filter-content px-1">
              <div class="text-center">
                <img src="assets/img/portfolio/elements/coleccion.png" height="60" width="60" alt="" />
              </div>
              <h3 class="h4 mb-2 text-center">Colección</h3>
              <div class="form-check">
                <input id="filter-collection-1" class="form-check-input" type="radio" name="filtro1" />
                <label class="form-check-label" for="filter-collection-1">
                  Arqueológico
                </label>
              </div>
              <div class="form-check">
                <input id="filter-collection-2" class="form-check-input" type="radio" name="filtro1" />
                <label class="form-check-label" for="filter-collection-2">
                  Virreinato
                </label>
              </div>
              <div class="form-check">
                <input id="filter-collection-3" class="form-check-input" type="radio" name="filtro1" />
                <label class="form-check-label" for="filter-collection-3">
                  Arte Moderno y Contemporaneo
                </label>
              </div>
              <div class="form-check">
                <input id="filter-collection-4" class="form-check-input" type="radio" name="filtro1" />
                <label class="form-check-label" for="filter-collection-4">
                  Culturas populares
                </label>
              </div>
            </div>
          </div>
          <div id="filter-museum" class="filter col-12 col-md-4">
            <div class="filter-content px-1">
              <div class="text-center">
                <img src="assets/img/portfolio/elements/museo.png" height="60" width="60" alt="" />
              </div>
              <h3 class="h4 mb-2 text-center">Museos</h3>
              <div class="form-check">
                <input id="filter-museum-1" class="form-check-input" type="radio" name="filtro2" />
                <label class="form-check-label" for="filter-museum-1">
                  Museo Virreinal de Zinacantepec
                </label>
              </div>
              <div class="form-check">
                <input id="filter-museum-2" class="form-check-input" type="radio" name="filtro2" />
                <label class="form-check-label" for="filter-museum-2">
                  Museo Arqueológico de Apaxco
                </label>
              </div>
              <div class="form-check">
                <input id="filter-museum-3" class="form-check-input" type="radio" name="filtro2" />
                <label class="form-check-label" for="filter-museum-3">
                  Museo de Arte Moderno del Estado de México
                </label>
              </div>
            </div>
          </div>
          <div id="filter-auhor" class="filter col-11 col-md-4">
            <div class="filter-content px-1">
              <div class="text-center">
                <img src="assets/img/portfolio/elements/frida-kahlo.png" height="60" width="60" alt="" />
              </div>
              <h3 class="h4 mb-2 text-center">Autor</h3>
              <div class="form-check">
                <input id="filter-author-1" class="form-check-input" type="radio" name="filtro3" />
                <label class="form-check-label" for="filter-author-1">
                  Maria de Jesús de Agreda, madre, 1602 - 1665
                </label>
              </div>
              <div class="form-check">
                <input id="filter-author-2" class="form-check-input" type="radio" name="filtro3" />
                <label class="form-check-label" for="filter-author-2">
                  Anónimo
                </label>
              </div>
            </div>
          </div>
        </section>
        <!-- filters -->


        <hr />

        <!-- Tarjetero -->
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
        $registrosPorPagina = 5;

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
          $carpeta = '../reg/';

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
                    echo '<div class="ccontainer">';
                    echo '<section class="row">'; //
                    echo '<div class="col-11"></div>'; //
                    echo '<div class="row py-2">'; //
                    echo '<div class="card">'; //
                    echo '<div class="row">'; //
                    echo '<div class="col-md-4">'; //
                    echo '<img src="' . '../' . $archivo . '" class="img-fluid rounded-start" alt="Imagén de obra no disponible" width="150" height="150" />'; //
                    echo '</div>'; //
                    echo '<div class="col-md-8">'; //
                    echo '<div class="card-body">'; //

                    // Recorrer los campos de la sección
                    foreach ($seccion['campos'] as $campo) {
                      $idCampo = $campo['idCampo'];
                      $valor = $campo['valor'];

                      // Verificar si el idCampo y valor cumplen con las características deseadas
                      if (isset($camposDeseados[$nombreSeccion][$idCampo])) {
                        $nombreCampo = $camposDeseados[$nombreSeccion][$idCampo];

                        // Imprimir el campo
                        if ($nombreCampo === 'Titulo/Nombre') {
                          echo '<h5 class="card-title">' . $valor . '</h5>'; //
                        }
                        if ($nombreCampo === 'Descripcion de la pieza') {
                          echo '<p class="card-text truncate-text">' . $valor . '</p>'; //
                        }
                        if ($nombreCampo === 'Archivos') {
                          // Obtener la extensión del archivo
                          $extension = pathinfo($valor, PATHINFO_EXTENSION);

                          // Verificar si la extensión está permitida
                          if (in_array($extension, ['jpg', 'jpeg', 'png'])) {
                            echo '<script>';
                            echo 'document.querySelector(".img-fluid").src = "' . $valor . '"class="img-fluid rounded-start";';
                            echo '</script>';
                          }
                        }
                      }
                    }
                    echo '<p class="card-text text-end">'; //
                    //echo '<a href="#" class="btn btn-warning">Ver</a>'; //
                    echo '';
                    echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#miVentanaEmergente">  <a href="#" class="btn" data-toggle="modal" data-target="#myModal">Ver</a></button>';
                    echo '</p>'; //
                    echo '</div>'; //
                    echo '</div>'; //
                    echo '</div>'; //
                    echo '</div>'; //
                    echo '</div>'; //
                    echo '</div>'; //
                    echo '</div>';
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
          for ($i = max(1, $paginaActual - 3); $i <= min($paginaActual + 19, $totalPaginas); $i++) {
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

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
          // Agrega el evento de clic al botón "Ver"
          document.addEventListener("DOMContentLoaded", function() {
            var verBtn = document.querySelector(".btn-warning");
            verBtn.addEventListener("click", function() {
              $("#myModal").modal("show"); // Muestra la ventana emergente al hacer clic en "Ver"
            });
          });
        </script>
        <!-- Tarjetero -->
        <br>

      </div>

      <!-- Carrusel -->
      <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6" aria-label="Slide 7"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="7" aria-label="Slide 8"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="assets/img/portfolio/thumbnails/arqueologico.jpg" class="d-block w-100" width="100" height="300" alt="Imagen no disponible">
            <div class="carousel-caption d-none d-md-block">
              <h5>Arqueológico</h5>
              <p>Comentario</p>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="assets/img/portfolio/thumbnails/historico.jpg" class="d-block w-100" width="100" height="300" alt="Imagen no disponible">
            <div class="carousel-caption d-none d-md-block">
              <h5>Histórico</h5>
              <p>Comentario</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/portfolio/thumbnails/moderno.jpg" class="d-block w-100" width="100" height="300" alt="Imagen no disponible">
            <div class="carousel-caption d-none d-md-block">
              <h5>Arte Moderno</h5>
              <p>Comentario</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/portfolio/thumbnails/natural.jpg" class="d-block w-100" width="100" height="300" alt="Imagen no disponible">
            <div class="carousel-caption d-none d-md-block">
              <h5>Historia Natural</h5>
              <p>Comentario</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/portfolio/thumbnails/numismatica.jpg" class="d-block w-100" width="100" height="300" alt="Imagen no disponible">
            <div class="carousel-caption d-none d-md-block">
              <h5>Numismática</h5>
              <p>Comentario</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/portfolio/thumbnails/popular.jpg" class="d-block w-100" width="100" height="300" alt="Imagen no disponible">
            <div class="carousel-caption d-none d-md-block">
              <h5>Arte Popular</h5>
              <p>Comentario</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/portfolio/thumbnails/virreinal.jpg" class="d-block w-100" width="100" height="300" alt="Imagen no disponible">
            <div class="carousel-caption d-none d-md-block">
              <h5>Virreinal</h5>
              <p>Comentario</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/portfolio/thumbnails/xix.jpg" class="d-block w-100" width="100" height="300" alt="Imagen no disponible">
            <div class="carousel-caption d-none d-md-block">
              <h5>Siglo XIX</h5>
              <p>Comentario</p>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!-- Datos -->
      </div>
      <!-- content column -->
    </div>
    <!-- content -->
  </div>
  <br>

  <!-- scripts -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <!-- scripts -->

  <!-- Footer -->
  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->

      <!-- Section: Form -->
      <section class="">
        <form action="">
          <!--Grid row-->
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
              <p class="pt-2">
                <strong>Suscribete a nuestra página</strong>
              </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-5 col-12">
              <!-- Email input -->
              <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example21" class="form-control" />
                <label class="form-label" for="form5Example21">Email address</label>
              </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-auto">
              <!-- Submit button -->
              <button type="submit" class="btn btn-outline-light mb-4">
                Subscribete
              </button>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </form>
      </section>
      <!-- Section: Form -->

      <!-- Section: Text -->
      <section class="mb-4">
        <p>
          Comentario.
        </p>
      </section>
      <!-- Section: Text -->

      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Conoce el estado</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Portal del Gobierno del Estado de México</a>
              </li>
              <li>
                <a href="#!" class="text-white">Quejas y Denuncias</a>
              </li>
              <li>
                <a href="#!" class="text-white">Comisión Estatal de Mejora Regulatoría</a>
              </li>
              <li>
                <a href="#!" class="text-white">Información Pública de oficio Mexiquense</a>
              </li>
              <li>
                <a href="#!" class="text-white">Solicitud de información</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Acerca del Sitio</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Contáctanos</a>
              </li>
              <li>
                <a href="#!" class="text-white">Mapa del sitio</a>
              </li>
              <li>
                <a href="#!" class="text-white">Avisos legales</a>
              </li>
              <li>
                <a href="#!" class="text-white">Acerca del sitio</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Contacto</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Patrimonio y Servicios Culturales</a>
              </li>
              <li>
                <a href="#!" class="text-white">Bulevar Jesús Reyes Heroles 302, Delegación San Buenaventura, Toluca.</a>
              </li>
              <li>
                <a href="#!" class="text-white">722 2 74 12 00 y 2 74 12 66</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Enlaces de interes</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Secretaría de Cultura y Turismo</a>
              </li>
              <li>
                <a href="#!" class="text-white">Turismo</a>
              </li>
              <li>
                <a href="#!" class="text-white">Deporte</a>
              </li>
              <li>
                <a href="#!" class="text-white">OSEM</a>
              </li>
              <li>
                <a href="#!" class="text-white">CEAPE</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->
    </div>
    <!-- Grid container -->


  </footer>
  <!-- Footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
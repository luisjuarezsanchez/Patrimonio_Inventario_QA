<?php
//Select a los filtros para de tematica, coleccion y autor
require 'controllers/selectFiltros.php';
?>

<!DOCTYPE html>
<html lang="es">
<!--Desplegando head de HTML, links,CDN, etc-->
<?php require 'viewelements/head.php' ?> 

<body class="container">
  <!--Desplegando cabecera de pagina-->
  <?php require 'viewelements/header.php' ?>
  <div class="container-lg">
    <!--Desplegando bandera del sitio-->
    <?php require 'viewelements/flag.php' ?>

    <!-- content -->
    <div class="row align-items-start">
      <!-- Busqueda-->
      <section class="col-12 col-lg-3 col-md-3">
        <div class="right-menu px-4">
          <div class="right-menu-header p-2">
            <img src="assets/img/portfolio/elements/lupa-de-busqueda.png" width="30" height="30" alt="Recurso no disponible">
          </div>
          <div class="right-menu-content">
            <ul>
              <input type="search" id="busqueda" value="" placeholder="Busqueda"><br>
              <button class="btn col-12 refresh-button" id="refresh-button">Reiniciar filtros</button>
            </ul>
          </div>
        </div>
      </section>
      <!-- content menu column-->
      <!-- content column -->
      <div class="col-12 col-lg-9 col-md-9">
        <!-- filtros -->
        <section class="row">
          <div id="filter-collection" class="filter col-12 col-md-4">
            <div class="filter-content px-1">
              <div class="text-center">
                <img src="assets/img/portfolio/elements/coleccion.png" height="60" width="60" alt="" />
              </div><br>
              <div class="col-12 text-center">
                <select id="filtro-col" class="form-select select-verde" aria-label="Default select example">
                  <option disabled selected value="">Colección</option>
                  <!--Escribiendo los resultados de selectFiltros.php-->
                  <?php echo $options; ?>
                </select>
              </div>
            </div>
          </div>
          <div id="filter-museum" class="filter col-12 col-md-4">
            <div class="filter-content px-1">
              <div class="text-center">
                <img src="assets/img/portfolio/elements/piramide-maya.png" height="60" width="60" alt="" />
              </div><br>
              <div class="col-12 text-center">
                <select id="filtro-tema" class="form-select select-blanco" aria-label="Default select example">
                  <option disabled selected value="">Temática</option>
                  <!--Escribiendo los resultados de selectFiltros.php-->
                  <?php echo $options2; ?>
                </select>
              </div>
            </div>
          </div>
          <div id="filter-auhor" class="filter col-12 col-md-4">
            <div class="filter-content px-1">
              <div class="text-center">
                <img src="assets/img/portfolio/elements/frida-kahlo.png" height="60" width="60" alt="" />
              </div><br>
              <div class="col-12 text-center">
                <select id="filtro-autor" class="form-select select-rojo" aria-label="Default select example">
                  <option disabled selected value="">Autor</option>
                  <!--Escribiendo los resultados de selectFiltros.php-->
                  <?php echo $options3; ?>
                </select>
              </div>
            </div>
          </div>
        </section>
        <!-- filters -->

        <hr />

        <!-- Tarjetero -->
        <section class="row" id="devolver">
          <div class="col-11">
            <div class="row py-2">
              <div class="col-md-12">
                <div class="form-group">

                </div>
              </div>
            </div>
            <div id="resultados" class="row py-2">
              <!-- Aquí se mostrarán los resultados -->
            </div>
            <div class="row">
              <div class="col-md-12">
                <!-- Paginación -->
                <nav aria-label="Paginación">
                  <ul id="paginacion" class="pagination justify-content-center">
                    <!-- Aquí se mostrará la paginación -->
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <!-- Tarjetero -->
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Recuerda usar la lupa de búsqueda</h4>
          <p>Puedes buscar los resultados por autor, título de la obra o descripción de la pieza</p>
          <hr>
          <p class="mb-0">Si deseas información adicional de los resultados puedes hacer clic en 'Ver'</p>
        </div>

        <script>
          document.getElementById('busqueda').addEventListener('input', function() {
            buscar(1, obtenerValorBusqueda()); // Cambiar a la primera página al realizar una nueva búsqueda
          });

          document.getElementById('filtro-col').addEventListener('change', function() {
            buscar(1, obtenerValorFiltro(), obtenerValorBusqueda()); // Cambiar a la primera página al realizar un nuevo filtro
          });

          document.getElementById('filtro-tema').addEventListener('change', function() {
            buscar(1, obtenerValorFiltro2(), obtenerValorBusqueda()); // Cambiar a la primera página al realizar un nuevo filtro
          });

          document.getElementById('filtro-autor').addEventListener('change', function() {
            buscar(1, obtenerValorFiltro3(), obtenerValorBusqueda()); // Cambiar a la primera página al realizar un nuevo filtro
          });



          // Función para obtener el valor del campo de búsqueda
          function obtenerValorBusqueda() {
            var busqueda = document.getElementById('busqueda').value;
            return busqueda.trim();
          }

          function obtenerValorFiltro() {
            var select = document.getElementById('filtro-col');
            var filtro = select.value;
            return filtro.trim();
          }

          function obtenerValorFiltro2() {
            var select = document.getElementById('filtro-tema');
            var filtro = select.value;
            return filtro.trim();
          }

          function obtenerValorFiltro3() {
            var select = document.getElementById('filtro-autor');
            var filtro = select.value;
            return filtro.trim();
          }

          // Función para realizar la búsqueda en tiempo real y cambiar de página
          function buscar(pagina, busqueda) {
            // Realizar la solicitud Ajax al servidor solo si se ha ingresado una búsqueda
            if (busqueda.trim() !== '') {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var response = JSON.parse(this.responseText);

                  // Actualizar los resultados solo si hay resultados de la búsqueda
                  if (response.htmlResultados.trim() !== '') {
                    document.getElementById("resultados").innerHTML = response.htmlResultados;
                  } else {
                    document.getElementById("resultados").innerHTML = '<h5>No se encontraron resultados</h5>';
                  }

                  // Actualizar la paginación solo si hay resultados de la búsqueda
                  if (response.htmlPaginacion.trim() !== '') {
                    document.getElementById("paginacion").innerHTML = response.htmlPaginacion;
                  } else {
                    document.getElementById("paginacion").innerHTML = '';
                  }
                }
              };
              xmlhttp.open("GET", "buscar.php?busqueda=" + encodeURIComponent(busqueda) + "&pagina=" + pagina, true);
              xmlhttp.send();
            } else {
              // Limpiar los resultados y la paginación si no hay una búsqueda
              document.getElementById("resultados").innerHTML = '';
              document.getElementById("paginacion").innerHTML = '';
            }
          }

          // ORIGINAL //
          // Función para cambiar de página al hacer clic en los enlaces de paginación
          /*function cambiarPagina(pagina) {
            var busqueda = obtenerValorFiltro();
            var busqueda = obtenerValorFiltro2();
            var busqueda = obtenerValorFiltro3();
            var busqueda = obtenerValorBusqueda();
            console.log("La variable se manda " + busqueda);
            buscar(pagina, busqueda);
          }*/


          // ORIGINAL //
          // Función para cambiar de página al hacer clic en los enlaces de paginación
          function cambiarPagina(pagina) {
            var busqueda1 = obtenerValorFiltro();
            var busqueda2 = obtenerValorFiltro2();
            var busqueda3 = obtenerValorFiltro3();
            var busqueda4 = obtenerValorBusqueda();

            console.log("Valor del filtro 1: " + busqueda1);
            console.log("Valor del filtro 2: " + busqueda2);
            console.log("Valor del filtro 3: " + busqueda3);
            console.log("Valor de la búsqueda: " + busqueda4);

            var busquedaValida;
            if (busqueda4 != '') {
              busquedaValida = busqueda4
              buscar(pagina, busquedaValida);

              busqueda1 = '';
              busqueda2 = '';
              busqueda3 = '';
            }

            if (busqueda1 != '') {
              busquedaValida = busqueda1
              buscar(pagina, busquedaValida);

              busqueda2 = '';
              busqueda3 = '';
              busqueda4 = '';
            }

            if (busqueda2 != '') {
              busquedaValida = busqueda2
              buscar(pagina, busquedaValida);

              busqueda3 = '';
              busqueda1 = '';
              busqueda4 = '';
            }

            if (busqueda3 != '') {
              busquedaValida = busqueda3
              buscar(pagina, busquedaValida);

              busqueda1 = '';
              busqueda2 = '';
              busqueda4 = '';
            }

          }

          // Realizar la búsqueda inicial al cargar la página
          buscar(1, obtenerValorBusqueda());

          // Evitar que se recargue la página al hacer clic en los enlaces de paginación
          document.getElementById('paginacion').addEventListener('click', function(event) {
            event.preventDefault();
            if (event.target.tagName === "A") {
              var pagina = event.target.getAttribute('href').split('=')[1];
              cambiarPagina(pagina);
            }
          });


          document.getElementById('refresh-button').addEventListener('click', function() {
            // Recargar la página completa
            location.reload();
          });
        </script>
        <br>
        <br>
        <?php require 'viewelements/carrusel.php' ?> 
      </div>
    </div>
    <br>

    <?php require 'viewelements/footer.php' ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <!--Incluyendo el las cabeceras de la pagina-->
  <?php include 'elements/header.php'; ?>
  <title>Inicio</title>
</head>

<body>
  <!--Incluyendo el NavBar-->
  <?php include 'elements/navbar.php'; ?>

  <form class="row g-3">
    <div class="col-md-7">
      <label class="form-label">Nombre del proyecto</label><br>
      <input type="text" required>
    </div>

    <div class="col-md-7">
      <label for="validationServer02" class="form-label">Descripción</label><br>
      <input type="text" required>
    </div>

    <div class="mb-4">
      <label class="form-label">Imagen</label>
      <input class="form-control" type="file" id="formFile">
    </div>

    <div class="col-12">
      <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
  </form>

  <!--Incluyendo el footer de la página-->
  <?php include 'elements/footer.php'; ?>
</body>

</html>
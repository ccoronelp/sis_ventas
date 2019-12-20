<?php 
include_once("bd_conexion/conexion.php");
$errores = "";

if ($_POST) {
  $rol="cliente";
  $email=$_POST['email'];
  $nombres=$_POST['nombres'];
  $apellidos=$_POST['apellidos'];
  $password1=$_POST['password1'];
  $password2=$_POST['password2'];
  // echo "$email - $nombres - $apellidos - $password1 - $password2";
  if ($password1!=$password2) {
    $errores="Las contraseñas ingresadas no son iguales<br>";
  }else{
    $valor = ModeloUsuario::insertarUsuario($nombres,$apellidos,$email,$password1,$rol);
    if ($valor) {
      $errores="Se registró correctamente";
    }else{
      $errores="No se insertó";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | Sistema ventas</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets//vendors/iconfonts/mdi/css/materialdesignicons.css" />
    <link rel="stylesheet" href="assets//vendors/css/vendor.addons.css" />
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets//css/shared/style.css" />
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="assets//css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="assets//images/favicon.ico" />
  </head>
  <body>
    <div class="authentication-theme auth-style_1">
      <div class="row">
        <div class="col-12 logo-section">
          <a href="../sis_ventas" class="logo">
            <img src="assets/images/logo.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
          <div class="grid">
            <div class="grid-body">
              <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">

                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                      <div class="form-group input-rounded">
                      <?php if ($errores!=""): ?>
                      <button class="btn btn-sm btn-primary">
                        <?php echo $errores; ?>
                      </button>
                      <?php endif ?>
                    </div>

                    <div class="form-group input-rounded">
                      <input type="email" name="email" class="form-control" placeholder="Correo" required />
                    </div>
                    <div class="form-group input-rounded">
                      <input type="text" name="nombres" class="form-control" placeholder="Nombres" required />
                    </div>
                    <div class="form-group input-rounded">
                      <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required />
                    </div>
                    <div class="form-group input-rounded">
                      <input type="password" name="password1" class="form-control" placeholder="Contraseña" required />
                    </div>
                    <div class="form-group input-rounded">
                      <input type="password" name="password2" class="form-control" placeholder="Repetir Contraseña" required />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> Registrar </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="auth_footer">
        <p class="text-muted text-center">© Ventas 2019</p>
      </div>
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="assets//vendors/js/core.js"></script>
    <script src="assets//vendors/js/vendor.addons.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="assets//js/template.js"></script>
    <!-- endbuild -->
  </body>
</html>
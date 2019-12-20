<?php
session_start();
require_once('bd_conexion/conexion.php');
if (isset($_SESSION['usuario'])) {
  header("Location:index.php");
}else{
  $errores="";
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $usuario=filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
    $password=$_POST['password'];

    // echo "$usuario - $password";
    $resultado = ModeloUsuario::traerUsuario($usuario,$password);

    // var_dump($resultado);
    if ($resultado['rol']=="admin") {
      $_SESSION['admin']=$usuario;
      $_SESSION['nombre'] = $resultado['u_nombres'].' '.$resultado['u_apellidos'];
      $_SESSION['id_cliente']=$resultado['id'];
      header("Location:index.php");
    }elseif($resultado['rol']=="cliente"){
      $_SESSION['cliente']=$usuario;
      $_SESSION['nombre'] = $resultado['u_nombres'].' '.$resultado['u_apellidos'];
      $_SESSION['id_cliente']=$resultado['id'];
      // $_SESSION['email']=$resultado['usuario'];
      header("Location:index.php");
    }else{
      $errores = "Datos incorrectos";
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
          <a href="#" class="logo">
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
                      <input type="text" name="usuario" class="form-control" placeholder="Usuario" />
                    </div>
                    <div class="form-group input-rounded">
                      <input type="password" name="password" class="form-control" placeholder="Contraseña" />
                    </div>
                    <div class="form-inline">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" class="form-check-input" />Recuérdame<i class="input-frame"></i>
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
                  </form>
                  <div class="signup-link">
                    <p>Notdavía no tienes cuenta</p>
                    <a href="registro.php">Registrarse</a>
                  </div>
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
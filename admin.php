<?php
session_start();
include "conexion.php";
$varsesion = $_SESSION['correo'];
if ($varsesion) {
}

$consulta = "SELECT * FROM usuarios WHERE correo='$varsesion'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);

if ($filas['rol_id'] == 2) {
    // header('location:cerrar-sesion.php');
    echo '<script>
    alert("ACCESO DENEGADO");
    window.location = "inicio.php";
    </script>';
}else{
    if ($filas['rol_id'] == 1) {
        # code...
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Litografía S&T - Administración</title>

    <!-- Fuentes personalizadas para esta plantilla -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Estilos personalizados para esta plantilla -->
    <link href="css/all.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/icon-whatsapp.css" rel="stylesheet">
    <link href="img/icon.png" rel="icon">

</head>

<body id="page-top">

    <!-- Envoltorio de página -->
    <div id="wrapper">

        <!-- Barra lateral -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Barra lateral - Marca -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-stripe-s"></i>&<i class="fab fa-tumblr"></i>
                </div>
            </a>
            <!-- <br><br> -->
            <!-- Divisor -->
            <hr class="sidebar-divider my-0">

            <!-- Elemento de navegación - Panel -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-users-cog"></i>
                    <span>Administración S&T</span></a>
            </li>

            <!-- Divisor -->
            <hr class="sidebar-divider">

            <!-- Título -->
            <div class="sidebar-heading">
                MENU
            </div>

            <!-- Elemento de navegación - Páginas del Menu -->
            <li class="nav-item">
                <a class="nav-link" href="register-admin.php" data-toggle="" data-target="" aria-expanded="true" aria-controls="">
                    <i class="fas fa-user-plus"></i>
                    <span>Crear Administrador</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="tabla-usuarios.php" data-toggle="" data-target="" aria-expanded="true" aria-controls="">
                    <i class="fa fa-user-cog"></i>
                    <span>Gestionar Usuarios</span>
                </a>
            </li>

            <!-- Divisor -->
            <hr class="sidebar-divider">

            <!-- Título -->
            <div class="sidebar-heading">
                Añadido
            </div>

            <!-- Elemento de navegación - Tienda -->
            <li class="nav-item">
                <a class="nav-link" href="shop/admin/panel.php">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Gestionar Tienda</span></a>
            </li>

            <!-- Divisor -->
            <hr class="sidebar-divider d-none d-md-block">
            <br><br>
            <!-- Barra lateral Palanca (Barra lateral) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- Fin de la Barra lateral -->

        <!-- Contenedor de contenido -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Contenido principal -->
            <div id="content">

                <!-- Barra superior -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Barra lateral Palanca (Barra superior) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Barra superior Barra de navegación -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">
                                <spam class="text-gray-500">Inicio</spam>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Elemento de navegación - Información del cliente -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline text-gray-600">
                                    <!-- AQUI SE MUESTRA SI ES ADMIN O CLIENTE DESDE LA BASE DE DATOS -->
                                    <div class="posicion">
                                        <?php
                                        if ($varsesion and $filas['rol_id'] == 1) {
                                            echo "Administrador";
                                        }
                                        // if ($varsesion and $filas['rol_id'] == 2) {
                                        //     echo "Cliente";
                                        // }
                                        ?>
                                    </div>
                                    <div class="posicion2">
                                        <?php
                                        // $varsesion = $_SESSION['correo'];
                                        if ($varsesion) {
                                            echo $filas['nombre']," ",$filas['apellido'];
                                        } ?>
                                    </div>
                                </span>
                                <img class="img-profile rounded-circle" src="img/logo.jpg">
                            </a>
                            <!-- Desplegable - Información del cliente -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="perfil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>

                                <div class="dropdown-divider"></div> -->
                                
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- Fin de la barra superior -->

                <!-- Contenido de la página de inicio -->

                <!-- Fin del contenido principal -->

                <!-- Formulario Cotización -->

                <!-- Fin del formulario Cotización -->

            </div>
            <!-- Pie de página -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span><b>Copyright &copy; Servicio&Troquelados 2021</b></span>
                    </div>
                </div>
            </footer>
            <!-- Fin del pie de página -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Listo para salir?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Seleccione "Cerrar sesión" si está listo para finalizar su sesión actual.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="cerrar-sesion.php">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="js/app.js"></script>

</body>

</html>
<?php
}if ($varsesion == null || $varsesion = '') {
    echo '<script>
    alert("ACCESO DENEGADO");
    window.location = "login.php";
    </script>';
    die();
}}
?>
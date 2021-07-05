<?php
session_start();
include "conexion.php";
$varsesion = $_SESSION['correo'];
if ($varsesion) {
} elseif ($varsesion == null || $varsesion = '') {
    echo '<script>
    alert("Inicia sesión para acceder a la plataforma.");
    window.location = "login.php";
    </script>';
    die();
}

$consulta  = "SELECT * FROM usuarios WHERE correo='$varsesion'";
$resultado = mysqli_query($conexion, $consulta);
$filas     = mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Litografía S&T - Inicio</title>

    <!-- Fuentes personalizadas para esta plantilla -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Estilos personalizados para esta plantilla -->
    <link href="css/all.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/form-cotizacion.css" rel="stylesheet">
    <link href="css/icon-whatsapp.css" rel="stylesheet">
    <link rel="stylesheet" href="css/productos-destacados.css">
    <link href="img/icon.png" rel="icon">

</head>

<body id="page-top">

    <!-- Envoltorio de página -->
    <div id="wrapper">

        <!-- Barra lateral -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Barra lateral - Marca -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="inicio.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-stripe-s"></i>&<i class="fab fa-tumblr"></i>
                </div>
            </a>

            <!-- Divisor -->
            <hr class="sidebar-divider my-0">

            <!-- Elemento de navegación - Panel -->
            <li class="nav-item active">
                <a class="nav-link" href="inicio.php">
                    <i class="fas fa-house-user"></i>
                    <span>Litografía <!-- S&T --></span></a>
            </li>

            <!-- Divisor -->
            <hr class="sidebar-divider">

            <!-- Título -->
            <div class="sidebar-heading">
                MENU
            </div>

            <!-- Elemento de navegación - Páginas del Menu -->
            <li class="nav-item">
                <a class="nav-link" href="clientes.php" data-toggle="" data-target="" aria-expanded="true" aria-controls="">
                    <i class="fas fa-user-friends"></i>
                    <span>Clientes</span>
                </a>
            </li>

            <!-- Elemento de navegación - Nuestros Productos del Menu -->
            <li class="nav-item">
                <a class="nav-link" href="nuestros-productos.php" data-toggle="" data-target="" aria-expanded="true" aria-controls="">
                    <i class="fab fa-product-hunt"></i>
                    <span>Nuestros Productos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="muestras-realizadas.php" data-toggle="" data-target="" aria-expanded="true" aria-controls="">
                    <i class="far fa-eye"></i>
                    <span>Muestras Realizadas</span>
                </a>
            </li>

            <!-- Divisor -->
            <hr class="sidebar-divider">

            <!-- Título -->
            <div class="sidebar-heading">
                Añadido
            </div>

            <!-- Elemento de navegación - Videos del Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="" data-target="" aria-expanded="true" aria-controls="">
                    <i class="fab fa-youtube"></i>
                    <span>Videos</span>
                </a>
            </li>

            <!-- Elemento de navegación - Tienda -->
            <li class="nav-item">
                <a class="nav-link" href="shop/index.php">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Tienda</span></a>
            </li>

            <!-- Divisor -->
            <hr class="sidebar-divider d-none d-md-block">

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
                            <a class="nav-link" href="inicio.php">
                                <spam class="text-gray-500">Inicio</spam>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="quienes-somos.php">
                                <spam class="text-gray-500">¿Quienes somos?</spam>
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

if ($varsesion and $filas['rol_id'] == 2) {
    echo "Usuario";
}

?>
                                    </div>
                                    <div class="posicion2">
                                        <?php
$varsesion = $_SESSION['correo'];
if ($varsesion) {
    echo $filas['nombre'], " ", $filas['apellido'];
}?>
                                    </div>
                                </span>
                                <img class="img-profile rounded-circle" src="img/logo.jpg">
                            </a>
                            <!-- Desplegable - Información del cliente -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>

                               <!--  <a class="dropdown-item" href="admin.php">
                                    <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Administración
                                </a> -->
                                <div class="dropdown-divider"></div>
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
                <div class="container-fluid">

                    <!-- Encabezado de pagina -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">¡Bienvenido(a)!</h1>
                    </div>

                    <!-- Contenido principal - Carousel-->
                    <header>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">

                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                </li>

                                <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                </li>

                            </ol>

                            <div class="carousel-inner" role="listbox">
                                <!-- Diapositiva uno: establezca la imagen de fondo para esta diapositiva en la línea siguiente -->
                                <div class="carousel-item active" style="background-image: url('img/carousel/publicidad_impresa.gif');">
                                </div>
                                <!-- Diapositiva uno: establezca la imagen de fondo para esta diapositiva en la línea siguiente -->
                                <div class="carousel-item" style="background-image: url('img/carousel/impresion_gran_formato.jpg');">
                                </div>

                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true">
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>

                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true">
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                    </header>
                    <p>
                        <!-- Fin del carousel -->

                        <!-- Información S&T -->
                    <div class="wpb_text_column wpb_content_element">
                        <div class="wpb_wrapper">
                            <p style="text-align: center;">
                                <span style="color: white; font-size: 24pt;">
                                    <strong>SOMOS EXPERTOS EN TODAS LAS AREAS DE IMPRESIÓN.</strong>
                                </span>
                            </p>
                        </div>
                    </div>

                    <p style="font-size: large;"><b>SERVICIO & TROQUELADOS</b> Es una Litografía de Medellín, Lleva 20 años ofreciendo un amplio catálogo de productos impresos como, Troquelados, Adhesivos, Etiquetas, y todo tipo de material impreso y publicitario. En efecto contamos con la confianza de nuestros clientes y lo satisfacemos con la excelencia en nuestro trabajo apoyados en años de experiencia. Brindamos soluciones integrales en todas las areas publicitarias. Nuestra calidad y compromiso son nuestro sello de buena atención.<p>

                    <div class="first">
                        <p class="big"><i class="fas fa-thumbs-up"></i><br><b>TRABAJOS GARANTIZADOS</b><br>Además productos elaborados con los mayores estandares de calidad.</p>

                        <p class="big"><i class="fas fa-star"></i><br><b>AMPLIO CATÁLOGO</b><br>A partir de gran variedad de productos impresos, publicidad y souvenires.</p>

                        <p class="big"><i class="fas fa-phone-square"></i><br><b>COTIZACIÓN SIN COMPROMISO</b><br>En primer lugar en el menor tiempo posible serás contactado.</p>
                    </div><br>

                        <h3><b>NUESTROS PRODUCTOS DESTACADOS</b></h3>
                        <p>

                        <h5 class="h5style">NOS DESTACAMOS POR NUESTRA EXPERIENCIA EN LA FABRICACIÓN DE ESTOS PRODUCTOS...</h5>
                        <br>

                        <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="img/destacados/8.jpg">
                    <div class="card-text">
                        <h4>PENDONES</h4>
                        <!-- <h5>Programmer</h5> -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="img/destacados/7.jpg">
                    <div class="card-text">
                        <h4>ADHESIVOS</h4>
                        <!-- <h5>Programmer</h5> -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="img/destacados/6.jpg">
                    <div class="card-text">
                        <h4>ETIQUETAS</h4>
                        <!-- <h5>Programmer</h5> -->
                    </div>
                </div>
                <p>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="img/destacados/5.jpg">
                    <div class="card-text">
                        <h4>PAPELERIA DE <br>OFICINA</h4>
                        <!-- <h5>Programmer</h5> -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="img/destacados/4.jpg">
                    <div class="card-text">
                        <h4>VOLANTES</h4>
                        <!-- <h5>Programmer</h5> -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <img src="img/destacados/3.jpg">
                    <div class="card-text">
                        <h4>TARJETAS DE <br>PRESENTACIÓN</h4>
                        <!-- <h5>Programmer</h5> -->
                    </div>
                </div>
            </div>
        </div>
    </div><br>

        <div class="wpb_text_column wpb_content_element">
            <div class="wpb_wrapper">
                <p style="text-align: center;"><span style="color: #FFF; font-size: 28pt;"><strong>TU MARCA EN LAS MEJORES MANOS</strong></span></p>
            </div>
        </div>

        <div class="first2">
            <div class="row">
                <div class="col-5" align="justify">
                    <h4 style="color: #4e73df; font-weight: bold;">NUESTROS VALORES</h4>
                        <strong><li style="font-size: large;">Responsabilidad</li></strong>
                        <strong><li style="font-size: large;">Agilidad</li></strong>
                        <strong><li style="font-size: large;">Calidad</li></strong>
                        <strong><li style="font-size: large;">Creatividad Innovación</li></strong>
                        <strong><li style="font-size: large;">Eficiencia</li></strong>
                        <strong><li style="font-size: large;">Servicialidad</li></strong>
                </div>

                <div class="col-7" align="justify">
                    <a style="text-decoration:none; color: gray;" href="inicio.php"><h3 style="text-align: left;"><b>Litografía Medellín</b></h3></a>
                    <h5 style="color: #4e73df; font-weight: bold;">EN SERVICIO & TROQUELADOS LA PRIORIDAD ES USTED.</h5>
                        <p style="font-size: large;">Queremos causar un aire de confianza suficiente para fidelizar nuestros clientes, y asi lograr que sigamos acompañando su proceso. De esta forma en <b>SERVICIO & TROQUELADOS</b> nuestro servicio no acaba cuando se cierra el acurdo, sino seguidamente hasta ver al cliente satisfecho con el producto entregado.</p>
                </div>

            </div>
        </div>

                    <h1><b>Impresión GTO | Descolillado | Laminados | Brillo UV</b></h1>
                </div><p>
                <!-- Fin del contenido principal -->

                <!-- Formulario Cotización -->
                <div class="contenedor">

                    <h1><b><!-- SOLICITA TU COTIZACIÓN -->INFORMACIÓN DE CONTACTO</b></h1>

                    <div class="contenido">

                        <div class="info"><br>

                            <div class="col">
                                <i class="icono fas fa-map-marker-alt"></i>
                                <p>Calle 53 # 53-67, Medellín, Antioquia</p>
                            </div>

                            <div class="col">
                                <i class="icono fas fa-envelope"></i>
                                <p><a href="mailto:" style="color: white;">serviciotroquelados@gmail.com</a></p>
                            </div>

                            <div class="col">
                                <i class="icono fas fa-phone"></i>
                                <p>(034) 512 27 50<br> (+57) 304 657 10 63</p>
                            </div>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.079121623702!2d-75.57209328573423!3d6.253305827981455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4428fea205b807%3A0x128e86fdf8bca53c!2sCl.%2053%20%2353-67%2C%20Medell%C3%ADn%2C%20Antioquia!5e0!3m2!1ses!2sco!4v1616803404240!5m2!1ses!2sco" width="380" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                        </div>

                        <form action="enviar.php" method="POST" class="formulario"><br>

                            <input type="text" name="nombre" placeholder="Nombres*" id="nombre">
                            <input type="text" name="contacto" placeholder="Telefono/Celular" id="contacto">
                            <input type="text" name="correo" placeholder="Correo electróico*" id="correo">
                            <textarea name="mensaje" id="mensaje" placeholder="Mensaje*"></textarea>
                            <button type="button" onclick="validarFormulario()"><b>ENVIAR</b></button>


                        </form>
                        <!--container-redes-sociales-->
                        <div class="container-redes">
                            <a href="https://api.whatsapp.com/send?phone=+573182030701&text=¿En qué te puedo ayudar?" target="_blank">
                                <img src="img/icono-whatsapp.png" title="Enviar mensaje de WhatsApp" alt="">
                            </a>
                        </div>

                    </div>

                </div>
                <!-- Fin del formulario Cotización -->

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
            <!-- End of Content Wrapper -->

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
<?php
session_start();
include "conexion.php";
$varsesion = $_SESSION['correo'];
if ($varsesion) {
}

$consulta = "SELECT * FROM usuarios WHERE correo='$varsesion'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Litografía S&T - ¿Quienes Somos?</title>

    <!-- Fuentes personalizadas para esta plantilla -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Estilos personalizados para esta plantilla -->
    <link href="css/all.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/form-cotizacion.css" rel="stylesheet">
    <link href="css/icon-whatsapp.css" rel="stylesheet">
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
                    <span>Litografía</span></a>
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
                <a class="nav-link" href="#">
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
                    <h3><b>SERVICIO & TROQUELADOS</b></h3>

                    <p style="font-size: large;">Es una empresa enfocada en la elaboración de productos publicitarios y litográficos de alta calidad, constituida desde el 2008. Con el fin de proporcionar soluciones creativas y de alta calidad a empresas y empresarios independientes.
                    nos afirmamos en el crecimiento de nuestros clientes a través de productos y estrategias que permitan ofrecer soluciones optimas, contamos con un equipo de personas con amplia experiencia, trayectoria, compromiso y formación, esto nos impulsa a proyectarnos como una empresa innovadora y a la vanguardia de productos.
                    Teniendo un amplio catálogo con el fin de ofrecer soluciones integrales que generen afinidad, impacto y total credibilidad de nuestros clientes.</p>

                    <h3><b>SERVICIO AL CLIENTE</b></h3>

                    <div class="first2">
                        <div class="row">
                            <div class="col-6" align="justify" style="font-size: large;">
                                Dentro de nuestros servicios, buscamos tener la mejor progresión de productos como también tener la mejor profesionalidad, que haga de nuestro trabaje algo mas impecable y que pueda tener en sus manos. Ya que en Servicio & Troquelado, tenemos la esencia particular, de tener como característica, el trabajo que se desempeña dentro de nuestra empresa, el cual le dejamos nuestro gran esfuerzo y pasión por realizar cada terminación con la mejor presentación.
                            </div>

                            <div class="col-6" align="justify" style="font-size: large;">
                                Siempre se hace lo posible para tener y tomar su opinión como también, buscamos la mejor modernización, y hacemos una propuesta para hacer en conjunto con la mejor comunicación y confianza, un trabajo en equipo. Ya que todos nuestros clientes, nos inspiran a desarrollar y a desafiar a través de los retos que dia a día emprendemos a través de nuestro trabajo. Lo que nos ayuda siempre a tener un gran aprendizaje por medio de nuestro trabajo.
                            </div>
                        </div>
                    </div><p>

                    <div class="first2"> 
                        <div class="row">
                            <div class="col-6" align="justify" style="font-size: large;">
                                <h3 style="text-align: center;"><b>MISIÓN</b></h3>

                                Elaborar productos publicitarios y litograficos que garantizen óptima calidad y cumplimiento, innovando con productos creativos y vanguardistas que generen alto valor agregado asegurando la satisfacción de nuestros clientes.
                            </div>

                            <div class="col-6" align="justify" style="font-size: large;">
                                <h3 style="text-align: center;"><b>VISIÓN</b></h3>

                                Se destacará en el pais como una de las mejores litografias por su portafolio de servicios, elevada calidad y tiempo de entrega mas ágil para situarnos como una de las empresas con mayor crecimiento a nivel nacional.
                            </div>
                        </div>
                    </div><br>

                    <h1><b>Propositos | Inspira & Motiva | Crea Estrategias | Claridad | Reconocimiento | Comodidad & Seguridad | Técnica | Estrategias | Cultura | Beneficios</b></h1>



                    <!-- AQUI VA LA INFOMACIÓN -->

                </div><br> <!-- DIV DEL ENCABEZADO DE PAGINA -->
                <!-- Fin del contenido principal -->

                <!-- Formulario Cotización -->
                <div class="contenedor">

                    <h1><b>INFORMACIÓN DE CONTACTO</b></h1>

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
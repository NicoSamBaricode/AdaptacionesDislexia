<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Adaptaciones Colegio Woodville</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <img src="../TrabajoFinal/assets/img/logoWoodvilleA.png" alt="" style="max-height: 3rem;">
        <a class="navbar-brand ps-3" href="index.php">Adaptaciones Woodville</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle imprimir" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Imprimir <i class="fas fa-print fa-fw"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">mail <i class="fas fa-envelope-open-text fa-fw"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ayuda <i class="fa fa-question-circle fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" id="pautas" href="#!">Ver Tips y Pautas Generales</a>
                    </li>
                    <!-- <li><a class="dropdown-item" href="#!">Logout</a></li> -->
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- <div class="sb-sidenav-menu-heading">Adaptaciones</div> -->
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-columns"></i>
                            </div>
                            Adaptar Contenido
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#" id="ingresarContenido">Ingresar Contenido</a>
                                <a class="nav-link" href="#" id="generarAutomatico">Generar Automaticamente</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div> -->
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 imagenFondo " style="height: 100vh">
                    <div class="row">
                        <div class="col-xl-12" id="contenido">
                            <!-- aca imprime el cont -->
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">
                            Copyright &copy; Prototipado Tecnologico Nicolas Sammarco
                        </div>
                        <div>
                           
                            &middot;
                            <a href="terminosYCondiciones" id="terminos">Terminos &amp; Condiciones</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="js/gestorContenido.js"></script> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            cargarContenidoIndex()
            $("#ingresarContenido").on("click", function() {
                 event.preventDefault();
                 cargarContenidoIngresar();
             });
             $("#pautas").on("click", function() {
                 event.preventDefault();
                 cargarPautas()
             });
            
            $("#generarAutomatico").on("click", function() {
                 event.preventDefault();
                 cargarGenerarContenido()
            });
            $("#terminos").on("click", function() {
                 event.preventDefault();
                 cargarTerminos()
            });
            
           
        });
    </script>
</body>

</html>
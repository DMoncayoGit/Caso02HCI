<?php include('idioma/idioma.php'); ?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>"> 
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema de Gestón de Eventos</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="dashboard/css/styles.css" rel="stylesheet" />
        <link href="dashboard/css/estilo.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .bg-custom {
              background-color: #800080; /* Color morado del Botón*/
            }
        </style>

    </head>
    <body class="sb-nav-fixed">
        
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar -->
            <a class="navbar-brand ps-3" href="index.php">S.G.E</a>
            <!-- Sidebar Toggle-->
            <button class="btn " id="sidebarToggle" ><i class="fas fa-bars" ></i> Menu </button>  
        		
            <div class="navbar-nav  " >
                <a class="nav-link" href="?lang=es">
                    <img src="dashboard/assets/img/ecuador.png" alt="Bandera-ECU" style="width: 40px; height: 20px;">
                    Español
                </a>
                <a class="nav-link" href="?lang=en">
                    <img src="dashboard/assets/img/united-states.png" alt="Bandera-USA" style="width: 30px; height: 20px;">
                    English
                </a>
            </div>
		
		</nav>

        <div id="layoutSidenav">

            <!-- Menú -->
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading "><?php echo $lang['titulotransparente01'];   ?></div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <?php echo $lang['titulo01'];   ?>
                            </a>
                            
                            <div class="sb-sidenav-menu-heading "><?php echo $lang['titulotransparente02'];   ?></div>
                                
                            <a class="nav-link" href="indexEventos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                <?php echo $lang['titulo02'];   ?>
                            </a>
                            <a class="nav-link" href="indexUbicaciones.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <?php echo $lang['titulo03'];   ?>
                            </a>
                            <a class="nav-link" href="indexContactos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                <?php echo $lang['titulo04'];   ?>
                            </a>
                            <a class="nav-link" href="indexTutorial.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                                <?php echo $lang['titulo05'];   ?>
                            </a>
                        </div>
						
							
                    </div>
					
                    <!-- Footer del Menú -->
                    <div class="sb-sidenav-footer">
                        <img alt="Logo del Sistema"src="dashboard/assets/img/sge-blanco.png" height="100" width="125">
                    </div>

                </nav>
				
            </div>

             <!-- Contenido Principal -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
                        <h1 class="mt-4" align="center"><?php echo $lang['tituloprincipal'];   ?></h1>
                        
                        <div class="container">

                            <!-- Texto -->
                            <div class="columna-contenido">
                              <p><?php echo $lang['contenido01'];   ?></p> 
                              <ul>
                                  <li><strong><?php echo $lang['li1'];   ?></strong> <?php echo $lang['li1datos'];   ?></li> 
                                  <li><strong><?php echo $lang['li2'];   ?></strong> <?php echo $lang['li2datos'];   ?></li> 
                                  <li><strong><?php echo $lang['li3'];   ?></strong> <?php echo $lang['li3datos'];   ?></li> 
                              </ul> 
                              <p><?php echo $lang['contenido02'];   ?></p>
                              <p><?php echo $lang['contenido03'];   ?></p>
                            </div>
                          
                            <!-- Gráfica -->
                            <div class="columna-grafica" align="center">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        <?php echo $lang['proyecciones'];   ?>
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="45"></canvas></div>
                                </div>
                                <!--iframe width="590" height="330" src="https://www.youtube.com/embed/4WK5aC8dwRw?si=R08Xhtg-YDz9n16-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe-->
                            </div>
                        </div>

                        <!-- Tarjetas -->
                        <div class="row" align="center" style="display: flex; justify-content: center; align-items: center;" >
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><?php echo $lang['eventos'];   ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="indexEventos.php"><?php echo $lang['detalles'];   ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-custom text-white mb-4">
                                    <div class="card-body"><?php echo $lang['ubicaciones'];   ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="indexUbicaciones.php"><?php echo $lang['detalles'];   ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><?php echo $lang['contactos'];   ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="indexContactos.php"><?php echo $lang['detalles'];   ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </main>

                <!-- Footer --> 
                <footer class="py-4 bg-light mt-auto">
                    <div class="text-muted" style="width: 100%; text-align: center;" >
                        <p class = "footer">Copyright &copy; Caso Práctico 2 - DMoncayo 2024</p> 
                    </div>
                </footer>
            </div>
        </div>

         <!-- jQuery, DataTables y Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="dashboard/js/scripts.js"></script>
        <script src="dashboard/assets/demo/chart-bar-demo.js"></script>

    </body>
    
</html>

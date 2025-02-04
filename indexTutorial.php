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
            .container-video { /*Centrar el video*/
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
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
                            <div class="sb-sidenav-menu-heading"><?php echo $lang['titulotransparente01'];   ?></div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <?php echo $lang['titulo01'];   ?>
                            </a>
                            
                            <div class="sb-sidenav-menu-heading"><?php echo $lang['titulotransparente02'];   ?></div>
                                
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
                        <br>

                        <div class="container container-video">
                            <!--iframe width="800" height="400" src="https://www.youtube.com/embed/4WK5aC8dwRw?si=R08Xhtg-YDz9n16-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe--> 
                            <iframe width="800" height="400" src="dashboard/assets/video/HCITutorial.mp4" title="YouTube video player" ></iframe> 
                        </div>

                    </div>
                </main>

                <!-- Footer --> 
                <footer class="py-4 bg-light mt-auto">
                    <div class="text-muted" style="width: 100%; text-align: center;" >
                        <p>Copyright &copy; Caso Práctico 2 - DMoncayo 2024</p> 
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

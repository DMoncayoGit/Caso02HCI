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
        <title>Ubicaciones</title>
        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- DataTables -->
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="dashboard/css/styles.css" rel="stylesheet" />
        <!--link href="dashboard/css/estilo.css" rel="stylesheet" /-->
        <link href="public_html/css/estiloUbicaciones.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        
    </head>

    <body >
       
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

                        <h1 class="mt-4" align="center"><?php echo $lang['listado01'];   ?></h1>
                        
                        <div class="table-responsive overflow-auto">
                            <br>
                            <!-- Botón para agregar ubicaciones -->
                            <button class="btn btn-primary" id="btnAgregar" data-toggle="modal" data-target="#agregarModal"><?php echo $lang['btnAgregarU'];   ?></button>
                            <!-- Tabla de ubicaciones -->
                            <table id="ubicacion" class="table table-bordered table-striped" class="display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <!--th>Código</th>
										<th>Dirección</th>
                                        <th>Latitud</th>
                                        <th>Longitud</th>
                                        <th>Acciones</th-->
										<th><?php echo $lang['codigo'];   ?></th>
										<th><?php echo $lang['direccion'];?></th>
										<th><?php echo $lang['latitud']; ?></th>
										<th><?php echo $lang['longitud'];  ?></th>
										<th><?php echo $lang['acciones']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Los datos se cargarán con AJAX -->
                                </tbody>
                            </table>
                            
                        </div>
                        
                        <!-- Modal para Agregar Ubicación -->
                        <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="agregarModalLabel"><?php echo $lang['agregarModalLabelU'];   ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formAgregarUbicacion">
                                            <div class="form-group row">
                                                <label for="codigo_ubicacion" class="col-sm-4 col-form-label mb-1"><?php echo $lang['codigo'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="codigo_ubicacion" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="direccion" class="col-sm-4 col-form-label mb-1"><?php echo $lang['direccion'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="direccion" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="latitud" class="col-sm-4 col-form-label mb-1"><?php echo $lang['latitud'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="number" step="0.000001" class="form-control" id="latitud" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="longitud" class="col-sm-4 col-form-label mb-1"><?php echo $lang['longitud'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="number" step="0.000001" class="form-control" id="longitud" required>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success"><?php echo $lang['btnAgregar'];   ?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal para Editar Ubicación -->
                        <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel"><?php echo $lang['editarModalLabelU'];   ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form id="formEditarUbicacion">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="codigo_ubicacionEditar"><?php echo $lang['codigo'];   ?></label>
                                                    <input type="text" class="form-control" id="codigo_ubicacionEditar" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="direccionEditar"><?php echo $lang['direccion'];   ?></label>
                                                    <input type="text" class="form-control" id="direccionEditar" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="latitudEditar"><?php echo $lang['latitud'];   ?></label>
                                                    <input type="number" step="0.000001" class="form-control" id="latitudEditar" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="longitudEditar"><?php echo $lang['longitud'];   ?></label>
                                                    <input type="number" step="0.000001" class="form-control" id="longitudEditar" required>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-warning"><?php echo $lang['btnEditar'];   ?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para Confirmar Eliminación -->
                        <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="eliminarModalLabel"><?php echo $lang['eliminarModalLabelU'];   ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?php echo $lang['eliminarMensajeUbicacion'];   ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['btnCancelar'];   ?></button>
                                        <button type="button" class="btn btn-danger" id="btnEliminar"><?php echo $lang['btnEliminar'];   ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- Footer  -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="text-muted" style="width: 100%; text-align: center;" >
                        <p>Copyright &copy; Caso Práctico 2 - DMoncayo 2024</p> 
                    </div>
                </footer>
            </div>
        </div> 

        <!-- jQuery, DataTables y Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script src="public_html/js/ScriptUbicaciones.js"></script>
        <script src="dashboard/js/scripts.js"></script>
        
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>


    </body>
</html>


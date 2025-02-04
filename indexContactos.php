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
        <title>Contactos</title>
        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- DataTables -->
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="dashboard/css/styles.css" rel="stylesheet" />
        <!--link href="dashboard/css/estilo.css" rel="stylesheet" /-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
        
    </head>

    <body>

        
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

                        <h1 class="mt-4" align="center"><?php echo $lang['listado02'];   ?></h1>

                        <div class="table-responsive overflow-auto">
                            <br>
                            <!-- Botón para agregar contactos -->
                            <button class="btn btn-primary" id="btnAgregar" data-toggle="modal" data-target="#agregarModal"><?php echo $lang['btnAgregarC'];   ?></button>
                            <!-- Tabla de Contactos -->
                            <table id="contacto" class="table table-bordered table-striped" class="display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $lang['identificacion'];   ?></th>
                                        <th><?php echo $lang['nombre'];   ?></th>
                                        <th><?php echo $lang['correo'];   ?></th>
                                        <th><?php echo $lang['telefono'];   ?></th>
                                        <th><?php echo $lang['saludo'];   ?></th>
                                        <th><?php echo $lang['fotografia'];   ?></th>
                                        <th><?php echo $lang['acciones'];   ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Los datos se cargarán con AJAX -->
                                </tbody>
                            </table>
                            
                        </div>
                        
                        <!-- Modal para Mostrar Contactos -->
                        <div class="modal fade" id="detalleModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $lang['verModalLabelC'];   ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong><?php echo $lang['identificacion'];   ?>:</strong> <span id="detalleIdentificacion"></span></p>
                                    <p><strong><?php echo $lang['nombre'];   ?>:</strong> <span id="detalleNombre"></span></p>
                                    <p><strong><?php echo $lang['saludo'];   ?>:</strong> <span id="detalleSaludo"></span></p>
                                    <p><strong><?php echo $lang['correo'];   ?>:</strong> <span id="detalleCorreo"></span></p>
                                    <p><strong><?php echo $lang['telefono'];   ?>:</strong> <span id="detalleTelefono"></span></p>
                                    <p><strong><?php echo $lang['fotografia'];   ?>:</strong> <span id="detalleFotografia"></span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['btnCerrar'];   ?></button>
                                </div>
                                </div>
                            </div>
                        </div>    

                        <!-- Modal para Agregar Contacto -->
                        <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="agregarModalLabel"><?php echo $lang['agregarModalLabelC'];   ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formAgregarContacto">
                                            <div class="form-group row">
                                                <label for="identificacion" class="col-sm-4 col-form-label mb-1"><?php echo $lang['identificacion'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="identificacion" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-4 col-form-label mb-1"><?php echo $lang['nombre'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nombre" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="saludo" class="col-sm-4 col-form-label mb-1"><?php echo $lang['saludo'];   ?></label>
                                                <div class="col-sm-8">
                                                <select class="form-control" id="saludo" name="saludo" required>
                                                    <option value="Sr.">  Sr.  </option>
                                                    <option value="Sra."> Sra. </option>
                                                    <option value="Srta.">Srta.</option>
                                                    <option value="Ing."> Ing. </option>
                                                    <option value="Dr.">  Dr.  </option>
                                                    <option value="Dra."> Dra. </option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="correo" class="col-sm-4 col-form-label mb-1"><?php echo $lang['correo'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="correo" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="telefono" class="col-sm-4 col-form-label mb-1"><?php echo $lang['telefono'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="telefono" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fotografia" class="col-sm-4 col-form-label mb-1">Fotografía</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="fotografia" required>
                                                        <option value="Con Foto"><?php echo $lang['conFoto'];   ?></option>
                                                        <option value="Sin Foto"><?php echo $lang['sinFoto'];   ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success"><?php echo $lang['btnAgregar'];   ?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal para Editar Contacto -->
                        <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel"><?php echo $lang['editarModalLabelC'];   ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form id="formEditarContacto">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="identificacionEditar"><?php echo $lang['identificacion'];   ?></label>
                                                    <input type="text" class="form-control" id="identificacionEditar" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nombreEditar"><?php echo $lang['nombre'];   ?></label>
                                                    <input type="text" class="form-control" id="nombreEditar" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="saludoEditar"><?php echo $lang['saludo'];   ?></label>
                                                    <select class="form-control" id="saludoEditar" required>
                                                        <option value="Sr.">  Sr.  </option>
                                                        <option value="Sra."> Sra. </option>
                                                        <option value="Srta.">Srta.</option>
                                                        <option value="Ing."> Ing. </option>
                                                        <option value="Dr.">  Dr.  </option>
                                                        <option value="Dra."> Dra. </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="correoEditar"><?php echo $lang['correo'];   ?></label>
                                                    <input type="text" class="form-control" id="correoEditar" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="telefonoEditar"><?php echo $lang['telefono'];   ?></label>
                                                    <input type="number" class="form-control" id="telefonoEditar" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="fotografiaEditar"><?php echo $lang['fotografia'];   ?></label>
                                                    <select class="form-control" id="fotografiaEditar" required>
                                                        <option value="Con Foto"> <?php echo $lang['conFoto'];   ?>  </option>
                                                        <option value="Sin Foto"> <?php echo $lang['sinFoto'];   ?> </option>
                                                    </select>
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
                                        <h5 class="modal-title" id="eliminarModalLabel"><?php echo $lang['eliminarModalLabelC'];   ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?php echo $lang['eliminarMensajeContacto'];   ?></p>
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
        <script src="public_html/js/ScriptContactos.js"></script>
        <script src="dashboard/js/scripts.js"></script>
        
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    </body>
</html>


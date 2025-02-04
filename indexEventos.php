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
        <title>Eventos</title>
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

                        <h1 class="mt-4" align="center"><?php echo $lang['listado03'];   ?></h1>
                    
                        <div class="table-responsive overflow-auto" >
                            <br>
                            <!-- Botón para agregar eventos -->
                            <button class="btn btn-primary" id="btnAgregar" data-toggle="modal" data-target="#agregarModal"><?php echo $lang['btnAgregarE'];   ?></button>
                            <!-- Tabla de eventos -->
                            <table id="evento" class="table table-bordered table-striped" class="display responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $lang['evento'];   ?></th>
                                        <th><?php echo $lang['descripcion'];   ?></th>
                                        <th><?php echo $lang['fecha'];   ?></th>
                                        <th><?php echo $lang['zona'];   ?></th>
                                        <th><?php echo $lang['codigoU'];   ?></th>
                                        <th><?php echo $lang['ubicacion'];   ?></th>
                                        <th><?php echo $lang['tipo'];   ?></th>
                                        <th><?php echo $lang['clasificacion'];   ?></th>
                                        <th><?php echo $lang['invitados'];   ?></th>
                                        <th><?php echo $lang['repeticion'];   ?></th>
                                        <th><?php echo $lang['recordatorio'];   ?></th>
                                        <th><?php echo $lang['identificacion'];   ?></th>
                                        <th><?php echo $lang['acciones'];   ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Los datos se cargarán con AJAX -->
                                </tbody>
                            </table>
                            
                        </div>

                        <!-- Modal para Mostrar Evento -->
                        <div class="modal fade" id="detalleModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $lang['verModalLabelE'];   ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong><?php echo $lang['evento'];   ?>:</strong> <span id="detalleCodigo_evento"></span></p>
                                    <p><strong><?php echo $lang['descripcion'];   ?>:</strong> <span id="detalleTipo"></span></p>
                                    <p><strong><?php echo $lang['descripcion'];   ?>:</strong> <span id="detalleDescripcion"></span></p>
                                    <p><strong><?php echo $lang['clasificacion'];   ?>:</strong> <span id="detalleClasificacion"></span></p>
                                    <p><strong><?php echo $lang['fecha'];   ?>:</strong> <span id="detalleFecha"></span></p>
                                    <p><strong><?php echo $lang['zona'];   ?>:</strong> <span id="detalleZona"></span></p>
                                    <p><strong><?php echo $lang['invitados'];   ?>:</strong> <span id="detalleInvitados"></span></p>
                                    <p><strong><?php echo $lang['repeticion'];   ?>:</strong> <span id="detalleRepeticion"></span></p>
                                    <p><strong><?php echo $lang['recordatorio'];   ?>:</strong> <span id="detalleRecordatorio"></span></p>
                                    <p><strong><?php echo $lang['identificacion'];   ?>:</strong> <span id="detalleIdentificacion"></span></p>
                                    <p><strong><?php echo $lang['ubicacion'];   ?>:</strong> <span id="detalleCodigo_ubicacion"></span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['btnCerrar'];   ?></button>
                                </div>
                                </div>
                            </div>
                        </div>
                            
                        <!-- Modal para Agregar Evento -->
                        <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="agregarModalLabel"><?php echo $lang['agregarModalLabelE'];   ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formAgregarEvento">
                                            <div class="form-group row">
                                                <label for="codigo_evento" class="col-sm-4 col-form-label mb-1"><?php echo $lang['codigo'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="codigo_evento" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tipo" class="col-sm-4 col-form-label mb-1"><?php echo $lang['tipo'];   ?></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="tipo" required>
                                                        <option value=""><?php echo $lang['seleccione1']. "  " . $lang['tipo'];   ?></option>
                                                        <option value="C"><?php echo $lang['conferencia'];   ?></option>
                                                        <option value="T"><?php echo $lang['taller'];   ?></option>
                                                        <option value="S"><?php echo $lang['seminario'];   ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="descripcion" class="col-sm-4 col-form-label mb-1"><?php echo $lang['descripcion'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="descripcion" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="clasificacion" class="col-sm-4 col-form-label mb-1"><?php echo $lang['clasificacion'];   ?></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="clasificacion" required>
                                                        <option value=""><?php echo $lang['seleccione1']. "  " . $lang['clasificacion'];   ?></option>
                                                        <option value="1"><?php echo $lang['corporativos'];   ?></option>
                                                        <option value="2"><?php echo $lang['recaudacion'];   ?></option>
                                                        <option value="3"><?php echo $lang['espectaculos'];   ?></option>
                                                        <option value="4"><?php echo $lang['deportivos'];   ?></option>
                                                        <option value="5"><?php echo $lang['sociales'];   ?></option>
                                                        <option value="6"><?php echo $lang['otro'];   ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fecha" class="col-sm-4 col-form-label mb-1"><?php echo $lang['fecha'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="datetime-local" class="form-control" id="fecha" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="zona" class="col-sm-4 col-form-label mb-1"><?php echo $lang['zona'];   ?></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="zona" required>
                                                        <option value=""><?php echo $lang['seleccione1']. "  " . $lang['zona'];   ?></option>
                                                        <option value="UTC-5">UTC-5</option>
                                                        <option value="UTC-6">UTC-6</option>
                                                        <option value="UTC-7">UTC-7</option>
                                                        <option value="Desconocida"><?php echo $lang['desconocida'];   ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="invitados" class="col-sm-4 col-form-label mb-1"><?php echo $lang['invitados'];   ?></label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="invitados" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="repeticion" class="col-sm-4 col-form-label mb-1"><?php echo $lang['repeticion'];   ?></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="repeticion" required>
                                                        <option value=""><?php echo $lang['seleccione3']. "  " . $lang['repeticion'];   ?></option>
                                                        <option value="S"><?php echo $lang['si'];   ?></option>
                                                        <option value="N"><?php echo $lang['no'];   ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="recordatorio" class="col-sm-4 col-form-label mb-1"><?php echo $lang['recordatorio'];   ?></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="recordatorio" required>
                                                        <option value=""><?php echo $lang['seleccione4']. "  " . $lang['recordatorio'];   ?></option>
                                                        <option value="S"><?php echo $lang['si'];   ?></option>
                                                        <option value="N"><?php echo $lang['no'];   ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="identificacion" class="col-sm-4 col-form-label mb-1"><?php echo $lang['contacto'];   ?></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="identificacion" required>
                                                        <option value=""><?php echo $lang['seleccione1']. "  " . $lang['contacto'];   ?></option>
                                                        <!-- Las opciones se llenarán aquí con jQuery -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="codigo_ubicacion" class="col-sm-4 col-form-label mb-1"><?php echo $lang['ubicacion'];   ?></label>
                                                <div class="col-sm-8">
                                                    <!-- <input type="text" class="form-control" id="codigo_ubicacion" required>-->
                                                    <select class="form-control" id="codigo_ubicacion" required>
                                                        <option value=""><?php echo $lang['seleccione2']. "  " . $lang['direccion'];   ?></option>
                                                        <!-- Las opciones se llenarán aquí con jQuery -->
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-success"><?php echo $lang['btnAgregar'];   ?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal para Editar Evento -->
                        <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel"><?php echo $lang['editarModalLabelE'];   ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form id="formEditarEvento">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="codigo_eventoEditar"><?php echo $lang['codigo'];   ?></label>
                                                    <input type="text" class="form-control" id="codigo_eventoEditar" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tipoEditar"><?php echo $lang['tipo'];   ?></label>
                                                    <select class="form-control" id="tipoEditar" required>
                                                        <option value=""><?php echo $lang['seleccione1']. "  " . $lang['tipo'];   ?></option>
                                                        <option value="C"><?php echo $lang['conferencia'];   ?></option>
                                                        <option value="T"><?php echo $lang['taller'];   ?></option>
                                                        <option value="S"><?php echo $lang['seminario'];   ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="descripcionEditar"><?php echo $lang['descripcion'];   ?></label>
                                                    <input type="text" class="form-control" id="descripcionEditar" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="clasificacionEditar"><?php echo $lang['clasificacion'];   ?></label>
                                                    <select class="form-control" id="clasificacionEditar" required>
                                                        <option value=""><?php echo $lang['seleccione1']. "  " . $lang['clasificacion'];   ?></option>
                                                        <option value="1"><?php echo $lang['corporativos'];   ?></option>
                                                        <option value="2"><?php echo $lang['recaudacion'];   ?></option>
                                                        <option value="3"><?php echo $lang['espectaculos'];   ?></option>
                                                        <option value="4"><?php echo $lang['deportivos'];   ?></option>
                                                        <option value="5"><?php echo $lang['sociales'];   ?></option>
                                                        <option value="6"><?php echo $lang['otro'];   ?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="fechaEditar"><?php echo $lang['fecha'];   ?></label>
                                                    <input type="datetime-local" class="form-control" id="fechaEditar" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="zonaEditar"><?php echo $lang['zona'];   ?></label>
                                                    <select class="form-control" id="zonaEditar" required>
                                                        <option value=""><?php echo $lang['seleccione1']. "  " . $lang['zona'];   ?></option>
                                                        <option value="UTC-5">UTC-5</option>
                                                        <option value="UTC-6">UTC-6</option>
                                                        <option value="UTC-7">UTC-7</option>
                                                        <option value="Desconocida"><?php echo $lang['desconocida'];   ?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="invitadosEditar"><?php echo $lang['invitados'];   ?></label>
                                                    <input type="number" class="form-control" id="invitadosEditar" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="repeticionEditar"><?php echo $lang['repeticion'];   ?></label>
                                                    <select class="form-control" id="repeticionEditar" required>
                                                        <option value=""><?php echo $lang['seleccione3']. "  " . $lang['repeticion'];   ?></option>
                                                        <option value="S"><?php echo $lang['si'];   ?></option>
                                                        <option value="N"><?php echo $lang['no'];   ?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="recordatorioEditar"><?php echo $lang['recordatorio'];   ?></label>
                                                    <select class="form-control" id="recordatorioEditar" required>
                                                        <option value=""><?php echo $lang['seleccione4']. "  " . $lang['recordatorio'];   ?></option>
                                                        <option value="S"><?php echo $lang['si'];   ?></option>
                                                        <option value="N"><?php echo $lang['no'];   ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="identificacionEditar"><?php echo $lang['contacto'];   ?></label>
                                                    <select class="form-control" id="identificacionEditar" required>
                                                        <option value=""><?php echo $lang['seleccione1']. "  " . $lang['contacto'];   ?></option>
                                                        <!-- Las opciones se llenarán aquí con jQuery -->
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="codigo_ubicacionEditar"><?php echo $lang['direccion'];   ?></label>
                                                    <select class="form-control" id="codigo_ubicacionEditar" required>
                                                        <option value=""><?php echo $lang['seleccione2']. "  " . $lang['direccion'];   ?></option>
                                                        <!-- Las opciones se llenarán aquí con jQuery -->
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
                                        <h5 class="modal-title" id="eliminarModalLabel"><?php echo $lang['eliminarModalLabelE'];   ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?php echo $lang['eliminarMensajeEvento'];   ?></p>
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
        <script src="public_html/js/ScriptEventos.js"></script>
        <script src="dashboard/js/scripts.js"></script>
        
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        
    </body>
</html>


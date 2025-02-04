$(document).ready(function() {

    var idioma = $('html').attr('lang');
	
	var textoEditar = idioma === 'es' ? 'Editar' : 'Edit';
    var textoEliminar = idioma === 'es' ? 'Eliminar' : 'Delete';
    var textoVer = idioma === 'es' ? 'Ver' : 'See';

    var textoUbicacion = idioma === 'es' ? 'Seleccione una dirección' : 'Select a Location';
    var textoContacto = idioma === 'es' ? 'Seleccione un Contacto' : 'Select a Contact';

    //Cargar Ubicaciones
    function cargarUbicaciones() {
        
        $.ajaxSetup({ cache: false});
        
        $.ajax({
            url: 'aplicacion/controladores/ControladorEventos.php?action=obtenerUbicaciones',  
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                                
                $('#codigo_ubicacion').empty(); 
                $('#codigo_ubicacion').append('<option value="">'+ textoUbicacion + '</option>'); 

                // Agregar las ubicaciones al select
                $.each(data, function(index, ubicacion) {
                    $('#codigo_ubicacion').append('<option value="' + ubicacion.codigo_ubicacion + '">' + ubicacion.direccion + '</option>');
                });

                $('#codigo_ubicacionEditar').empty(); 
                $('#codigo_ubicacionEditar').append('<option value="">'+ textoUbicacion + '</option>'); 

                $.each(data, function(index, ubicacion) {
                    $('#codigo_ubicacionEditar').append('<option value="' + ubicacion.codigo_ubicacion + '">' + ubicacion.direccion + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.log('Error al cargar las Ubicaciones: ', error);
            }
        });
    }
    // Llamar a la función para cargar las ubicaciones
    cargarUbicaciones();

    //Cargar Contactos
    function cargarContactos() {
        
        $.ajaxSetup({ cache: false});
        
        $.ajax({
            url: 'aplicacion/controladores/ControladorEventos.php?action=obtenerContactos',  
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                                
                $('#identificacion').empty();  
                $('#identificacion').append('<option value=""> '+ textoContacto + '</option>');  

                $.each(data, function(index, contacto) {
                    $('#identificacion').append('<option value="' + contacto.identificacion + '">' + contacto.nombre + '</option>');
                });

                $('#identificacionEditar').empty();  
                $('#identificacionEditar').append('<option value=""> '+ textoContacto + '</option>');  

                $.each(data, function(index, contacto) {
                    $('#identificacionEditar').append('<option value="' + contacto.identificacion + '">' + contacto.nombre + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.log('Error al cargar los Contactos: ', error);
            }
        });
    }
    // Llamar a la función para cargar los contactos
    cargarContactos();

    //Obtener Eventos
    var table = $('#evento').DataTable({
        "ajax": {
            
            "url": "aplicacion/controladores/ControladorEventos.php?action=obtenerEvento",
			"dataSrc": function(data) {
                console.log('Datos recibidos (antes de parsear): ', data);

                // Verificar y limpiar los datos antes de parsear
                try {
                    if (typeof data === 'string') {
                        data = JSON.parse(data);
                    }
                } catch (e) {
                    console.log('Error al parsear JSON: ', e);
                    return [];
                }
                
                console.log('Datos después de parsear: ', data); // Verificar los datos después de parsear
                console.log('Es un arreglo: ', Array.isArray(data)); // Verificar si es un arreglo
                return data;
            },
            "error": function (jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ' - ' + errorThrown);
                console.log(jqXHR.responseText);
            },
        },
        "columnDefs": [
            {
                "targets": [0, 1, 2, 3, 4, 5],
                "className": "text-center"
            }
        ],
        "columns": [
            { "data": "codigo_evento" },
            { "data": "descripcion" },
            { "data": "fecha" },
            { "data": "zona", "visible": false  },
            { "data": "codigo_ubicacion", "visible": false },
            { "data": "ubicacion" },
            { "data": "tipo", "visible": false },
            { "data": "clasificacion", "visible": false },
            { "data": "invitados", "visible": false },
            { "data": "repeticion", "visible": false },
            { "data": "recordatorio", "visible": false },
            { "data": "identificacion", "visible": false },
            {
                "data": null,
                "render": function(data, type, row) {
                    console.log(row);
                    //console.log('Inicio render');
                    //console.log('Fila renderizada: ', row); // Imprime los datos de cada fila renderizada
                    return `

                        <button class="btn btn-info btn-sm btnVer" 
                                data-codigo_evento="${row.codigo_evento}" 
                                data-tipo="${row.tipo}" 
                                data-descripcion="${row.descripcion}" 
                                data-clasificacion="${row.clasificacion}" 
                                data-fecha="${row.fecha}" 
                                data-zona="${row.zona}" 
                                data-invitados="${row.invitados}" 
                                data-repeticion="${row.repeticion}" 
                                data-recordatorio="${row.recordatorio}" 
                                data-identificacion="${row.identificacion}" 
                                data-ubicacion="${row.codigo_ubicacion}">  ${textoVer} </button>

                        <button class="btn btn-warning btn-sm btnEditar" 
                                data-codigo_evento="${row.codigo_evento}" 
                                data-tipo="${row.tipo}" 
                                data-descripcion="${row.descripcion}" 
                                data-clasificacion="${row.clasificacion}" 
                                data-fecha="${row.fecha}" 
                                data-zona="${row.zona}" 
                                data-invitados="${row.invitados}" 
                                data-repeticion="${row.repeticion}" 
                                data-recordatorio="${row.recordatorio}" 
                                data-identificacion="${row.identificacion}" 
                                data-codigo_ubicacion="${row.codigo_ubicacion}"> ${textoEditar}</button>

                        <button class="btn btn-danger btn-sm btnEliminar" data-codigo_evento="${row.codigo_evento}"> ${textoEliminar}</button>
                    `;
                }
            }
        ],
        "language": { url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/" + (idioma === 'es' ? 'Spanish' : 'English') + ".json" },
        "pageLength": 5,
        "lengthMenu": [5, 10, 20],
        "dom": '<"top"lf>rt<"bottom"ip><"clear">',
        "ordering": true,
        "debug": true,
        "responsive": true
    });
    
    //Ver Eventos	
    $('#evento').on('click', '.btnVer', function() { 
        
        var codigo_evento = $(this).data('codigo_evento');
        
        //console.log(codigo_evento);
        
        $.ajaxSetup({ cache: false});
                
        $.get('aplicacion/controladores/ControladorEventos.php?action=mostrarEvento&codigo_evento=' + codigo_evento , function(data) { 
            
            console.log(data);
            
            var evento = JSON.parse(data); 
            
            $('#detalleCodigo_evento').text(evento.codigo_evento); 
            $('#detalleTipo').text(evento.tipo);
            $('#detalleDescripcion').text(evento.descripcion); 
            $('#detalleClasificacion').text(evento.clasificacion); 
            $('#detalleFecha').text(evento.fecha); 
            $('#detalleZona').text(evento.zona);  
            $('#detalleInvitados').text(evento.invitados);
            $('#detalleRepeticion').text(evento.repeticion); 
            $('#detalleRecordatorio').text(evento.recordatorio); 
            $('#detalleIdentificacion').text(evento.identificacion); 
            $('#detalleCodigo_ubicacion').text(evento.codigo_ubicacion);  
            
            $('#detalleModal').modal('show'); 
        });
    });

    //Agregar Eventos   
    $('#formAgregarEvento').submit(function(e) { 
        
        $.ajaxSetup({ cache: false});

	    e.preventDefault();
        var codigo_evento = $('#codigo_evento').val();
        var tipo = $('#tipo').val();
        var descripcion = $('#descripcion').val();
        var clasificacion = $('#clasificacion').val();
        var fecha = $('#fecha').val();
        var zona = $('#zona').val();
        var invitados = $('#invitados').val();
        var repeticion = $('#repeticion').val();
        var recordatorio = $('#recordatorio').val();
        var identificacion = $('#identificacion').val();
        var codigo_ubicacion = $('#codigo_ubicacion').val();

        $.post('aplicacion/controladores/ControladorEventos.php?action=agregarEvento', { 
            
            codigo_evento: codigo_evento, 
            tipo: tipo, 
            descripcion: descripcion, 
            clasificacion: clasificacion,
            fecha: fecha, 
            zona: zona, 
            invitados: invitados, 
            repeticion: repeticion,
            recordatorio: recordatorio, 
            identificacion: identificacion,
            codigo_ubicacion: codigo_ubicacion }, function(response) {

            cargarUbicaciones();
            cargarContactos();
            
            table.ajax.reload(null, false); 
            $('#agregarModal').modal('hide');
        });
    });
	
    //Editar Eventos
	$('#evento').on('click', '.btnEditar', function() {
	    
	    var codigo_evento = $(this).data('codigo_evento');
        var tipo = $(this).data('tipo');
        var descripcion = $(this).data('descripcion');
        var clasificacion = $(this).data('clasificacion');
        var fecha = $(this).data('fecha');
        var zona = $(this).data('zona');
        var invitados = $(this).data('invitados');
        var repeticion = $(this).data('repeticion');
        var recordatorio = $(this).data('recordatorio');
        var identificacion = $(this).data('identificacion');
        var codigo_ubicacion = $(this).data('codigo_ubicacion');
        
        $('#codigo_eventoEditar').val(codigo_evento);
        $('#tipoEditar').val(tipo);
        $('#descripcionEditar').val(descripcion);
        $('#clasificacionEditar').val(clasificacion);
        $('#fechaEditar').val(fecha);
        $('#zonaEditar').val(zona);
        $('#invitadosEditar').val(invitados);
        $('#repeticionEditar').val(repeticion);
        $('#recordatorioEditar').val(recordatorio);
        $('#identificacionEditar').val(identificacion);
        $('#codigo_ubicacionEditar').val(codigo_ubicacion);

		$('#editarModal').modal('show');
    });

    $('#formEditarEvento').submit(function(e) {
        e.preventDefault();

        var codigo_evento = $('#codigo_eventoEditar').val();
        var tipo = $('#tipoEditar').val();
        var descripcion = $('#descripcionEditar').val();
        var clasificacion = $('#clasificacionEditar').val();
        var fecha = $('#fechaEditar').val();
        var zona = $('#zonaEditar').val();
        var invitados = $('#invitadosEditar').val();
        var repeticion = $('#repeticionEditar').val();
        var recordatorio = $('#recordatorioEditar').val();
        var identificacion = $('#identificacionEditar').val();
        var codigo_ubicacion = $('#codigo_ubicacionEditar').val();
        
        
        $.post('aplicacion/controladores/ControladorEventos.php?action=editarEvento', { 
            codigo_evento: codigo_evento, 
            tipo: tipo, 
            descripcion: descripcion, 
            clasificacion: clasificacion,
            fecha: fecha, 
            zona: zona, 
            invitados: invitados, 
            repeticion: repeticion,
            recordatorio: recordatorio, 
            identificacion: identificacion,
            codigo_ubicacion: codigo_ubicacion }, function(response) {

            console.log(response);

            table.ajax.reload();
            $('#editarModal').modal('hide');
        });
    });
	
    //Eliminar Eventos
	$('#evento').on('click', '.btnEliminar', function() {
        var codigo_evento = $(this).data('codigo_evento');
        $('#btnEliminar').data('codigo_evento', codigo_evento);
        $('#eliminarModal').modal('show');
    });

    $('#btnEliminar').click(function() {
        var codigo_evento = $(this).data('codigo_evento');
        
        $.get('aplicacion/controladores/ControladorEventos.php?action=eliminarEvento&codigo_evento=' + codigo_evento, function(response) {
            table.ajax.reload();
            $('#eliminarModal').modal('hide');
        });
    });

    
});



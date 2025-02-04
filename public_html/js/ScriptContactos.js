
$(document).ready(function() {

    var idioma = $('html').attr('lang');
	
	var textoEditar = idioma === 'es' ? 'Editar' : 'Edit';
    var textoEliminar = idioma === 'es' ? 'Eliminar' : 'Delete';
    var textoVer = idioma === 'es' ? 'Ver' : 'See';

    //Obtener Contactos
    var table = $('#contacto').DataTable({
        "ajax": {
            "url": "aplicacion/controladores/ControladorContactos.php?action=obtenerContacto",
            "dataSrc": function(data) {
                console.log('Datos recibidos (antes de parsear): ', data);
                console.log('Es un arreglo: ', Array.isArray(data)); // Verificar si es un arreglo

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
                "targets": [2, 3, 4],
                "className": "text-center"
            }
        ],
        "columns": [
            { "data": "identificacion" },
            { "data": "nombre" },
            { "data": "correo" },
            { "data": "telefono"},
            { "data": "saludo", "visible": false }, 
            { "data": "fotografia", "visible": false }, 
            {
                "data": null,
                "render": function(data, type, row) {
                    console.log('Inicio render');
                    console.log('Fila renderizada: ', row); // Imprime los datos de cada fila renderizada
                    return `
                        <button class="btn btn-info btn-sm btnVer" 
                                data-identificacion="${row.identificacion}" 
                                data-nombre="${row.nombre}" 
                                data-saludo="${row.saludo}" 
                                data-correo="${row.correo}" 
                                data-telefono="${row.telefono}" 
                                data-fotografia="${row.fotografia}"> ${textoVer}</button>

                        <button class="btn btn-warning btn-sm btnEditar" 
                                data-identificacion="${row.identificacion}" 
                                data-nombre="${row.nombre}" 
                                data-saludo="${row.saludo}" 
                                data-correo="${row.correo}" 
                                data-telefono="${row.telefono}" 
                                data-fotografia="${row.fotografia}">${textoEditar}</button>

                        <button class="btn btn-danger btn-sm btnEliminar" data-identificacion="${row.identificacion}">${textoEliminar}</button>
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

    //Ver Contactos
    $('#contacto').on('click', '.btnVer', function() { 

        var identificacion = $(this).data('identificacion');
        $.ajaxSetup({ cache: false});
                
        $.get('aplicacion/controladores/ControladorContactos.php?action=mostrarContacto&identificacion=' + identificacion , function(data) { 
            console.log(data);

            var contacto = JSON.parse(data); 
            $('#detalleIdentificacion').text(contacto.identificacion); 
            $('#detalleNombre').text(contacto.nombre);
            $('#detalleSaludo').text(contacto.saludo); 
            $('#detalleCorreo').text(contacto.correo); 
            $('#detalleTelefono').text(contacto.telefono); 
            $('#detalleFotografia').text(contacto.fotografia);  
            
            $('#detalleModal').modal('show'); 
        });
    });

    //Agregar Contactos
    $('#formAgregarContacto').submit(function(e) { 
	    e.preventDefault();
        var identificacion = $('#identificacion').val();
        var nombre = $('#nombre').val();
        var correo = $('#correo').val();
        var saludo = $('#saludo').val();
        var telefono = $('#telefono').val();
        var fotografia = $('#fotografia').val();

        $.post('aplicacion/controladores/ControladorContactos.php?action=agregarContacto', { identificacion: identificacion, nombre: nombre, saludo: saludo, correo: correo, telefono: telefono, fotografia : fotografia }, function(response) {
            table.ajax.reload(null, false); 
            $('#agregarModal').modal('hide');
        });
    });
	
    //Editar Contactos
	$('#contacto').on('click', '.btnEditar', function() {
        var identificacion = $(this).data('identificacion');
        var nombre = $(this).data('nombre');
        var correo = $(this).data('correo');
        var saludo = $(this).data('saludo');
        var telefono = $(this).data('telefono');
        var fotografia = $(this).data('fotografia');

        $('#identificacionEditar').val(identificacion);
        $('#nombreEditar').val(nombre);
        $('#correoEditar').val(correo);
        $('#saludoEditar').val(saludo);
        $('#telefonoEditar').val(telefono);
        $('#fotografiaEditar').val(fotografia);
		$('#editarModal').modal('show');
    });

    $('#formEditarContacto').submit(function(e) {
        e.preventDefault();
        var identificacion = $('#identificacionEditar').val();
        var nombre  = $('#nombreEditar').val();
        var correo = $('#correoEditar').val();
        var saludo = $('#saludoEditar').val();
        var telefono = $('#telefonoEditar').val();
        var fotografia = $('#fotografiaEditar').val();
        
        $.post('aplicacion/controladores/ControladorContactos.php?action=editarContacto', { identificacion: identificacion, nombre: nombre, saludo: saludo, correo: correo, telefono: telefono, fotografia : fotografia }, function(response) {
            table.ajax.reload();
            $('#editarModal').modal('hide');
        });
    });
	
    //Eliminar Contactos
	$('#contacto').on('click', '.btnEliminar', function() {
        var identificacion = $(this).data('identificacion');
        $('#btnEliminar').data('identificacion', identificacion);
        $('#eliminarModal').modal('show');
    });

    $('#btnEliminar').click(function() {
        var identificacion = $(this).data('identificacion');
         //$.get('controller/ProductoController.php?action=eliminarProducto&categ
        $.get('aplicacion/controladores/ControladorContactos.php?action=eliminarContacto&identificacion=' + identificacion, function(response) {
            table.ajax.reload();
            $('#eliminarModal').modal('hide');
        });
    });
	
});

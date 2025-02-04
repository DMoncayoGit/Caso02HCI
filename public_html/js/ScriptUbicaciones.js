$(document).ready(function() {

    var idioma = $('html').attr('lang');
	
	var textoEditar = idioma === 'es' ? 'Editar' : 'Edit';
    var textoEliminar = idioma === 'es' ? 'Eliminar' : 'Delete';
	
    //Obtener Ubicaciones
    var table = $('#ubicacion').DataTable({
        "ajax": {
            "url": "aplicacion/controladores/ControladorUbicaciones.php?action=obtenerUbicacion",
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
                "targets": [0, 1, 2, 3, 4],
                "className": "text-center"
            },/*
            {   "width": "100px", "targets": 0,
                "width": "150px", "targets": 2,
                "width": "150px", "targets": 3
            }*/
        ],
        "columns": [
            { "data": "codigo_ubicacion" },
            { "data": "direccion" },
            { "data": "latitud"},
            { "data": "longitud"},
            {
                "data": null,
                "render": function(data, type, row) {
                    console.log('Inicio render');
                    console.log('Fila renderizada: ', row); // Imprime los datos de cada fila renderizada
                    return `
                        <button class="btn btn-warning btn-sm btnEditar" data-codigo_ubicacion="${row.codigo_ubicacion}" data-direccion="${row.direccion}" data-latitud="${row.latitud}" data-longitud="${row.longitud}">${textoEditar}</button>
                        <button class="btn btn-danger btn-sm btnEliminar" data-codigo_ubicacion="${row.codigo_ubicacion}"> ${textoEliminar} </button>
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

    //Agregar Ubicaciones
    $('#formAgregarUbicacion').submit(function(e) { 
	    e.preventDefault();
        var codigo_ubicacion = $('#codigo_ubicacion').val();
        var direccion = $('#direccion').val();
        var latitud = $('#latitud').val();
        var longitud = $('#longitud').val();

        $.post('aplicacion/controladores/ControladorUbicaciones.php?action=agregarUbicacion', { codigo_ubicacion: codigo_ubicacion, direccion: direccion, latitud: latitud, longitud: longitud }, function(response) {
            table.ajax.reload(null, false); 
            $('#agregarModal').modal('hide');
        });
    });
	
    //Editar Ubicaciones
	$('#ubicacion').on('click', '.btnEditar', function() {
        var codigo_ubicacion = $(this).data('codigo_ubicacion');
        var direccion = $(this).data('direccion');
        var latitud = $(this).data('latitud');
        var longitud = $(this).data('longitud');
        
        $('#codigo_ubicacionEditar').val(codigo_ubicacion);
        $('#direccionEditar').val(direccion);
        $('#latitudEditar').val(latitud);
        $('#longitudEditar').val(longitud);
		$('#editarModal').modal('show');
    });

    $('#formEditarUbicacion').submit(function(e) {
        e.preventDefault();
        var codigo_ubicacion = $('#codigo_ubicacionEditar').val();
        var direccion  = $('#direccionEditar').val();
        var latitud = $('#latitudEditar').val();
        var longitud = $('#longitudEditar').val();
        
        $.post('aplicacion/controladores/ControladorUbicaciones.php?action=editarUbicacion', { 
		
		    codigo_ubicacion: codigo_ubicacion, 
			direccion: direccion, 
			latitud: latitud, 
			longitud: longitud }, function(response) {
				
            table.ajax.reload();
            $('#editarModal').modal('hide');
        });
    });
	
    //Eliminar Ubicaciones
	$('#ubicacion').on('click', '.btnEliminar', function() {
        var codigo_ubicacion = $(this).data('codigo_ubicacion');
        $('#btnEliminar').data('codigo_ubicacion', codigo_ubicacion);
        $('#eliminarModal').modal('show');
    });

    $('#btnEliminar').click(function() {
        var codigo_ubicacion = $(this).data('codigo_ubicacion');
         //$.get('controller/ProductoController.php?action=eliminarProducto&categ
        $.get('aplicacion/controladores/ControladorUbicaciones.php?action=eliminarUbicacion&codigo_ubicacion=' + codigo_ubicacion, function(response) {
            table.ajax.reload();
            $('#eliminarModal').modal('hide');
        });
    });
	
});

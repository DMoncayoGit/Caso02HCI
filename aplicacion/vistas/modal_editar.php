<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar Ubicación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditarUbicacion">
                    <div class="form-group">
                        <label for="codigoEditar">Código</label>
                        <input type="text" class="form-control" id="codigoEditar" name="codigo" disabled>
                    </div>
                    <div class="form-group">
                        <label for="direccionEditar">Dirección</label>
                        <input type="text" class="form-control" id="direccionEditar" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="latitudEditar">Latitud</label>
                        <input type="number" step="any" class="form-control" id="latitudEditar" name="latitud" required>
                    </div>
                    <div class="form-group">
                        <label for="longitudEditar">Longitud</label>
                        <input type="number" step="any" class="form-control" id="longitudEditar" name="longitud" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>




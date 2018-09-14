<form id="crear_categoria">
    <h2 id="titulo">Crear Categoria</h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Nombre categoria</label>
                <input class="form-control" input id="nombre_c" type="text" autocomplete="off" required>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <input class="succes" id="guardar_c" type="button" value="Guardar">
                <input class="succes" id="modificar_c" type="button" value="Guardar Cambios">
                <input id="limpiar_c" type="reset" value="Cancelar">
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="datos_c"></table>
    </div>
    <input type="button" value="Descargar a excel" id="enviar">
</form>

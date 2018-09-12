<form method="post" action="<?= URL ?>movimientos/guardar">
    <h2 id="titulo2">Movimientos</h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Tipo de movimiento</label>
                <select class="form-control" id="mov" name="mov" required>
                    <option value="">Seleccione</option>
                    <option value="baja">Dada de baja</option>
                    <option value="devolucion">Devolucion</option>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label>Producto</label>
                <select class="form-control" name="producto" id="producto_mov" required>
                    <option value="">Seleccione</option>
                    <?php foreach($pro as $value): ?>
                    <option value="<?= $value->id_producto ?>">
                        <?= $value->nombre_producto ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label>Cantidad</label>
                <input type="number" class="form-control" name="cantidad" name="cantidad" id="cantidad_mov" autocomplete="off" required>
            </div>

            <div class="col-md-3 form-group">
                <label>Descripcion</label>
                <input class="form-control" name="descripcion" type="text" id="descripcion_mv" maxlength="50" autocomplete="off" required>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <input class="succes" type="submit" value="Guardar" id="guardar_mv">
                <input id="reset_mov" type="reset" value="Limpiar">
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="datos_mov"></table>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#producto_mov").select2();
    });

</script>

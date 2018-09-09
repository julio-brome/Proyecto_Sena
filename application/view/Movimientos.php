<form method="post" action="<?= URL ?>movimientos/guardar">
    <div id="margen">
        <h2 id="titulo2">Movimientos</h2>
        <select id="mov" name="mov" required>
            <option value="">Seleccione movimiento</option>
            <option value="baja">Dada de baja</option>
            <option value="devolucion">Devolucion</option>
        </select>

        <select name="producto" id="producto_mov" required>
            <option value="">Seleccione producto</option>
            <?php foreach($pro as $value): ?>
            <option value="<?= $value->id_producto ?>">
                <?= $value->nombre_producto ?>
            </option>
            <?php endforeach ?>
        </select>

        <input name="cantidad" id="cantidad_mov" type="number" placeholder="Cantidad" required>
        <input name="descripcion" type="text" placeholder="Descripcion" id="descripcion_mv" maxlength="50" autocomplete="off" required> <br>

        <input class="succes" type="submit" value="Guardar" id="guardar_mv">
        <input id="reset_mov" type="reset" value="Limpiar">

        <div class="table-responsive">
            <table id="datos_mov"></table>
        </div>

        <input type="button" value="Descargar a excel" id="enviar">
    </div>
</form>

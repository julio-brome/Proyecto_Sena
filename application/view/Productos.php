<!--comentario de prueba para git-->
<form id="crear_producto">
    <div id="informacion">
        <div id="botones">
            <input type="button" value="Atras" id="atras_p">
        </div>

        <h2 id="titulo">Productos</h2>

        <br>

        <input id="nombre_p" type="text" placeholder="Nombre producto" name="nombre" maxlength="50" autocomplete="off" required>

        <br>

        <input id="cantidad_p" type="number" name="cantidad" placeholder="Cantidad" required>
        <input id="stock_p" type="number" name="stock" placeholder="Stock Mininimo" required>
        <input id="precio_p" type="number" name="precio" placeholder="Precio de Venta" required>

        <br>

        <select id="categorias_p" required>
            <option value="">Seleccione Categoria</option>
            <?php foreach($lista as $value): ?>
            <option value="<?= $value->id_categoria ?>">
                <?= $value->nombre_categoria ?>
            </option>
            <?php endforeach ?>
        </select>

        <br>

        <input class="succes" id="añadir" type="button" value="Añadir">
        <input class="succes" id="modificar_p" type="button" value="Guardar cambios">
        <input id="cancelar" type="reset" value="Cancelar">

        <div class="table-responsive">
            <table id="datos"></table>
        </div>

    </div>

    <div id="crear_detalle">
        <h2 id="titulo2">Asignar Proveedor</h2>

        <br>

        <select id="proveedores_p">
            <option value="">Seleccione Proveedor</option>
            <?php foreach($proveedores as $value): ?>
            <option value="<?= $value->id_proveedor ?>">
                <?= $value->nombre_empresa ?>
            </option>
            <?php endforeach ?>
        </select>

        <input class="succes" id="agregar" type="button" value="Agregar">

        <h3>Proveedores añadidos:</h3>

        <ul id="lista">
        </ul>

        <br>

        <button class="succes" id="guardar" type="button">Listo</button>
        <button id="volver" type="button">Atras</button>
    </div>
</form>

<form id="ver_detalle">
    <div id="botones">
        <input class="succes" id="crear_p" type="button" value="Crear producto">
    </div>

    <h2 id="titulo2">Buscar productos</h2>

    <input id="nombre_d" type="text" placeholder="Nombre producto" autocomplete="off">

    <select id="proveedor_d">
        <option value="">Seleccione Proveedor</option>
        <?php foreach($proveedores as $value): ?>
        <option value="<?= $value->id_proveedor ?>">
            <?= $value->nombre_empresa ?>
        </option>
        <?php endforeach ?>
    </select>

    <input id="limpiar_d" type="reset" value="Limpiar">

    <div class="table-responsive">
        <table id="registros_d"></table>
    </div>
</form>

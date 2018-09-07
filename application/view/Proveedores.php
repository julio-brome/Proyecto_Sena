<form id="registro_pre" action="" method="post">
    <h2 id="titulo">Proveedor</h2>
    <input type="hidden" id="id_proveedor" name="id">
    <input id="nombre_em" name="txtnombre_em" type="text" placeholder="Nombre empresa" maxlength="50" autocomplete="off" required>
    <input id="nombre_con" name="txtnombre_con" type="text" placeholder="Nombre contacto" maxlength="50" autocomplete="off" required> <br>
    <select id="tipo_doc" name="txttipo_doc" required>
        <option value="">Seleccione tipo de documento</option>
        <option value="Cedula">Cedula</option>
        <option value="NIT">NIT</option>
    </select>

    <input name="txtnumero_doc" id="num_doc" type="text" placeholder="Numero de documento" maxlength="30" autocomplete="off" required> <br>
    <input id="dc" name="txtdc" type="text" placeholder="Direccion" maxlength="30" autocomplete="off" required>
    <input id="tel" name="txttel" type="tel" placeholder="Telefono" maxlength="11" autocomplete="off" required>
    <input id="cel" name="txtcel" type="tel" placeholder="Celular" maxlength="11" autocomplete="off" required>

    <br>

    <input class="succes" id="guardar_proveedor" type="submit" value="Guardar" formaction="<?= URL ?>proveedor/guardar">
    <input class="succes" id="modificar_proveedor" type="submit" value="Guardar cambios" formaction="<?= URL ?>proveedor/modificar">
    <input id="cancelar_mod" type="reset" value="Cancelar">

    <br>

    <div class="table-responsive">
        <table id="datos_proveedor"></table>
    </div>
</form>

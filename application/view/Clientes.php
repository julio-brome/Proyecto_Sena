<form id="registro_pre" action="" method="post">
    <h2 id="titulo">Cliente</h2>
    <input type="hidden" id="id_cliente" name="id">
    <input id="nombres" name="txtnombres" type="text" placeholder="Nombres" maxlength="20" autocomplete="off" required>
    <input id="apellidos" name="txtapellidos" type="text" placeholder="Apellidos" maxlength="20" autocomplete="off" required> <br>
    <select id="tipo_doc" name="txttipo_doc" required>
        <option value="">Seleccione tipo de documento</option>
        <option value="Cedula">Cedula</option>
        <option value="Cedula extranjera">Cedula extranjera</option>
    </select>

    <input name="txtnumero_doc" id="num_doc" type="text" placeholder="Numero de documento" maxlength="25" autocomplete="off" required> <br>
    <input id="dc" name="txtdc" type="text" placeholder="Direccion" maxlength="25" autocomplete="off" required>
    <input id="tel" name="txttel" type="tel" placeholder="Telefono" maxlength="13" autocomplete="off" required>
    <input id="cel" name="txtcel" type="tel" placeholder="Celular" maxlength="13" autocomplete="off" required>
    <select id="select_r" name="ide_r" required>
        <option value="">Seleccione ruta</option>
    </select>

    <br>

    <input class="succes" id="guardar_cliente" type="submit" value="Guardar" formaction="<?= URL ?>cliente/guardar">
    <input class="succes" id="modificar_cliente" type="submit" value="Guardar cambios" formaction="<?= URL ?>cliente/modificar">
    <input id="can_mod" type="reset" value="Cancelar">

    <br>

    <div class="table-responsive">
        <table id="datos_cliente"></table>
    </div>
</form>

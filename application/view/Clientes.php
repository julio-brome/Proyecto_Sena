<form id="registro_cliente" action="" method="post">
    <h2 id="titulo">Cliente</h2>
    <input type="hidden" id="id_cliente" name="id">
    <label>Nombre</label><label id="label2">Apellidos</label> <br>
    <input id="nombres_c" name="txtnombres" type="text" placeholder="Nombres" maxlength="20" autocomplete="off" required>
    <input id="apellidos" name="txtapellidos" type="text" placeholder="Apellidos" maxlength="20" autocomplete="off" required> <br>

    <label>Tipo de documento</label><label id="label2">Numero de documento</label><br>
    <select style="margin-right:20px" id="tipo_doc" name="txttipo_doc" required>
        <option value="">Seleccione tipo de documento</option>
        <option value="Cedula">Cedula</option>
        <option value="Cedula extranjera">Cedula extranjera</option>
    </select>
    <input name="txtnumero_doc" id="num_doc" type="text" placeholder="Numero de documento" maxlength="25" autocomplete="off" required> <br>

    <label>Cartera disponible</label><label id="label2">Celular</label><br>
    <input type="number" placeholder="Cartera" name="cartera_dis" id="cartera_dis" maxlength="7">
    <input id="cel" name="txtcel" type="tel" placeholder="Celular" maxlength="13" autocomplete="off" required> <br>

    <label>Direccion</label><label id="label2">Ruta</label><br>
    <input id="dc" name="txtdc" type="text" placeholder="Direccion" maxlength="25" autocomplete="off" required>
    <select style="margin-right:20px" id="select_r" name="ide_r" required>
        <option value="">Seleccione ruta</option>
        <option value="1">ruta 1</option>
        <option value="2">ruta 2</option>
    </select>

    <br>

    <input class="succes" id="guardar_cliente" type="submit" value="Guardar" formaction="<?= URL ?>cliente/guardar">
    <input class="succes" id="modificar_cliente" type="submit" value="Guardar cambios" formaction="<?= URL ?>cliente/modificar">
    <input id="can_mod" type="reset" value="Cancelar">

    <div class="table-responsive">
        <table id="datos_cliente"></table>
    </div>

    <input type="button" value="Descargar a excel" id="enviar">
</form>

<script>
    $(document).ready(function() {
        $("#select_r").select2();
    });
</script>

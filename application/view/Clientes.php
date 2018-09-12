<form id="registro_cliente" action="" method="post">
    <h2 id="titulo">Cliente</h2>
    <input type="hidden" id="id_cliente" name="id">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Nombres</label>
                <input type="text" class="form-control" id="nombres_c" name="txtnombres" maxlength="20" autocomplete="off" required>
            </div>

            <div class="col-md-3 form-group">
                <label>Apellidos</label>
                <input type="text" class="form-control" input id="apellidos" name="txtapellidos" maxlength="20" autocomplete="off" required>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Tipo de documento</label>
                <select class="form-control" id="tipo_doc" name="txttipo_doc" required>
                    <option>Seleccione</option>
                    <option value="Cedula">Cedula ciudadania</option>
                    <option value="Cedula extranjera">Cedula extranjera</option>
                </select>
            </div>

            <div class="col-md-3 form-group">
                <label>Numero documento</label>
                <input type="text" class="form-control" name="txtnumero_doc" id="num_doc" maxlength="25" autocomplete="off" required>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Celular</label>
                <input type="number" class="form-control" id="cel" name="txtcel" maxlength="13" autocomplete="off" required>
            </div>

            <div class="col-md-3 form-group">
                <label>Cartera</label>
                <input type="number" class="form-control" name="cartera_dis" id="cartera_dis" maxlength="7">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Direccion</label>
                <input type="text" class="form-control" id="dc" name="txtdc" maxlength="25" autocomplete="off" required>
            </div>

            <div class="col-md-3 form-group">
                <label>Ruta</label>
                <select class="form-control" id="select_r" name="ide_r" required>
                    <option>Seleccione</option>
                    <?php foreach($resultado as $value): ?>
                    <option value="<?= $value->id_ruta ?>">
                        <?= $value->nombre_ruta ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <input class="succes" id="guardar_cliente" type="submit" value="Guardar" formaction="<?= URL ?>cliente/guardar">
                <input class="succes" id="modificar_cliente" type="submit" value="Guardar cambios" formaction="<?= URL ?>cliente/modificar">
                <input id="can_mod" type="reset" value="Cancelar">
            </div>
        </div>
    </div>

    <br>

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

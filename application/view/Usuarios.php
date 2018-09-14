<form id="registro_pre" action="" method="post">
    <h2 id="titulo">Usuarios</h2>
    <input type="hidden" id="id_usuario" name="id">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Nombres</label>
                <input id="nombres" class="form-control" name="txtnombres" type="text" maxlength="50" autocomplete="off" required>
            </div>

            <div class="col-md-3 form-group">
                <label>Apellidos</label>
                <input id="apellidos" class="form-control" name="txtapellidos" type="text" maxlength="50" autocomplete="off" required> <br>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Tipo de documento</label>
                <select id="tipo_doc" class="form-control" name="txttipo_doc" required>
                    <option value="Cedula">Cédula Ciudadanía</option>
                    <option value="Cedula_extran">Cedula Extranjería</option>
                    <option value="Tarjeta">Tarjeta Identidad</option>
                </select>
            </div>
            <div class="col-md-3 form-group">
                <label>Número documento</label>
                <input name="txtnumero_doc" class="form-control" id="num_doc" type="text" maxlength="30" autocomplete="off" required> <br>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Tipo de Usuario</label>
                <select id="tipo_usu" class="form-control" name="txttipo_usu" required>
                    <option value="ADMINISTRADOR">Administrador</option>
                    <option value="VENTAS">Ventas</option>
                    <option value="BODEGA">Bodega</option>
                </select>
            </div>
            <div class="col-md-3 form-group">
                <label>Usuario</label>
                <input id="user" class="form-control" name="txtuser" type="text" maxlength="30" autocomplete="off" required>
            </div>
            <div class="col-md-3 form-group">
                <label>Contraseña</label>
                <input id="clave" class="form-control" name="txtclave" type="text" maxlength="11" autocomplete="off" required>
            </div>
        </div>
    </div>


    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 form-group">

                <input class="succes" id="guardar_usuario" type="submit" value="Guardar" formaction="<?= URL ?>usuario/guardar">
                <input class="succes" id="modificar_usuario" type="submit" value="Guardar cambios" formaction="<?= URL ?>usuario/modificar">
                <input id="cancelar_mod" type="reset" value="Cancelar">

            </div>
        </div>
    </div>

    <br>
    <div class="table-responsive">
        <table id="datos_usuario"></table>
    </div>
    <input type="button" value="Descargar a excel" id="enviar">
</form>

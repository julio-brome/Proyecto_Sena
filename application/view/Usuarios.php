<form id="registro_pre" action="" method="post">
    <h2 id="titulo">Usuarios</h2>
    <input type="hidden" id="id_usuario" name="id">
    <input id="nombres" name="txtnombres" type="text" placeholder="Nombres" maxlength="50" autocomplete="off" required>
    <input id="apellidos" name="txtapellidos" type="text" placeholder="Apellidos" maxlength="50" autocomplete="off" required> <br>
    <select id="tipo_doc" name="txttipo_doc" required>
        <option value="">Tipo de documento de identidad</option>
        <option value="Cedula">Cedula</option>
        <option value="Cedula_extran">Cedula Extranjería</option>
        <option value="Tarjeta">Tarjeta Identidad</option>
    </select>
    <input name="txtnumero_doc" id="num_doc" type="text" placeholder="Número de documento" maxlength="30" autocomplete="off" required> <br>
    <select id="tipo_usu" name="txttipo_usu" required>
        <option value="">Tipo de Usuario</option>
        <option value="ADMINISTRADOR">Administrador</option>
        <option value="VENTAS">Ventas</option>
        <option value="BODEGA">Bodega</option>
    </select>

    
    <input id="user" name="txtuser" type="text" placeholder="Usuario" maxlength="30" autocomplete="off" required>
    <input id="clave" name="txtclave" type="text" placeholder="Clave" maxlength="11" autocomplete="off" required>

    <br>

    <input class="succes" id="guardar_usuario" type="submit" value="Guardar" formaction="<?= URL ?>usuario/guardar">
    <input class="succes" id="modificar_usuario" type="submit" value="Guardar cambios" formaction="<?= URL ?>usuario/modificar">
    <input id="cancelar_mod" type="reset" value="Cancelar">

    <br>
    <div class="table-responsive">
        <table id="datos_usuario"></table>
        </div>
</form>

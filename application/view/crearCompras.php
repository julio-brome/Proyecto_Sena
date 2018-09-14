<div class="container">
    <form action=" <?= URL ?>compras/guardar" method="POST" id="idcrear">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">proveedor</label>
                    <select  id="proveedor" class="form-control" onchange="listar_proveedor(this.value)">
                        <option selected value="">seleccionar</option>
                        <?php foreach($proveedores as $valor): ?>
                        <option value="<?= $valor->id_proveedor?>">
                            <?= $valor->nombre_empresa?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">contacto</label>
                    <input type="text" id="txtContacto" class="form-control" name="txtContacto" disabled="true">
                    <input type="hidden" id="ddlproveedor" class="form-control" name="ddlproveedor" >
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Tipo Documento</label>
                    <input type="text" id="txtTipoDoc" class="form-control" name="txtTipoDocumento" disabled="true">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Documento</label>
                    <input type="text" id="txtDocumento" class="form-control" name="txtDocumento" disabled="true" pattern="(/d+)">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Celular</label>
                    <input type="text" id="txtCelular" class="form-control" name="txtCelular" disabled="true">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Direccion</label>
                    <input type="text" id="txtDireccion" class="form-control" name="txtDireccion" disabled="true">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">producto</label>
                    <select name="ddlproducto" id="ddlproducto" class="form-control">
                        <option value="">seleccionar</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Tipo Producto</label>
                    <input type="text" id="txtTipoProducto" class="form-control" name="txtTipoProducto" disabled="true">
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Precio Unitario</label>
                    <input type="number" class="form-control" name="txtPrecio" id="txtPrecio" pattern="[0-9]{1,20}" title="Solo se permiten números ">

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="number" class="form-control" name="txtCantidad" id="txtCantidad">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-6">
                <div class="form-group">
                    <H1>TOTAL</H1>
                    <label for="" name="lbtotal" id="lbtotal">0</label>
                    <input type="hidden" name="total" id="total" value="0" />
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-2 col-sx-2">
                <div class="form-group">
                    <label for=""> </label>
                    <br/>
                    <button onclick="agregarProducto()" type="button" class="btn btn primary">Agregar</button>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-2 col-sx-2">
                <div class="form-group">
                    <br/>
                    <button onclick="LimpiarForm()" type="reset" class="btn btn primary " name="btnLimpiar" id="btnLimpiar">Cancelar
                    </button>
                </div>
            </div>
           

        </div>
        <table class="table" id="detalle">
            <thead>
                <tr>

                    <th>id Producto</th>
                    <th>Nombre Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="detallebody">

            </tbody>
        </table>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <button type="submit" class="btn btn primary" name="guardarCompra" onClick="return validar();">Guardar
                    </button>

                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

    var lista = [];

    $(document).ready(function () {
        $("#proveedor").select2();
        $("#ddlproducto").select2();
        
    })

    function validar() {
        if (lista.length <= 0) {
            alert("Debe ingresar por lo menos un producto.");
            return false;
        }
        else {
            return true;
        }
    }
    function eliminarproducto(elemento) {

        var e = $(elemento).parent().parent();
        $(e).remove();

    }
    function validaCadena(cadena, patron) {
        if (!cadena.search(patron))
            return true;
        else
            return false;
    }

    // function sumartotal(){
    //     var  total:  $("#lbtotal").val()

    // } // function agregarProducto() {
    //     // var productocodigo = $("#ddlproducto").val();
    //     // var precio = $("#txtPrecio").val();
    //     // var cantidad = $("#txtCantidad").val();
    //     if (validaCadena($("#txtPrecio").val(), "[a-z]{3}")) {
    //         alert("Valido");
    //     }
    //     else {
    //         alert("no válido");
    //     }
    //     var item = {
    //         productocodigo: $("#ddlproducto").val(),
    //         nombreproducto: $("#ddlproducto").text(),
    //         precio: $("#txtPrecio").val(),
    //         cantidad: $("#txtCantidad").val(),
    //         total:  $("#lbtotal").val()

    //     };

    //     lista.push(item);

    //     $("#detallebody").append("<tr><td>" + item.productocodigo + "</td><td>" + item.nombreproducto + "</td><td>" + item.precio + "</td><td>" + item.cantidad + "</td><td>" + item.precio * item.cantidad + "</td><td></td><td><input type='hidden' name='producto[]' value= + item.precio * item.cantidad + </td><td><a href='#'/></td></tr>");


    // }



    function agregarProducto() {
        // var productocodigo = $("#ddlproducto").val();
        // var precio = $("#txtPrecio").val();
        // var cantidad = $("#txtCantidad").val();

        if ($("#txtCantidad").val() == "") {
            alert("Ingrese una cantidad");
            return false;
        }
        var idProducto = $("#ddlproducto").val();
        var idproveedor = $("#proveedor").val();
        var item = {
            proveedorId: idproveedor,
            productocodigo: idProducto,
            nombreproducto: $("#ddlproducto [value='" + idProducto + "']").text(),
            precio: $("#txtPrecio").val(),
            cantidad: $("#txtCantidad").val(),
            total: $("#lbtotal").val()

        };

        lista.push(item);
        var Html = "<tr>";
        // Html += "<td>" + item.proveedorId + "</td>";
        Html += "<td>" + item.productocodigo + "</td>";
        Html += "<td>" + item.nombreproducto + "</td>";
        Html += "<td>" + item.precio + "</td>";
        Html += "<td>" + item.cantidad + "</td>";
        Html += "<td>" + item.precio * item.cantidad
            + " <input type='hidden' id='productos[]' name='productos[]' value=" + item.productocodigo + "/>"		/*Creamos un campo oculto para que se guarden todos los items que vayan agregando*/
            + " <input type='hidden' id='precios[]' name='precios[]' value=" + item.precio + "/>"
            + " <input type='hidden' id='cantidades[]' name='cantidades[]' value=" + item.cantidad + "/>"
            // + " <input type='hidden' id='proveedores[]' name='proveedores[]' value=" + item.proveedorId + "/>"
        Html += "<td><a onClick='eliminarproducto(this)' >Eliminar</a></td>";
        Html += "</tr>";
        $("#detallebody").append(Html);
        $("#txtCantidad").val("");
        $("#txtPrecio").val("");
        
      var valortotal = 0;
        valortotal =  item.precio * item.cantidad;
       valortotal += parseInt($("#lbtotal").text());
      $("#lbtotal").text(valortotal);
      $("#total").val(valortotal);

    }


    function LimpiarForm() {
        $("#txtContacto").val("");
        $("#txtTipoDoc").val("");
        $("#txtDocumento").val("");
        $("#txtCelular").val("");
        $("#txtDireccion").val("");
        $("#txtTipoProducto").val("");
        $("#txtEstado").val("");
        $("#txtCantidad").val("");
        $("#txtPrecio").val("");
        $("#proveedor").attr("disabled", false);
        $("select").val('').trigger('change');
        // $("#proveedor").attr('disabled','disabled');
    }


</script>
</form>
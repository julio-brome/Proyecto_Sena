//inputs Number
$(document).on('keypress', 'input[type=number],input[type=tel]', function () {
    if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
});

//input Text
$(document).on('keypress', 'input[type=text],input[type=password]', function (key) {
    if ((key.charCode < 97 || key.charCode > 122) //letras mayusculas
        &&
        (key.charCode < 65 || key.charCode > 90) //letras minusculas
        &&
        (key.charCode != 45) //retroceso
        &&
        (key.charCode != 241) //ñ
        &&
        (key.charCode != 209) //Ñ
        &&
        (key.charCode != 32) //espacio
        &&
        (key.charCode != 225) //á
        &&
        (key.charCode != 233) //é
        &&
        (key.charCode != 237) //í
        &&
        (key.charCode != 243) //ó
        &&
        (key.charCode != 250) //ú
        &&
        (key.charCode != 193) //Á
        &&
        (key.charCode != 201) //É
        &&
        (key.charCode != 205) //Í
        &&
        (key.charCode != 211) //Ó
        &&
        (key.charCode != 218) //Ú
        &&
        (key.keyCode < 45 || key.keyCode > 57) //numeros
    )
        return false;
});

//Buscar movimiento
$(document).on('change', '#producto_mov,#mov', function () {
    var valor = $('#mov').val();
    var valor2 = $('#producto_mov').val();

    if (valor != "" || valor2 != "") {
        buscar_movimientos(valor, valor2);
    } else {
        buscar_movimientos();
    }
});

//Buscar categoria
$(document).on('keyup', '#nombre_c', function () {
    var valor = $('#nombre_c').val();

    if (valor != "") {
        buscar_categoria(valor);
    } else {
        buscar_categoria();
    }
});

//buscar detalle
$(document).on('change', '#proveedor_d', function () {
    var valor = $('#nombre_d').val();
    var valor2 = $('#proveedor_d').val();

    if (valor != "" || valor2 != "") {
        buscar_detalle(valor, valor2);
    } else {
        buscar_detalle();
    }
});

$(document).on('keyup', '#nombre_d', function () {
    var valor = $('#nombre_d').val();
    var valor2 = $('#proveedor_d').val();

    if (valor != "" || valor2 != "") {
        buscar_detalle(valor, valor2);
    } else {
        buscar_detalle();
    }
});

//buscar proveedor
$(document).on('keyup', '#nombre_em', function () {
    var valor = $('#nombre_em').val();

    if (valor != "") {
        buscar_proveedor(valor);
    } else {
        buscar_proveedor();
    }
});

//buscar cliente
$(document).on('keyup', '#nombres_c', function () {
    var valor = $('#nombres_c').val();
    var valor2 = $('#select_r').val();

    if (valor != "" || valor2 != "") {
        buscar_cliente(valor,valor2);
    } else {
        buscar_cliente();
    }
});

$(document).on('change', '#select_r', function () {
    var valor = $('#nombres_c').val();
    var valor2 = $('#select_r').val();

    if (valor != "" || valor2 != "") {
        buscar_cliente(valor,valor2);
    } else {
        buscar_cliente();
    }
});

//buscar usuario
$(document).on('keyup', '#nombres', function () {
    var valor = $('#nombres').val();

    if (valor != "") {
        buscar_usuario(valor);
    } else {
        buscar_usuario();
    }
});

//Buscar producto
$(document).on('keyup', '#nombre_p', function () {
    var valor = $('#nombre_p').val();
    var valor2 = $("#categorias_p").val();

    if (valor != "" || valor2 != "") {
        buscar_producto(valor, valor2);
    } else {
        buscar_producto();
    }
});

$(document).on('change', '#categorias_p', function () {
    var valor = $('#nombre_p').val();
    var valor2 = $("#categorias_p").val();

    if (valor2 != "" || valor != "") {
        buscar_producto(valor, valor2);
    } else {
        buscar_producto();
    }
});

//Form productos
$(document).on('click', '#añadir', function () {
    var valor = $('#nombre_p').val();

    if (valor == "" || $('#cantidad_p').val() == "" || $('#stock_p').val() == "" || $('#precio_p').val() == "" || $('#categorias_p').val() == "") {
        mensaje = "Debe llenar todos los campos";
        ver_fail();
    } else {
        if (parseInt($('#cantidad_p').val()) >= parseInt($('#stock_p').val())) {
            consultar_producto(valor);
        } else {
            mensaje = "La cantidad debe ser mayor al stock";
            ver_fail();
        }
    }

    return false;
});

$(document).on('click', '#cancelar', function () {
    $('#añadir').show();
    $('#modificar_p').hide();
    $('select').val('').trigger('change');
    buscar_producto();
});

$(document).on('click', '#agregar', function () {
    var valor = $('#nombre_p').val();
    var valor2 = $('#precio_p').val();
    var valor3 = $('#cantidad_p').val();
    var valor4 = $('#stock_p').val();
    var valor5 = $('#categorias_p').val();
    var valor6 = $('#proveedores_p').val();

    if (valor6 != "") {
        if (contador == 0) {
            guardar_producto(valor, valor2, valor3, valor4, valor5, valor6);
            $('#volver').hide();
        } else {
            guardar_detalle(id, valor6);
        }

    } else {
        mensaje = "Debe seleccionar un proveedor";
        ver_fail();
    }
});

$(document).on('click', '#guardar', function () {
    if (contador > 0) {
        $('#lista').empty();
        $('#crear_detalle').hide();
        $('#informacion').slideDown();
        $('#volver').show();
        $('#crear_producto').trigger("reset");
        id = "";
        contador = 0;
        buscar_producto();
    } else {
        mensaje = "Debe seleccionar y Agergar Un Proveedor";
        ver_fail();
    }
});

$(document).on('click', '#volver', function () {
    var select = $('#proveedores_p');
    select.val($('option:first', select).val());
    $('#crear_detalle').slideUp();
    $('#informacion').slideDown();
    $('#lista').empty();
    contador = 0;
    id = "";
});

$(document).on('click', '#asignar', function () {
    contador = 1;
    id = $(this).val();
    $('#informacion').hide();
    $('#crear_detalle').slideDown();
    listar_detalle(id);
    $('#proveedores_p').focus();
    return false;
});

$(document).on('click', '#Estado_p', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_producto(valor, cambio);

    return false;
});

$(document).on('click', '#editar_p', function () {
    id = $(this).val();
    $('#añadir').hide();
    $('#modificar_p').show();
    editar_producto(id);
    return false;
});

$(document).on('click', '#modificar_p', function () {
    var valor = $('#nombre_p').val();
    var valor2 = $('#precio_p').val();
    var valor3 = $('#cantidad_p').val();
    var valor4 = $('#stock_p').val();
    var valor5 = $('#categorias_p').val();

    if (valor == "" || valor2 == "" || valor3 == "" || valor4 == "" || valor5 == "") {
        mensaje = "Debe llenar todos los campos";
        ver_fail();
    } else {
        modificar_producto(valor, valor2, valor3, valor4, valor5, id);
    }
    return false;
});

//Form detalle productos
$(document).on('click', '#limpiar_d', function () {
    $('select').val('').trigger('change');
    buscar_detalle();
});

$(document).on('click', '#Estado_d', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_detalle(valor, cambio);

    return false;
});

//Form categorias
$(document).on('click', '#guardar_c', function () {
    var valor = $('#nombre_c').val();

    if (valor != "") {
        guardar_categoria(valor);
    } else {
        mensaje = "Debe ingresar un nombre";
        ver_fail();
    }

    return false;
});

$(document).on('click', '#Estado_c', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_categoria(valor, cambio);

    return false;
});

$(document).on('click', '#editar_c', function () {
    id = $(this).val();
    editar_categoria(id);

    $('#guardar_c').hide();
    $('#modificar_c').show();
    $('#nombre_c').focus();
    return false;
});

$(document).on('click', '#modificar_c', function () {
    var valor = $('#nombre_c').val();

    if (valor != "") {
        modificar_categoria(id, valor);
    } else {
        mensaje = "Debe ingresar un nombre";
        ver_fail();
    }
    return false;
});

$(document).on('click', '#limpiar_c', function () {
    $('#guardar_c').show();
    $('#modificar_c').hide();
    buscar_categoria();
});

//Form cartera
$(document).on('change', '#cedula', function () {
    var cedula = $('#cedula').val();
    $('#nombre_cliente').html("");
    $('#cartera').html("0");
    $('#disponible').html("0");
    $('#pedido').html("0");

    if (cedula != "") {
        consultar_cartera(cedula);
    }
});

$(document).on('click', '#limpiar_c', function () {
    $('#nombre_cliente').html("");
    $('#cartera').html("0");
    $('#disponible').html("0");
    $('#pedido').html("0");
    $('select').val('').trigger('change');
});

//Form proveedores
$(document).on('click', '#Estado_proveedor', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_proveedor(valor, cambio);

    return false;
});

$(document).on('click', '#editar_proveedor', function () {
    editar_proveedor($(this).val());
    $('#guardar_proveedor').hide();
    $('#modificar_proveedor').show();
    return false;
});

$(document).on('click', '#cancelar_mod', function () {
    $('#modificar_proveedor').hide();
    $('#guardar_proveedor').show();
    $('select').val('').trigger('change');
    buscar_proveedor();
    return false;
});

//Form clientes
$(document).on('click', '#Estado_cliente', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_cliente(valor, cambio);

    return false;
});

$(document).on('click', '#editar_cliente', function () {
    editar_cliente($(this).val());
    $('#guardar_cliente').hide();
    $('#modificar_cliente').show();
    return false;
});

$(document).on('click', '#can_mod', function () {
    $('#modificar_cliente').hide();
    $('#guardar_cliente').show();
    $('select').val('').trigger('change');
    buscar_cliente();
});

//Form usuarios
$(document).on('click', '#Estado_usuario', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_usuario(valor, cambio);

    return false;
});

$(document).on('click', '#editar_usuario', function () {
    editar_usuario($(this).val());
    $('#guardar_usuario').hide();
    $('#modificar_usuario').show();
    return false;
});

$(document).on('click', '#cancelar_mod', function () {
    $('#modificar_usuario').hide();
    $('#guardar_usuario').show();
    $('#registro_pre').trigger("reset");
    buscar_usuario();
    return false;
});

//Form movimientos
$(document).on('click', '#reset_mov', function () {
    $('select').val('').trigger('change');
    buscar_movimientos();
});

//Login
$(document).on('click', '#entrar', function () {
    var dato = $('#user').val();
    var dato2 = $('#key').val();

    if (dato != "" && dato2 != "") {
        consultar_usuario(dato, dato2);
    } else {
        mensaje = "debe ingresar todos los datos";
        ver_fail();
    }
    return false;
});

$(document).on('click', '#ir', function () {
    $('#login').hide();
    $('#registro').slideDown();
});

$(document).on('click', '#quitar', function () {
    cerrar();
    return false;
});

//Index
$(document).on('click', '#crear_p', function () {
    $('#crear_producto').slideDown();
    $('#ver_detalle').hide();
    buscar_producto();
});

$(document).on('click', '#atras_p', function () {
    $('#crear_producto').hide();
    $('#ver_detalle').slideDown();
    buscar_detalle();
    return false;
});

//Exportar a excel
$(document).on('click', '#enviar', function () {
    $('table button').remove();
    descargarExcel();
    return false;
});

//buscar rutas
$(document).ready( function () {
    $('#rruta').DataTable();
} );
//rutas
$(document).on('change','#ddlMuni',function(){
    //var valor = $('#ddlMuni'.val());
    var mun = $('#ddlMuni').val();
    buscarBarrios($(this).val());
})

function ponerPrecio(elemento){
    var valor = $("#ddlProducto").val();
    var precio = $("#ddlProducto [value='"+valor+"']").attr("precio");
    var cantidades = $("#ddlProducto [value='"+valor+"']").attr("cantidad");
    $("#pPrecio").text(precio);
    $("#cCantidades").text(cantidades);
}

function direccion(elemento){
    var direcc = $("#ddlCliente").val();
    var tel = $("#ddlCliente").val();        
    var dato = $("#ddlCliente [value='"+direcc+"']").attr("direc");
    $("#dDir").text(dato);
    var dato2 = $("#ddlCliente [value='"+tel+"']").attr("tel");    
    $("#tTel").text(dato2);


}
  
    $(document).on('click','#adicionar',function() {
      var producto = $("#ddlProducto").val();
      var producto2 = $("#ddlProducto [value='"+producto+"']").attr("idP");
      var cantidad = $("#txtCantidad").val();
      var precio = $("#pPrecio").text();
      var subtotal1 = (cantidad*precio);
      
      
      var i = 1; //contador para asignar id al boton que borrara la fila
      var fila = '<tr id="row' + i + '"><td> <input type="hidden" value="'+producto+'" name="idProducto[]" >' + producto2 + '</td><td> <input type="hidden" value="'+cantidad+'" name="cantidades[]" >' + cantidad + '</td><td>' + precio + '</td><td> <input type="hidden" value="'+subtotal1+'" name="subtotal[]" >' + subtotal1 +'</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
      i++;

   
      $('#mytable tr:first').after(fila);
        $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
        var nFilas = $("#mytable tr").length;
        $("#adicionados").append(nFilas - 1);
        //le resto 1 para no contar la fila del header

        var chks = document.getElementsByName('subtotal[]');
        var total = 0;
        for(var i = 0; i < chks.length; i++) {
          total += parseInt(chks[i].value)
           }       
        $("#gTotal").text(total)
        var total1 = $("#gTotal").html();
        $("#totalInput").val(total1);    
          });
          
          
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
        //cuando da click obtenemos el id del boton
        $('#row' + button_id + '').remove(); //borra la fila
        //limpia el para que vuelva a contar las filas de la tabla
        $("#adicionados").text("");
        var nFilas = $("#mytable tr").length;
        $("#adicionados").append(nFilas - 1);
      });

    
   
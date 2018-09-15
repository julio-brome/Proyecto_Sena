var id;
var proveedores;
var contador = 0;

//Movimientos
function buscar_movimientos(consulta, consulta2) {
    $.ajax({
            url: uri + '/movimientos/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                movimiento: consulta,
                producto_id: consulta2
            },
        })
        .done(function (respuesta) {
            $('#datos_mov').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

//Productos
function buscar_producto(consulta, consulta2) {
    $.ajax({
            url: uri + '/producto/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: consulta,
                proveedor: consulta2
            },
        })
        .done(function (respuesta) {
            $('#datos').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function consultar_producto(consulta) {
    $.ajax({
            url: uri + '/producto/consultar_producto',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: consulta
            },
        })
        .done(function (respuesta) {
            if (respuesta == "no") {
                $('#crear_detalle').slideDown();
                $('#informacion').hide();
            } else {
                mensaje = respuesta;
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function guardar_producto(consulta, consulta2, consulta3, consulta4, consulta5, consulta6) {
    $.ajax({
            url: uri + '/producto/guardar',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: consulta,
                precio: consulta2,
                existencia: consulta3,
                stock: consulta4,
                idc: consulta5,
                idp: consulta6
            },
        })
        .done(function (respuesta) {
            if (respuesta == "no" || respuesta == "No se guardo") {
                mensaje = "Error al ejecutar la accion";
                ver_fail();
            } else {
                id = respuesta;
                $("#lista").append("<li>" + $("#proveedores_p option:selected").text() + "</li>");
                contador++;
                mensaje = "Se creo correctamente";
                ver_success();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_producto(consulta, consulta2) {
    $.ajax({
            url: uri + '/producto/estado_producto',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado del producto cambiado correctamente";
                ver_success();

                var buscar = $('#nombre_p').val();
                var buscar2 = $("#categorias_p").val();

                if (buscar != "" || buscar2 != "") {
                    buscar_producto(buscar, buscar2);
                } else {
                    buscar_producto();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_producto(consulta) {
    $.ajax({
            url: uri + '/producto/editar',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#nombre_p').val(contenido.nombre_producto);
            $('#cantidad_p').val(contenido.existencia);
            $('#stock_p').val(contenido.stock_minimo);
            $('#precio_p').val(contenido.precio_venta);
            $("#categorias_p").val(contenido.id_categoria);
            $("#categorias_p option[text=" + contenido.nombre_categoria + "]").attr("selected", "selected");
            buscar_producto($('#nombre_p').val(), $('#categorias_p').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function modificar_producto(consulta, consulta2, consulta3, consulta4, consulta5, consulta6) {
    $.ajax({
            url: uri + '/producto/modificar',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: consulta,
                precio: consulta2,
                existencia: consulta3,
                stock: consulta4,
                idc: consulta5,
                id: consulta6
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Se modifico correctamente";
                ver_success();
                $('#añadir').show();
                $('#modificar_p').hide();
                $('#crear_producto').trigger("reset");
                buscar_producto();
            } else {
                mensaje = "Error al ejecutar la accion,intentelo de nuevo";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function ver_agotados() {
    $.ajax({
            url: uri + '/producto/agotados',
            type: 'POST',
            dataType: 'html',
            data: {
            },
        })
        .done(function (respuesta) {
            $('#table-ver').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

//Detalle Productos
function buscar_detalle(consulta, consulta2) {
    $.ajax({
            url: uri + '/Detalle/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: consulta,
                proveedor: consulta2
            },
        })
        .done(function (respuesta) {
            $('#registros_d').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function guardar_detalle(consulta, consulta2) {
    $.ajax({
            url: uri + '/Detalle/guardar',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                idpro: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                $("#lista").append("<li>" + $("#proveedores_p option:selected").text() + "</li>");
                contador++;
                mensaje = "Se creo correctamente";
                ver_success();
            } else {
                mensaje = "Este proveedor ya fue asignado";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function listar_detalle(consulta) {
    $.ajax({
            url: uri + '/Detalle/lista_detalle',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            $('#lista').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_detalle(consulta, consulta2) {
    $.ajax({
            url: uri + '/Detalle/estado_detalle',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado cambiado correctamente";
                ver_success();

                var buscar = $('#nombre_d').val();
                var buscar2 = $('#proveedor_d').val();

                if (buscar != "" || buscar2 != "") {
                    buscar_detalle(buscar, buscar2);
                } else {
                    buscar_detalle();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Categorias
function buscar_categoria(consulta) {
    $.ajax({
            url: uri + '/categoria/tabla_categorias',
            type: 'POST',
            dataType: 'html',
            data: {
                categoria: consulta
            },
        })
        .done(function (respuesta) {
            $('#datos_c').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function guardar_categoria(consulta) {
    $.ajax({
            url: uri + '/categoria/guardar_categoria',
            type: 'POST',
            dataType: 'html',
            data: {
                categoria: consulta
            },
        })
        .done(function (respuesta) {
            if (respuesta == "Ya existe") {
                mensaje = respuesta;
                ver_fail();
            } else {
                mensaje = "Se guardo la categoria correctamente";
                ver_success();
                buscar_categoria();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_categoria(consulta, consulta2) {
    $.ajax({
            url: uri + '/Categoria/estado_categoria',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado de la categoria cambiado correctamente";
                ver_success();

                var buscar = $('#nombre_c').val();

                if (buscar != "") {
                    buscar_categoria(buscar);
                } else {
                    buscar_categoria();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_categoria(consulta) {
    $.ajax({
            url: uri + '/categoria/editar_categoria',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#nombre_c').val(contenido.nombre_categoria);
            buscar_categoria($('#nombre_c').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function modificar_categoria(consulta, consulta2) {
    $.ajax({
            url: uri + '/categoria/modificar_categoria',
            type: 'POST',
            data: {
                id: consulta,
                nombre: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Categoria modificada correctamente";
                ver_success();
                buscar_categoria($('#nombre_c').val());
                $('#guardar_c').show();
                $('#modificar_c').hide();
                id = "";
            } else {
                mensaje = respuesta;
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Cartera
function consultar_cartera(consulta) {
    $.ajax({
            url: uri + '/Cartera/buscar',
            type: 'POST',
            data: {
                cedula: consulta
            },
        })
        .done(function (respuesta) {
            console.log(JSON.stringify(respuesta));
            var contenido = jQuery.parseJSON(respuesta);
            $('#nombre_cliente').html(contenido.nombres_cliente + " " + contenido.apellidos_cliente);
            $('#cartera').html(contenido.cartera);
            $('#disponible').html((contenido.cartera) - (contenido.valor_total));
            $('#pedido').html(contenido.valor_total);
        })
        .fail(function () {
            console.log("error");
        });
}

//Login
function consultar_usuario(consulta, consulta2) {
    $.ajax({
            url: uri + '/Login/buscar',
            type: 'POST',
            dataType: 'html',
            data: {
                usuario: consulta,
                clave: consulta2,
            },
        })
        .done(function (respuesta) {
            if (respuesta == "usuario incorrecto") {
                mensaje = respuesta;
                ver_fail();
            } else {
                window.location = uri + '/Login/menu';
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function cerrar() {
    $.ajax({
            url: uri + '/Login/cerrar',
            type: 'POST',
            dataType: 'html',
            data: {},
        })
        .done(function (respuesta) {
            if (respuesta == "Se cerro") {
                window.location = uri + '/Login/index';
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Proveedores
function buscar_proveedor(consulta) {
    $.ajax({
            url: uri + '/proveedor/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                nombre: consulta
            },
        })
        .done(function (respuesta) {
            $('#datos_proveedor').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_proveedor(consulta) {
    $.ajax({
            url: uri + '/proveedor/editar',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#id_proveedor').val(contenido.id_proveedor);
            $('#nombre_em').val(contenido.nombre_empresa);
            $('#nombre_con').val(contenido.nombre_contacto);
            $('#tipo_doc').val(contenido.tipo_documento);
            $('#num_doc').val(contenido.numero_documento);
            $("#dc").val(contenido.direccion);
            $("#tel").val(contenido.telefono);
            $("#cel").val(contenido.celular);
            buscar_proveedor($('#nombre_em').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_proveedor(consulta, consulta2) {
    $.ajax({
            url: uri + '/proveedor/estado_proveedor',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado del proveedor cambiado correctamente";
                ver_success();

                var buscar = $('#nombre_em').val();

                if (buscar != "") {
                    buscar_proveedor(buscar);
                } else {
                    buscar_proveedor();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Usuarios
function buscar_usuario(consulta) {
    $.ajax({
            url: uri + '/usuario/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                nombre: consulta
            },
        })
        .done(function (respuesta) {
            $('#datos_usuario').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_usuario(consulta) {
    $.ajax({
            url: uri + '/usuario/editar',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#id_usuario').val(contenido.id_usuario);
            $('#nombres').val(contenido.nombres_usuario);
            $('#apellidos').val(contenido.apellidos_usuario);
            $('#tipo_doc').val(contenido.tipo_documento);
            $('#num_doc').val(contenido.numero_documento);
            $("#tipo_usu").val(contenido.rol_usuario);
            $("#user").val(contenido.usuario);
            $("#clave").val(contenido.clave);
            buscar_usuario($('#nombres_us').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_usuario(consulta, consulta2) {
    $.ajax({
            url: uri + '/usuario/estado_usuario',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado del usuario cambiado correctamente";
                ver_success();

                var buscar = $('#nombres_us').val();

                if (buscar != "") {
                    buscar_usuario(buscar);
                } else {
                    buscar_usuario();
                }
            } else {
                mensaje = "Error al cambiar el estado del usuario";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Clientes
function buscar_cliente(consulta,consulta2) {
    $.ajax({
            url: uri + '/cliente/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                nombre: consulta,
                ruta: consulta2
            },
        })
        .done(function (respuesta) {
            $('#datos_cliente').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_cliente(consulta) {
    $.ajax({
            url: uri + '/cliente/editar',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#id_cliente').val(contenido.id_cliente);
            $('#nombres_c').val(contenido.nombres_cliente);
            $('#apellidos').val(contenido.apellidos_cliente);
            $('#tipo_doc').val(contenido.tipo_documento);
            $('#num_doc').val(contenido.numero_documento);
            $("#dc").val(contenido.direccion);
            $("#cartera_dis").val(contenido.cartera);
            $("#cel").val(contenido.celular);
            $("#select_r").val(contenido.id_ruta);
            buscar_cliente($('#nombres_c').val(),$('#select_r').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_cliente(consulta, consulta2) {
    $.ajax({
            url: uri + '/cliente/estado_cliente',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado del cliente cambiado correctamente";
                ver_success();

                var buscar = $('#nombres').val();

                if (buscar != "") {
                    buscar_cliente(buscar);
                } else {
                    buscar_cliente();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//limpiar session
function limpiar(){
    $.ajax({
            url: uri + '/login/limpiar',
            type: 'POST',
            dataType: 'html',
            data: {},
        })
        .done(function (respuesta) {
        console.log(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}
//ajax consulta pedido
function ConsultarDetalle(id) {
    $.ajax({
      Type: "get",
      dataType: "json",
      url: uri + "/pedido/ConsultarDetalleP/" + id
      
    }).done(detallepedido => {
      if (detallepedido.length > 0) {
        $("#detallebodys").empty();
  
        detallepedido.forEach((e, i) => {
          $("#txtFecha").val(e.fecha_de_creacion);
          $("#txtCliente").val(e.nombres_cliente);
          $("#lbtotall").html(e.valor_total);
  
          $("#detallebodys").append(
            `<tr>
              <td>${e.nombre_producto}</td>
              <td>${e.precio_venta}</td>
              <td>${e.cantidad}</td>
              <td>${e.subtotal}</td>
            </tr>`
          );
        });
  
        $("#Modal_Pedido").modal();
      } else {
        alert("no tiene pedidos");
      }
    });
  }
  
  function ConsultarPed() {
    $.ajax({
      Type: "get",
      dataType: "json",
      url: uri + "pedido/ConsultarpedidoParametros",
      data: {
        idcliente: $("#idcliente").val(),
        fechaInicio: $("#txtfechaInicio").val(),
        fechaFin: $("#txtfechaFin").val()
      }
    }).done(consultapedidos => {
      if (consultapedidos.length > 0) {
        $("#ped").empty();
  
        consultapedidos.forEach((e, i) => {
          $("#ped").append(
            `<tr>
              <td>${e.fecha_de_creacion}</td>
              <td>${e.nombres_cliente+" "+e.apellidos_cliente}</td>
              <td>${e.valor_total}</td>
              <td>${e.estado_pedido}</td>

              <td>
              <a class="btn btn-primary" onclick="ConsultarDetalle('${
                e.id_cliente_pedido
              }')">Ver Detalle</a>
           
              </td>
              </tr>`
          );
        });
      } else {
        alert("no hay pedidos para ese rango seleccionado");
      }
    });
  }
  

  //listar barrios por municipios
function buscarBarrios(consulta){
    $.ajax({
        url: uri+ '/Ruta/consultar_barrio',
        type:'POST',
        datatype:'HTML',
        data:{
            id:consulta,
        },
         })
         .done(function(datos){
             $('#ddlbarri').html(datos);
         })

         .fail(function(){
             console.log("error");
         });
}

//ediar barrios
function editarBarrios(consulta){
    $.ajax({
        url: uri+ '/Ruta/editar',
        type:'POST',
        datatype:'HTML',
        data:{
            id:consulta,
        },
         })
         .done(function(datos){
            var contenido= jQuery.parseJSON(datos);
            $('#txxtId').val(contenido.id_ruta);
            $('#txtNombre').val(contenido.nombre_ruta);
            $('#ddlMuni').val(contenido.id_municipio);     
             $('#ddlbarri').val(contenido.id_barrio);
         })

         .fail(function(){
             console.log("error");
         });
}
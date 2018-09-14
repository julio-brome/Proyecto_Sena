$(function() {

    // just a super-simple JS demo

    var demoHeaderBox;

    // simple demo to show create something via javascript on the page
    if ($('#javascript-header-demo-box').length !== 0) {
    	demoHeaderBox = $('#javascript-header-demo-box');
    	demoHeaderBox
    		.hide()
    		.text('Hello from JavaScript! This line has been added by public/js/application.js')
    		.css('color', 'green')
    		.fadeIn('slow');
    }

    // if #javascript-ajax-button exists
    if ($('#javascript-ajax-button').length !== 0) {

        $('#javascript-ajax-button').on('click', function(){

            // send an ajax-request to this URL: current-server.com/songs/ajaxGetStats
            // "url" is defined in views/_templates/footer.php
            $.ajax(url + "/songs/ajaxGetStats")
                .done(function(result) {
                    // this will be executed if the ajax-call was successful
                    // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                    $('#javascript-ajax-result-box').html(result);
                })
                .fail(function() {
                    // this will be executed if the ajax-call had failed
                })
                .always(function() {
                    // this will ALWAYS be executed, regardless if the ajax-call was success or not
                });
        });
    }

});

function listar_proveedor(Code) {
    /*let id = $(e).val();**/
  
    $.ajax({
      Type: "get",
      dataType: "json",
      url: uri + "/compras/Consultarproveedor/" + Code
      // data: '{"id":"'+Code+'"}'
    }).done(respuesta => {
      $("#ddlproducto").empty();
  
      respuesta.forEach((e, i) => {
        $("#ddlproducto").append(
          "<option value='" +
            e.id_producto +
            "' nombre='" +
            e.nombre_producto +
            "'>" +
            e.nombre_producto +
            "</option>"
        );
      });
  
      if (respuesta.length > 0) {
        $("#txtContacto").val(respuesta[0].nombre_contacto);
        $("#txtTipoDoc").val(respuesta[0].tipo_documento);
        $("#txtDocumento").val(respuesta[0].numero_documento);
        $("#txtCelular").val(respuesta[0].celular);
        $("#txtDireccion").val(respuesta[0].direccion);
        $("#txtTipoProducto").val(respuesta[0].nombre_categoria);
        $("#txtEstado").val(respuesta[0].direccion);
        $("#ddlproveedor").val(Code);
        $("#proveedor").attr("disabled", true);
      } else {
        alert("La consulta de proveedor no generó resultados.");
      }
    });
  }
  
  function ConsultarDetalle(id) {
    $.ajax({
      Type: "get",
      dataType: "json",
      url: uri + "/compras/ConsultarDetalle/" + id
      // data : {
      //     proveerdor : $("#").val(),
  
      // }
    }).done(detalleCompra => {
      if (detalleCompra.length > 0) {
        $("#detallebodys").empty();
  
        detalleCompra.forEach((e, i) => {
          $("#txtFecha").val(e.fecha_de_compra);
          $("#txtTipoProveedor").val(e.nombre_empresa);
          $("#lbtotall").html(e.total_compra);
  
          $("#detallebodys").append(
            `<tr>
              <td>${e.nombre_producto}</td>
              <td>${e.precio_unitario}</td>
              <td>${e.cantidad}</td>
              <td>${e.subtotal_compra}</td>
            </tr>`
          );
        });
  
        $("#Modal_Compra").modal();
      } else {
        alert("no tiene compras");
      }
    });
  }
  
  function ConsultarCompra() {
    $.ajax({
      Type: "get",
      dataType: "json",
      url: uri + "compras/ConsultarCompra",
      data: {
        idproveedor: $("#proveedor").val(),
        fechaInicio: $("#txtfechaInicio").val(),
        fechaFin: $("#txtfechaFin").val()
      }
    }).done(compra => {
      if (compra.length > 0) {
        $("#consultaCompra").empty();
  
        compra.forEach((e, i) => {
          $("#consultaCompra").append(
            `<tr>
              <td>${e.fecha_de_compra}</td>
              <td>${e.nombre_empresa}</td>
              <td>${e.total_compra}</td>
              <td>
              <a class="btn btn-primary" onclick="ConsultarDetalle('${
                e.id_compra
              }')">Ver Detalle</a>
           
              </td>
              </tr>`
          );
        });
      } else {
        alert("no hay compras para ese rango seleccionado");
      }
    });
  }
  
  
  
$(document).ready(function() {
    //obtenemos el valor de los input
    
    $('#adicionar').click(function() {
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

    
    });
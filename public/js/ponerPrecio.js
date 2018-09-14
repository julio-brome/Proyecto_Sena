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



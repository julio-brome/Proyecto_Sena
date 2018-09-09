//Exportar clientes a excel
function descargarExcel() {
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('.table-responsive').html()));
    buscar_cliente();
    buscar_proveedor();
    buscar_categoria();
    buscar_detalle();
    buscar_movimientos();
    buscar_usuario();
}

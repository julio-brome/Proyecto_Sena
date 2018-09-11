$(traer(), mostrar(), menus(),ver_agotados());

function menus() {
    if ($('#user_log').val() == "ADMINISTRADOR") {

    } else if ($('#user_log').val() == "BODEGA") {
        $('#clientes').hide();
        $('#usuarios').hide();
        $('#rutas').hide();
        $('#carteras').hide();
        $('#movimientos').hide();
    } else if ($('#user_log').val() == "VENDEDOR") {
        $('#compras').hide();
        $('#usuarios').hide();
        $('#rutas').hide();
        $('#carteras').hide();
        $('#proveedores').hide();
        $('#productos').hide();
        $('#movimientos').hide();
    }
}

function traer() {
    if ($('#carga').val() == "1") {
        $('#contenido').html("");
        $('#contenido').load(uri + '/Usuario/index', function () {
            buscar_usuario();
        });
    } else if ($('#carga').val() == "2") {
        $('#contenido').html("");
        $('#contenido').load(uri + '/cliente/index', function () {
            buscar_cliente();
        });

    } else if ($('#carga').val() == "3") {
        $('#contenido').html("");
        $('#contenido').load(uri + '/Proveedor/index', function () {
            buscar_proveedor();
        });
    } else if ($('#carga').val() == "4"){

    } else if ($('#carga').val() == "5") {
        $('#contenido').html("");

    } else if ($('#carga').val() == "6") {
        $('#contenido').html("");

    } else if ($('#carga').val() == "7") {
        $('#contenido').html("");
        $('#contenido').load(uri + '/Pedido/consultaPedido', function () {
            ponerPrecio();
            direccion();  
        });

    } else if ($('#carga').val() == "8") {
        $('#contenido').html("");

    } else if ($('#carga').val() == "9") {
        $('#contenido').html("");
        $('#contenido').load(uri + '/movimientos/index', function () {
            buscar_movimientos();
        });
    }
}

function mostrar() {
    if ($('#org').val() != "") {
        mensaje = $('#org').val();
        ver_success();
        limpiar();
    }
}

$(document).on('click', '#usuarios', function () {
    $('#contenido').html("");
    $('#contenido').load(uri + '/Usuario/index', function () {
        buscar_usuario();
    });
});

$(document).on('click', '#categorias', function () {
    $('#contenido').html("");
    $('#contenido').load(uri + '/categoria/index', function () {
        buscar_categoria();
    });
});

$(document).on('click', '#clientes', function () {
    $('#contenido').html("");
    $('#contenido').load(uri + '/cliente/index', function () {
        buscar_cliente();
    });
});

$(document).on('click', '#proveedores', function () {
    $('#contenido').html("");
    $('#contenido').load(uri + '/Proveedor/index', function () {
        buscar_proveedor();
    });
});

$(document).on('click', '#productos', function () {
    $('#contenido').html("");
    $('#contenido').load(uri + '/Producto/index', function () {
        buscar_detalle();
    });
});

$(document).on('click', '#carteras', function () {
    $('#contenido').html("");
    $('#contenido').load(uri + '/cartera/index');
});

$(document).on('click', '#rutas', function () {
    $('#contenido').html("");
});

$(document).on('click', '#pedidos', function () {
    $('#contenido').html("");
    $('#contenido').load(uri + '/Pedido/index');
    ponerPrecio();
    direccion();
});

$(document).on('click', '#compras', function () {
    $('#contenido').html("");
});

$(document).on('click', '#agotados', function () {
    $('#contenido').html("");
    $('#contenido').load(uri + '/producto/vista', function () {
        ver_agotados();
    });
});

$(document).on('click', '#movimientos', function () {
    $('#contenido').html("");
    $('#contenido').load(uri + '/movimientos/index', function () {
        buscar_movimientos();
    });
});

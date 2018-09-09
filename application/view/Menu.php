<?php
//comentario prueba...
if(isset ($_SESSION['USUARIO'])){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= URL ?>/public/css/bootstrap-yeti.css">
    <link rel="stylesheet" href="<?= URL ?>/public/css/custom.css">
    <link rel="stylesheet" href="<?= URL ?>/public/css/alerta.css">
</head>
    
<body>
   <input id="carga" type="hidden" value="<?= $_SESSION['LOCAL']?>">
   <?php if(isset($_SESSION['RESPUESTA'])): ?>
   <input type="hidden" id ="org" value="<?= $_SESSION['RESPUESTA']?>">
   <?php else: ?>
   <input type="hidden" id ="org" value="">
   <?php endif; ?>
   <input id="user_log" type="hidden" value="<?= $_SESSION['USUARIO']->rol_usuario ?>">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= $_SESSION['USUARIO']->rol_usuario;?></a>
        </div>
        <div class="row-fluid">
            <div class="row" style="float: left; margin: 0 0 0 25px;">
                <p style="color: white;">
                    <?php $hoy = date("d-m-Y "); echo $hoy; echo $_SESSION['USUARIO']->nombres_usuario; ?>
                </p>
            </div>
            <div class="row" style="float: right; margin: 12px 25px 0 0;">
                <a id="quitar" href="#" class="btn btn-danger" style="width: 100px;">Salir</a>
            </div>
        </div>
    </nav>
    <!-- /. NAV TOP  -->

    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?= URL ?>/public/img/logo.png" class="user-image img-responsive" />
                </li>
                <li>
                    <a id="usuarios" href="#"><i class="fa fa-male fa-2x"  style="color: silver"></i> Usuarios</a>
                </li>
                <li>
                    <a id="clientes" href="#"><i class="fa fa-users fa-lg" style="color: silver"></i> Clientes</a>
                </li>
                <li>
                    <a id="proveedores" href="#"><i class="fa fa-truck fa-lg" style="color: silver"></i> Proveedores</a>
                </li>
                <li>
                    <a id="productos" href="#"><i class="fa fa-gift fa-lg" style="color: silver"></i> Productos</a>
                <ul class="children">
                    <li>
                       <a id="agotados" href="#"><i class="fa fa-exclamation-triangle fa-lg" style="color: silver"></i> Productos agotados</a>
                    </li>
                    <li>
                       <a id="categorias" href="#"><i class="fa fa-copy fa-lg" style="color: silver"></i> Categorias</a>
                    </li>
                </ul>
                </li>
                <li>
                    <a id="carteras" href="#"><i class="fa fa-money fa-lg" style="color: silver"></i> Cartera</a>
                </li>
                <li>
                    <a id="compras" href="#"><i class="fa fa-shopping-cart fa-lg" style="color: silver"></i> Compras</a>
                </li>
                <li>
                    <a id="pedidos" href="#"><i class="fa fa-book fa-lg" style="color: silver"></i> Pedidos</a>
                </li>
                <li>
                    <a id="rutas" href="#"><i class="fas fa-route fa-lg" style="color: silver"></i> Rutas </a>
                </li>
                <li>
                    <a id="movimientos" href="#"><i class="fa fa-people-carry fa-lg" style="color: silver"></i> Movimientos </a>
                </li>
            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->

    <div id="wrapper">
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row-fluid" id="contenido" style="width: 100%">
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class=" col-md-offset-4 col-md-4">

                        <center><img src="<?= URL ?>/public/img/logoSmartDistri.png" class="img-responsive">
                            <br>
                            <h2>Bienvenido.</h2>

                            <h5>Que actividad deseas hacer hoy? </h5><br>
                            <?php if($_SESSION['USUARIO']->rol_usuario == "ADMINISTRADOR" || $_SESSION['USUARIO']->rol_usuario == "BODEGA"){?>
                            <h4>Productos agotados</h4>
                            <table id="table-ver"></table>
                            <?php } ?>
                        </center>


                        <!-- <object data="SG53-chatbots.pdf" type="application/pdf" width="100%" height="1050px">                           
                         </object> -->
                    </div>
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>
<?php } else {
    header("location: ".URL."Login/index");
}

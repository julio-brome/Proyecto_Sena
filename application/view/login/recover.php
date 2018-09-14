<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= URL ?>/public/css/bootstrap-yeti.css">
    <link rel="stylesheet" href="<?= URL ?>/public/css/Login.css">
    <link rel="stylesheet" href="<?= URL ?>/public/css/alerta.css">
    <link rel="stylesheet" href="<?= URL ?>/public/font-awesome/css/font-awesome.min.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="popupunder alert alert-success fade in"><strong>Success : </strong> The update process has been completed successfull!</div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="popupunder alert alert-fail fade in"><strong>Success : </strong> The update process has been completed successfull!</div>
        </div>
    </div>

    <div class="row">
        <div class="row-fluid">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" style="margin-top: 100px;">
                <div class="panel-login">
                    <div class="panel-body" id="principal">
                        <form class="form-signin" id="formlogin">
                            <div class="col-md-6  col-md-offset-3">
                                <img src=" <?= URL ?>/public/img/logoSmartDistri.png" class="img-responsive">
                            </div>
                            <br>
                            <div class="col-md-12">
                                <!-- <h4 class="color-light">Bienvenido</h4> -->
                                <br>
                                <br>
                                <p class="color-light">Ingresa tu correo electronico.</p>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <br>
                                <div class="errores" id="mensaje1">
                                    <p class="text-danger">Introduce tu usuario.</p>
                                </div>

                                <div class="input-group" id="campo1"><span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                    <input type="text" name="usu" id="user" class="form-control form-login btn-block" placeholder="Correo" autofocus />
                                </div>

                                <br>
                                <div class="col-lg-4 col-lg-offset-8">
                                    <div class="form-group" id="campoapaterno">
                                        <button id="entrar" type="submit" class="btn btn-primary btn-block">Enviar contraseña</button>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-lg-8 col-lg-offset-4" style="margin:center">
                                    <a class="underlineHover" href="<?php echo URL; ?>login">Volver a iniciar sesión</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var uri = "<?=URL?>";

    </script>

    <script type="text/javascript" src="<?= URL?>/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= URL?>/public/js/main.js"></script>
    <script type="text/javascript" src="<?= URL?>/public/js/metodos.js"></script>
    <script type="text/javascript" src="<?= URL?>/public/js/alertas.js"></script>
    <script type="text/javascript" src="<?= URL?>/public/js/jquery.js"></script>
    <script type="text/javascript" src="<?= URL?>/public/js/bootstrap.js"></script>

</body>

</html>

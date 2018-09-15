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

            <!-- Login Form -->
            <form method="POST" action="<?php echo URL; ?>login/updatePasswordWithCode">
                <input type="hidden" id="txtIdUsuario" name="txtIdUsuario" placeholder="Código del Usuario" value="<?php echo $user->idUsuario; ?>">
                <input type="password" id="txtContrasena" name="txtContrasena" placeholder="Nueva Contraseña">
                <input type="password" id="txtRepetirContrasena" name="txtRepetirContrasena" placeholder="Repetir Contraseña">
                
                <div class="loginButton">
                    <input id="btnGuardar" name="btnGuardar" type="submit" value="Cambiar Contraseña" onclick="return comparePassword();">
                </div>
                
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="<?php echo URL; ?>login">Volver a iniciar sesión</a>
            </div>

        </div>
    </div>

    <script>
        var url = "<?php echo URL; ?>";

         function comparePassword(){
                var contrasena = document.getElementById('txtContrasena').value;
                var repetirContrasena = document.getElementById('txtRepetirContrasena').value;

                if(contrasena != repetirContrasena){
                    alert('Las contraseñas no coinciden.');
                    return false;
                }else{
                    return true;
                }

            }

    </script>

    <script src="<?php echo URL; ?>login_libs/jquery.min.js"></script>
    <script src="<?php echo URL; ?>login_libs/bootstrap.min.js"></script>

    <?php if(isset($mensaje)){ ?>

        <script>
            
            window.onload = function(){
                alert('<?php echo $mensaje; ?>');
            }

        </script>

    <?php } ?>

</body>

</html>
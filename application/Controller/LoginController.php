<?php 

namespace Mini\Controller;

use Mini\Model\Login;
use Mini\Libs\Helper;
use Mini\Core\Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class LoginController {
    
    public function index(){
        
        if(isset ($_SESSION['USUARIO'])){
            header("location: ".URL."Login/menu");
        }else {
            
        }
            require APP.'view/Login.php';
    }
    
    public function menu(){
        require APP.'view/_templates/header.php';
        require APP.'view/Menu.php';
        require APP.'view/_templates/footer.php';
    }
    
    public function cerrar(){
        session_destroy();
        
        echo "Se cerro";
    }
    
    public function buscar(){
    $datos = new Login();
    $datos->__SET("usuario", $_POST['usuario']);
    $datos->__SET("clave", $_POST['clave']);
    $p = $datos->consulta_usuario();
        
    if(empty($p)){
        echo "usuario incorrecto";
    } else {
        $_SESSION['USUARIO']= $p;
    }

    }

    public function limpiar(){
        unset($_SESSION['RESPUESTA']);
        unset($_SESSION['LOCAL']);

        echo "se cerraron";
    }

    public function sendRecoveryCode()
    {
        if (isset($_POST["txtCorreoElectronico"]) && trim($_POST["txtCorreoElectronico"] != '')) {
            $correoElectronico = $_POST['txtCorreoElectronico'];
            $codigo = $this->createRandomCode();
            $fechaRecuperacion = date("Y-m-d H:i:s", strtotime('+24 hours'));
            $userModel = new User();
            $user = $userModel->getUserWithEmail($correoElectronico);

            if ($user === false) {
                $mensaje = 'El correo electrónico no se encuentra registrado en el sistema.';
                $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
            } else {
                $respuesta = $userModel->recoverPassword($correoElectronico, $codigo, $fechaRecuperacion);
            
                if ($respuesta) {
                    $this->sendMail($correoElectronico, $user->nombreCompleto, $codigo);
                    
                    $mensaje = 'Se ha enviado un correo electrónico con las instrucciones para el cambio de tu contraseña. Por favor verifica la información enviada.';
                    $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
                } else {
                    $mensaje = 'No se recuperar la cuenta. Si los errores persisten comuniquese con el administrador del sitio.';
                    $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
                }
            }
        } else {
            $mensaje = 'El campo de correo electrónico es requerido.';
            $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
        }
    }

    public function createRandomCode()
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
    
        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
    }

    public function sendMail($correoElectronico, $nombre, $codigo)
    {
        $template = file_get_contents(APP.'view/login/template.php');
        $template = str_replace("{{name}}", $nombre, $template);
        $template = str_replace("{{action_url_2}}", '<b>http:'.URL.'login/newPassword/'.$codigo.'</b>', $template);
        $template = str_replace("{{action_url_1}}", 'http:'.URL.'login/newPassword/'.$codigo, $template);
        $template = str_replace("{{year}}", date('Y'), $template);
        $template = str_replace("{{operating_system}}", Helper::getOS(), $template);
        $template = str_replace("{{browser_name}}", Helper::getBrowser(), $template);

        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'smartsupply06@gmail.com';   //username
            $mail->Password = 'sena2018';   //password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;                    //smtp port

            $mail->setFrom('smartsupply06@gmail.com', 'SmartSupply-Distrijuanes');
            $mail->addAddress($correoElectronico, $nombre);

            $mail->isHTML(true);

            $mail->Subject = 'Recuperación de contraseña - SmartSupply-Distrijuanes';
            $mail->Body    = $template;

            if (!$mail->send()) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
            // echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    public function recover()
    {
        require APP.'view/Login/recover.php';
    }
}

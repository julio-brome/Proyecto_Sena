<?php 

namespace Mini\Controller;

use Mini\Model\Cartera;
use Mini\Model\Clientes;

class CarteraController {
    
    public function index(){
        if(isset($_SESSION['USUARIO'])){
            $clientes = new Clientes();
            $clientes->__SET("nombres", "");
            $clientes->__SET("id_ruta", "");
            $resultado= $clientes->listar();
        }else {
            header("location: ".URL."Login/menu");
        }

        
        require APP.'view/Cartera.php';
    }
    
    public function buscar(){
        $cartera = new Cartera();
        $cartera->__SET("cedula", $_POST['cedula']);
        $p = $cartera->consulta_pedido();
            
        if(empty($p)){
            $p = $cartera->consulta_cliente();
        }else {
        }
            
        echo json_encode($p,JSON_FORCE_OBJECT);
    }
    
}

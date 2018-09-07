<?php 

namespace Mini\Controller;

use Mini\Model\Movimientos;
use Mini\Model\Producto;

class MovimientosController {
    
    public function index(){
        if(isset($_SESSION['USUARIO'])){
            if($_SESSION['USUARIO']->rol_usuario== "ADMINISTRADOR"){
                $productos = new Producto();
                $m = new Movimientos();
                $productos->__SET("nombre", "");
                $productos->__SET("proveedor", "");
                $pro = $productos->listar_productos();
            }else {
                header("location: ".URL."Login/menu");
            }
        }else {
                header("location: ".URL."Login/menu");
        }
        require APP.'view/Movimientos.php';
    }
    
    public function tabla(){
        $salida = "";
        $mov = new Movimientos();
        
        if(isset($_POST['movimiento']) && isset($_POST['producto_id'])){
        $mov->__SET("tipo", $_POST['movimiento']);
        $mov->__SET("producto", $_POST['producto_id']);
        $mv = $mov->listar_movimientos();
        }else {
        $mov->__SET("tipo", "");
        $mov->__SET("producto", "");
        $mv = $mov->listar_movimientos();  
        }
        if(empty($mv)){
        $salida.="No hay registros";
        }else {
        $salida.="<table class='tabla_datos'>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Tipo de movimiento</th>
                <th>cantidad</th>
                <th>Descripcion</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>";
        foreach($mv as $value):
        $salida.="<tr>
                <td>
                    ".$value->nombre_producto."
                </td>
                <td>
                    ".$value->tipo_movimiento."
                </td>
                <td>
                    ".$value->cantidad."
                </td>
                <td>
                    ".$value->descripcion."
                </td>
                <td>
                    ".$value->fecha."
                </td>
    </tr>"; 
        endforeach;
            $salida.="</tbody></table>";
        }
        echo $salida;
    }
    
    public function guardar () {
        $movimiento = new Movimientos();
        $movimiento->__SET("tipo", $_POST['mov']);
        $movimiento->__SET("producto", $_POST['producto']);
        $movimiento->__SET("descripcion", $_POST['descripcion']);
        $movimiento->__SET("cantidad", $_POST['cantidad']);

        if($_POST['mov'] == "baja"){
            if($movimiento->disminuir()){
                $_SESSION['RESPUESTA'] = "Movimiento registrado correctamente";
            }else {
                $_SESSION['RESPUESTA'] = "Error al guardar";
            }
        }else {
            if($movimiento->aumentar()){
                $_SESSION['RESPUESTA'] = "Movimiento registrado correctamente";
            }else {
                $_SESSION['RESPUESTA'] = "Error al guardar";
            }
        }

        $_SESSION['LOCAL'] = "9";
        header("location: ".URL."Login/menu");
    }
    
}

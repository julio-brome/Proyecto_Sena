<?php 

namespace Mini\Controller;

use Mini\Model\Detalle;

class DetalleController {
    
    public function tabla(){
        $detalle = new Detalle();
        $salida="";
        
        if(isset($_POST['producto']) &&isset($_POST['proveedor'])){
            $detalle->__SET("producto", $_POST["producto"]);
            $detalle->__SET("proveedor", $_POST["proveedor"]);
            $productos = $detalle->mostrar_detalles();
        }else {
            $detalle->__SET("producto", "");
            $detalle->__SET("proveedor", "");
            $productos = $detalle->mostrar_detalles();
        }
        
        if(empty($productos)){
        $salida.="No hay registros";
        }else {
        $salida.="<table class='tabla_datos'>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Proveedor</th>
                <th>Estado</th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>";
        foreach($productos as $value):
        if($value->estado_detalle==1){
        $estados = "Inhabilitar";
        $texto = "Activo";
        $color = "red";
        } else {
        $estados = "Habilitar";
        $texto = "Inactivo";
        $color = "green";
        }
        $salida.="<tr>
                <td>
                    ".$value->nombre_producto."
                </td>
                <td>
                    ".$value->nombre_empresa."
                </td>
                <td>
                    ".$texto."
                </td>
                <td>
                <button style='background-color: ".$color." ;' id='Estado_d' value=".$value->id_detalle_producto_proveedor.">".$estados."</button>
                </td>
    </tr>"; 
        endforeach;
            $salida.="</tbody></table>";
        }
            echo $salida;
    }
    
    public function Guardar(){
        $detalle = new Detalle();
        if(isset($_POST['id']) && isset($_POST['idpro'])) {
        $detalle->__SET("producto", $_POST["id"]);
        $detalle->__SET("proveedor", $_POST["idpro"]);
            
        $existe = $detalle->buscar_detalle();
            
        if(empty($existe)){
           if($detalle->guardar_detalle()){
               echo "si";
           }else {
               echo "No se creo";
           }
         }else {
           echo "Existe";
        }
        }else {
            echo "No llegaron datos";
        }
    }
    
    public function lista_detalle(){
        $detalle = new Detalle();
        $html="";
        if(isset($_POST['id'])){
        $detalle->__SET("id", $_POST['id']);
        $p = $detalle->listar_detalle();
        
        foreach($p as $valor){
        $html.="<li>".$valor->nombre_empresa."</li>";
        }
        }
        
        echo ($html);
    }
    
    public function estado_detalle(){
        $detalle = new Detalle();
        if(isset($_POST['id']) && isset($_POST['estado'])) {
        $detalle->__SET("id", $_POST["id"]);
        $detalle->__SET("estado", $_POST["estado"]);
            
            
        if($detalle->cambiar_estado()){
            echo "si";
        }else{
            echo "no";
        }
    }
    }
    
}

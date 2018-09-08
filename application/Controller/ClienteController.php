<?php

namespace Mini\Controller;

use Mini\Model\Clientes;

class ClienteController {

    public function index (){
        if(isset($_SESSION['USUARIO'])){
            if($_SESSION['USUARIO']->rol_usuario== "ADMINISTRADOR" || $_SESSION['USUARIO']->rol_usuario== "BODEGA"){
            }else {
                header("location: ".URL."Login/menu");
            }
        }else {
            header("location: ".URL."Login/menu");
        }
        require APP.'view/Clientes.php';
    }

    public function tabla(){
        $cliente = new Clientes();
        $salida="";

        if(isset($_POST['nombre'])){
            $cliente->__SET("nombres", $_POST["nombre"]);
            $lista = $cliente->listar();
        }else {
            $cliente->__SET("nombres", "");
            $lista = $cliente->listar();
        }

        if(empty($lista)){
        $salida.="No hay registros";
        }else {
        $salida.="<table class='tabla_datos'>
        <thead>
            <tr>
                <th>Nombre empresa</th>
                <th>Nombre contacto</th>
                <th>Tipo documento</th>
                <th>Numero documento</th>
                <th>Direccion</th>
                <th>Celular</th>
                <th>Ruta</th>
                <th>Estado</th>
                <th>
                </th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>";
        foreach($lista as $value):
        if($value->estado_cliente==1){
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
                    ".$value->nombres_cliente."
                </td>
                <td>
                    ".$value->apellidos_cliente."
                </td>
                <td>
                    ".$value->tipo_documento."
                </td>
                <td>
                    ".$value->numero_documento."
                </td>
                <td>
                    ".$value->direccion."
                </td>
                <td>
                    ".$value->celular."
                </td>
                <td>
                    ".$value->nombre_ruta."
                </td>
                <td>
                    ".$texto."
                </td>
                <td>
                    <button id='editar_cliente' value=".$value->id_cliente.">Modificar</button>
                </td>
                <td>
                <button style='background-color: ".$color." ;' id='Estado_cliente' value=".$value->id_cliente.">".$estados."</button>
                </td>
    </tr>";
        endforeach;
            $salida.="</tbody></table>";
        }
            echo $salida;
    }

    public function guardar (){
        $cliente = new Clientes();
        $cliente->__SET("nombres", $_POST['txtnombres']);
        $cliente->__SET("apellidos", $_POST['txtapellidos']);
        $cliente->__SET("tipo_doc", $_POST['txttipo_doc']);
        $cliente->__SET("numero_doc", $_POST['txtnumero_doc']);
        $cliente->__SET("cartera", $_POST['cartera_dis']);
        $cliente->__SET("direc", $_POST['txtdc']);
        $cliente->__SET("cel", $_POST['txtcel']);
        $cliente->__SET("id_ruta", $_POST['ide_r']);
        $consulta = $cliente->buscar_cliente();
        if(empty($consulta)){
        if($cliente->guardar()){
            $_SESSION['RESPUESTA']= "Cliente guardado correctamente";
        }else {
            $_SESSION["RESPUESTA"] = "No se guardo";
        }
        }else{
            $_SESSION["RESPUESTA"] = "El cliente ya existe";
        }

        $_SESSION['LOCAL']= "2";
        header("location: ".URL."Login/menu");
    }

    public function editar(){
        $cliente = new Clientes();

        if(isset($_POST['id'])){
        $cliente->__SET("id", $_POST['id']);
        $p = $cliente->consultar_cliente();
        echo json_encode($p,JSON_FORCE_OBJECT);
        }
    }

    public function modificar (){
        $cliente = new Clientes();
        $cliente->__SET("id", $_POST['id']);
        $cliente->__SET("nombres", $_POST['txtnombres']);
        $cliente->__SET("apellidos", $_POST['txtapellidos']);
        $cliente->__SET("tipo_doc", $_POST['txttipo_doc']);
        $cliente->__SET("numero_doc", $_POST['txtnumero_doc']);
        $cliente->__SET("cartera", $_POST['cartera_dis']);
        $cliente->__SET("direc", $_POST['txtdc']);
        $cliente->__SET("cel", $_POST['txtcel']);
        $cliente->__SET("id_ruta", $_POST['ide_r']);

        if($cliente->modificar()){
            $_SESSION['RESPUESTA']= "Cliente modificado correctamente";
        }else {
            $_SESSION["RESPUESTA"] = "No se modifico";
        }

        $_SESSION['LOCAL']= "2";
        header("location: ".URL."Login/menu");
    }

    public function estado_cliente(){
        $cliente = new Clientes();
        if(isset($_POST['id']) && isset($_POST['estado'])) {
        $cliente->__SET("id", $_POST["id"]);
        $cliente->__SET("estado", $_POST["estado"]);


        if($cliente->cambiar_estado()){
            echo "si";
        }else{
            echo "no";
        }
    }
    }
}

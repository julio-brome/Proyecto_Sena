<?php 

namespace Mini\Controller;

use Mini\Model\Proveedor;

class ProveedorController {
    
    public function index (){
        if(isset($_SESSION['USUARIO'])){
            if($_SESSION['USUARIO']->rol_usuario== "ADMINISTRADOR" || $_SESSION['USUARIO']->rol_usuario== "BODEGA"){
            }else {
                header("location: ".URL."Login/menu");
            }
        }else {
            header("location: ".URL."Login/menu");
        }
        require APP.'view/Proveedores.php';
    }

    public function tabla(){
        $proveedor = new Proveedor();
        $salida="";

        if(isset($_POST['nombre'])){
            $proveedor->__SET("nombre_empresa", $_POST["nombre"]);
            $lista = $proveedor->listar();
        }else {
            $proveedor->__SET("nombre_empresa", "");
            $lista = $proveedor->listar();
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
                <th>Telefono</th>
                <th>Celular</th>
                <th>Estado</th>
                <th>
                </th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>";
        foreach($lista as $value):
        if($value->estado_proveedor==1){
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
                    ".$value->nombre_empresa."
                </td>
                <td>
                    ".$value->nombre_contacto."
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
                    ".$value->telefono."
                </td>
                <td>
                    ".$value->celular."
                </td>
                <td>
                    ".$texto."
                </td>
                <td>
                    <button class='modificar' id='editar_proveedor' value=".$value->id_proveedor.">Modificar</button>
                </td>
                <td>
                <button style='background-color: ".$color." ;' id='Estado_proveedor' value=".$value->id_proveedor.">".$estados."</button>
                </td>
    </tr>";
        endforeach;
            $salida.="</tbody></table>";
        }
            echo $salida;
    }

    public function guardar (){
        $proveedor = new Proveedor();
        $proveedor->__SET("nombre_empresa", $_POST['txtnombre_em']);
        $proveedor->__SET("nombre_contacto", $_POST['txtnombre_con']);
        $proveedor->__SET("tipo_doc", $_POST['txttipo_doc']);
        $proveedor->__SET("numero_doc", $_POST['txtnumero_doc']);
        $proveedor->__SET("direc", $_POST['txtdc']);
        $proveedor->__SET("tel", $_POST['txttel']);
        $proveedor->__SET("cel", $_POST['txtcel']);
        $consulta = $proveedor->buscar_proveedor();
        if(empty($consulta)){
        if($proveedor->guardar()){
            $_SESSION['RESPUESTA']= "Proveedor guardado correctamente";
        }else {
            $_SESSION["RESPUESTA"] = "No se guardo";
        }
        }else{
            $_SESSION["RESPUESTA"] = "El proveedor ya existe";
        }

        $_SESSION['LOCAL']= "3";
        header("location: ".URL."Login/menu");
    }

    public function editar(){
        $proveedor = new Proveedor();

        if(isset($_POST['id'])){
        $proveedor->__SET("id", $_POST['id']);
        $p = $proveedor->consultar_proveedor();
        echo json_encode($p,JSON_FORCE_OBJECT);
        }
    }

    public function modificar (){
        $proveedor = new Proveedor();
        $proveedor->__SET("id", $_POST['id']);
        $proveedor->__SET("nombre_empresa", $_POST['txtnombre_em']);
        $proveedor->__SET("nombre_contacto", $_POST['txtnombre_con']);
        $proveedor->__SET("tipo_doc", $_POST['txttipo_doc']);
        $proveedor->__SET("numero_doc", $_POST['txtnumero_doc']);
        $proveedor->__SET("direc", $_POST['txtdc']);
        $proveedor->__SET("tel", $_POST['txttel']);
        $proveedor->__SET("cel", $_POST['txtcel']);

        if($proveedor->modificar()){
            $_SESSION['RESPUESTA']= "Proveedor modificado correctamente";
        }else {
            $_SESSION["RESPUESTA"] = "No se modifico";
        }

        $_SESSION['LOCAL']= "3";
        header("location: ".URL."Login/menu");
    }

    public function estado_proveedor(){
        $proveedor = new Proveedor();
        if(isset($_POST['id']) && isset($_POST['estado'])) {
        $proveedor->__SET("id", $_POST["id"]);
        $proveedor->__SET("estado", $_POST["estado"]);


        if($proveedor->cambiar_estado()){
            echo "si";
        }else{
            echo "no";
        }
    }
    }
}

<?php 

namespace Mini\Controller;

use Mini\Model\Categoria;

class CategoriaController {
    
    public function index(){
        if(isset($_SESSION['USUARIO'])){
            if($_SESSION['USUARIO']->rol_usuario== "ADMINISTRADOR" || $_SESSION['USUARIO']->rol_usuario== "BODEGA"){
            }else {
                header("location: ".URL."Login/menu");
            }
        }else {
            header("location: ".URL."Login/menu");
        }
        require APP.'view/Categorias.php';
    }
    
    public function tabla_categorias(){
        $categoria = new Categoria();
        $salida="";
        
        if(isset($_POST['categoria'])){
            $categoria->__SET("nombre_c", $_POST["categoria"]);
            $lista = $categoria->listar_categoria();
        }else {
            $categoria->__SET("nombre_c", "");
            $lista = $categoria->listar_categoria();
        }
        
        if(empty($lista)){
        $salida.="No hay registros";
        }else {
        $salida.="<table class='tabla_datos'>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>
                </th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>";
        foreach($lista as $value):
        if($value->estado_categoria==1){
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
                    ".$value->nombre_categoria."
                </td>
                <td>
                    ".$texto."
                </td>
                <td>
                    <button id='editar_c' value=".$value->id_categoria.">Modificar</button>
                </td>
                <td>
                <button style='background-color: ".$color." ;' id='Estado_c' value=".$value->id_categoria.">".$estados."</button>
                </td>
    </tr>"; 
        endforeach;
            $salida.="</tbody></table>";
        }
            echo $salida;
    }
    
    public function guardar_categoria(){
        $categoria = new Categoria();
        if(isset($_POST['categoria'])){
            $categoria->__SET("nombre_c", $_POST['categoria']);
            $consulta = $categoria->Buscar_categoria();
            
            if(empty($consulta)){
            if($categoria->guardar_categoria()){
                echo "si";
            }else {
                echo "no";
            }
            }else{
                echo "Ya existe";
            }
        }
    }
    
    public function estado_categoria(){
        $categoria = new Categoria();
        if(isset($_POST['id']) && isset($_POST['estado'])) {
        $categoria->__SET("id", $_POST["id"]);
        $categoria->__SET("estado", $_POST["estado"]);
            
            
        if($categoria->cambiar_estado()){
            echo "si";
        }else{
            echo "no";
        }
    }
    }
    
    public function editar_categoria(){
        $categoria = new Categoria();
        if(isset($_POST['id'])) {
        $categoria->__SET("id", $_POST["id"]);
        
        $resultado = $categoria->consultar_categoria();
            
        echo json_encode($resultado, JSON_FORCE_OBJECT);
    }
    }
    
    public function modificar_categoria(){
        $categoria = new Categoria();
        if(isset($_POST['id']) && isset($_POST['nombre'])) {
        $categoria->__SET("id", $_POST["id"]);
        $categoria->__SET("nombre_c", $_POST["nombre"]);
        $consulta = $categoria->Buscar_categoria();
        
        if(empty($consulta)){
        if($categoria->modificar_categoria()){
            echo "si";
        }else {
            echo "Error al modificar";
        }
        }else {
            echo "La categoria ingresada ya existe";
        }
            
    }
    }
    
}

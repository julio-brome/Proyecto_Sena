<?php

namespace Mini\Model;

use Mini\Core\Model;

class compras extends Model {

private $id_compra;
private $precio_unitario;
private $total;
private $id_producto;
private $subtotal;
private $cantidad;
private $estado;
private $id_proveedor;
private $nombre_empresa;


public function __SET($atributo, $valor){
 $this->$atributo = $valor;
}

public function __GET($atributo){
   return $this->$atributo;   
}

   

   public function listar($id_proveedor, $fechaInicio, $fechaFin){
       $sql = "SELECT c.*, p.id_proveedor, p.nombre_empresa 
       from compra c 
       INNER JOIN proveedor p on (c.id_proveedor = p.id_proveedor) 
       where p.id_proveedor like ? AND fecha_de_compra BETWEEN ? AND ? ORDER BY fecha_de_compra DESC";

       $stm = $this->db->prepare($sql);
       $stm->bindParam(1, $id_proveedor); 
       $stm->bindParam(2, $fechaInicio); 
       $stm->bindParam(3, $fechaFin); 
       $stm->execute();
       return $stm->fetchAll();        
}


public function listarMaestro(){
    $sql = "SELECT * from compra c ORDER BY id_compra asc ";
    $stm = $this->db->prepare($sql);
    $stm->execute();
    return $stm->fetchAll();        
}

public function crear(){
$sql = " INSERT INTO compra (total, id_proveedor) VALUES (?, ?)";
$stm = $this->db->prepare($sql); 
$stm->bindParam(1, $this->total); 
$stm->bindParam(2, $this->id_proveedor); 
return $stm->execute(); 

}

public function modificar(){
    $sql = " UPDATE compra SET id_proveedor = ?, id_producto = ?, total = ?, cantidad = ?, subtotal = ? WHERE id_compra = ?";
    $stm = $this->db->prepare($sql); 
    $stm->bindParam(1, $this->id_proveedor); 
    $stm->bindParam(2, $this->id_producto); 
    $stm->bindParam(3, $this->total);
    $stm->bindParam(4, $this->id_compra);
    return $stm->execute(); 
     
    }

    public function ConsultarPorId(){
        $sql = "SELECT c.id_compra as id_compram, c.fecha_de_compra, c.total_compra, c.id_proveedor, pro.nombre_empresa, dcp.*,p.* from compra c 
        INNER JOIN detalle_compra_producto dcp on (c.id_compra = dcp.id_compra) 
        INNER JOIN producto p on (dcp.id_producto = p.id_producto) 
        left JOIN proveedor pro on (c.id_proveedor = pro.id_proveedor)
        WHERE c.id_compra = ?";
        $stm = $this->db->prepare($sql); 
        $stm->bindParam(1, $this->id_compra); 
        $stm->execute(); 
        return $stm->fetchAll(); 
        
        }

        public function cambiarEstado(){
            $sql = " UPDATE compra SET estado = ? WHERE id_compra = ?";            
            $stm = $this->db->prepare($sql);             
            $stm->bindParam(1, $this->estado); 
            $stm->bindParam(2, $this->id_compra); 
            
            return $stm->execute(); 
             
            }

public function guardarEncabezado()
{
     $sql = "CALL SP_InsertarCompra(?, ?)";
    
    echo $sql;
    $stm = $this->db->prepare($sql); 
    echo $this->total;
    $stm->bindParam(1, $this->total); 
    $stm->bindParam(2, $this->id_proveedor); 
    return $stm->execute(); 
}

public function guardarDetalle()
{
    $sql = "CALL SP_InsertarDetalleCompra(?,?,?,?,?)";
    $stm = $this->db->prepare($sql); 
    $stm->bindParam(1, $this->id_compra); 
    $stm->bindParam(2, $this->id_producto); 
    $stm->bindParam(3, $this->precio_unitario); 
    $stm->bindParam(4, $this->cantidad); 
    $stm->bindParam(5, $this->subtotal); 
    return $stm->execute(); 
}

public function UltimaCompra()
{
    $sql = "CALL SP_ultimaCompra()";
    $stm = $this->db->prepare($sql); 
    $stm->execute(); 
    return $stm->fetch();
}
}
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
       $sql = "CALL SP_consultarCompra(?,?,?)";

       $stm = $this->db->prepare($sql);
       $stm->bindParam(1, $id_proveedor); 
       $stm->bindParam(2, $fechaInicio); 
       $stm->bindParam(3, $fechaFin); 
       $stm->execute();
       return $stm->fetchAll();        
}


public function listarMaestro(){
    $sql = "CALL SP_listarCompras()";
    $stm = $this->db->prepare($sql);
    $stm->execute();
    return $stm->fetchAll();        
}

// public function crear(){
// $sql = " INSERT INTO compra (total, id_proveedor) VALUES (?, ?)";
// $stm = $this->db->prepare($sql); 
// $stm->bindParam(1, $this->total); 
// $stm->bindParam(2, $this->id_proveedor); 
// return $stm->execute(); 

// }

// public function modificar(){
//     $sql = " UPDATE compra SET id_proveedor = ?, id_producto = ?, total = ?, cantidad = ?, subtotal = ? WHERE id_compra = ?";
//     $stm = $this->db->prepare($sql); 
//     $stm->bindParam(1, $this->id_proveedor); 
//     $stm->bindParam(2, $this->id_producto); 
//     $stm->bindParam(3, $this->total);
//     $stm->bindParam(4, $this->id_compra);
//     return $stm->execute(); 
     
//     }

    public function ConsultarPorId(){
        $sql = "CALL SP_consultarDetalleCompra(?)";
        $stm = $this->db->prepare($sql); 
        $stm->bindParam(1, $this->id_compra); 
        $stm->execute(); 
        return $stm->fetchAll(); 
        
        }

        // public function cambiarEstado(){
        //     $sql = " UPDATE compra SET estado = ? WHERE id_compra = ?";            
        //     $stm = $this->db->prepare($sql);             
        //     $stm->bindParam(1, $this->estado); 
        //     $stm->bindParam(2, $this->id_compra); 
            
        //     return $stm->execute(); 
             
        //     }

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
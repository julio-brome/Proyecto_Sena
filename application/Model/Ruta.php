<?php

namespace Mini\Model;

use Mini\Core\Model;

class ruta extends Model{

    private $id_ruta;
    private $nombre_ruta;
    private $id_barrio;
    private $nombre_barrio;
    private $id_municipio;
    private $nombre_municipio;
    private $estado;
 

    public function __SET($attr, $valor){
        $this->$attr=$valor;
    }

    public function __GET($attr){
        return $this->$attr;
        
    }

    public function crear(){
        
        $stm = $this->db->prepare("CALL Guardar_Rutas(?,?,?)");
        $stm->bindParam(1, $this->nombre_ruta);
        $stm->bindParam(2, $this->id_barrio);
        $stm->bindParam(3, $this->id_municipio);
        //$stm->bindParam(4, $this->estado);
      
       return $stm->execute();
    }

    public function modificar(){
        //$sql = "UPDATE ruta SET nombre_ruta = ?, id_barrio = ?, id_municipio = ?  WHERE id_ruta = ?";
        $stm = $this->db->prepare("CALL Modificar_Rutas(?,?,?,?)");
       
        $stm->bindParam(1, $this->nombre_ruta);
        //$stm->bindParam(3, $this->estado);
        $stm->bindParam(2, $this->id_barrio);
        $stm->bindParam(3, $this->id_municipio);
        $stm->bindParam(4, $this->id_ruta);
        
        return $stm->execute();
    }

    public function editar(){
        //$sql = "SELECT * FROM ruta WHERE id_ruta = ?";
        $stm = $this->db->prepare("CALL Editar_Rutas(?)");
        $stm->bindParam(1, $this->id_ruta);
        $stm->execute();
        return $stm->fetch();
    }

    public function cambiar_estado(){
        
        //$sql = "UPDATE ruta SET estado = ? WHERE id_ruta = ?";
        $stm = $this->db->prepare("CALL Cambiar_Estado_Rutas(?,?)");
        $stm->bindParam(1, $this->estado);
        $stm->bindParam(2, $this->id_ruta);
        return $stm->execute();
    }

    public function listar(){
        //$sql = "SELECT r.*, m.nombre_municipio, b.nombre_barrio FROM ruta r INNER JOIN municipio m ON(r.id_municipio = m.id_municipio) INNER JOIN barrio b ON(r.id_barrio = b.id_barrio)";
        $stm = $this->db->prepare("CALL Listar_Rutas()");
        $stm->execute();
        return $stm->fetchAll();
    }
    public function listarMunicipio(){
        //$sql = "SELECT * FROM municipio";
        $stm = $this->db->prepare("CALL Listar_Municipio()");
        $stm->execute();
        return $stm->fetchAll();
    }
    
    
    public function listar_municipio_barrioo(){
        //$sql = "SELECT * FROM barrio";
        $stm = $this->db->prepare("CALL Listar_Barrio()");
        $stm->execute();
        return $stm->fetchAll();
    }

    public function listar_municipio_barrio(){
        //$sql = "SELECT b.* from barrio b inner join municipio m on (m.id_municipio=b.id_municipio) where m.id_municipio=?";
        $stm = $this->db->prepare("CALL Listar_Barrio_Municipio(?)");
        $stm->bindParam(1,$this->id_barrio);
        $stm->execute();
        return $stm->fetchAll();
    }
}
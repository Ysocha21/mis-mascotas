<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class tipomascota extends conectarDB{		

	public function tipomascota(){				
		parent::__construct();
	}

	public function listar_tipomascota(){
		$sql="SELECT * FROM tipo_mascota";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		return $resultados;
	}	

	public function agregar_tipomascota($nombre){
		$query_save="Insert into tipo_mascota(nombre) value(:nombre)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre);                                     
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
		//$this->conn_db=null;			
	}

	public function modificar_tipomascota($id,$nombre){
		$query_modify="update tipo_mascota set nombre = :nombre where id_tipom = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);	                                    
		$modificar->execute();					
		$result =true;				
		return $result;
	}	

	public function eliminar_tipomascota($id){
		$query_delete="delete from tipo_mascota where id_tipom = :id";
        $eliminar=$this->conn_db->prepare($query_delete);        
        $eliminar->bindParam(':id', $id);                                     
        $eliminar->execute();
        $result = true;                
        return $result;
    }

	public function detalle_tipomascota($id){
		$sql="select * from tipo_mascota where id_tipom = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

}
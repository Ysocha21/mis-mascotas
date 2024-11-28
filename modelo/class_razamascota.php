<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class razamascota extends conectarDB{		

	public function razamascota(){				
		parent::__construct();
	}

	public function listar_razamascota(){
		$sql="SELECT * FROM raza_mascota";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		return $resultados;
	}	

	public function agregar_razamascota($nombre,$tipomascota){
		$query_save="Insert into raza_mascota(nombre,tipo_mascota_id) value(:nombre,:tipo_mascota_id)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre); 
        $guardar->bindParam(':tipo_mascota_id', $tipomascota);                                                                  
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
		//$this->conn_db=null;			
	}

	public function modificar_razamascota($id,$nombre,$tipomascota){
		$query_modify="update raza_mascota set nombre = :nombre, tipo_mascota_id = :tipo_mascota_id where id_raza  = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);	  
        $modificar->bindParam(':tipo_mascota_id', $tipomascota);                                        
		$modificar->execute();					
		$result =true;				
		return $result;
	}	

	public function eliminar_razamascota($id){
		$query_delete="delete from raza_mascota where id_raza = :id";
        $eliminar=$this->conn_db->prepare($query_delete);    
        $eliminar->bindParam(':id', $id);        
        $eliminar->execute();                    
        $result =true;                
        return $result;
    }
	
	public function detalle_razamascota($id){
		$sql="select * from raza_mascota where id_raza = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

    public function detalle_tipomascota($id){
		$sql="select * from tipo_mascota where id_tipom  = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

}
<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class historial extends conectarDB{		

	public function historial(){				
		parent::__construct();
	}

	public function listar_historial(){
		$sql="SELECT * FROM historial_clinico";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();				
		return $resultados;
	}	

	public function agregar_historial($mascota,$fecha,$descripcion,$tratamiento){
		$query_save="Insert into historial_clinico(mascota_id,fecha,descripcion,tratamiento) value(:mascota_id,:fecha,:descripcion,:tratamiento)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':mascota_id', $mascota);
		$guardar->bindParam(':fecha', $fecha);  			 					 			
		$guardar->bindParam(':descripcion', $descripcion);
        $guardar->bindParam(':tratamiento', $tratamiento);                                              			 					 	
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
		//$this->conn_db=null;			
	}

	public function modificar_historial($id,$mascota,$fecha,$descripcion,$tratamiento){
		$query_modify="update historial_clinico set mascota_id = :mascota_id,  fecha = :fecha, descripcion = :descripcion, tratamiento = :tratamiento  where id_historial  = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':mascota_id', $mascota);
		$modificar->bindParam(':fecha', $fecha);
		$modificar->bindParam(':descripcion', $descripcion);	
        $modificar->bindParam(':tratamiento', $tratamiento);                                                                               
		$modificar->execute();					
		$result =true;			
		return $result;
	}	

	public function detalle_historial($id){
		$sql="select * from historial_clinico where id_historial = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

	

	public function detalle_mascota($id){
		$sql="select * from mascotas where id_mascota = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;		
	}

}

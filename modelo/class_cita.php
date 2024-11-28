<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class cita extends conectarDB{		

	public function cita(){				
		parent::__construct();
	}

	public function listar_cita(){
		$sql="SELECT * FROM citas";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();				
		return $resultados;
	}	

	public function agregar_cita($fecha,$hora,$mascota,$veterinario,$servicio,$estado){
		$query_save="Insert into citas(fecha,hora,mascota_id,veterinario_id,servicio_id,estado) value(:fecha,:hora,:mascota_id,:veterinario_id,:servicio_id,:estado)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':fecha', $fecha);
		$guardar->bindParam(':hora', $hora);
		$guardar->bindParam(':mascota_id', $mascota);
		$guardar->bindParam(':veterinario_id', $veterinario); 
		$guardar->bindParam(':servicio_id', $servicio);
		$guardar->bindParam(':estado', $estado);    			 							    			 			
		$guardar->bindParam(':peso', $peso);    	 			 					 	
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
	}

	public function modificar_cita($id,$fecha,$hora,$mascota,$veterinario,$servicio,$estado){
		$query_modify="update citas set fecha = :fecha, hora = :hora, mascota_id = :mascota_id, veterinario_id = :veterinario_id, servicio_id = :servicio_id, estado = :estado  where id_cita  = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':fecha', $fecha);
		$modificar->bindParam(':hora', $hora);
		$modificar->bindParam(':mascota_id', $mascota);
		$modificar->bindParam(':veterinario_id', $veterinario);
		$modificar->bindParam(':servicio_id', $servicio);
		$modificar->bindParam(':estado', $estado);
		$modificar->execute();					
		$result =true;			
		return $result;
	}	

	public function eliminar_cita($id){
		$query_delete="delete from citas where id_cita = :id";
        $eliminar=$this->conn_db->prepare($query_delete);        
        $eliminar->bindParam(':id', $id);        
        $eliminar->execute();            
    }

	public function detalle_cita($id){
		$sql="select * from citas where id_cita = :id";
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

	public function detalle_veterinario($id){
		$sql="select * from veterinarios where id_vet = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;		
	}


	public function detalle_servicio($id){
		$sql="select * from servicios  where id_servicio = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;		
	}
}

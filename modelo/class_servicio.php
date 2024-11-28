<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class servicio extends conectarDB{		

	public function servicio(){				
		parent::__construct();
	}

	public function listar_servicio(){
		$sql="SELECT * FROM servicios";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		return $resultados;
	}	

	public function agregar_servicio($nombre,$descripcion,$precio){
		$query_save="Insert into servicios(nombre,descripcion,precio) value(:nombre,:descripcion,:precio)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre); 
        $guardar->bindParam(':descripcion', $descripcion);  
        $guardar->bindParam(':precio', $precio);                                     
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
	}

	public function modificar_servicio($id,$nombre,$descripcion,$precio){
		$query_modify="update servicios set nombre = :nombre, descripcion = :descripcion, precio = :precio where id_servicio = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);	
        $modificar->bindParam(':descripcion', $descripcion);
        $modificar->bindParam(':precio', $precio);                                      
		$modificar->execute();					
		$result =true;			
		return $result;
	}	

	public function eliminar_servicio($id){
		$query_delete="delete from servicios where id_servicio = :id";
        $eliminar=$this->conn_db->prepare($query_delete);        
        $eliminar->bindParam(':id', $id);            
        $eliminar->execute();            
        $result =true;            
        return $result;
    }

	public function detalle_servicio($id){
		$sql="select * from servicios where id_servicio = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

}
<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class categoria extends conectarDB{		

	public function categoria(){				
		parent::__construct();
	}

	public function listar_categoria(){
		$sql="SELECT * FROM categorias";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		return $resultados;
	}	

	public function agregar_categoria($nombre,$descripcion){
		$query_save="Insert into categorias(nombre,descripcion) value(:nombre,:descripcion)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre); 
        $guardar->bindParam(':descripcion', $descripcion);                                          
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
	}

	public function modificar_categoria($id,$nombre,$descripcion){
		$query_modify="update categorias set nombre = :nombre, descripcion = :descripcion where id_categoria  = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);	
        $modificar->bindParam(':descripcion', $descripcion);                                       
		$modificar->execute();					
		$result =true;			
		return $result;
	}	

	public function detalle_categoria($id){
		$sql="select * from categorias where id_categoria = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

}
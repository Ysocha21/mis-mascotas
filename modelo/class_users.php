<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class Users extends conectarDB{		

	public function Users(){				
		parent::__construct();
	}

	public function listar_user(){
		$sql="select * from tuser";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		$this->conn_db=null;					
		return $resultados;
	}	

	public function agregar_user($nombre,$email,$celular){
		$query_save="Insert into tuser(nombre,email,celular) value(:nombre,:email,:celular)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre);    			 	
		$guardar->bindParam(':email', $email);    			 			
		$guardar->bindParam(':celular', $celular);    			 							
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		$guardar->closeCursor();
		return $result;
		//$this->conn_db=null;			
	}

	public function modificar_user($id,$nombre,$email,$celular){
		$query_modify="update tuser set nombre = :nombre, email = :email, celular = :celular where userID = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);		
		$modificar->bindParam(':email', $email);		
		$modificar->bindParam(':celular', $celular);		
		$modificar->execute();					
		$result =true;
		$modificar->closeCursor();
		$this->conn_db=null;				
		return $result;
	}	

	public function detalle_user($id){
		$sql="select * from tuser where userID = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		$this->conn_db = null;
		return $resultados;
	}

}
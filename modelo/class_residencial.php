<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class residencial extends conectarDB{		

	public function residencial(){				
		parent::__construct();
	}

	public function listar_residencial(){
		$sql="select * from tresidencial";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		$this->conn_db=null;					
		return $resultados;
	}	

	public function agregar_residencial($nombres,$apellidos,$celular,$email,$barrio,$direccion){
		$query_save="Insert into tresidencial(nombres,apellidos,celular,email,barrio,direccion) value(:nombres,:apellidos,:celular,:email,:barrio,:direccion)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombres', $nombres);    	
		$guardar->bindParam(':apellidos', $apellidos);
		$guardar->bindParam(':celular', $celular);    			 							    			 			
		$guardar->bindParam(':email', $email);    			 			
		$guardar->bindParam(':barrio', $barrio);    			 			
		$guardar->bindParam(':direccion', $direccion);    			 					 	
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		$guardar->closeCursor();
		return $result;
		//$this->conn_db=null;			
	}

	public function modificar_residencial($id,$nombres,$apellidos,$celular,$email,$barrio,$direccion){
		$query_modify="update tresidencial set nombres = :nombres, apellidos = :apellidos, celular = :celular, email = :email, barrio =:barrio, direccion = :direccion  where residencialID  = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombres', $nombres);
		$modificar->bindParam(':apellidos', $apellidos);		
		$modificar->bindParam(':celular', $celular);				
		$modificar->bindParam(':email', $email);
		$modificar->bindParam(':barrio', $barrio);		
		$modificar->bindParam(':direccion', $direccion);		
		$modificar->execute();					
		$result =true;
		$modificar->closeCursor();
		$this->conn_db=null;				
		return $result;
	}	

	public function detalle_residencial($id){
		$sql="select * from tresidencial where residencialID = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		$this->conn_db = null;
		return $resultados;
	}

}
<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class restaurante extends conectarDB{		

	public function restaurante(){				
		parent::__construct();
	}

	public function listar_restaurante(){
		$sql="select * from trestaurante";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		$this->conn_db=null;					
		return $resultados;
	}	

	public function agregar_restaurante($nombre,$responsable,$celular,$barrio,$direccion,$email){
		$query_save="Insert into trestaurante(nombre,responsable,celular,email,barrio,direccion) value(:nombre,:responsable,:celular,:email,:barrio,:direccion)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre);    	
		$guardar->bindParam(':responsable', $responsable);
		$guardar->bindParam(':celular', $celular);    			 							    			 			
		$guardar->bindParam(':barrio', $barrio);    			 			
		$guardar->bindParam(':direccion', $direccion); 
        $guardar->bindParam(':email', $email);    			 			   			 					 	
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		$guardar->closeCursor();
		return $result;
		//$this->conn_db=null;			
	}

	public function modificar_restaurante($id,$nombre,$responsable,$celular,$email,$barrio,$direccion){
		$query_modify="update trestaurante set nombre = :nombre, responsable = :responsable, celular = :celular, email = :email, barrio =:barrio, direccion = :direccion  where restauranteID   = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);
		$modificar->bindParam(':responsable', $responsable);		
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

	public function detalle_restaurante($id){
		$sql="select * from trestaurante where restauranteID = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
		$this->conn_db = null;
		return $resultados;
	}

}
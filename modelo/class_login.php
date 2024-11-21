<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class Users extends conectarDB{		

	public function Users(){				
		parent::__construct();
	}

	public function listar_login(){
		$sql="select * from tlogin";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		$this->conn_db=null;					
		return $resultados;
	}	

}
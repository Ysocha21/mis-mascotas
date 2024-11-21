<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class mascota extends conectarDB{		

	public function mascota(){				
		parent::__construct();
	}

	public function listar_mascota(){
		$sql="SELECT * FROM mascotas";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();				
		return $resultados;
	}	

	public function agregar_mascota($nombre,$tipomascota,$razamascota,$cliente,$sexo,$edad,$peso,$tamano,$descripcion){
		$query_save="Insert into mascotas(nombre,tipo_mascota_id,raza_mascota_id,cliente_id,sexo,edad,peso,tamano,descripcion) value(:nombre,:tipo_mascota_id,:raza_mascota_id,:cliente_id,:sexo,:edad,:peso,:tamano,:descripcion)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre);
		$guardar->bindParam(':tipo_mascota_id', $tipomascota);
		$guardar->bindParam(':raza_mascota_id', $razamascota);
		$guardar->bindParam(':cliente_id', $cliente); 
		$guardar->bindParam(':sexo', $sexo);
		$guardar->bindParam(':edad', $edad);    			 							    			 			
		$guardar->bindParam(':peso', $peso);    	
		$guardar->bindParam(':medida', var: $tamano);    			 					 			
		$guardar->bindParam(':descripcion', $descripcion);    			 					 	
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
		//$this->conn_db=null;			
	}

	public function modificar_mascota($id,$nombre,$tipomascota,$razamascota,$cliente,$sexo,$edad,$peso,$tamano,$descripcion){
		$query_modify="update mascotas set nombre = :nombre,  tipo_mascota_id  = :tipo_mascota_id, raza_mascota_id = :raza_mascota_id, cliente_id = :cliente_id, sexo = :sexo, edad = :edad, peso = :peso, tamano =:tamano, descripcion = :descripcion  where id_mascota  = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);
		$modificar->bindParam(':tipo_mascota_id', $tipomascota);
		$modificar->bindParam(':raza_mascota_id', $razamascota);
		$modificar->bindParam(':cliente_id', $cliente);
		$modificar->bindParam(':sexo', $sexo);
		$modificar->bindParam(':edad', $edad);
		$modificar->bindParam(':peso', $peso);
		$modificar->bindParam(':tamano', $tamano);
		$modificar->bindParam(':descripcion', $descripcion);	
		$modificar->execute();					
		$result =true;			
		return $result;
	}	

	public function detalle_mascota($id){
		$sql="select * from mascotas where id_mascota = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

	

	public function detalle_tipo($id){
		$sql="select * from tipo_mascota where id_tipom = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;		
	}

	public function detalle_raza($id){
		$sql="select * from raza_mascota where id_raza = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;		
	}


	public function detalle_cliente($id){
		$sql="select * from clientes  where id_cliente  = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;		
	}
}

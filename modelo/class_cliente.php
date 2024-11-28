<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class cliente extends conectarDB{		

	public function cliente(){				
		parent::__construct();
	}

	public function listar_cliente(){
		$sql="SELECT * FROM clientes";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		return $resultados;
	}	

	public function agregar_cliente($nombre,$apellido,$dni,$correo,$telefono,$direccion){
		$query_save="Insert into clientes(nombre,apellido,dni,correo,telefono,direccion) value(:nombre,:apellido,:dni,:correo,:telefono,:direccion)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre); 
        $guardar->bindParam(':apellido', $apellido);  
        $guardar->bindParam(':dni', $dni);
        $guardar->bindParam(':correo', $correo);
        $guardar->bindParam(':telefono', $telefono);
        $guardar->bindParam(':direccion', $direccion);                                        
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
	}

	public function modificar_cliente($id,$nombre,$apellido,$dni,$correo,$telefono,$direccion){
		$query_modify="update clientes set nombre = :nombre, apellido = :apellido, dni = :dni, correo = :correo, telefono = :telefono, direccion = :direccion where id_cliente = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);	
        $modificar->bindParam(':apellido', $apellido);
        $modificar->bindParam(':dni', $dni);
        $modificar->bindParam(':correo', $correo);
        $modificar->bindParam(':telefono', $telefono);
        $modificar->bindParam(':direccion', $direccion);                                       
		$modificar->execute();					
		$result =true;				
		return $result;
	}	

	public function eliminar_cliente($id){
		$query_delete="delete from clientes where id_cliente = :id";
        $eliminar=$this->conn_db->prepare($query_delete);        
        $eliminar->bindParam(':id', $id);        
        $eliminar->execute();                    
        $result = true;               
        return $result;
	}

	public function detalle_cliente($id){
		$sql="select * from clientes where id_cliente = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}


}
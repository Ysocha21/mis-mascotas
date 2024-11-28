<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class venta extends conectarDB{		

	public function venta(){				
		parent::__construct();
	}

	public function listar_venta(){
		$sql="SELECT * FROM veterinarios";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		return $resultados;
	}	

	public function agregar_venta($nombre,$especialidad,$telefono,$correo,$direccion){
		$query_save="Insert into veterinarios(nombre,especialidad,telefono,correo,direccion) value(:nombre,:especialidad,:telefono,:correo,:direccion)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre); 
        $guardar->bindParam(':especialidad', $especialidad);  
        $guardar->bindParam(':telefono', $telefono);
        $guardar->bindParam(':correo',  $correo);
        $guardar->bindParam(':direccion', $direccion);                                        
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
	}

	public function modificar_venta($id,$nombre,$especialidad,$telefono,$correo,$direccion){
		$query_modify="update veterinarios set nombre = :nombre, especialidad = :especialidad, telefono = :telefono, correo = :correo, direccion = :direccion where id_vet = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);	
        $modificar->bindParam(':especialidad', $especialidad);
        $modificar->bindParam(':telefono', $telefono);
        $modificar->bindParam(':correo', $correo);
        $modificar->bindParam(':direccion', $direccion);                                       
		$modificar->execute();					
		$result =true;				
		return $result;
	}	

	public function eliminar_venta($id){
		$query_delete="delete from veterinarios where id_vet = :id";
        $eliminar=$this->conn_db->prepare($query_delete);    
        $eliminar->bindParam(':id', $id);            
        $eliminar->execute();                    
        $result =true;                
        return $result;
    }

	public function detalle_venta($id){
		$sql="select * from veterinarios where id_vet = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

}
<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class proveedor extends conectarDB{		

	public function proveedor(){				
		parent::__construct();
	}

	public function listar_proveedor(){
		$sql="SELECT * FROM proveedores";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		$this->conn_db=null;					
		return $resultados;
	}	

	public function agregar_proveedor($nombre,$ruc,$pais,$correo,$telefono,$direccion){
		$query_save="Insert into proveedores(nombre,ruc,pais,correo,telefono,direccion) value(:nombre,:ruc,:pais,:correo,:telefono,:direccion)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre); 
        $guardar->bindParam(':ruc', $ruc);  
        $guardar->bindParam(':pais', $pais);
        $guardar->bindParam(':correo', $correo);
        $guardar->bindParam(':telefono', $telefono);
        $guardar->bindParam(':direccion', $direccion);                                        
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
	}

	public function modificar_proveedor($id,$nombre,$ruc,$pais,$correo,$telefono,$direccion){
		$query_modify="update proveedores set nombre = :nombre, ruc = :ruc, pais = :pais, correo = :correo, telefono = :telefono, direccion = :direccion where id_proveedor = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);	
        $modificar->bindParam(':ruc', $ruc);
        $modificar->bindParam(':pais', $pais);
        $modificar->bindParam(':correo', $correo);
        $modificar->bindParam(':telefono', $telefono);
        $modificar->bindParam(':direccion', $direccion);                                       
		$modificar->execute();					
		$result =true;				
		return $result;
	}	

	public function eliminar_proveedor($id){
		$query_delete="delete from proveedores where id_proveedor = :id";
        $eliminar=$this->conn_db->prepare($query_delete);        
        $eliminar->bindParam(':id', $id);        
        $eliminar->execute();                    
        $result =true;                
        return $result;
    }

	public function detalle_proveedor($id){
		$sql="select * from proveedores where id_proveedor = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

}
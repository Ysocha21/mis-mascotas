<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class compra extends conectarDB{		

	public function compra(){				
		parent::__construct();
	}

	public function listar_compra(){
		$sql="SELECT * FROM compras";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();
		return $resultados;
	}	

	public function agregar_compra($proveedor,$fecha,$total){
		$query_save="Insert into compras(proveedor_id,fecha,total) value(:proveedor_id,:fecha,:total)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':proveedor_id', $proveedor); 
        $guardar->bindParam(':fecha', $fecha);  
        $guardar->bindParam(':total', $total);                                     
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
	}

	public function modificar_compra($id,$proveedor,$fecha,$total){
		$query_modify="update compras set proveedor_id = :proveedor_id, fecha = :fecha, total = :total  where id_compra = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':proveedor_id', $proveedor);	
        $modificar->bindParam(':fecha', $fecha);
        $modificar->bindParam(':total', $total);                                       
		$modificar->execute();					
		$result =true;				
		return $result;
	}	

	public function eliminar_compra($id){
		$query_delete="delete from compras where id_compra = :id";
        $eliminar=$this->conn_db->prepare($query_delete);        
        $eliminar->bindParam(':id', $id);        
        $eliminar->execute();                    
        $result = true;               
        return $result;
	}

	public function detalle_compra($id){
		$sql="select * from compras where id_compra  = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
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
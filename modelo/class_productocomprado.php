<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class productocomprado extends conectarDB{		

	public function productocomprado(){				
		parent::__construct();
	}

	public function listar_productocomprado(){
		$sql="SELECT * FROM productos_comprados";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();				
		return $resultados;
	}	

	public function agregar_productocomprado($compra,$producto,$cantidad,$precio){
		$query_save="Insert into productos_comprados(compra_id,producto_id,cantidad,precio) value(:compra_id,:producto_id,:cantidad,:precio)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':compra_id', $compra);
		$guardar->bindParam(':producto_id', $producto);
		$guardar->bindParam(':cantidad', $cantidad);
		$guardar->bindParam(':precio', $precio);   			 					 	
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
		//$this->conn_db=null;			
	}

	public function modificar_productocomprado($id,$compra,$producto,$cantidad,$precio){
		$query_modify="update productos_comprados set compra_id = :compra_id,  producto_id = :producto_id, cantidad = :cantidad, precio = :precio  where id_pcompra = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':compra_id', $compra);
		$modificar->bindParam(':producto_id', $producto);
		$modificar->bindParam(':cantidad', $cantidad);
		$modificar->bindParam(':precio', $precio);	
		$modificar->execute();					
		$result =true;			
		return $result;
	}	

	public function eliminar_productocomprado($id){
		$query_delete="delete from productos_comprados where id_pcompra = :id";
        $eliminar=$this->conn_db->prepare($query_delete);        
        $eliminar->bindParam(':id', $id);        
        $eliminar->execute();            
    }

	public function detalle_productocomprado($id){
		$sql="select * from mascotas where productos_comprados = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

	
    

	public function detalle_compra($id){
		$sql="select * from compras where id_compra = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;		
	}

	public function detalle_producto($id){
		$sql="select * from productos where id_producto = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;		
	}

}

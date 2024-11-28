<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class productovendido extends conectarDB{		

	public function productovendido(){				
		parent::__construct();
	}

	public function listar_productovendido(){
		$sql="SELECT * FROM productos_vendidos";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();				
		return $resultados;
	}	

	public function agregar_productovendido($venta,$producto,$cantidad,$precio){
		$query_save="Insert into productos_vendidos(venta_id ,producto_id,cantidad,precio) value(:venta_id ,:producto_id,:cantidad,:precio)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':venta_id ', $venta);
		$guardar->bindParam(':producto_id', $producto);
		$guardar->bindParam(':cantidad', $cantidad);
		$guardar->bindParam(':precio', $precio);   			 					 	
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
		//$this->conn_db=null;			
	}

	public function modificar_productovendido($id,$venta_id ,$producto,$cantidad,$precio){
		$query_modify="update productos_vendidos set venta_id  = :venta_id,  producto_id = :producto_id, cantidad = :cantidad, precio = :precio  where id_pventa = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':venta_id', $venta_id);
		$modificar->bindParam(':producto_id', $producto);
		$modificar->bindParam(':cantidad', $cantidad);
		$modificar->bindParam(':precio', $precio);	
		$modificar->execute();					
		$result =true;			
		return $result;
	}	

	public function eliminar_productovendido($id){
		$query_delete="delete from productos_vendidos where id_pventa = :id";
        $eliminar=$this->conn_db->prepare($query_delete);        
        $eliminar->bindParam(':id', $id);        
        $eliminar->execute();            
    }

	public function detalle_productovendido($id){
		$sql="select * from mascotas where productos_vendidos = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

	
    

	public function detalle_venta($id){
		$sql="select * from ventas where id_venta = :id";
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

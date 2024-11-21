<?php    
require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/includes/conn.php');
class producto extends conectarDB{		

	public function producto(){				
		parent::__construct();
	}

	public function listar_producto(){
		$sql="SELECT * FROM productos";				
		$sentencia=$this->conn_db->prepare($sql);						
		$sentencia->execute();			
		$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);			
		$sentencia->closeCursor();				
		return $resultados;
	}	

	public function agregar_producto($nombre,$descripcion,$categoria,$proveedor,$preciocompra,$precioventa,$medida,$imagen){
		$query_save="Insert into productos(nombre,descripcion,categoria_id,proveedor_id,precio_compra,precio_venta,medida,imagen) value(:nombre,:descripcion,:id_categoria,:id_proveedor ,:precio_compra,:precio_venta,:medida,:image)";
		$guardar=$this->conn_db->prepare($query_save);		
		$guardar->bindParam(':nombre', $nombre);   			 					 			
		$guardar->bindParam(':descripcion', $descripcion);  
        $guardar->bindParam(':categoria_id ', $categoria);  
        $guardar->bindParam(':proveedor_id ', $proveedor);  
        $guardar->bindParam(':precio_compra', $preciocompra);  
        $guardar->bindParam(':precio_venta', $precioventa);  
        $guardar->bindParam(':medida', $medida);  
        $guardar->bindParam(':image', $imagen);                                                
		$guardar->execute();
		$result = $this->conn_db->lastInsertId();
		return $result;
	}

	public function modificar_producto($id,$nombre,$descripcion,$categoria,$proveedor,$preciocompra,$precioventa,$medida,$imagen){
		$query_modify="update productos set nombre = :nombre, descripcion = :descripcion, categoria_id = :categoria_id, proveedor_id  = :proveedor_id, precio_compra = :precio_compra, precio_venta = :precio_venta, medida = :medida, imagen = :imagen where id_producto  = :id";
		$modificar=$this->conn_db->prepare($query_modify);	
		$modificar->bindParam(':id', $id);		
		$modificar->bindParam(':nombre', $nombre);
		$modificar->bindParam(':descripcion', $descripcion);	
        $modificar->bindParam(':categoria_id', $categoria);  
        $modificar->bindParam(':proveedor_id', $proveedor);  
        $modificar->bindParam(':precio_compra', $preciocompra);  
        $modificar->bindParam(':precio_venta', $precioventa);  
        $modificar->bindParam(':medida', $medida);  
        $modificar->bindParam(':imagen', $imagen);  
		$modificar->execute();					
		$result =true;			
		return $result;
	}	

	public function detalle_producto($id){
		$sql="select * from productos where id_producto = :id";
		$sentencia = $this->conn_db->prepare($sql);			
		$sentencia->bindParam(':id', $id);		
		$sentencia->execute();
		$resultados = $sentencia->fetch(PDO::FETCH_ASSOC);
		return $resultados;
	}

	

	public function detalle_categoria($id){
		$sql="select * from categorias where id_categoria = :id";
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

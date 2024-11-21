<?php 
	include 'plantilla.html'; 
    $id = $_GET['ID'];
    $categoria =  new mascota();
    $datos =  $categoria->detalle_mascota($id);
?>
<?php startblock('article') ?>


<div class="row">
    <div class="col-md-12">
        <h1>Categoria</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a href="#">Venturi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
            </ol>
        </nav>   
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form id="form_editar" method="post" action="controlador/control_categoria.php">
                    <input type="hidden" name="id" value="<?php echo $datos['id_categoria']?>">
                    <input type="hidden" name="caso" value="2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <h5 class="text-muted">Formulario Editar Categoria:</h5>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Nombre:</label>
                                <input class="form-control" type="text" name="nombre" value="<?php echo $datos['nombre']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Descripcion:</label>
                                <input class="form-control" type="text" name="descripcion" value="<?php echo $datos['descripcion']?>">
                            </div>
                        </div>
                                
                                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-warning btn-sm" href="Pag/Categorias/detalle.php">Cancelar</a>
                            <button class="btn btn-info btn-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
             </div>
        </div>        
    </div>
</div>    
<?php endblock('article') ?>
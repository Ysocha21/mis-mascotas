<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/MiSMASCOTAS/plantilla.html');
    echo ($_SERVER['DOCUMENT_ROOT'].'/MiSMASCOTAS/plantilla.html');
    $id = $_GET['ID'];
    $categoria =  new categoria();
    $datos =  $categoria->detalle_categoria($id);
?>
<?php startblock('article') ?>


<div class="row">
    <div class="col-md-12">
        <h1>Categoria</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categoria</li>
            </ol>
        </nav>   
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form id="form_editar" method="post" action="http://localhost/MiSMASCOTAS/controlador/control_categoria.php">
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
                            <a class="btn btn-warning btn-sm" href="http://localhost/MiSMASCOTAS/Pag/Categorias/lista.php">Cancelar</a>
                            <button class="btn btn-info btn-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>    
<?php endblock('article') ?>
<?php 
	include 'plantilla.html'; 
    $id = $_GET['ID'];
    $restaurante =  new restaurante();
    $datos =  $restaurante->detalle_restaurante($id);
?>
<?php startblock('article') ?>


<div class="row">
    <div class="col-md-12">
        <h1>Restaurante</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a href="#">Venturi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Restaurante</li>
            </ol>
        </nav>   
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form id="form_editar" method="post" action="controlador/control_restaurante.php">
                    <input type="hidden" name="id" value="<?php echo $datos['restauranteID']?>">
                    <input type="hidden" name="caso" value="2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <h5 class="text-muted">Formualario Editar Restaurante:</h5>
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
                                <label>Responsable:</label>
                                <input class="form-control" type="text" name="responsable" value="<?php echo $datos['responsable']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Celular:</label>
                                <input class="form-control" type="text" name="celular" value="<?php echo $datos['celular']?>">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Barrio:</label>
                                <input class="form-control" type="text" name="barrio" value="<?php echo $datos['barrio']?>">
                            </div>
                        </div>        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Direccion:</label>
                                <input class="form-control" type="text" name="direccion" value="<?php echo $datos['direccion']?>">
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Email:</label>
                                <input class="form-control" type="text" name="email" value="<?php echo $datos['email']?>">
                            </div>
                        </div>        
                                               
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-warning btn-sm" href="restaurante_lista.php">Cancelar</a>
                            <button class="btn btn-info btn-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
             </div>
        </div>        
    </div>
</div>    
<?php endblock('article') ?>
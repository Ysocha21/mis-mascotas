<?php 
	include 'plantilla.html'; 
    $id = $_GET['ID'];
    $residencial =  new residencial();
    $datos =  $residencial->detalle_residencial($id);
?>
<?php startblock('article') ?>


<div class="row">
    <div class="col-md-12">
        <h1>Residencial</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a href="#">Venturi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Residenciales</li>
            </ol>
        </nav>   
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form id="form_editar" method="post" action="controlador/control_residencial.php">
                    <input type="hidden" name="id" value="<?php echo $datos['residencialID']?>">
                    <input type="hidden" name="caso" value="2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <h5 class="text-muted">Formualario Editar residencial:</h5>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Nombre:</label>
                                <input class="form-control" type="text" name="nombres" value="<?php echo $datos['nombres']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Apellido:</label>
                                <input class="form-control" type="text" name="apellidos" value="<?php echo $datos['apellidos']?>">
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
                                <label>Email:</label>
                                <input class="form-control" type="text" name="email" value="<?php echo $datos['email']?>">
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
                                               
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-warning btn-sm" href="residencial_lista.php">Cancelar</a>
                            <button class="btn btn-info btn-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
             </div>
        </div>        
    </div>
</div>    
<?php endblock('article') ?>
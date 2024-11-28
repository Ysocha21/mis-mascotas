<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/MiSMASCOTAS/plantilla.html');
    echo ($_SERVER['DOCUMENT_ROOT'].'/MiSMASCOTAS/plantilla.html');
    $id = $_GET['ID'];
    $cliente =  new cliente();
    $datos =  $cliente->detalle_cliente($id);
?>
<?php startblock('article') ?>


<div class="row">
    <div class="col-md-12">
        <h1>Cliente</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>   
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form id="form_editar" method="post" action="http://localhost/MiSMASCOTAS/controlador/control_cliente.php">
                    <input type="hidden" name="id" value="<?php echo $datos['id_cliente']?>">
                    <input type="hidden" name="caso" value="2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <h5 class="text-muted">Formulario Editar Cliente:</h5>
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
                                <label>Apellido:</label>
                                <input class="form-control" type="text" name="apellido" value="<?php echo $datos['apellido']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>DNI:</label>
                                <input class="form-control" type="text" name="dni " value="<?php echo $datos['dni']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Correo:</label>
                                <input class="form-control" type="text" name="correo" value="<?php echo $datos['correo']?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Telefono:</label>
                                <input class="form-control" type="text" name="telefono" value="<?php echo $datos['telefono']?>">
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
                            <a class="btn btn-warning btn-sm" href="http://localhost/MiSMASCOTAS/Pag/Clientes/lista.php">Cancelar</a>
                            <button class="btn btn-info btn-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>    
<?php endblock('article') ?>
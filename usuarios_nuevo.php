<?php 
	include 'plantilla.html'; 
?>
<?php startblock('article') ?>


<div class="row">
    <div class="col-md-12">
        <h1>Usuarios</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a href="#">Venturi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
            </ol>
        </nav>   
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form id="form_editar" method="post" action="controlador/control_user.php">
                    <input type="hidden" name="caso" value="1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <h5 class="text-muted">Formualario Editar usuario:</h5>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Nombres:</label>
                                <input class="form-control" type="text" name="nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Email:</label>
                                <input class="form-control" type="text" name="email">
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Celular:</label>
                                <input class="form-control" type="text" name="celular">
                            </div>
                        </div>                                                
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-warning btn-sm" href="usuarios.php">Cancelar</a>
                            <button class="btn btn-info btn-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
             </div>
        </div>        
    </div>
</div>    
<?php endblock('article') ?>
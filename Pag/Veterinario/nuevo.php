<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/MiSMASCOTAS/plantilla.html');
    echo ($_SERVER['DOCUMENT_ROOT'].'/MiSMASCOTAS/plantilla.html');
    
?>
<?php startblock('article') ?>


<div class="row">
    <div class="col-md-12">
        <h1>Veterinario</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Veterinarios</li>
            </ol>
        </nav>   
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form id="formNuevo" method="post" action="http://localhost/MiSMASCOTAS/controlador/control_veterinario.php">
                    <input type="hidden" name="caso" value="1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <h5 class="text-muted">Formulario Crear Veterinario:</h5>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputNombre">Nombre:</label>
                                <input id="inputNombre" class="form-control" type="text" name="nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputEspecialidad">Especialidad:</label>
                                <input id="inputEspecialidad" class="form-control" type="text" name="especialidad">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputTelefono">Telefono:</label>
                                <input id="inputTelefono" class="form-control" type="text" name="telefono">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputCorreo">Correo:</label>
                                <input id="inputCorreo" class="form-control" type="text" name="correo">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputDireccion">Direccion:</label>
                                <input id="inputDireccion" class="form-control" type="text" name="direccion">
                            </div>
                        </div>                                  
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-warning btn-sm" href="http://localhost/MiSMASCOTAS/Pag/Veterinario/lista.php">Cancelar</a>
                            <button class="btn btn-info btn-sm" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>    
<?php endblock('article') ?>


<script>
    import Swal from 'sweetalert2/dist/sweetalert2.js'
    function NuevoResidencial(){
        alert();
        let Formulario = document.getElementById('formNuevo')
        let nombres = $('#inputNombre').val();
        let apellidos = $('#inputApellido').val();
        let celular = $('#inputCelular').val();
        let email = $('#inputEmail').val();

        if(nombres =="" || apellidos =="" || celular =="" || email ==""){
            Swal.fire({
                title: 'Error!',
                text: 'Todos los campos son requeridos!!!!',
                icon: 'error',
                confirmButtonText: 'Cool'
            })
            return false;
        }

        alert("Enviar Formulario :/")

    }
</script>
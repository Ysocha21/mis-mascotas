<?php 
    sleep(1);
    require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/modelo/class_categoria.php');    
    $consultar_categoria = new categoria();  
    $tipos =  $consultar_categoria->listar_categoria();
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

            <h4 class="card-title text-center">Formulario Nueva Categoria</h4>
            <p class="card-description">Todos los campos son requeridos!</p>

            <form id="formUserNuevo" action="http://localhost/MiSMASCOTAS/controlador/control_categoria.php" method="post">
                <input id="inputCaso" name="caso" type="hidden" value="1">
                <div class="form-group">
                    <label for="inputNombresNuevo">Nombre</label>
                    <input type="text" id="inputNombreNuevo" name="nombre" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="inputDescripcionNuevo">Descripcion</label>
                    <input type="text" id="inputDescripcionNuevo" name="descripcion" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="inputCc_Nuevo">Documento</label>
                    <input type="text" id="inputCcNuevo" name="documento" class="form-control form-control-sm">
                </div> 
                <div class="form-group">
                    <label for="inputTipoNuevo">Tipo</label>
                    <select name="tipo" id="inputTipoNuevo" class="form-control form-select-sm">
                    <option value="0">Seleccione un tipo</option>
                    <?php 
                        $tipos =  $consultar_user->listar_tipos();
                        foreach($tipos as $item){
                    ?>
                        <option value="<?php echo $item['nTipoID']?>"><?php echo $item['ctipo']?></option>
                    <?php  } ?>
                    </select>
                </div>                        
                <button type="button" class="btn btn-primary" onclick="sendFormAjax()">Crear</button>
                </form>
            </div>
        </div>

    </div>

</div>


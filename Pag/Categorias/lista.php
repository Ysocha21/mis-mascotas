<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/MiSMASCOTAS/plantilla.html');
    echo ($_SERVER['DOCUMENT_ROOT'].'/MiSMASCOTAS/plantilla.html');
    $categoria =  new categoria();
    $lista =  $categoria->listar_categoria();
?>
<?php startblock('article') ?>

<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="http://localhost/MiSMASCOTAS/plantilla.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Categorias</li>

            </ol>
        </nav>   
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <h1>LISTA DE CATEGORIAS <span class="text-primary"> #<?php echo count($lista)?> </span></h1>
    </div>   
    <div class="col-md-2">
        <a href="http://localhost/MiSMASCOTAS/Pag/Categorias/nuevo.php" class="btn btn-info btn-sm col-12">Nuevo</a>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $cont = 0;
                            foreach($lista as $fila){
                                $cont++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $cont?></th>
                                <td><?php echo $fila['nombre']?></td>
                                <td><?php echo $fila['descripcion']?></td>
                                <td><a href="http://localhost/MiSMASCOTAS/Pag/Categorias/detalle.php?ID=<?php echo $fila['id_categoria']?>" class="btn btn-sm btn-info">Detalles</a></td>
                                <td><a href="http://localhost/MiSMASCOTAS/Pag/Categorias/detalle.php?ID=<?php echo $fila['id_categoria']?>" class="btn btn-sm btn-info">Eliminar</a></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>            
    </div>
</div>    
<?php endblock('article') ?>
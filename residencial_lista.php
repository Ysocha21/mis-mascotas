<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/plantilla.html');
    $residencial =  new residencial();
    $lista =  $residencial->listar_residencial();
    echo $_SERVER['DOCUMENT_ROOT']."/PARCIAL_EP/";
?>
<?php startblock('article') ?>

<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a href="#">Venturi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Residentes</li>
            </ol>
        </nav>   
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <h1>Residenciales</h1>
    </div>   
    <div class="col-md-2">
        <a href="residencial_nuevo.php" class="btn btn-info btn-sm col-12">Nuevo</a>
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
                            <th scope="col">Nombre y apellido</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Email</th>
                            <th scope="col">barrio</th>
                            <th scope="col">direccion</th>
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
                                <td><?php echo $fila['nombres']." ".$fila['apellidos']?></td>
                                <td><?php echo $fila['celular']?></td>
                                <td><?php echo $fila['email']?></td>
                                <td><?php echo $fila['barrio']?></td>
                                <td><?php echo $fila['direccion']?></td>
        -                       <td><a href="residencial_detalle.php?ID=<?php echo $fila['residencialID']?>" class="btn btn-sm btn-info">Detalles</a></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>            
    </div>
</div>    
<?php endblock('article') ?>
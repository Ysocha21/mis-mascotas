<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/MiSMASCOTAS/plantilla.html');
    echo ($_SERVER['DOCUMENT_ROOT'].'/MiSMASCOTAS/plantilla.html');
    $mascota =  new mascota();
    $lista =  $mascota->listar_mascota();
?>
<?php startblock('article') ?>

<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mascotas</li>

            </ol>
        </nav>   
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <h1>LISTA DE MASCOTAS <span class="text-primary"> #<?php echo count($lista)?> </span></h1>
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
                            <th scope="col">Nombre</th>
                            <th scope="col">tipo de mascota</th>
                            <th scope="col">raza mascota</th>
                            <th scope="col">cliente</th>
                            <th scope="col">sexo</th>
                            <th scope="col">edad</th>
                            <th scope="col">peso</th>
                            <th scope="col">tamaño</th>
                            <th scope="col">Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $cont = 0;
                            foreach($lista as $fila){
                                $cont++;
                                $tipo = $mascota->detalle_tipo($fila['tipo_mascota_id']);
                                $raza = $mascota->detalle_raza($fila['raza_mascota_id']);
                                $cliente = $mascota->detalle_cliente($fila['cliente_id']);

                            ?>
                            <tr>
                                <th scope="row"><?php echo $cont?></th>
                                <td><?php echo $fila['nombre']?></td>
                                <td><?php echo $tipo['nombre']?></td>
                                <td><?php echo $raza['nombre']?></td>
                                <td><?php echo $cliente['nombre']." ".$cliente['apellido']?></td>
                                <td><?php echo $fila['sexo']?></td>
                                <td><?php echo $fila['edad']?></td>
                                <td><?php echo $fila['peso']?></td>
                                <td><?php echo $fila['tamano']?></td>
                                <td><?php echo $fila['descripcion']?></td>
                                <td><a href="residencial_detalle.php?ID=<?php echo $fila['id_mascota']?>" class="btn btn-sm btn-info">Detalles</a></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>            
    </div>
</div>    
<?php endblock('article') ?>
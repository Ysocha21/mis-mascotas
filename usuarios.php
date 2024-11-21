<?php 
	include 'plantilla.html'; 
    $User =  new Users();
    $lista =  $User->listar_user();
    echo $_SERVER['DOCUMENT_ROOT']."/PARCIAL_EP/";
?>
<?php startblock('article') ?>

<div class="row">
    <div class="col-md-12">
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
        <h1>Usuarios</h1>
    </div>   
    <div class="col-md-2">
        <a href="usuarios_nuevo.php" class="btn btn-info btn-sm col-12">Nuevo</a>
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
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
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
                                <td><?php echo $fila['email']?></td>
        -                       <td><a href="usuarios_detalle.php?ID=<?php echo $fila['userID']?>" class="btn btn-sm btn-info">Detalles</a></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>            
    </div>
</div>    
<?php endblock('article') ?>
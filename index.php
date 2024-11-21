<?php 
	include 'plantilla.html'; 
    $consultar = new residencial();
    $Total = $consultar->listar_residencial();

    $consult = new restaurante();
    $Tota = $consult->listar_restaurante();
?>
<?php startblock('article') ?>

<div class="row">
    <div class="col-md-12">
        <h1>Home</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a href="#">Venturi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>   
    </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card"> 
    <div class="card tale-bg">
      <h4 class="location font-weight-normal">Productos</h4>
      <h6 class="font-weight-normal">Cantidad de Productos</h6>
      <p class="card-description"><?php echo count($Total)?></code></p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card"> 
    <div class="card tale-bg">
      <h4 class="location font-weight-normal">Clientes</h4>
      <h6 class="font-weight-normal">Cantidad de Clientes</h6>
      <p class="card-description"><?php echo count($Total)?></code></p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card"> 
    <div class="card tale-bg">
      <h4 class="location font-weight-normal">Categorias</h4>
      <h6 class="font-weight-normal">Cantidad de Categorias</h6>
      <p class="card-description"><?php echo count($Total)?></code></p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card"> 
    <div class="card tale-bg">
      <h4 class="location font-weight-normal">Proveedores</h4>
      <h6 class="font-weight-normal">Cantidad de Proveedores</h6>
      <p class="card-description"><?php echo count($Total)?></code></p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card"> 
    <div class="card tale-bg">
      <h4 class="location font-weight-normal">Veterinario</h4>
      <h6 class="font-weight-normal">Cantidad de Veterinario</h6>
      <p class="card-description"><?php echo count($Tota)?></code></p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 grid-margin stretch-card"> 
    <div class="card tale-bg">
      <h4 class="location font-weight-normal">Mascotas</h4>
      <h6 class="font-weight-normal">Cantidad de Mascotas</h6>
      <p class="card-description"><?php echo count($Total)?></code></p>
    </div>
  </div>
</div>
<?php endblock('article') ?>
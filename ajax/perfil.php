<? php 
    require_once 'modelo/class_residencial.php';
    $consultar= new residencial();
    $total = $consultar->listar_residencial();

var_dump($_POST);

?>
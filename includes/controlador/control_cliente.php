<?php
    require_once '../modelo/class_cliente.php';    
    $consultar = new cliente();

    if(!empty($_POST['caso'])){

        $caso = $_POST['caso'];
        switch($caso){
            case '1':
                if(
                    (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                    (isset($_POST['apellido']) && !empty($_POST['apellido']))&&
                    (isset($_POST['dni']) && !empty($_POST['dni'])) &&
                    (isset($_POST['correo']) && !empty($_POST['correo']))&&
                    (isset($_POST['telefono']) && !empty($_POST['telefono'])) &&
                    (isset($_POST['direccion']) && !empty($_POST['direccion']))
                    ){	

                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="../Pag/Categorias/lista.php";
                        </script>';    

                }else{

                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $dni = $_POST['dni'];
                    $correo = $_POST['correo'];
                    $telefono = $_POST['telefono'];
                    $direccion = $_POST['direccion'];

                    $nuevo = $consultar->agregar_cliente($nombre,$apellido,$dni,$correo,$telefono,$direccion);

                    echo'<script type="text/javascript">
                    alert("Proceso terminado");
                    window.location.href="../Pag/Categorias/lista.php";
                    </script>';    

                }
                break;
                case '2':
                    if(
                        (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                        (isset($_POST['apellido']) && !empty($_POST['apellido']))&&
                        (isset($_POST['dni']) && !empty($_POST['dni'])) &&
                        (isset($_POST['correo']) && !empty($_POST['correo']))&&
                        (isset($_POST['telefono']) && !empty($_POST['telefono'])) &&
                        (isset($_POST['direccion']) && !empty($_POST['direccion'])) &&
                        (isset($_POST['id']) &&!empty($_POST['id']))
                    ){

                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="../Pag/Categorias/nuevo.php";
                        </script>';                          

                    }else{

                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $dni = $_POST['dni'];
                        $correo = $_POST['correo'];
                        $telefono = $_POST['telefono'];
                        $direccion = $_POST['direccion'];
                        $id = $_POST['id'];
    
                        $modificar = $consultar->modificar_cliente($id,$nombre,$apellido,$dni,$correo,$telefono,$direccion);

                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="../Pag/Categorias/detalle.php?ID='.$id.'";
                        </script>'; 

                    }	                    

                    break;
                default:
                    echo'<script type="text/javascript">
                    alert("Se desconoce el caso");
                    window.location.href="../Pag/Categorias/lista.php";
                    </script>';                      
                    break;
        }
    }else{
        echo'<script type="text/javascript">
        alert("Se desconoce el caso");
        window.location.href="../Pag/Categorias/lista.php";
        </script>';    
        exit;
    }


<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/modelo/class_categoria.php');    
    $consultar = new categoria();

    if(!empty($_POST['caso'])){

        $caso = $_POST['caso'];
        switch($caso){
            case '1':
                if(
                    (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                    (isset($_POST['descripcion']) && !empty($_POST['descripcion']))
                    ){	
                        $nombre = $_POST['nombre'];
                        $descripcion = $_POST['descripcion'];

                        $nuevo = $consultar->agregar_categoria($nombre,$descripcion);

                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Categorias/lista.php";
                        </script>'; 
                        
                

                }else{
                    var_dump($_POST);
                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Categorias/lista.php";
                        </script>';
        

                }
                break;
            case '2':
                    if(
                        (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                        (isset($_POST['descripcion']) && !empty($_POST['descripcion'])) &&
                        (isset($_POST['id']) &&!empty($_POST['id']))
                    ){
                        $nombre = $_POST['nombre'];
                        $descripcion = $_POST['descripcion'];
                        $id = $_POST['id'];
    
                        $modificar = $consultar->modificar_categoria($id,$nombre,$descripcion);

                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Categorias/lista.php?ID='.$id.'";
                        </script>';

                    }else{
                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Categorias/lista.php";
                        </script>';

                    

                    }	                    

                    break;
                default:
                    echo'<script type="text/javascript">
                    alert("Se desconoce el caso");
                    window.location.href="http://localhost/MiSMASCOTAS/Pag/Categorias/lista.php";
                    </script>';                      
                break;
                case '3':
                    if(
                        (isset($_POST['id']) &&!empty($_POST['id']))
                    ){
                        var_dump($_POST); 
                        $id = $_POST['id'];
            
                        $eliminar = $consultar->eliminar_categoria($id);
    
                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Categorias/lista.php";
                        </script>';
                    }else{
                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Categorias/lista.php";
                        </script>';
                    }
                break;
        }
    }else{
        echo'<script type="text/javascript">
        alert("Se desconoce el caso");
        window.location.href="http://localhost/MiSMASCOTAS/Pag/Categorias/lista.php";
        </script>';    
        exit;
    }


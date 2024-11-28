<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/modelo/class_mascota.php');    
    $consultar = new mascota();

    if(!empty($_POST['caso'])){

        $caso = $_POST['caso'];
        switch($caso){
            case '1':
                if(
                    (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                    (isset($_POST['tipo_mascota_id ']) && !empty($_POST['tipo_mascota_id ']))&&
                    (isset($_POST['raza_id']) && !empty($_POST['raza_id'])) &&
                    (isset($_POST['cliente_id ']) && !empty($_POST['cliente_id '])) &&
                    (isset($_POST['sexo']) && !empty($_POST['sexo'])) &&
                    (isset($_POST['edad']) && !empty($_POST['edad'])) &&
                    (isset($_POST['peso']) &&!empty($_POST['peso'])) &&
                    (isset($_POST['tamano']) &&!empty($_POST['tamano']))&&
                    (isset($_POST['descripcion']) && !empty($_POST['descripcion']))
                    ){	
                        $nombre = $_POST['nombre'];
                        $tipomascota = $_POST['tipo_mascota_id'];
                        $razamascota = $_POST['raza_id'];
                        $cliente = $_POST['cliente_id'];
                        $sexo = $_POST['sexo'];
                        $edad = $_POST['edad'];
                        $peso = $_POST['peso'];
                        $tamano = $_POST['tamano'];
                        $descripcion = $_POST['descripcion'];

                        $nuevo = $consultar->agregar_mascota($nombre,$tipomascota,$razamascota,$cliente,$sexo,$edad,$peso,$tamano,$descripcion);

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
                        (isset($_POST['tipo_mascota_id ']) && !empty($_POST['tipo_mascota_id ']))&&
                        (isset($_POST['raza_id']) && !empty($_POST['raza_id'])) &&
                        (isset($_POST['cliente_id ']) && !empty($_POST['cliente_id '])) &&
                        (isset($_POST['sexo']) && !empty($_POST['sexo'])) &&
                        (isset($_POST['edad']) && !empty($_POST['edad'])) &&
                        (isset($_POST['peso']) &&!empty($_POST['peso'])) &&
                        (isset($_POST['tamano']) &&!empty($_POST['tamano']))&&
                        (isset($_POST['descripcion']) && !empty($_POST['descripcion'])) &&
                        (isset($_POST['id']) &&!empty($_POST['id']))
                    ){
                        var_dump($_POST); 
                        $nombre = $_POST['nombre'];
                        $tipomascota = $_POST['tipo_mascota_id'];
                        $razamascota = $_POST['raza_id'];
                        $cliente = $_POST['cliente_id'];
                        $sexo = $_POST['sexo'];
                        $edad = $_POST['edad'];
                        $peso = $_POST['peso'];
                        $tamano = $_POST['tamano'];
                        $descripcion = $_POST['descripcion'];
                        $id = $_POST['id'];
    
                        $modificar = $consultar->modificar_mascota($id,$nombre,$tipomascota,$razamascota,$cliente,$sexo,$edad,$peso,$tamano,$descripcion);

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

                        $eliminar = $consultar->eliminar_mascota($id);
            
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


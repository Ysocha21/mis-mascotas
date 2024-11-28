<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/MISMASCOTAS/modelo/class_veterinario.php');    
    $consultar = new veterinario();

    if(!empty($_POST['caso'])){

        $caso = $_POST['caso'];
        switch($caso){
            case '1':
                if(
                    (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                    (isset($_POST['especialidad ']) && !empty($_POST['especialidad ']))&&
                    (isset($_POST['telefono']) && !empty($_POST['telefono'])) &&
                    (isset($_POST['correo']) && !empty($_POST['correo'])) &&
                    (isset($_POST['direccion']) && !empty($_POST['direccion']))
                    ){	
                        $nombre = $_POST['nombre'];
                        $especialidad = $_POST['especialidad'];
                        $telefono = $_POST['telefono'];
                        $correo = $_POST['correo'];
                        $direccion = $_POST['direccion'];

                        $nuevo = $consultar->agregar_veterinario($nombre,$especialidad,$telefono,$correo,$direccion);

                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Veterinario/lista.php";
                        </script>'; 
                        
                

                }else{
                    var_dump($_POST);
                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Veterinario/lista.php";
                        </script>';
        

                }
                break;
            case '2':
                    if(
                        (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                        (isset($_POST['especialidad']) && !empty($_POST['especialidad']))&&
                        (isset($_POST['telefono']) && !empty($_POST['telefono'])) &&
                        (isset($_POST['correo']) && !empty($_POST['correo'])) &&
                        (isset($_POST['direccion']) && !empty($_POST['direccion'])) &&
                        (isset($_POST['id']) &&!empty($_POST['id']))
                    ){
                        $nombre = $_POST['nombre'];
                        $especialidad = $_POST['especialidad'];
                        $telefono = $_POST['telefono'];
                        $correo = $_POST['correo'];
                        $direccion = $_POST['direccion'];
                        $id = $_POST['id'];
    
                        $modificar = $consultar->modificar_veterinario($id,$nombre,$especialidad,$telefono,$correo,$direccion);


                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Veterinario/lista.php?ID='.$id.'";
                        </script>';

                    }else{
                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Veterinario/lista.php";
                        </script>';
                    }	                    

                    break;
                default:
                    echo'<script type="text/javascript">
                    alert("Se desconoce el caso");
                    window.location.href="http://localhost/MiSMASCOTAS/Pag/Veterinario/lista.php";
                    </script>';                      
                break;
                case '3':
                    if(
                        (isset($_POST['id']) &&!empty($_POST['id']))
                    ){
                        $id = $_POST['id'];

                        $eliminar = $consultar->eliminar_veterinario($id);
            
                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Veterinario/lista.php";
                        </script>';
                    }else{
                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="http://localhost/MiSMASCOTAS/Pag/Veterinario/lista.php";
                        </script>';
                    }
                break;
        }
    }else{
        echo'<script type="text/javascript">
        alert("Se desconoce el caso");
        window.location.href="http://localhost/MiSMASCOTAS/Pag/Veterinario/lista.php";
        </script>';    
        exit;
    }


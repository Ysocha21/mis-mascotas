<?php
    require_once '../modelo/class_residencial.php';    
    $consultar = new residencial();

    if(!empty($_POST['caso'])){

        $caso = $_POST['caso'];
        switch($caso){
            case '1':
                if(
                    (isset($_POST['nombres']) && !empty($_POST['nombres'])) &&
                    (isset($_POST['apellidos']) && !empty($_POST['apellidos'])) &&
                    (isset($_POST['celular']) && !empty($_POST['celuar'])) &&
                    (isset($_POST['email']) && !empty($_POST['email'])) &&
                    (isset($_POST['barrio']) && !empty($_POST['barrio'])) &&
                    (isset($_POST['direccion']) && !empty($_POST['direccion']))
                    ){	

                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="../residencial_lista.php";
                        </script>';    

                }else{

                    $nombres = $_POST['nombres'];
                    $apellidos = $_POST['apellidos'];
                    $celular = $_POST['celular'];
                    $email = $_POST['email'];
                    $barrio = $_POST['barrio'];
                    $direccion = $_POST['direccion'];

                    $nuevo = $consultar->agregar_residencial($nombres,$apellidos,$celular,$email,$barrio, $direccion);

                    echo'<script type="text/javascript">
                    alert("Proceso terminado");
                    window.location.href="../residencial_lista.php";
                    </script>';    

                }
                break;
                case '2':
                    if(
                        (isset($_POST['nombres']) && !empty($_POST['nombres'])) &&
                        (isset($_POST['apellidos']) && !empty($_POST['apellidos'])) &&
                        (isset($_POST['celular']) && !empty($_POST['celuar'])) &&
                        (isset($_POST['email']) && !empty($_POST['email'])) &&
                        (isset($_POST['barrio']) && !empty($_POST['barrio'])) &&
                        (isset($_POST['direccion']) && !empty($_POST['direccion']))&&
                        (isset($_POST['id']) &&!empty($_POST['id']))
                    ){

                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="../residencial_nuevo.php";
                        </script>';                          

                    }else{

                        $nombres = $_POST['nombres'];
                        $apellidos = $_POST['apellidos'];
                        $celular = $_POST['celular'];
                        $email = $_POST['email'];
                        $barrio = $_POST['barrio'];
                        $direccion = $_POST['direccion'];
                        $id = $_POST['id'];
    
                        $modificar = $consultar->modificar_residencial($id,$nombres,$apellidos,$celular,$email, $barrio, $direccion);

                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="../residencial_detalle.php?ID='.$id.'";
                        </script>'; 

                    }	                    

                    break;
                default:
                    echo'<script type="text/javascript">
                    alert("Se desconoce el caso");
                    window.location.href="../residencial_lista.php";
                    </script>';                      
                    break;
        }
    }else{
        echo'<script type="text/javascript">
        alert("Se desconoce el caso");
        window.location.href="../residencial_lista.php";
        </script>';    
        exit;
    }


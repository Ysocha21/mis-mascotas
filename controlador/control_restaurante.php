<?php
    require_once '../modelo/class_restaurante.php';    
    $consultar = new restaurante();

    if(!empty($_POST['caso'])){

        $caso = $_POST['caso'];
        switch($caso){
            case '1':
                if(
                    (isset($_POST['nombres']) && !empty($_POST['nombres'])) &&
                    (isset($_POST['responsable']) && !empty($_POST['responsable'])) &&
                    (isset($_POST['celular']) && !empty($_POST['celuar'])) &&
                    (isset($_POST['barrio']) && !empty($_POST['barrio'])) &&
                    (isset($_POST['direccion']) && !empty($_POST['direccion'])) &&
                    (isset($_POST['email']) && !empty($_POST['email']))
                    ){	

                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="../restaurante_lista.php";
                        </script>';    

                }else{

                    $nombres = $_POST['nombres'];
                    $responsable = $_POST['responsable'];
                    $celular = $_POST['celular'];
                    $barrio = $_POST['barrio'];
                    $direccion = $_POST['direccion'];
                    $email = $_POST['email'];


                    $nuevo = $consultar->agregar_restaurante($nombre,$responsable,$celular,$barrio, $direccion,$email);

                    echo'<script type="text/javascript">
                    alert("Proceso terminado");
                    window.location.href="../restaurante_lista.php";
                    </script>';    

                }
                break;
                case '2':
                    if(
                        (isset($_POST['nombres']) && !empty($_POST['nombres'])) &&
                        (isset($_POST['responsable']) && !empty($_POST['responsable'])) &&
                        (isset($_POST['celular']) && !empty($_POST['celuar'])) &&
                        (isset($_POST['barrio']) && !empty($_POST['barrio'])) &&
                        (isset($_POST['direccion']) && !empty($_POST['direccion'])) &&
                        (isset($_POST['email']) && !empty($_POST['email']))
                    ){

                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="../restaurante_nuevo.php";
                        </script>';                          

                    }else{

                        $nombre = $_POST['nombre'];
                        $responsable = $_POST['responsable'];
                        $celular = $_POST['celular'];
                        $barrio = $_POST['barrio'];
                        $direccion = $_POST['direccion'];
                        $email = $_POST['email'];
    
                        $modificar = $consultar->modificar_restaurante($id,$nombre,$responsable,$celular, $barrio, $direccion,$email);

                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="../restaurante_detalle.php?ID='.$id.'";
                        </script>'; 

                    }	                    

                    break;
                default:
                    echo'<script type="text/javascript">
                    alert("Se desconoce el caso");
                    window.location.href="../restaurante_lista.php";
                    </script>';                      
                    break;
        }
    }else{
        echo'<script type="text/javascript">
        alert("Se desconoce el caso");
        window.location.href="../restaurante_lista.php";
        </script>';    
        exit;
    }


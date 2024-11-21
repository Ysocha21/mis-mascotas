<?php
    require_once '../modelo/class_users.php';    
    $consultar = new Users();

    if(!empty($_POST['caso'])){

        $caso = $_POST['caso'];
        switch($caso){
            case '1':
                if(
                    (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                    (isset($_POST['email']) && !empty($_POST['email'])) &&
                    (isset($_POST['celular']) && !empty($_POST['celuar']))
                    ){	

                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="../driver_lista.php";
                        </script>';    

                }else{

                    $nombre = $_POST['nombre'];
                    $email = $_POST['email'];
                    $celular = $_POST['celular'];

                    $nuevo = $consultar->agregar_user($nombre,$email,$celular);

                    echo'<script type="text/javascript">
                    alert("Proceso terminado");
                    window.location.href="../usuarios.php";
                    </script>';    

                }
                break;
                case '2':
                    if(
                    (isset($_POST['nombre']) && !empty($_POST['nombre'])) &&
                    (isset($_POST['email']) && !empty($_POST['email'])) &&
                    (isset($_POST['celular']) && !empty($_POST['celuar'])) &&
                    (isset($_POST['id']) && !empty($_POST['id'])) 
                    ){

                        echo'<script type="text/javascript">
                        alert("Todos los campos son requeridos");
                        window.location.href="../usuarios_nuevo.php";
                        </script>';                          

                    }else{

                        $nombre = $_POST['nombre'];
                        $email = $_POST['email'];
                        $celular = $_POST['celular'];
                        $id = $_POST['id'];
    
                        $modificar = $consultar->modificar_user($id,$nombre,$email,$celular);

                        echo'<script type="text/javascript">
                        alert("Proceso terminado");
                        window.location.href="../usuarios_detalle.php?ID='.$id.'";
                        </script>'; 

                    }	                    

                    break;
                default:
                    echo'<script type="text/javascript">
                    alert("Se desconoce el caso");
                    window.location.href="../usuarios.php";
                    </script>';                      
                    break;
        }
    }else{
        echo'<script type="text/javascript">
        alert("Se desconoce el caso");
        window.location.href="../usuarios.php";
        </script>';    
        exit;
    }


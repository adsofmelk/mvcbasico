<?php
  //Llamada al modelo
  require_once("models/usuariosModel.php");

  if( isset($_GET['accion']) ){

    switch($_GET['accion']){

      case "ingresar":

        $usuario = new usuariosModel();
        $usuario = $usuario->verificarLogin($_POST);

        if($usuario == false){ // en caso de que el login falllase
            $datos['error'] = "Usuario / contraseña invalidos";

            redirigirHome();

        }else{ //en caso que el login sea exitoso

          $_SESSION['id'] = $usuario['id'];
          $_SESSION['nombre'] = $usuario['nombre'];
          $_SESSION['email'] = $usuario['email'];
          $_SESSION['rol'] = $usuario['rol'];

          redirigirHome();
        }
        break;

      case 'salir':

        session_unset();

        header('Location: index.php?controlador=login');
        break;


    }


  }else{

    redirigirHome();

  }



?>

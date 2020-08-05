<?php

verificarPermisos('administrador');

  //Llamada al modelo
  require_once("models/usuariosModel.php");

  if( isset($_GET['accion']) ){

    switch($_GET['accion']){

      case 'crearusuario':
        require("views/usuarios/form_crearusuario_view.phtml");
        break;

      case 'guardarnuevousuario':
        $usuario = new UsuariosModel();
        $usuario->saveNewUsuario($_POST);

        $datos=$usuario->getUsuarios();
        require_once("views/usuarios/usuarios_view.phtml");
        break;

      case 'verusuario':

        $usuario = new UsuariosModel();
        $datos = $usuario->getUsuario($_GET['id']);

        require_once("views/usuarios/usuario_view.phtml");

        break;

      case 'borrarusuario':
        $usuario = new UsuariosModel();
        $datos = $usuario->deleteUsuario($_GET['id']);

        $datos=$usuario->getUsuarios();
        require_once("views/usuarios/usuarios_view.phtml");
        break;

      case 'actualizarusuario':
        $usuario = new UsuariosModel();
        $datos = $usuario->getUsuario($_GET['id']);

        require("views/usuarios/form_actualizarusuario_view.phtml");
        break;

      case "guardaractializacionusuario":

        $usuario = new UsuariosModel();

        $usuario->guardarActualizacionUsuario($_POST);

        $datos=$usuario->getUsuarios();
        require_once("views/usuarios/usuarios_view.phtml");
        break;

    }


  }else{

    $per=new usuariosModel();

    $datos=$per->getUsuarios();

    //Llamada a la vista
    require_once("views/usuarios/usuarios_view.phtml");

  }



?>

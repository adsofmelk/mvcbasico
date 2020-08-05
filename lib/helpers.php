<?php

  function verificarPermisos($rolrequerido){

    if($rolrequerido != $_SESSION['rol']){
      header('Location: index.php?controlador=login');
    }

  }

  function redirigirHome(){

    if(isset($_SESSION['rol'])){

      switch($_SESSION['rol']){

        case 'administrador':
            header('Location: index.php?controlador=usuarios');
          break;

        case 'usuario':
            header('Location: index.php?controlador=homeusuario');
          break;

        case 'negocio':
            header('Location: index.php?controlador=homenegocio');
          break;

      }

    }

    require_once("views/login/login_view.phtml");

  }



 ?>

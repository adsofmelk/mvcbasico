<?php
  session_start();
  require_once("db/db.php");
  require_once("lib/helpers.php");

  if(isset($_GET['controlador'])){

    if(file_exists("controllers/". $_GET['controlador']."Controller.php")){

        require_once("controllers/". $_GET['controlador']."Controller.php");

    }else{

      echo "El controlador ".  $_GET['controlador'] . " no existe";

    }

  }

?>

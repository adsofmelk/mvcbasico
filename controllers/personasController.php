<?php
  //Llamada al modelo
  require_once("models/personasModel.php");

  $per=new personasModel();

  $datos=$per->getPersonas();

  //Llamada a la vista
  require_once("views/personas_view.phtml");

?>

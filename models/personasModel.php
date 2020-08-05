<?php

  class personasModel{

    private $con;

    public function __construct(){

      $this->con=Conectar::getConexion();

    }

    public function getPersonas(){

      $stmt=$this->con->prepare("select * from personas;");
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

  }
?>

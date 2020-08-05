<?php
  class Conectar{

    public static function getConexion(){

      require_once("config.php");

      try {

        $dsn = "mysql:host=".$params['host'].";dbname=".$params['dbname'];
        $dbh = new PDO($dsn, $params['user'], $params['password']);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      } catch (PDOException $e){

        echo $e->getMessage();
        return false;

      }

      return $dbh;
    }
  }
?>

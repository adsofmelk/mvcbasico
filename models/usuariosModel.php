<?php

  class usuariosModel{

    private $con;

    public function __construct(){

      $this->con=Conectar::getConexion();

    }

    public function getUsuarios(){

      $stmt=$this->con->prepare("select * from usuarios;");
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getUsuario($id){

      $stmt=$this->con->prepare("select * from usuarios where id = ?");
      $stmt->bindParam(1,$id);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function deleteUsuario($id){

      $stmt=$this->con->prepare("delete from usuarios where id = ?");
      $stmt->bindParam(1,$id);
      $stmt->execute();

      return ;

    }



    public function saveNewUsuario($datos){

      $stmt=$this->con->prepare("insert into usuarios (nombre, email, password, rol) values ( ?,?,?,?)");

      $stmt->bindParam(1, $datos['nombre']);
      $stmt->bindParam(2, $datos['email']);
      $stmt->bindParam(3, $datos['password']);
      $stmt->bindParam(4, $datos['rol']);

      $stmt->execute();
    }

    public function guardarActualizacionUsuario($datos){

      $stmt=$this->con->prepare("update usuarios set nombre = ?,  email =?, password = ?, rol = ? where id = ?");

      $stmt->bindParam(1, $datos['nombre']);
      $stmt->bindParam(2, $datos['email']);
      $stmt->bindParam(3, $datos['password']);
      $stmt->bindParam(4, $datos['rol']);
      $stmt->bindParam(5, $datos['id']);

      $stmt->execute();
    }

    public function verificarLogin($datos){

      $stmt=$this->con->prepare("select * from usuarios where email = ? and password = ?");
      $stmt->bindParam(1,$datos['email']);
      $stmt->bindParam(2,$datos['password']);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);

    }

  }
?>

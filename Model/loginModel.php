<?php
class LoginModel extends Conexion {


    public function __construct(){

            parent::__construct();

            
        }

        /*REGISTRO AÑADIDO EN BASE DE DATOS*/

    public function registerUser($nombre, $apellidos, $telefono, $email, $direccion, $contrasena) {
        $pdo = $this->conect();
        $sql = "INSERT INTO cliente (nombre, apellidos, telefono, email, direccion, contrasena) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$nombre, $apellidos, $telefono, $email, $direccion, $contrasena]);
    }

    /*DEVUELVE EL USUARIO*/

    public function getUserByEmail($email) {
        $pdo = $this->conect();
        $sql = "SELECT * FROM cliente WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

<?php
class PerfilModel extends Conexion {
    public function getClientData($idUsuario) {
        $pdo = $this->conect();
        $sql = "SELECT * FROM cliente WHERE idcliente = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idUsuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
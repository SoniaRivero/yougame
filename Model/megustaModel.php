<?php

class MegustaModel extends Conexion {
    

    public function __construct() {
        parent::__construct();
    }

    /*DEVUELVE LA LISTA DE ME GUSTA*/

    public function getMegustaProductos() {
        if (!isset($_SESSION['megusta'])) {
            $_SESSION['megusta'] = []; 
        }
        return $_SESSION['megusta']; 
    }

    /*DEVUELVE PRODUCTOS SEGUN EL ID*/


    public function getProductoById($idproducto) {
        $sql = "SELECT idproducto, nombre, precio FROM producto WHERE idproducto = ?";
        $stmt = $this->conect()->prepare($sql);
        $stmt->execute([$idproducto]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

/*AÑADE PRODUCTOS A ME GUSTA*/

    public function addProductoAMegusta($clienteId, $idProducto) {
    
    if ($idProducto) {
        
        $_SESSION['megusta'][$idProducto] = $this->getProductoById($idProducto); 

        
        $sql = "INSERT INTO lista_megusta (clienteid, productoid) VALUES (?, ?)";
        $stmt = $this->conect()->prepare($sql);
        $stmt->execute([$clienteId, $idProducto]);
    }
}

/*DEVUELVE LA LISTA ME GUSTA CON LOS PRODUCTOS DEL USUARIO*/


public function getMegustaProductosByClienteId($clienteId) {
    $sql = "SELECT p.idproducto, p.nombre, p.precio FROM lista_megusta lm 
            INNER JOIN producto p ON lm.productoid = p.idproducto 
            WHERE lm.clienteid = ?";
    $stmt = $this->conect()->prepare($sql);
    $stmt->execute([$clienteId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}


/*ELIMINAR PRODUCTOS*/



public function removeProductoFromMegusta($productoId, $clienteId) {
    $sql = "DELETE FROM lista_megusta WHERE productoid = ? AND clienteid = ?";
    try {
        $stmt = $this->conect()->prepare($sql);
        $stmt->execute([$productoId, $clienteId]);
        return $stmt->rowCount(); 
    } catch (PDOException $e) {
        echo "Error al eliminar del carrito: " . $e->getMessage();
        return false; 
    }
}



}
?>
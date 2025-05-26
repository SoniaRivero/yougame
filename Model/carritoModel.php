<?php
session_start();
class CarritoModel extends Conexion {


    public function __construct() {
        parent::__construct(); 
    }

    /*DEVUELVE EL CARRITO*/

    public function getCarritoProductos() {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = []; 
        }
        return $_SESSION['carrito']; 
    }
    /*DATOS PRODUCTO*/
    public function getProductoById($idproducto) {
        $sql = "SELECT idproducto, nombre, precio, descripcion, plataforma, resena FROM producto WHERE idproducto = ?";
        $stmt = $this->conect()->prepare($sql);
        $stmt->execute([$idproducto]);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
        if ($producto) {
            $producto['resena'] = explode("\n", $producto['resena']);
        }
        
        return $producto; 
    }

    /*AÑADE PRODUCTOS AL CARRITO*/

    public function addProductoAlCarrito($clienteId, $productoId, $costeTotal) {
        $sql = "INSERT INTO carrito (clienteid, productoid, coste_total) VALUES (?, ?, ?)";
        try {
            $stmt = $this->conect()->prepare($sql);
            $stmt->execute([$clienteId, $productoId, $costeTotal]);

            $producto = $this->getProductoById($productoId);


        if ($producto) {
            $_SESSION['carrito'][] = [
                'idproducto' => $producto['idproducto'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'coste_total' => $costeTotal,
                
            ];
        }


            return $this->conect()->lastInsertId(); 
        } catch (PDOException $e) {
            echo "Error al añadir al carrito: " . $e->getMessage();
            return false; 
        }
    }

/*ELIMINA PRODUCTOS DEL CARRITO*/

    public function removeProductoFromCarrito($productoId, $clienteId) {
    $sql = "DELETE FROM carrito WHERE productoid = ? AND clienteid = ?";
    try {
        $stmt = $this->conect()->prepare($sql);
        $stmt->execute([$productoId, $clienteId]);
        return $stmt->rowCount(); 
    } catch (PDOException $e) {
        echo "Error al eliminar del carrito: " . $e->getMessage();
        return false; 
    }
}

/*DEVUELVE LOS PRODUCTOS DEL CARRITO SEGUN CLIENTE*/


public function getCarritoPorCliente($clienteId) {
    $sql = "SELECT p.idproducto, p.nombre, p.precio FROM carrito c JOIN producto p ON c.productoid = p.idproducto WHERE c.clienteid = ?";
    try {
        $stmt = $this->conect()->prepare($sql);
        $stmt->execute([$clienteId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        echo "Error al obtener el carrito: " . $e->getMessage();
        return []; 
    }
}



    
    

    
}
?>

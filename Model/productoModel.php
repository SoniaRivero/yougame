<?php
session_start();

class ProductoModel extends Conexion {

  public function __construct() {
        parent::__construct();
    }

    /*DEVUELVE PRODUCTOS SEGUN EL ID*/

    public function getProductoById($idproducto) {
        $sql = "SELECT idproducto, nombre, precio, descripcion,plataforma, resena FROM producto WHERE idproducto = ?";
        $stmt = $this->conect()->prepare($sql);
        $stmt->execute([$idproducto]);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        
       
        if ($producto) {
            $producto['resena'] = explode("\n", $producto['resena']);
        }
        
        return $producto;
    }

    /*GUARDA LA RESEÑA*/

    public function guardarResena($idproducto, $contenido, $nombreCliente) {
        
        $producto = $this->getProductoById($idproducto);
        $nuevaResena = $contenido . " - " . $nombreCliente . " (" . date('Y-m-d H:i:s') . ")";

        
        $resenaActual = $producto['resena'] ?? [];
        $resenaActual[] = $nuevaResena; 

        $resenaActualString = implode("\n", $resenaActual);

       
        $sql = "UPDATE producto SET resena = ? WHERE idproducto = ?";
        $stmt = $this->conect()->prepare($sql);
        $stmt->execute([$resenaActualString, $idproducto]);
    }
}
?>
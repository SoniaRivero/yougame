<?php 

class BuscarModel extends Conexion {

    public function __construct() {
        parent::__construct(); 
    }

/*BUSCAR PRODUCTO*/

    public function buscarProductos($query) {
        $query = "%" . $query . "%"; 
        $sql = "SELECT * FROM producto WHERE nombre LIKE :query"; 
        $stmt = $this->conect()->prepare($sql);
        $stmt->bindParam(':query', $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
}
?>
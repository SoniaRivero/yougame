<?php 

class CategoriasModel extends Conexion {
    public function __construct() {
        parent::__construct();
    }
/*DEVUELVE PRODUCTOS SEGUN LA CATEGORIA*/

    public function getProductosForCategoria($categoriaId) {
        $query = "SELECT * FROM producto WHERE categoriaid = :categoria LIMIT 10";
        $stmt = $this->conect()->prepare($query);
        $stmt->bindParam(':categoria', $categoriaId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
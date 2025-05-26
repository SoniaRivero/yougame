<?php 

	class homeModel extends Conexion {

		public function __construct(){

			parent::__construct();

			
		}

/*DEVUELVE PRODUCTOS SEGUN LA CATEGORIA*/

public function searchProductosPorCategoria() {
        $db = $this->conect(); 

        $categorias = [
            'consolas' => 1,
            'videojuegos_pc' => 2,
            'videojuegos_play5' => 3,
            'videojuegos_xbox' => 4
        ];

        $productosPorCategoria = [];

        foreach ($categorias as $nombre => $id) {
            $query = "SELECT * FROM producto WHERE categoriaid = :id LIMIT 3";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $productosPorCategoria[$nombre] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $productosPorCategoria;
    }
}


		
	

 ?>
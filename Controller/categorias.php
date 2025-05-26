<?php 
session_start();

class Categorias extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    /*DATOS, MODEL Y VISTA*/

    public function categorias($categoria) {
        $data['page_tag'] = "Categorías - YouGame";
        $data['page_title'] = ucfirst(str_replace('_', ' ', $categoria)); 
        $data['page_name'] = "categorias";

        $categoriaId = $this->getCategoriaId($categoria);
        $productos = $categoriaId ? $this->model->getProductosForCategoria($categoriaId) : [];
        $data['productos'] = $productos;

        $this->views->getView($this, "categorias", $data);
    }

    /*CATEGORIA POR ID*/

    private function getCategoriaId($categoria) {
        $categorias = [
            'consolas' => 1,
            'videojuegos_pc' => 2,
            'videojuegos_play5' => 3,
            'videojuegos_xbox' => 4
        ];
        return $categorias[$categoria] ?? null;
    }
}

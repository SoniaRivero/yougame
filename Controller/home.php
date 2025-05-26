<?php
require_once 'Config/config.php';
require_once 'Libraries/Core/Conexion.php';
session_start();

/*DATOS, MODEL Y VISTA*/

class Home extends Controllers {
    public function __construct() {
        parent::__construct();
        $this->model = new HomeModel(); 
    }

    public function home() {
        $data['page_tag'] = "YouGame";
        $data['page_title'] = "YouGame - Página principal";
        $data['page_name'] = "YouGame";

        
        $data['productosPorCategoria'] = $this->model->searchProductosPorCategoria();

        
        $this->views->getView($this, "home", $data); 
    }
}
?>

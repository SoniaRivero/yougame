<?php 
session_start();
class Buscar extends Controllers {

    private $buscarModel;

    public function __construct() {
        
        parent::__construct();

        $this->buscarModel = new BuscarModel();
    }

    public function buscar() {

      $data['page_tag'] = "Resultados de la Búsqueda - YouGame";
        $data['page_title'] = "Resultados de la Búsqueda";
        $data['page_name'] = "buscar";

        if (isset($_GET['search_query'])) {
            $query = $_GET['search_query']; 
            $data['resultados'] = $this->buscarModel->buscarProductos($query); 
        } else {
            $data['resultados'] = []; 
        }

      
      $this->views->getView($this, "buscar", $data);
    }

    
}

?>
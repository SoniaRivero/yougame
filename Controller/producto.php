<?php 


class Producto extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    /*DATOS, MODEL, VISTA Y MOSTRAR DATOS PRODUCTO Y RESEÑA*/

    public function producto($idproducto) {
        $data['page_tag'] = "YouGame";
        $data['page_title']= "YouGame - Producto";
        $data['page_name']="Producto";  

        $producto = $this->model->getProductoById($idproducto);

        if ($producto) {
            $data['producto'] = $producto;
            
            $data['resena'] = $producto['resena']; 
        } else {
            $data['producto'] = null; 
            $data['resena'] = []; 
        }

        $this->views->getView($this, "producto", $data);
    }

    /*AÑADIR RESEÑA*/

    public function añadirResena() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idproducto = $_POST['idproducto'];
            $contenido = $_POST['contenido'];
            
            $nombreCliente = $_SESSION['nombre_usuario'] ?? 'Cliente Anónimo';

            
            $this->model->guardarResena($idproducto, $contenido, $nombreCliente);
            header("Location: " . base_url() . "/producto/producto/" . $idproducto);
            exit();
        }
    }
}


?>



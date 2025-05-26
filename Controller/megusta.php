<?php 
session_start();
class Megusta extends Controllers {
    public function __construct() {
        
        parent::__construct();
    }

/*DATOS Y VISTA*/

    public function megusta() {

      $data['page_tag'] = "YouGame";
      $data['page_name']="YouGame";  
      $data['page_title'] = "Lista de Me Gusta";
      $data['productos'] = $_SESSION['megusta'] ?? [];
      
      
      $this->views->getView($this, "megusta", $data);
    }

/*MODEL Y AÑADE PRODUCTO A ME GUSTA*/

public function addProducto($idProducto) {
    if (isset($idProducto)) {
        $producto = $this->model->getProductoById($idProducto); 

        if ($producto) {
            $clienteId = $_SESSION['usuario_id']; 
            
            
            $this->model->addProductoAMegusta($clienteId, $idProducto);
            $_SESSION['mensaje'] = "Producto añadido a 'Me Gusta'"; 
        } else {
            $_SESSION['mensaje_error'] = "Producto no encontrado"; 
        }
    } else {
        $_SESSION['mensaje_error'] = "ID del producto no está definido"; 
    }

    header("Location: " . base_url() . "/megusta");
    exit(); 
}

/*ELIMINAR PRODUCTO DE ME GUSTA*/

    public function eliminarProductomg() {

   
        

        if (isset($_POST['idProducto'])) {
            $idProducto = $_POST['idProducto'];

            
            if (isset($_SESSION['megusta'])) {
                foreach ($_SESSION['megusta'] as $key => $producto) {
                    if ($producto['idproducto'] == $idProducto) {
                        unset($_SESSION['megusta'][$key]); 



                        break; 
                    }
                }
            }

            $this->model->removeProductoFromMegusta($idProducto, $_SESSION['usuario_id']);


        } else {
            echo json_encode(['error' => 'ID de producto no válido']);
        }
    }


}

    


?>
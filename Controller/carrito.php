<?php 


class Carrito extends Controllers {
    public function __construct() {
        parent::__construct();
        $this->model = new CarritoModel(); 
    }

/*DATOS, MODEL Y VISTA*/

    public function carrito() {
        $data['page_tag'] = "YouGame";
        $data['page_title'] = "YouGame - Carrito";
        $data['page_name'] = "YouGame";  

        
        $productos = $this->model->getCarritoProductos();
        $data['productos'] = $productos;



        $this->views->getView($this, "carrito", $data);
    }

    /*AÑADIR PRODUCTO CARRITO*/

    public function addProducto($idProducto) {

      
        
        if (isset($idProducto)) {
            $producto = $this->model->getProductoById($idProducto); 



            if ($producto) {

                $clienteId = $_SESSION['usuario_id'];
                $costeTotal = $producto['precio']; 



                $this->model->addProductoAlCarrito($clienteId, $idProducto, $costeTotal);   
                $_SESSION['mensaje'] = "Producto añadido al carrito"; 
            } else {
                $_SESSION['mensaje_error'] = "Producto no encontrado"; 
            }
        } else {
            $_SESSION['mensaje_error'] = "ID del producto no está definido"; 
        }

        
     header("Location: " . base_url() . "/carrito/carrito");
        exit(); 
    }

    /*ELIMINAR PRODUCTO CARRITO*/

      public function eliminarProducto() {

   
        

        if (isset($_POST['idProducto'])) {
            $idProducto = $_POST['idProducto'];

            
            if (isset($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $key => $producto) {
                    if ($producto['idproducto'] == $idProducto) {
                        unset($_SESSION['carrito'][$key]); 


                        break; 
                    }
                }
            }

            $this->model->removeProductoFromCarrito($idProducto, $_SESSION['usuario_id']);


        } else {
            echo json_encode(['error' => 'ID de producto no válido']);
        }
    }
}

?>


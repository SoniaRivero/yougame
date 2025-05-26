<?php 

require_once 'Model/CarritoModel.php';
require_once 'Model/megustaModel.php';



class Login extends Controllers {
    public function __construct() {
        parent::__construct();
    }

    /* REDIRECCION LOGIN*/

    public function login() {
        

        if (isset($_SESSION['usuario_id'])) {
            header('Location: ' . base_url() . '/perfil');
            exit();
        }

/*DATOS, FORMULARIO Y VISTA*/
        
        $data = [
            'page_tag' => "YouGame",
            'page_title' => "YouGame - Login/Registro",
            'page_name' => "YouGame"
        ];

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['register'])) {
                
                $this->registerUser();
            } elseif (isset($_POST['login'])) {
                
                $this->loginUser();
            }
        }

        
        $this->views->getView($this, "login", $data);
    }

    /*REGISTRO Y MODEL*/

    private function registerUser() {
        
        $nombre = $_POST['txtNombre'];
        $apellidos = $_POST['txtApellido'];
        $telefono = $_POST['txtTelf'];
        $email = $_POST['txtCorreo'];
        $direccion = $_POST['txtDireccion'];
        $contrasena = $_POST['txtPassword'];

        
        if ($this->model->registerUser($nombre, $apellidos, $telefono, $email, $direccion, $contrasena)) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar.";
        }
    }

    /*DATOS DE LOGIN, MODEL; CARRITO Y ME GUSTA DE USUARIO*/

    private function loginUser() {
        $email = $_POST['loginEmail'];
        $contrasena = $_POST['loginPassword'];

        
        $usuario = $this->model->getUserByEmail($email);

        
        if ($usuario && $contrasena === $usuario['contrasena']) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['idcliente'];
            $_SESSION['nombre_usuario'] = $usuario['nombre'];


            $carritoModel = new CarritoModel(); 
        $productosCarrito = $carritoModel->getCarritoPorCliente($usuario['idcliente']);
        $_SESSION['carrito'] = $productosCarrito; 

        $meGustaModel = new MegustaModel();
        $productosMegusta =  $meGustaModel->getMegustaProductosByClienteId($usuario['idcliente']);
        $_SESSION['megusta'] = $productosMegusta;



            header('Location: perfil');
            exit();
        } else {
            echo "Correo o contraseña incorrectos.";
        }
    }

    /*CERRAR SESIÓN*/

    public function logout() {
        session_start();
        $_SESSION = [];
        session_destroy();
        header('Location: ' . base_url());
        exit();
    }
}

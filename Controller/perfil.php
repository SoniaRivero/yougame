<?php 

class Perfil extends Controllers {
    public function __construct() {
        parent::__construct();
        session_start();
    }
/*DATOS, MODEL Y VISTA*/

    public function perfil() {
        $this->checkLoginRedirect();

        
        $usuario = $this->model->getClientData($_SESSION['usuario_id']);
        
        if ($usuario) {
            $data = [
                'usuario' => $usuario,
                'page_tag' => "Perfil - YouGame",
                'page_title' => "Perfil",
                'page_name' => "perfil"
            ];
            $this->views->getView($this, "perfil", $data);
        } else {
            $this->checkLoginRedirect(); 
        }
    }

    /*COMPROBAR SI ESTA LOGIN*/

    private function checkLoginRedirect() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . base_url() . '/login');
            exit();
        }
    }
}
?>
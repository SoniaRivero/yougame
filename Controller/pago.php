<?php 

class Pago extends Controllers {
    public function __construct() {
        
        parent::__construct();
    }

    public function pago() {
      
      $this->views->getView($this, "pago");
    }


}


?>
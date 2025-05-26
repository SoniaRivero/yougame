<?php 

class Controllers {
    protected $views;
    protected $model;

    public function __construct() {
        $this->loadModel();
        $this->views= new Views();
    }

    public function loadModel() {
        $model = get_class($this) . "Model";
        $routClass = "Model/" . $model . ".php";

        if (file_exists($routClass)) {
            require_once($routClass);

            
            if (class_exists($model)) {
               $this->model = new $model();
            } 

        } 

    }
}

?>
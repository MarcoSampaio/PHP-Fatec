<?php

abstract class Controller{
    
    protected $view;
    
    public function __construct(){
        $this->view = new View();
    }
    
    public function estaAutorizado(){
        if(!isset($_SESSION["_ID"]))
             header("Location: /login/formulario");
    }
}

?>


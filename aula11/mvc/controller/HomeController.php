<?php

class HomeController extends Controller{
    
    public function __call($m,$a){
        $this->view->renderizar("erro");
    }
    // /home/ola
    public function ola(){
        $this->view->renderizar("ola");
        $_SESSION["_OI"] = "Ola";
    }
    // /home/formulario
    public function formulario(){
        $this->view->renderizar("form");
    }
    // /home/outro
    public function outro(){
        echo $_POST["nome"] . "<br>";
        echo $_SESSION["_OI"];
    }
    
}

?>
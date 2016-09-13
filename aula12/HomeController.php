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
    
    public function arquivo(){
        $this->view->renderizar("upload");
    }
    
    public function up(){
        $dir = '/home/ubuntu/workspace/mvc/uploads/';
        $uploadfile = $dir . basename($_FILES['arquivo']['name']);
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {
            echo "Arquivo enviado com sucesso. <br>";
        } else {
            echo "Erro <br>";
        }
    }
    
}

?>
<?php

class App{
    //VEM DA URL
    private $met, $clazz;
    
    public function __construct($met,$clazz){
        $this->met = $met;
        $this->clazz = $clazz;
    }
    
    public function startApp(){
        $clazzName = ucfirst($this->clazz) . "Controller";
        $modelName = ucfirst($this->clazz) . "Model";
        require_once "model/" . $modelName . ".php";
        require_once "model/" . ucfirst($this->clazz) . "DAO.php";
        require_once "controller/Controller.php";
        require_once "controller/" . $clazzName . ".php";
        $hc = new $clazzName();
        $met = $this->met;
        $hc->$met();
    }
}

session_start();
require_once "view/view.php";

$met = $_GET["metodo"];
$clazz = $_GET["classe"];
$r = new App($met,$clazz);
$r->startApp();

?>
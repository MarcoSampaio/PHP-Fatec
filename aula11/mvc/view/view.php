<?php

class View{
    //O $pagina vai renderizar a pagina
    //determinado pelo controller
    public function renderizar($pagina){
        require_once $pagina . ".php";
    }
    
    public function interpolar($pagina,$dado){
        require_once $pagina . ".php";
    }
    
}

?>
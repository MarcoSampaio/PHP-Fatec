<?php

class ProdutoController extends Controller{
    
    public function listar(){
        $p = new ProdutoDAO();
        $todosProds = $p->getProducts();
        $this->view->interpolar("prodlista",$todosProds);
    }
}

?>
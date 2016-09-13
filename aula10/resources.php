<?php

abstract class GeneralResource{
    
    public function __call($m,$e){
        header('content-type: application/json');
        echo json_encode(array("response"=>"Recurso inexistente $m"));
        http_response_code(404);   
    }
    
}

class GeneralResourceGET extends GeneralResource{
    
    public function produto(){
        $arg1 = $_GET["arg1"];
        header('content-type: application/json');
        if($arg1 > 0){
            require_once "../model/produto.php";
            require_once "../model/produtoDAO.php";
            $pd = new ProdutoDAO();
            $prod = $pd->getProduct($arg1);
            if($prod->getId() != null &&  $prod->getNome() != null && $prod->getValor() != null){
                echo json_encode(array("id"=>$prod->getId(), "nome"=>$prod->getNome(), "valor"=>$prod->getValor()));
                http_response_code(200);
            }else{
                echo json_encode(array("response"=>"Produto nao encontrado"));
                http_response_code(404);
            }
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500); 
        }
    }
    
    public function hello(){
        header('content-type: application/json');
        header('lol: ololl');
        echo json_encode(array("resp"=>"ola"));
        http_response_code(200);
    }
    
}

class GeneralResourceOPTIONS extends GeneralResource{
    
    public function hello(){
        header('allow: GET, OPTIONS');
        http_response_code(200); 
    }
    
    public function produto(){
        header('allow: POST, OPTIONS');
        http_response_code(200); 
    }
    
}

class GeneralResourcePOST extends GeneralResource{
    
    public function produto(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            //CUIDADO
            require_once "../model/produto.php";
            require_once "../model/produtoDAO.php";
            $produto = new Produto(0,$array["nome"],$array["valor"]);
            $pd = new ProdutoDAO();
            $pd->insert($produto);
            echo json_encode(array("response"=>"Criado"));
            http_response_code(200);   
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }

}


?>
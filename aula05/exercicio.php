<!DOCTYPE html>
<html>
<body>
<?php

//Exercicio: Uma loja vende tres tipos de produtos: Livros, filmes e material(de escritorio).
//Todo produto possui um preco. A cada mes em um dia especifico os livros ganham um desconto de 10%,
//os filmes 20% e os materiais 15%. O preco deve ser mostrado na tela e nao atualizado. Desenhe um
//diagrama de classes e implemente todas.
//Feito isso, faca um teste com um vetor de 6 produtos e mostre na tela os precos em promocao.

class Loja{
    protected $preco;
    
    public function __construct($preco){
        $this->preco=$preco;
    } 
    
    public function mostraPreco(){
        
    }
    
}

class Livro{
    
    public function mostraPromocao(){
        
    }
    
}

class Filme{
    
    public function mostraPromocao(){
        
    }
    
}

class Material{
    
    public function mostraPromocao(){
        
    }
    
}

?>
</body>
</html>
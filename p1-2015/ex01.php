<!DOCTYPE html>
<html>
<body>
<?php
/*
Em um sistema de bibliotecas é possivel alugar Livros. Um Livro possui um nome, um autor e um indicador de disponibilidade. Uma Estante possui 
vários livros e uma identificação. Você deve modelar uma pequena rotina de emprestimos. A entidade Estante pode listar todas as informações de 
todos os Livros que ela possui emprestados ou não. Uma Estante também lista os livros não emprestados apenas. Um Livro pode ter sua informação
exibida e pode ser emprestado (caso já não esteja). Neste problema não há quantidades (suponha haver apenas um livro de cada).

*/
class Livro{
    public $nome, $autor, $disponivel;   
    
     public function __construct($nome, $autor, $disponivel){
        $this->nome = $nome;
        $this->autor = $autor;
        $this->disponivel = $disponivel;
     }
     
     public function emprestar(){
         $this->disponivel = false;
     }
     
     public function devolver(){ //bonus ... não obritatório
         $this->disponivel = true;
     }

}

class Estante {
    protected $identificador;
    
    public function __construct($identificador){
        $this->identificador = $identificador;
    }
    
    public function mostralivros($livros){
        foreach($livros as $c){
            echo "nome: $c->nome <br>";
            echo "autor: $c->autor <br>";
            echo "disponivel: $c->disponivel <br>";
        }
    }
    
    public function mostralivrosdisponiveis($livros){
        foreach($livros as $c){
            if($c->disponivel){
                echo "nome: $c->nome <br>";
                echo "autor: $c->autor <br>";
                echo "disponivel: $c->disponivel <br>";
            }
        }
    }
}
$v = [];
$l1 = new Livro("livro1","autor1",true);
$l2 = new Livro("livro2","autor2",true);
$l3 = new Livro("livro3","autor3",false);
$l4 = new Livro("livro4","autor4",false);
$l5 = new Livro("livro5","autor5",true);
$v[] = $l1;
$v[] = $l2;
$v[] = $l3;
$v[] = $l4;
$v[] = $l5;

$e = new Estante("Terror");
$e->mostralivros($v);
$e->mostralivrosdisponiveis($v);

?>
</body>
</html>
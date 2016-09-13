<html>
<body>
<?php

//Uma Lanterna so funciona com duas Pilhas. Cada Pilha deve possuir ao menos 10 pontos de durabilidade
//para manter a Lanterna acesa. Dependendo da Pilha a durabilidade pode se esgotar com rapidez.
//É possivel checar o estado de uma Pilha e de uma Lanterna.

//Etapas
// 1 - Classes
// 2 - Metodos (diz o que faz a classe)
// 3 - Atributos (sao as qualidades/caracteristicas da classe)
// 4 - Regra de Negocios (lógica do exercicio)
// 5 - Relacionamento ()
//Obs: metodo construtor é algo que sempre tem que colocar
//Obs: uma classe nao deve enchergar atributos de outra classe

//Classes: Pilha
//Metodo: checar estado, reduzir durabilidade
//Atributos: durabilidade, qualidade

//Classe: Lanterna
//Metodo: acender, checar estado
//Atributos: pilha1, pilha2


 class Pilha{
     public $durabilidade, $qualidade;
     
     public function __construct($durabilidade, $qualidade){
        $this -> durabilidade = $durabilidade;
        $this -> qualidade = $qualidade;
    }
 
    public function checarEstado(){
        echo "Durabilidade: $this->durabilidade<br>";
    }
 
    public function reduzirDurabilidade(){
        $this->durabilidade -= $this->durabilidade;
    }
    
    public function isFraca(){
        if($this->durabilidade<10){
            return true;
        }else{
            return false;
        }
    }
 }
 
 class Lanterna{
     public $pilha1, $pilha2;//Note que as duas pilhas se referem a classe Pilha.
     
     public function __construct(Pilha $pilha1, Pilha $pilha2){//A palavra Pilha indica um Type Hint.
        $this->pilha1 = $pilha1;
        $this->pilha2 = $pilha2;
     }
     
     public function checarEstado(){//Checar a durabilidade das duas Pilhas.
        $this->pilha1->checarEstado();
        $this->pilha2->checarEstado();        
     }
     
     public function acender(){//Acender esta descrito no exercicio is_null. Uma classe nao deve saber de nehum atributo da outra.
        if(is_null($this->pilha1) || is_null($this->pilha2)){
            echo "Falta pilha(s)<br>";
        }else{
            if($this->pilha1->isFraca() || $this->pilha2->isFraca()){
                echo "Pilha fraca<br>";
            }else{
                echo "Acendeu<br>";
                $this->pilha1->reduzirDurabilidade();
                $this->pilha2->reduzirDurabilidade();                
            }
        }
     }
 }
 $p1 = new Pilha(10,5);
 $p2 = new Pilha(10,10);
 $lant = new Lanterna($p1,$p2);
 $lant -> acender();
 $lant -> checarEstado();
 $lant -> acender();
?>
</body>
</html>
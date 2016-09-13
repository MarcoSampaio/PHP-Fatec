<!DOCTYPE html>
<html>
<body>
<?php
//Encapsulamento: conceito que permite esconder o estado (ou metodos) de um objeto. Ha tres modificadores
//de ACESSO, em PHP, que sao: public, private e protected.
//public: Qualquer classe "acessa" o membro.
//private: Apenas a propria classe "acessa" o membro.
//protected: Apenas a propria classe ou subclasse "acessam" o membro.

//ACESSOS:
//Atributo: leitura e escrita.
//Metodo: chamada.
//Acesso de leitura a um atributo: echo $x->atributo, ou $b=$x->atributo+2.
//Acesso de escrita: $x->atributo=56.
//Chamada: $x->metodo().

//A Programacao Orientada a Objeto prega que uma classe deve ser feita de modo a esconder a sua
//implementacao de outras classes.

//Atributo sempre privado
//Metodo (quase) sempre publico

//Metodo Setter: Serve para acesso de escrita
//Metodo Getter: Serve para acesso de leitura

//Data Hiding

//Exemplo Encapsulamento:
class Foo{
    public $x;
    private $y;
    
    public function ola1(){
        echo "Metodo Publico <br>";
    }
    
    private function ola2(){
        echo "Metodo Privado <br>";
    }
}
$f = new Foo();
$f -> x = 3;
//$f -> y = 5; acesso negado (elemento private)
echo "$f->x <br>"; //acesso de leitura
//echo "$f->y <br>"; acesso negado (elemento private)
$f->ola1();//chamada
//$f2->ola2(); acesso negado (elemento private)

//Exemplo Getter e Setter em atributo private (nao aconselhado):
class Foo1{
    private $atributo;
    
    public function getAtributo(){
        return $this->atributo;
    }
    
    public function setAtributo(){
        $this->atributo=$atributo;
    }
}
$f1 = new Foo1();
$f1 -> setAtributo(8);//Get e Set em atributo privado é mesma coisa que ser publico. Nao aconselhado!
echo $f1 -> getAtributo();

//Exemplo3:
class Pessoa{
    private $nome, $idade;
    
    public function __construtor($nome, $idade){
        $this->nome=$nome;
        $this->idade=$idade;
    }

    
    public function verFilmeProibido(){
        if($this->idade>=18){
            echo "Uhuuuuuuu!!! <br>";
        }else{
            echo "Proibido para menores! <br>";
        }
    }
    
    public function setIdade($idade){
        $this->idade=$idade;
    }
    
    public function aniversario(){
        $this->idade++;
        if($this->idade>13 && $this->idade<18){
            $this->estagio="Adolescente";
        }else{
            if($this->idade)
                $this->estagio="Adolescente";
            
        }
    }
}
//Fora da classe tudo é chamada de metodo!
$p = new Pessoa("Joaozinho",6,"Criança");
$p -> aniversario();
$p -> setIdade(21); //nunca usar o set em atributo privado.
$p -> verFilmeProibido();

?>
</body>>
</html>>
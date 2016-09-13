<html>
<body>
<?php
//Heranca: Relacao hierarquica entre classes. Uma classe A acima de superclasse de B. A classe B é chamada
//de subclasse A.
//B é um A = B is a A.
//Todo metodo ou atributo de A marcado como "public" ou "protect" será visivel(acessivel) em B.

//B é subclasse de A.
class B extends A{
    
}
class A{
    
}
//Exemplo: HOMEM "tem" um MULHER ou HOMEM "é um" MULHER. Fazer pergunta com TEM e É UM para saber 
//qual se a classe pode receber heranca. Nesse exemplo HOMEM nao recebe heranca de MULHER, porque HOMEM
//"tem" MULHER e HOMEM nao "é um" MULHER.

//Diagrama sobre codigo abaixo no caderno.
class Animal{
    protected $nome;
    
    public function __construct($nome){
        $this->nome=$nome;
    }
    
    public function dormir(){
        echo "$this->nome: ZZzzZZzz <br>";
    }
    
    public function comer(){
        echo "$this->nome: Huuuuuummmmm <br>";
    }
    
    //Ele é chamado quando um metodo nao visivel pelo objeto
    public function __call($m,$args){
        echo "Bad method $m";
    }
}

class Cachorro extends Animal{
    
    public function latir(){
        echo "$this->nome: AU AU AU AU <br>";
    }    
}

class Gato extends Animal{
    
    public function miar(){
        echo "$this->nome: MIAU MIAU MIAU <br>";
    }
}

//estanciando objeto cachorro
$c = new Cachorro("REX");
$c -> latir();//executando metodos
$c -> comer();//executando metodos
$c -> dormir();//executando metodos

//estanciando objeto gato
$g = new Gato("GARFIELD");
$g -> miar();//executando metodos
$g -> comer();//executando metodos
$g -> dormir();//executando metodos

//Variavel variavel
$acao = $_GET["acao"];//Na URL apos php colocar ?acao=miar
$c->$acao();

//Exercicio: Instancie o objeto animal usando parametro GET e uma variavel.
$bicho = $_GET["bicho"];
$c = new $bicho($_GET["nome"]);
$acao = $_GET["acao"];
//Variavel variavel
$c->$acao();

?>


</body>
<html>
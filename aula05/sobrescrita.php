<!DOCTYPE html>
<html>
<body>
<?php

//Explicacao de sobresquita feita com codigo e de heranca.

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
    
    public function __call($m,$args){ //cuidado ao usar
        echo "Bad method $m";
    }
    
    //Sobrescrita: É o uso de uma mesma assinatura de método em uma relacao de heranca.
    //Em B metodo() é uma sobrescrita de um metodo() em A. Assinatura: nome+parametros.
    //O intuito da sobrescrita é para generalizar comportamentos que dependem de subclasses.
    //Sobrescrita nao é polimorfismo.   
    //Explicacao grafica no caderno.
    public function emitirSom(){//Nao sei qual animal é. emitirSom é um comportamento que depende do Animal.
        echo "SOM GENÉRICO";
    }
}

class Cachorro extends Animal{
    
    public function emitirSom(){//sobrescrita
        echo "$this->nome: AU AU AU AU <br>";
    }    
}

class Gato extends Animal{
    
    public function emitirSom(){//sobrescrita
        echo "$this->nome: MIAU MIAU MIAU <br>";
    }
}

//foi retirado estanciamento de cachorro, gato e variavel variavel e incluido codigo abaixo (vetor)

//0
$prisao[] = new Cachorro("REX");
//1
$prisao[] = new Gato("BRANCO");
//2
$prisao[] = new Gato("GARFIELD");
//3
$prisao[] = new Cachorro("FLUFFY");
//750000
foreach($prisao as $bicho){
    $bicho->emitirSom();
}

?>
</body>
</html>

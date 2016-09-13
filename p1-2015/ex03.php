<!DOCTYPE html>
<html>
<body>
<?php

/*
(Obrigatorio uso de Herança). Um Cartão de Crédito possui anuidade (valor em reais) e nome do cliente. Clientes Regulares, Gold, Silver e Black
possuem desconto de 2%, 5%, 10% e 15% respectivamente. Em uma parte de um sistema de Cartões é necessário mostrar as informações do cliente, sua
categoria e o valor anual gasto já com desconto (useo o echo).
*/

abstract class CartaoCredito{
    protected $nome,$anuidade;
    
    public function __Construct($nome,$anuidade){
        $this->nome=$nome;
        $this->anuidade=$anuidade;
    }
    
    public function informacoes(){
        echo "Nome: ".$this->nome."<br>";
        echo "Anuidade com desconto: ".$this->desconto()."<br>";
        echo "Tipo: ".$this->getTipo()."<br>";
    }
    
    public abstract function desconto();
}

class Regulares extends CartaoCredito{
    public function desconto(){
        return $this->anuidade-(($this->anuidade*2)/100);
    }
    public function getTipo(){
        return "Regulares";
    }
}

class Gold extends CartaoCredito{
    public function desconto(){
        return $this->anuidade-(($this->anuidade*5)/100);
    }
    public function getTipo(){
        return "Gold";
    }
}

class Silver extends CartaoCredito{
    public function desconto(){
        return $this->anuidade-(($this->anuidade*10)/100);
    }
    public function getTipo(){
        return "Silver";
    }
}

class Black extends CartaoCredito{
    public function desconto(){
        return $this->anuidade-(($this->anuidade*15)/100);
    }
    public function getTipo(){
        return "Black";
    }
}

$r=new Regulares("Gustavo",70);
$r->informacoes();
$g=new Gold("Bruno",70);
$g->informacoes();
$s=new Silver("Marco",70);
$s->informacoes();

?>
</body>
</html>
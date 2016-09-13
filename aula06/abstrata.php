<!DOCTYPE html>
<html>
<body>
<?php
//CLASSES ABSTRATAS
//Representa uma generalizacao de um conceito.
//-> Nao pode ser instanciada.
//Pode possuir metodos abstratos (concretos tbm) e atributos.
//Metodo abstrato: Metodo sem corpo de codigo. Seu intuito é representar uma acao que tem dependencia
//de suas subclasses. TODO metodo abstrato DEVE ser subscrevido em UMA CLASSE CONCRETA.

//Exercicio: Quadrados e retangulos sao quadrilateros. É possivel calcular area e perimetros de ambos.
//Um quadrado tem um atributo lado e o retangulo dois. Desenhe o diagrama de classes e implemente todas.


abstract class Quadrilatero{
    
    protected $lado1;
    
    public function __construct($lado1){
        $this->lado1=$lado1;
    }
    
    public abstract function calcArea(); //esse metodo tem seu comportamento dependente da subclasse quadrado e retangulo? SIM, tem que sobeescrever. Tem sentido esse metodo aqui? Nao, entao tem que ser abstrato. O sentido é ser sobrescrito.
    
    public abstract function calcPerimetro(); //esse metodo tem seu comportamento dependente da subclasse quadrado e retangulo? SIM, tem que sobeescrever. Tem sentido esse metodo aqui? Nao, entao tem que ser abstrato. O sentido é ser sobrescrito.
}


class Quadrado extends Quadrilatero{

    //sobreescrever
    public function calcArea(){
        return $this->lado1*$this->lado1;
    }
    //sobreescrever
    public function calcPerimetro(){
        return 4*$this->lado1;
    }   
    
}

class Retangulo extends Quadrilatero{
    
    protected $lado2;
    
    public function __construct($lado1, $lado2){
        $this->lado2 = $lado2;
        parent::__construct($lado1);//fazer dessa forma para nao repetir codigo ja feito.
    }
    
    //sobreescrever
    public function calcArea(){
        return $this->lado1*$this->lado2;    
    }
    
    //sobreescrever
    public function calcPerimetro(){
        return 2*($this->lado1+$this->lado2);    
    }   
}

$quad = new Quadrado(1);
//$q = new Quadrilatero(0); nao pode ser intanciada.
$ret = new Retangulo(2,3);

//Quando tem retorno, mostrar com echo
echo "Area quadrado = " . $quad->calcArea() . "<br>";
echo "Perimetro quadrado = " . $quad->calcPerimetro() . "<br>";
echo "Area retangulo = " . $ret->calcArea() . "<br>";
echo "Perimetro retangulo = " . $ret->calcPerimetro() . "<br>";

?>
</body>
</html>
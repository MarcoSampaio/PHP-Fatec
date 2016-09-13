<!DOCTYPE html>
<html>
<body>
<?php
/*
Crie uma classe Revolver contendo:
- Atributos: municao, maxMunicao
- Metodos: atirar(), recarregar()
*/

class Revolver{
    public $municao, $maxMunicao;
    
    public function atirar(){
        if($this -> municao > 0){
            $this -> municao --;
        }
    }
    
    public function recarregar(){
        if($this -> municao < $this -> maxMunicao){
            $this -> municao ++;
        }
    }
    
    public function mostrarDados(){
        echo "Municao: " . $this -> municao . "<br>";
    }
}

//teste da classe revolver
$r = new Revolver();
$s = new Revolver();
$s -> maxMunicao = 6;
$r -> maxMunicao = 7;
$r -> municao = 3;
$s -> municao = 2;

$s -> atirar();
$s -> atirar();
$s -> atirar();
$r -> atirar();
$s -> recarregar();
$r -> recarregar();
$r -> mostrarDados();
$s -> mostrarDados();

?>
</body>
</html>
<!DOCTYPE html>
<html>
<body>
<?php

/*
Um Cronometro possui minutos e segundos. A cada 59 segundos, é acrescido 1 minuto. O cronometro reseta (minutos e segundos zerados) após se 
passar 99 minutos e 59 segundos. A única funcionalidade do cronometro é resetar (zerar minutos e segundos) e correr (passa um por chamada de metodo).
Um Cronometro deve começar SEMPRE com 0 minutos e 0 segundos. Codifique esta classe.
*/

class Cronometro{
        
    private $minuto,$segundo;
        
    public function __construct(){
        $this->minuto = 0;
        $this->segundo = 0;
    }
        
    public function acrescimo(){
        if($this->segundo<59){
            $this->segundo++;
        }else{
            $this->segundo=0;
            $this->minuto++;
        }
            
        echo "Minutos: $this->minuto : Segundos: $this->segundo <br>";
    }
        
    public function resetar(){
        $this->__construct();
    }
        
}
    
$c = new Cronometro();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->acrescimo();
$c->resetar();
echo $c->acrescimo();

?>
</body>
</html>
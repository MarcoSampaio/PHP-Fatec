<!DOCTYPE html>
<html>
<body>
    
<?php

class Humano{
    public function nadar(){
        echo "Nadou<br>";
    }
    
    public function grasnar(){
        echo "Pegou fantasia de pato e grasnou<br>";
    }
}

class Pato{
    public function nadar(){
        echo "Nadou<br>";
    }
    
    public function grasnar(){
        echo "pato grasnou<br>";
    }
}

class Floresta{
    //DUCK TYPING - Polimorfismo
    public function agir($alguem){
        $alguem->nadar();
        $alguem->grasnar();
    }
    
}

/*
pato e humano nao possuem relacao
heranca (ou interface), ou seja,
uma nao eh subtipo da outra
*/

$pato = new Pato();
$humano = new Humano();

$flor = new Floresta();
$flor->agir($pato);
$flor->agir($humano);
//No php basta ter o metodo definido para o metodo responder

?>
</body>
</html>
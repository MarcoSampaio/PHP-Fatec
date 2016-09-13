<!DOCTYPE html>
<html>
    <body>
        <?php
        /*
        Faca a classe Calculadora que contenha os atributos $a e $b e um metodo
        para soma-los. Crie um teste onde é possivel efetuar uma soma a partir
        de uma condicao GET.
        */
        
        class Calculadora{
            public $a, $b;
            
            public function soma(){
                echo "<h1>O resultado eh:  </h1>";
            }
        }
        
        $x = new Calculadora();
        $y = new Calculadora();
        $x -> a = $_GET[""];
        $y -> b = $_GET[""];
        $x -> soma();
        $y -> soma();
        
        
        ?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <body>
        <?php
        
        class Aluno{
            public $nome, $nota;
            
            public function estaAprovado(){
                if ($this -> nota >= 6){
                    echo "<h1> Aluno $this->nome esta aprovado </h1><br>";
                }else{
                    echo "<h1> Aluno $this->nome esta de P3 </h1><br>";
                }
            }
            
        }
        
        $a = new Aluno();
        $a -> nome = $_GET["aluno"];
        $a -> nota = $_GET["nota"];
        $a -> estaAprovado();
        
        ?>
    </body>>
</html>>
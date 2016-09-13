<!DOCTYPE html>
<html>
<body>

<!--
1) Crie a classe Produto. Esta classe possui dois atributos nome e valor. Faca os métodos toXML() 
e toJSON() que mostra um Produto em formato JSON e XML respectivamente.

Exemplo:
a) XML:
<Produto>
   <nome> Lapis </nome>
   <valor> 1.50 </valor>
</Produto>
b) JSON: {nome: "Lapis", valor: 1.50}
-->
<?php

class Produto{
    public $nome, $valor;
    
    public function __construct($nome, $valor){
        $this->nome = $nome;
        $this->valor = $valor;
    }
    
    public function toXML(){
        //Seta o response para enxergar XML
        header('content-type: text/xml');
        echo "<Produto><nome>". $this->nome ."</nome><valor>". $this->valor ."</valor></Produto>";
    }
    
    public function toJSON(){
        header('content-type: application/json');
        echo json_encode($this);
    }
}

$a = $_POST["metodo"];
$p = new Produto($_POST["nome"],$_POST["valor"]);
$p->$a();
?>

</body>
</html>
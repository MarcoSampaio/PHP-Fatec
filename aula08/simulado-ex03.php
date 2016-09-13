<!DOCTYPE html>
<html>
<body>

<!--
3) Crie uma classe chamada ProdutoDAO que contenha um método chamado inserir. 
Este método recebe um parametro $c Cliente e o insere no banco de dados. 
(Você deve criar uma Tabela com os campos: id, nome e valor).
-->

<?php
class Produto {
    public $nome,$valor;
 
    public function __construct($nome,$valor){
        $this->nome = $nome;
        $this->valor = $valor;
    }

}

class ProdutoDAO {
    
    public function insere(Produto $c){
        $mysqli = new mysqli("127.0.0.1", "bruno_alcamin", "", "Teste");
        $stmt = $mysqli->prepare("INSERT INTO Produto(nm_Produto,vl_Produto) VALUES (?,?)");
        $stmt->bind_param("si",$c->nome,$c->valor);
        $stmt->execute();
        $stmt->close();
        $this->listar();
    }
    
    public function listar(){
        $mysqli = new mysqli("127.0.0.1", "bruno_alcamin", "", "Teste");
        $stmt = $mysqli->prepare("SELECT * FROM Produto");
        $stmt->execute();
        $row = $stmt->get_result()->fetch_all();
        //var_dump($row);
        echo "<table border=1>";
        echo "<tr><th> ID </th><th> Nome </th><th> Valor </th><</tr>";
        foreach ($row as $value) {
            echo "<tr><td>$value[0]</td><td>$value[1]</td><td>$value[2]</td></tr>";
        }
        echo "</table>";
    }
}

$conx = new ProdutoDAO();
$nome=isset($_GET["nome"])?$_GET["nome"]:"";
$valor=isset($_GET["valor"])?$_GET["valor"]:null;
$x = new Produto($nome,$valor);
if($nome!="" && $valor!=null){
$conx->insere($x);
}

?>

<form method="GET" action="Exercicio3.php">
    <label>Nome:<input type="text" name="nome" required/></label>
    <label>Valor:<input type="number" name="valor" required/></label>
    <input type="submit" value="Enviar"/>
</body>
</html>
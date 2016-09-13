<!DOCTYPE html>
<html>
<body>

<?php
//Exericio: Fazer uma pagina que execute uma pesquisa pelo id.
//a) Fazer um formulario com estilo.
//b) Executar a pesquisa via mysqli.
//DICA: $smtl->bind_param("i",$_POST["id"]);
// pois teremos ?.

class Teste{
    
    public function cadastro(){
        $data = "TESTE";
        require_once "form.php";
    }
    
    public function ola(){
        echo "Ola <br>";
    }
    
    public function outro(){
        echo "Outro <br>";
        
    }
    
    public function _call($m, $args){
        echo "Invalido <br>";
    }
    
    public function insert(){
        $nome = $_POST["nome"];
        $mysqli = new mysqli("127.0.0.1", "marcosampaio", "", "teste");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO User(nome) VALUES (?)");
        $stmt->bind_param("s",$nome);
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }else{
            echo $nome . " Inserido com sucesso <br>";
        }
        $stmt->close();
    }
    
    public function listar(){
        $mysqli = new mysqli("127.0.0.1", "marcosampaio", "", "teste");
        $stmt = $mysqli->prepare("SELECT * FROM User");
        $stmt->execute();
        $row = $stmt->get_result()->fetch_all();
        echo "<ul>";
        foreach($row as $usuario){
            echo "<li> $usuario[1] </li>";
        }
        echo "</ul>";
    }
    
    public function pesquisa(){
        
        
    }
    
    public function pesquisaId(){
        
    }
    
}
$a = $_GET["param"];
$t = new Teste();
$t -> $a();

?>
        
</body>
</html>
<!DOCTYPE html>
<html>
<body>

<?php

class Teste{
    //INTERPOLACAO
    //A pagina form.php eh colada aqui, entao aparecera o form e a variavel $data. Como $data recebeu
    //o valor TESTE, este apareceu na pagina.
    
    //ROTA:
    //classe/metodo/arg1/arg2/.../argn
    //Dessa forma toda pagina tera um aspecto dinamico.
    
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
}
$a = $_GET["param"];
$t = new Teste();
$t -> $a();

?>

</body>    
</html>
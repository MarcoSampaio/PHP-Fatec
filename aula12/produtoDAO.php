<?php

class ProdutoDAO{
    public function insert(Produto $p){
        $mysqli = new mysqli("127.0.0.1", "romefeller", "", "teste");
        if ($mysqli->connect_errno) {
            echo "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO Produto(nome,valor) VALUES (?,?)");
        $stmt->bind_param("sd",$p->getNome(),$p->getValor());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
    }

    public function getProducts(){
        $mysqli = new mysqli("127.0.0.1", "romefeller", "", "teste");
        $stmt = $mysqli->prepare("SELECT * FROM Produto");
        $stmt->execute();
        $arr = mysqli_fetch_all(mysqli_stmt_get_result($stmt));
        $prods = array();
        foreach($arr as $a){
            $prods[] = new Produto($a[0],$a[1],$a[2]);
        }
        return $prods;
    }
    
    public function getProduct($id){
        $mysqli = new mysqli("127.0.0.1", "romefeller", "", "teste");
        $stmt = $mysqli->prepare("SELECT * FROM Produto WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$nome, $valor);
        $stmt->fetch();
        $prod = new Produto($id,$nome,$valor);
        return $prod;
    }
    //$stmt->bind_result($col1, $col2);
}

?>
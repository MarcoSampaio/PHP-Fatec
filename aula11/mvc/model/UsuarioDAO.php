<?php

class UsuarioDAO{
    public function insert(Usuario $u){
        $mysqli = new mysqli("127.0.0.1", "romefeller", "", "teste");
        if ($mysqli->connect_errno) {
            return "Falha no MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $stmt = $mysqli->prepare("INSERT INTO User(name,login,senha) VALUES (?,?,?)");
        //Mudar aqui de acordo com a aula de seguranca
        $stmt->bind_param("sss",$u->getNome(),$u->getLogin(),$u->getSenha());
        //----------------------------------------------
        if (!$stmt->execute()) {
            return "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $stmt->close();
        return "";
    }
    
    public function getUsuario($id){
        $mysqli = new mysqli("127.0.0.1", "romefeller", "", "teste");
        $stmt = $mysqli->prepare("SELECT * FROM User WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $stmt->bind_result($id,$nome, $login, $senha);
        $stmt->fetch();
        $usuario = new Usuario($id,$nome,$login,$senha);
        return $usuario;
    }
    
    public function authUser($login,$senha){
        $mysqli = new mysqli("127.0.0.1", "romefeller", "", "teste");
        $stmt = $mysqli->prepare("SELECT id FROM User WHERE login=? AND senha=?");
        $stmt->bind_param("ss",$login,$senha);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->fetch();
        if($id > 0){
            //ACHEI O USUARIO E O LOGIN E SENHA
            //ESTAO CORRETAS
            return $id;
        }else{
            //USUARIO OU SENHA INVALIDOS
            return false;
        }
    }
}

?>
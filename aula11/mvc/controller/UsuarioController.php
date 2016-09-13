<?php

class UsuarioController extends Controller{
    
    public function __call($m,$a){
        $this->view->renderizar("erro");
    }
    
    public function cadastro(){
        $this->view->renderizar("form");
    }
    
    public function perfil(){
        $id = $_GET["arg0"];
        //PEGANDO DADOS DO MODEL
        $userDao = new UsuarioDAO();
        $usuario = $userDao->getUsuario($id);
        // -----------------------------
        // MANDANDO PARA VIEW
        $dado["nome"] = $usuario->getNome();
        $dado["login"] = $usuario->getLogin();
        $this->view->interpolar("perfil",$dado);
        // ------------------------------
    }
    
    public function sucesso(){
        $this->view->renderizar("sucesso");
    }
    
    public function inserir(){
        //OBTEM DA VIEW
        $nome = $_POST["nome"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        //ignorar, pois, eh A_I
        $usuario = new Usuario(0,$nome,$login,$senha);
        $userDao = new UsuarioDAO();
        //PASSA AO MODEL
        $userDao->insert($usuario);
        header("Location: /usuario/sucesso");
    }
    
}

?>
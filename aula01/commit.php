-- a parte de login e navegacao do site ficou em webapp
-- a funcionalidade ficou em webserver

<?php

 //resources.php (resources chama as classes do model)
 public function buscaProduto(){ //metodo get que faz a busca de um produto
 +        $bprod = $_GET["arg1"]; //variavel recebe argumento da URL /"produto"
 +        header('content-type: application/json'); //cabeçalho do tipo de conteudo do PHP
 +        require_once "model/produto.php"; //require_once = se o arquivo não foi carregado é para carregar / require = carrega arquivo sem verificar se já foi carregado
 +        require_once "model/produtoDAO.php"; //require_once = se o arquivo não foi carregado é para carregar / require = carrega arquivo sem verificar se já foi carregado
 +        $pd = new ProdutoDAO(); //aqui está sendo instanciado o objeto ProdutoDAO que tbm é uma classe
 +        $prod = $pd->getBuscaProduto($bprod); //$pd eh o objeto ProdutoDAO que está chamando o metodo getBuscaProduto e passando como argumento a variavel $bprod. esta funcao retorna um vetor do produto que foi pesquisado
 +        foreach($prod as $x){ //foreach do $prod. $x eh cada posicao do vetor
 +            $tudo[] = array("id"=>$x->getId(), "nome"=>$x->getNome(), "valor"=>$x->getValor(), "capa"=>$x->getCapa(), "tipo"=>$x->getTipo(), "descricao"=>$x->getDescricao());
 +        } //foi criado um array para armazenar todos os produtos no formato de devolucao json
 +        echo json_encode($tudo); //json_encode devolve o vetor $tudo no formato json
 +        http_response_code(200); //codigo de resposta que o resultado foi ok
 +    }
 
 
//model/produtoDAO.php 
 public function getBuscaProduto($produto){ //metodo da classe ProdutoDAO que recebe o parametro $produto
 +        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "Teste"); //fazendo conexao com o banco (host, usuario, senha, nome do banco)
 +        $stmt = $mysqli->prepare("SELECT * FROM Produto WHERE nm_Produto = ?"); //a conexao $mysqli esta chamando o prepare e passando o select
 +        $stmt->bind_param("s",$produto); //$stmt chama o metodo bind_param que recebe o $produto que substitui o ? do prepare
 +        $stmt->execute(); //$stmt executa os comandos
 +        $v = $stmt->get_result(); //$stmt pega os resultados e guarda na variavel $v
 +        $prod = []; //eh criado um vetor
 +        while ($row = $v->fetch_assoc()){ //fetch_assoc pega o resultado linha a linha que esta em $v e coloca cada resultado em $row
 +            $prod[] = new Produto($row['cd_Produto'],$row['nm_Produto'],$row['vl_Produto'],$row['im_Produto'],$row['tp_Produto'],$row['ds_Produto']);
 +        } //foi criado um produto para cada linha de resultado do banco e atribuido ao vetor $prod
 +        $stmt->close(); //encerra a conexao
 +        return $prod; //retorna o vetor de produto
 +    }
 
 
 //controller/Controller.php
 abstract class Controller{ //classe controller
 +    
 +    protected $view; //criacao de variavel $view
 +    
 +    public function __construct(){ //metodo construtor
 +        $this->view = new View(); //seta a variavel view como novo objeto da classe View que tem o metodo para renderiza uma pagina 
 +    }
 +}
 
 
 
 //view/View.php
 class View{ //classe View
 +    public function renderizar($pagina){ //metodo renderizar que recebe parametro $pagina
 +        require_once $pagina . ".php"; //require_once = se o arquivo não foi carregado é para carregar (pagina concatenada com .php)
 +    }
 +}
 
 
 //controller/DigiudoController.php
 +class DigiudoController extends Controller{
 +    
 +    
 +    public function index(){ //metodo do DigiudoController
 +        $this->view->renderizar("index"); //objeto view da classe View chama o metodo renderizar que passa "index" como parametro
 +    }
 +    //igual para todos abaixo -----------> ler __call no final
 +    public function cadastroProduto(){
 +        $this->view->renderizar("cadastroProduto");
 +    }
 +    
 +    public function cadastroInicial(){
 +        $this->view->renderizar("cadastroInicial");
 +    }
 +    
 +    public function compra(){
 +        $this->view->renderizar("compra");
 +    }
 +
 +    public function saibamais(){
 +        $this->view->renderizar("saibamais");
 +    }
 +    
 +    public function vender(){
 +        $this->view->renderizar("vender");
 +    }
 +    
 +    public function cadastroUsuario(){
 +        $this->view->renderizar("cadastroUsuario");
 +    }
 +    
 +    public function painel(){
 +        $this->view->renderizar("painel");
 +    }
 +
 +    public function __call($m,$a){//call eh um defoul para quando um metodo nao eh encontrado dentro da classe
 +        $this->view->renderizar("erroNotFound");
 +    }
 +}

 
 
 
 
 // app.php
 class App{
 -    //VEM DA URL
      private $met, $clazz;
      
      public function __construct($met,$clazz){
         $this->met = $met;
         $this->clazz = $clazz;
     }
     
     public function startApp(){
         $clazzName = ucfirst($this->clazz)."Controller";
         require_once "controller/Controller.php";
         $filename = "controller/".$clazzName.".php";
         if (file_exists($filename)){
             require_once $filename;
             $c = new $clazzName();
              $met= $this->met;
              $c->$met();
          }else{
 -            require_once "controller/HomeController.php"; //antes
 -            $c = new HomeController(); //antes
 -            $c->call();  // antes
 +            require_once "controller/DigiudoController.php"; //mudanca do nome do arquivo - require_once = se o arquivo não foi carregado é para carregar / require = carrega arquivo sem verificar se já foi carregado
 +            $c = new DigiudoController(); //mudanca no nome da classe - aqui está sendo instanciado o objeto DigiudoController que tbm é uma classe
 +            $c->erroNotFound(); //mudanca no nome do metodo - $c eh o objeto DigiudoController que está chamando o metodo erroNotFound
          }
      }
  }
 
 
 //resources.php
 public function auth(){ //metodo de autenticacao de usuario
 +        if($_SERVER["CONTENT_TYPE"] === "application/json"){ //if verifica se o arquivo recebido eh json 
 +            $json = file_get_contents('php://input'); //file_get_contents pega o arquivo json que foi mandado e atribui a variavel $json
 +            $array = json_decode($json,true); //json_decode decodifica o json - se true ele eh associativo
 +            $uDAO = new UsuarioDAO(); //aqui está sendo instanciado o objeto UsuarioDAO que tbm é uma classe
 +            $ehLoginCorreto = $uDAO->authUser($array["login"],$array["senha"]); //$uDAO eh o objeto UsuarioDAO que está chamando o metodo authUser e passando como argumento a variavel $array["login"],$array["senha"]
 +            if($ehLoginCorreto === false){ //se variavel $ehLoginCorreto for false ela entra no if
 +                header("Location: /digiudo/vender"); //o usuario eh direcionado para pagina vender
 +            }else{ //se nao
 +                $_SESSION["_ID"] = $ehLoginCorreto; //o conteudo da variavel login eh atribuida a session
 +                header("Location: /digiudo/perfil"); //o usuario eh direcionado para pagina perfil
 +            }
 +        }else{ //se nao for json
 +            echo json_encode(array("response"=>"Dados inválidos")); //json_encode codifica o json - responde json com Dados Invalidos
 +            http_response_code(500); //codigo de resposta 500
 +        }
 +    }
 }
 
 //model/UsuarioDAO.php
 public function authUser($login,$senha){ //metodo da classe UsuarioDAO que recebe os parametros $login,$senha
 +        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP"); //fazendo conexao com o banco (host, usuario, senha, nome do banco)
 +        $stmt = $mysqli->prepare("SELECT cd_Usuario FROM Usuarios WHERE ds_Email=? AND ds_Senha=?"); //a conexao $mysqli esta chamando o prepare e passando o select
 +        $stmt->bind_param("ss",$login,$senha); //$stmt chama o metodo bind_param que recebe $login,$senha que substitui o ? do prepare
 +        $stmt->execute(); //$stmt executa os comandos
 +        $stmt->bind_result($id); //$stmt pega os resultados e guarda na variavel $id
 +        $stmt->fetch(); //fetch pega um unico registro
 +        if($id>0){ //se id maior que 0
 +            return $id; //retorna o id
 +        }else{ //se nao
 +            return false; //retorna false
 +        }
 +    }
 
 
 //model/LoginDAO.php
 //alteracao feita para conseguir pegar a session que agora esta no model do MVC
 class LoginDAO{
 +    public function authUser($login,$senha){
 +        $mysqli = new mysqli("127.0.0.1", "digiudo", "", "WebPHP");
 +        $stmt = $mysqli->prepare("SELECT cd_Usuario,nm_Usuario FROM Usuarios WHERE ds_Email=? AND ds_Senha=?"); //foi incluido mais um campo nm_Usuario
 +        $stmt->bind_param("ss",$login,$senha);
 +        $stmt->execute();
 +        $stmt->bind_result($id,$nome); //$stmt pega tbm os resultados e guarda na variavel nova variavel $nome
 +        $stmt->fetch();
 +        $usu = array('id'=>$id,'nome'=>$nome); //foi criado um array para armazenar os dados que veio da consulta
 +        if($usu['id']>0){ //se id maior que 0
 +            return $usu; //retorna $usu que recebeu o array
 +        }else{ //se nao
 +            return false; //retorna false
 +        }
 +    }
 +}
 
 //view/cadastroInicial.php
 <!DOCTYPE html>
 +
 +<html lang="pt-br">
 +<head>
 +<meta charset="utf-8">
 +<title>Digiúdo - Cadastro Inicial</title>
 +<meta name="viewport" content="width=device-width, initial-scale=1.0">
 +	<style>
 +		<?php include 'http://fonts.googleapis.com/css?family=Roboto'; ?> <!-- include inclui fonts/arquivo no codigo --> 
 +    </style>
 +	<style>
 +		<?php include "css/principal.css"; ?>
 +    </style>
 +	<style>
 +		<?php include "css/breadcrumbs.css"; ?>
 +    </style>
 +	<style>
 +		<?php include "css/footer.css"; ?>
 +    </style>
 +	<style>
 +		<?php include "css/cadastroInicial.css"; ?>
 +    </style>
 +	<script>
 +        <?php include "js/bibliotecaJQuery/jquery-2.2.0.js"; ?>
 +    </script>
 +	<script>
 +        <?php include "js/principal.js"; ?>
 +    </script>
 +	<script>
 +        <?php include "js/cadastroInic.js"; ?>
 +    </script>
 +</head>
 +<body>
 +<header>
 +	<a href="index.html" ><h1>Digiúdo</h1></a>
 +	
 +	<ul>
 +		<li class="lis"><a href="compra.html">comprar</a></li>
 +		<li class="lis"><a href="vender.html">vender</a></li>
 +		<li class="lis"><a href="saibamais.html">saiba mais</a></li>
 +		<li class="lis"><a href="cadastroInicial.html">cadastrar</a></li>
 +		<li class="lis"><a href="vender.html">login</a></li>
 +		<li class="lis"><a href="#">carrinho</a></li>	
 +	</ul>
 +	
 +	<div id="area-busca">
 +	<label><span>Pesquisar</span>
 +	<input type="search" name="pesq" id="pesq" placeholder="Pesquisar">
 +	</label>
 +	</div>
 +	<span class="cabeca">
 +	</span>
 +</header>
 +
 +<div id="breadcrumbs">
 +	<ul>
 +		<li><a href="index.html">home</a></li> 
 +		<li>cadastro inicial</li>
 +	</ul>
 +</div>
 +
 +<nav class="cadastroInic">
 +	<div class="formCadastroInic">
 +	    <h2>Crie sua conta grátis</h2>
 +	    <p class="emailJaExiste"></p>
 +	    <form onsubmit="return (verificaEmail())">
 +            <p class="pCadastroInic">
 +	            <label>
 +		            Nome:<br> <input name="nome" type="text" size="25" maxlength="50" class="inpcadastrar" tabindex="1" autofocus required>
 +	            </label>
 +            </p>
 +	
 +            <p class="pCadastroInic">
 +	            <label>
 +		            E-mail:<br> <input name="email" type="email" size="25" maxlength="50" class="inpcadastrar" tabindex="2" required>
 +    	        </label>
 +            </p>
 +
 +            <p>
 +	            <input type="submit" value="Criar Conta" tabindex="3" >
 +            </p>
 +	    </form>
 +    	<p class="text-coment top">
 +    	    Ao cadastrar-me, declaro que sou maior de idade e aceito a<br> <a href="#" class="text-coment">Política de privacidade</a> , 
 +    	    <a href="#" class="text-coment">Termos e condições do Digiúdo</a> e do <a href="#" class="text-coment">MercadoPago</a>.
 +    	</p>
 +    </div>
 +</nav>
 +<footer class="vcard"> <!-- hcard-->
 +<div class="blocos-footer">
 +	<p>Redes Sociais</p>
 +	<a href="#" class="url"><img src="imagens/icones/face.png" alt="icone Facebook" class="photo"></a> <!-- hcard-->
 +	<a href="#" class="url"><img src="imagens/icones/g+.png" alt="icone Google mais" class="photo"></a> <!-- hcard-->
 +	<a href="#" class="url"><img src="imagens/icones/youtube.png" alt="icone youtube" class="photo"></a> <!-- hcard-->
 +	<a href="#" class="url"><img src="imagens/icones/twitter.png" alt="icone twitter" class="photo"></a> <!-- hcard-->
 +</div>
 +<div class="blocos-footer">
 +	<div class="blocos-footer-centro">
 +		<p>Ligue grátis:</p>
 +		<img src="imagens/icones/telefone.png" alt="icone telefone" class="photo"> <!-- hcard-->
 +		<div id="ligue-gratis" class="tel">0800 726 2020</div> <!-- hcard-->
 +	</div>
 +</div>
 +<div class="blocos-footer">
 +	<div class="blocos-footer-centro">
 +		<div class="correio"><a href="mailto:digiudo@digiudo.com" class="email">E-mail</a></div> <!-- hcard-->
 +		<div class="correio"><a href="#">Chat</a></div>
 +	</div>
 +</div>
 +<div id="identidade">
 +<h3 class="h3-footer">© 2015 - Todos os direitos reservados - <span class="fn">Digiúdo® Tecnologia</span></h3> <!-- hcard-->
 +<p>CNPJ: 08.077.938/0001-11</p>
 +	<div class="adr"> <!-- hcard-->
 +		<span class="street-address">Av. Paulista, 1785, Conj 77 e 78</span><br>
 +		<span class="locality">Bela Vista</span> - <span class="region">SP</span> - <span class="postal-code">01311-200</span>
 +	</div>
 +</div>
 +</footer>
 +</body>
 +</html>
 
 ?>
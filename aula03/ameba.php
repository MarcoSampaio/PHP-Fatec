<?php
    //Uma ameba possui um nome e uma funcionalidade para mostrá-lo. É possivel tambem, a clonagem 
    //de uma ameba. Esta funcionalidade introduz ao nome a palavra "clone".
    
    class Ameba{
        public $nome;
        
        public function __construct($nome){
            $this->nome=$nome; 
        }
        
        public function mostrarNome(){
            echo "Nome: ".$this->nome."<br>";
        }
        
        public function clonar(){
            $a = new Ameba($this->nome." Clone");
            return $a;
        }
    }
    $ameba1 = new Ameba("Marco");
    $ameba1 -> mostrarNome();
    $ameba2 = $ameba1->clonar();
    $ameba2 -> mostrarNome();
?>
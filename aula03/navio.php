<?php
    class Navio{
        public $nome, $bandeira, $comandante;
        public function __construct($nome, $bandeira, Comandante $c){
            $this->nome=$nome;
            $this->bandeira=$bandeira;
            $this->contratar($c);
        }
    
        public function mostrarInfo(){
            echo $this->nome;
            echo $this->bandeira;
            $this->comandante->info();
        }
        
        public function contratar(Comandante $c){
            $this->comandante=$c;
        }
    }
    
    class Comandante{
        public $nome, $nac;
        public function __construct($nome, $nac){
            $this->nome=$n;
            $this->nac=$nac;
        }
        public function info(){
            echo $this->nome;
            echo $this->nac;
        }
    }
?>
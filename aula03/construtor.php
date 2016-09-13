<?php
    class Contador{
        public $numero;
        public function __construct(){
            $this->resetar();
        }
        public function incrementar(){
            $this->numero++;
        }
        public function resetar(){
            $this->numero=0;
        }
    }
    $k = Construtor();
    $k = incrementar();
    echo $k->numero;
?>
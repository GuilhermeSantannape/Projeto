<?php
    class Cliente {
        public $id_pessoa;
        public $nome;
        public $cpf;
        public $sexo;
       

        function __construct($id_pessoa, $nome, $cpf, $sexo){
            $this->id_pessoa = $id_pessoa;
            $this->nome = $nome;
            $this->cpf = $cpf;            
            $this->sexo = $sexo;
          
        }
    }
?>
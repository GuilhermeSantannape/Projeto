<?php
    class Cliente {
        public $id_cliente;
        public $nome;
        public $cpf;
        public $sexo;
        public $email;
        public $endereco;
        public $numero;
        public $complemente;
        
       

        function __construct($id_cliente, $nome, $cpf, $sexo,$email,$endereco,$numero,$complemente){
            $this->id_cliente = $id_cliente;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->sexo = $sexo;
            $this->email = $email;            
            $this->endereco = $endereco;
            $this->numero = $numero;
            $this->complemente = $complemente;
          
        }
    }
?>
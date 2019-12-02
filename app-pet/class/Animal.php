<?php
    class Animal {
        public $id_animal;
        public $desc_animal;
        public $id_raca;
        public $dta_nasc;
        public $sexo;

        function __construct($id_animal, $desc_animal, $id_raca, $dta_nasc, $sexo){
            $this->id_animal = $id_animal;
            $this->desc_animal = $desc_animal;
            $this->id_raca = $id_raca;            
            $this->dta_nasc = $dta_nasc;
            $this->sexo = $sexo;
        }
    }
?>
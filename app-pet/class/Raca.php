<?php
    class Raca {
        public $id_raca;
        public $desc_raca;
        public $id_tipo;

        function __construct($id_raca, $desc_raca, $id_tipo){
            $this->id_raca = $id_raca;
            $this->desc_raca = $desc_raca;
            $this->id_tipo = $id_tipo;            
        }
    }
?>
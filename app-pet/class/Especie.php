<?php
    class Especie {
        public $id_tipo;
        public $desc_tipo;
       

        function __construct($id_tipo, $desc_tipo){
            $this->id_tipo = $id_tipo;
            $this->desc_tipo = $desc_tipo;
                   
        }
    }
?>